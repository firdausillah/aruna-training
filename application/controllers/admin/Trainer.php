<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trainer extends MY_Controller
{
    public $defaultVariable = 'trainer';
    public $url_index = 'admin/trainer';

    function __construct()
    {
        parent::__construct();
        $this->load->model('TrainerModel', 'defaultModel');
        $this->load->model('RawModel');
        $this->load->model('UserModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        $page = (isset($_GET['page']) ? $_GET['page'] : 'index');

        if ($page == 'index') {
            $data = [
                'title' => 'Trainer',
                $this->defaultVariable => $this->RawModel->sqlRaw(
                    'SELECT a.id, a.kode, a.foto, a.nomor_telepon, a.email, a.specialization, b.nama, b.username, b.password, b.role FROM trainers a LEFT JOIN users b on a.id_user = b.id WHERE a.is_active = 1'
                )->result(),
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index . '/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_admin/base', $data);
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

            $this->load->view('layout_admin/base', $data);
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

        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/' . $this->defaultVariable . '/';
        $foto = $this->input->post('gambar'); //jika upload berhasil akan di replace oleh function save_foto()

        if ($file_foto) {
            $foto = save_foto(
                $file_foto,
                $slug,
                $folderPath
                // return $foto -> nama foto
            );
        }

        // Data User
        $userData = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            // 'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'is_active' => 1,
            'role' => 'trainer'
        ];

        // Data Trainer
        $trainerData = [
            'email' => $this->input->post('email'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'specialization' => $this->input->post('specialization'),
            'foto' => $foto,
            'is_active' => 1
        ];

        if (empty($id)) {
            // Insert User dan Trainer baru
            $userId = $this->UserModel->add($userData);
            // print_r($userId); exit();
            if ($userId) {
                $trainerData['id_user'] = $userId;
                if ($this->defaultModel->add($trainerData)) {
                    $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                    redirect(base_url($this->url_index));
                }
            }
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        } else {
            // Update User dan Trainer
            $trainer = $this->defaultModel->findBy(['id' => $id])->row();
            if ($trainer) {
                $this->UserModel->update(['id' => $trainer->id_user], $userData);
                if ($this->defaultModel->update(['id' => $id], $trainerData)) {
                    $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                    redirect(base_url($this->url_index));
                }
            }
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function delete($id)
    {
        $data = $this->defaultModel->findBy(['id' => $id])->row();
        @unlink(FCPATH . 'uploads/img/trainer/' . $data->foto);
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
