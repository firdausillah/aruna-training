<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_activity_t extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ActivityModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function getActivity()
    {
        if ($_GET['id_event'] != null) {
            $data = [
                'id_event' => $_GET['id_event'],
                'activities.is_active' => 1
            ];
            echo json_encode(['data' => $this->ActivityModel->findBy($data)->result_array()]);
        } else {
            echo json_encode([]);
        }
    }

    public function save_event_activity()
    {
        $data = [
            'id_event' => $_POST['id_event'], 
            'nama' => $_POST['nama'], 
            'is_active' => 1
        ];

        if ($this->ActivityModel->add($data)) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil ditambahkan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function delete()
    {
        $data = [
            'id_event' => $_POST['id_event'],
            'id' => $_POST['id_activity']
        ];


        // print_r($data); exit();

        if ($this->ActivityModel->delete($data)) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        // redirect($this->url_index);
    }

    public function nonaktif($id)
    {
        if ($this->defaultModel->update(['id' => $id], ['is_active' => 0])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        // redirect($this->url_index);
    }
}
