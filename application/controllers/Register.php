<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('ProfileModel');
		$this->load->model('MemberModel');
		$this->load->model('EventModel');
		$this->load->model('LogUserModel');
		$this->load->model('UserModel');
	}

	public function index()
	{
		$data = [
			'cropper' => 'components/cropper',
			'aspect' => '3/4',
		];
		$this->load->view('register/index', $data);
	}

	// public function save()
	// {
	// 	$data = [
	// 		'nama'  => $this->input->post('nama'),
	// 		'is_approve'  => 0,
	// 		'telepon'  => $this->input->post('telepon'),
	// 		'password'  => $this->input->post('password'),
	// 		'email'  => $this->input->post('email'),
	// 		'jenis'  => $this->input->post('jenis'),
	// 		'kategori'  => $this->input->post('kategori')
	// 	];

	// 	if ($this->MemberModel->add($data)) {
	// 		$this->session->set_flashdata(['status' => 'success', 'message' => 'Registrasi berhasil, silahkan masuk menggunakan email dan nomor telepon sebagai password untuk melengkapi data anggota unit.']);
	// 		redirect(base_url('login'));
	// 	}
	// 	exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan, silahkan menghubungi admin']));
	// }

	public function save_file($file, $slug, $folderPath)
	{
		if (!empty($file)) { // $_FILES untuk mengambil data file
			$cfg = [
				'upload_path' => $folderPath,
				'allowed_types' => 'pdf',
				'file_name' => $slug,
				'overwrite' => (empty($file) ? FALSE : TRUE),
				// 'max_size' => '2028',
			];
			$this->load->library('upload', $cfg);

			if ($this->upload->do_upload('file')) {
				return $file_name = $this->upload->data('file_name');
			} else {
				exit('Error : ' . $this->upload->display_errors());
			}
		}
	}

	public function save()
	{
		// $cek = $this->AuthModel->cekLogin('users', $where)->row();
		$token = $this->input->post('token');
		$id_event = $this->EventModel->findBy(['token' => $token])->row()->id;
		// print_r($token);
		// print_r($test); exit();

		$id = $this->input->post('id');
		if (!$this->input->post('gambar')) {
			$slug = slugify($this->input->post('nama'));
		} else {
			$slug = explode('.', $this->input->post('gambar'))[0];
		}

		if (!$this->input->post('file_name')) {
			$slug_file = slugify($this->input->post('nama'));
		} else {
			$slug_file = explode('.', $this->input->post('file_name'))[0];
		}

		$file_foto = $this->input->post('file_foto');
		$folderPath = './uploads/img/member/';
		$foto = ($this->input->post('gambar') ? $this->input->post('gambar') : $slug); //jika upload berhasil akan di replace oleh function save_foto()

		if ($file_foto) {
			$foto = save_foto(
				$file_foto,
				$slug,
				$folderPath
				// return $foto -> nama foto
			);
		}

		$file_pdf = (isset($_FILES['file']) ? $_FILES['file'] : $file_pdf['name'] = false);
		$folderPath_file = './uploads/file/member/';
		$file_name = ($this->input->post('file_name') ? $this->input->post('file_name') : $slug);


		if ($file_pdf['name'] != null) {
			$file_name = $this->save_file(
				$file_pdf,
				$slug_file,
				$folderPath_file
				// return $file -> nama file
			);
		}

		// Data User
		$userData = [
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			// 'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'is_active' => 1,
			'role' => 'Member'
		];

		// Data Member
		$memberData = [
			'id_event' => $id_event,
			'email' => $this->input->post('email'),
			'nomor_telepon' => $this->input->post('nomor_telepon'),
			'token' => $token,
			'instansi' => $this->input->post('instansi'),
			'foto' => $foto,
			'file' => $file_name,
			'is_active' => 1
		];

		if (empty($id)) {
			// Insert User dan Member baru
			$userId = $this->UserModel->add($userData);
			if ($userId) {
				$memberData['id_user'] = $userId;
				if ($this->MemberModel->add($memberData)) {
					$this->session->set_flashdata(['status' => 'success', 'message' => 'Pendaftaran berhasil, data anda sedang diperiksa oleh admin. silahkan menghubungi admin untuk informasi lebih lanjut']);
					redirect(base_url($this->url_index));
				}
			}
			$this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
		} else {
			// Update User dan Member
			$member = $this->MemberModel->findBy(['id' => $id])->row();
			if ($member) {
				$this->UserModel->update(['id' => $member->id_user], $userData);
				if ($this->MemberModel->update(['id' => $id], $memberData)) {
					$this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
					redirect(base_url($this->url_index));
				}
			}
			$this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
		}
	}

	public function token_cek(){
		if($_POST['token']){
			$where = [
				'token' => $_POST['token'],
				'is_active' => 1
			];

			// $cek = $this->AuthModel->cekLogin('event', $where)->row();
			$test = $this->AuthModel->cekLogin('events', $where)->num_rows();

			if($test > 0){
				$this->session->set_flashdata(['status' => 'success', 'message' => 'Token valid']);
				echo json_encode(['status' => 'success', 'message' => $_POST['token']]);
				// redirect('register');
			}else{
				echo json_encode(['status' => 'error', 'message' => 'Token Invalid']);
			}
		} else {
			echo json_encode([]);
		}
	}
}
