<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('LogUserModel');
	}

	public function index()
	{
		if (isset($_SESSION['nama'])) {
			if ($_SESSION['role'] == 'superadmin') {
				redirect('admin/vote_data/vote_data_h');
			}
		}else{
			$this->load->view('login');
		}
	}

	public function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$is_admin = $this->input->post('is_admin');
		// print_r($is_admin);

		$where = [
			'username' => $username,
			'password' => $password,
			'is_active' => 1
		];
		$cek = $this->AuthModel->cekLogin('users', $where)->row();
		$test = $this->AuthModel->cekLogin('users', $where)->num_rows();
		
		if ($test > 0) {
			$data_session = [
				'id'	=> $cek->id,
				'nama'	=> $cek->nama,
				'username'	=> $cek->username,
				'password'	=> $cek->password,
				'role'	=> $cek->role,
				'status'	=> 'login'
			];

			$this->session->set_userdata($data_session);
			$this->session->set_flashdata(['status' => 'success', 'message' => 'Anda berhasil login']);
			//https://youtu.be/ubLmRj8eojA jika flashdata tidak hilang otomatis

			redirect('admin/vote_data/vote_data_h');
		} else {
			// $this->session->set_flashdata('error', 'Username atau Password salah!');
			$this->session->set_flashdata( ['status'=>'error', 'message'=>'Username atau Password salah!']);

			redirect('login');
		}
	}

}
