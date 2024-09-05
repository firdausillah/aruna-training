<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends MY_Controller
{
    public $defaultVariable = 'member';
    public $url_index = 'member/biodata';

    function __construct()
    {
        parent::__construct();
        $this->load->model('TrainerModel', 'defaultModel');
        $this->load->model('RawModel');
        $this->load->model('UserModel');
        $this->load->model('MemberModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'member') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        $page = (isset($_GET['page']) ? $_GET['page'] : 'index');
        $id_user = $_SESSION['id'];

        if ($page == 'index') {
            $data = [
                'title' => 'Biodata',
                $this->defaultVariable => $this->RawModel->sqlRaw(
                    'SELECT a.id, a.kode, a.foto, a.file, a.nomor_telepon, a.email, a.instansi,a. nomor_telepon, b.nama, b.username, b.password, b.role FROM members a LEFT JOIN users b on a.id_user = b.id WHERE a.is_active = 1 AND a.id = '. $id_user
                )->row(),
                'content' => $this->url_index . '',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_member/base', $data);
        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index . '/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_member/base', $data);
        } else if ($page == 'edit') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->RawModel->sqlRaw(
                    'SELECT a.id, a.kode, a.foto, a.nomor_telepon, a.email, a.specialization, b.nama, b.username, b.password, b.role FROM trainers a LEFT JOIN users b on a.id_user = b.id WHERE a.is_active = 1 AND a.id = '.$id
                )->row(),
                'content' => $this->url_index . '/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_member/base', $data);
        }
    }

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
            'role' => 'member'
        ];

        // Data Member
        $memberData = [
            'email' => $this->input->post('email'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
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
            $member = $this->MemberModel->findBy(['members.id' => $id])->row();
            if ($member) {
                $this->UserModel->update(['users.id' => $member->id_user], $userData);
                if ($this->MemberModel->update(['members.id' => $id], $memberData)) {
                    $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                    redirect(base_url($this->url_index));
                }
            }
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function delete($id)
    {
        if ($this->defaultModel->delete(['id' => $id])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }

    public function nonaktif($id)
    {
        if ($this->defaultModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }
}
