<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
    public $defaultVariable = 'event';
    public $url_index = 'admin/event';

    function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel', 'defaultModel');
        $this->load->model('Event_trainerModel');
        $this->load->model('TrainerModel');
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
                'title' => 'Event',
                $this->defaultVariable => $this->defaultModel->get()->result(),
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index . '/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4',
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'edit') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4',
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

            if ($this->upload->do_upload('file_info')) {
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

        if (!$this->input->post('file_info_name')) {
            $slug_file = slugify($this->input->post('nama'));
        } else {
            $slug_file = explode('.', $this->input->post('file_info_name'))[0];
        }

        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/' . $this->defaultVariable . '/';
        $foto = ($this->input->post('gambar') ? $this->input->post('gambar') : $slug); //jika upload berhasil akan di replace oleh function save_foto()

        if ($file_foto) {
            $foto = save_foto(
                $file_foto,
                $slug,
                $folderPath
                // return $foto -> nama foto
            );
        }

        $file_pdf = (isset($_FILES['file_info']) ? $_FILES['file_info'] : $file_pdf['name'] = false);
        $folderPath_file = './uploads/file/' . $this->defaultVariable . '/';
        $file_name = ($this->input->post('file_info_name') ? $this->input->post('file_info_name') : $slug);

        
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
            'tanggal_buka_pendaftaran'  => $this->input->post('tanggal_buka_pendaftaran'),
            'tanggal_tutup_pendaftaran'  => $this->input->post('tanggal_tutup_pendaftaran'),
            'pelaksanaan_tanggal'  => $this->input->post('pelaksanaan_tanggal'),
            'pelaksanaan_tempat'  => $this->input->post('pelaksanaan_tempat'),
            'keterangan'  => $this->input->post('keterangan'),
            'token'  => $this->input->post('token'),
            'foto'  => $foto,
            'file_info'  => $file_name
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

    public function delete($id)
    {
        $data = $this->defaultModel->findBy(['id' => $id])->row();
        @unlink(FCPATH . 'uploads/img/event/' . $data->foto);
        @unlink(FCPATH . 'uploads/file/event/' . $data->file_info);
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
