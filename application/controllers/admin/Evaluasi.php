<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi extends MY_Controller
{
    public $url_index = 'admin/evaluasi';

    function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel');
        $this->load->model('Evaluasi_trainerModel');
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
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'detail') {
            $id_event = (isset($_GET['id_event']) ? $_GET['id_event'] : '');
            $data = [
                'title' => $this->EventModel->findBy(['id' => $id_event])->row()->nama,
                'content' => $this->url_index . '/detail'
            ];

            $this->load->view('layout_admin/base', $data);
        }
    }

    public function getEvents()
    {
        echo json_encode(['data' => $this->EventModel->get()->result_array()]);
    }

}
