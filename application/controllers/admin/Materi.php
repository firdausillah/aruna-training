<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public $defaultVariable = 'materi';
    public $url_index = 'admin/materi';

    function __construct()
    {
        parent::__construct();
        $this->load->model('MateriModel', 'defaultModel');
        $this->load->model('RawModel');
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
                'title' => 'Materi',
                $this->defaultVariable => $this->defaultModel->get()->result(),
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index . '/form'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'edit') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/form'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'detail') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Detail Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'trainers' => $this->TrainerModel->get()->result(),
                'content' => $this->url_index . '/detail'
            ];
            // print_r($data['trainers']);
            // exit();

            $this->load->view('layout_admin/base', $data);
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
        if (!$this->input->post('file_name')) {
            $slug_file = slugify($this->input->post('nama'));
        } else {
            $slug_file = explode('.', $this->input->post('file_name'))[0];
        }

        $file_pdf = (isset($_FILES['file']) ? $_FILES['file'] : $file_pdf['name'] = false);
        $folderPath_file = './uploads/file/' . $this->defaultVariable . '/';
        $file_name = ($this->input->post('file_name') ? $this->input->post('file_name') : $slug_file);

        
        if ($file_pdf['name'] != null) {
            $file_name = $this->save_file(
                $file_pdf,
                $slug_file,
                $folderPath_file
                // return $file -> nama file
            );
        }

        // print_r($_POST); exit();
        $data = [
            'is_active' => 1,
            'nama'  => $this->input->post('nama'),
            'keterangan'  => $this->input->post('keterangan'),
            'file'  => $file_name
        ];


        if (empty($id)) {
            unset($id);
            if ($this->defaultModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url($this->url_index));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->defaultModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url($this->url_index));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }

    public function getMateri()
    {
        $data = [
            'is_active' => 1
        ];
        echo json_encode(['data' => $this->defaultModel->findBy($data)->result_array()]);
    }

    // public function update_akses_materi()
    // {
    //     if ($this->defaultModel->update(['id' => $_POST['id']], ['is_approve' => $_POST['is_approve']])) {
    //         echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
    //     } else {
    //         echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
    //     }
    // }

    public function delete($id)
    {
        $data = $this->defaultModel->findBy(['id' => $id])->row();
        @unlink(FCPATH . 'uploads/file/materi/' . $data->file);
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
