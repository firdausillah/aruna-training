<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public $defaultVariable = 'materi';
    public $url_index = 'member/materi';

    function __construct()
    {
        parent::__construct();
        // $this->load->model('MateriModel', 'Event_materiModel');
        $this->load->model('Event_materiModel');
        $this->load->model('MemberModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'member') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        // print_r($this->session->userdata());
        // exit();

        $data = [
            'title' => 'Materi',
            $this->defaultVariable => $this->Event_materiModel->get()->result(),
            'content' => $this->url_index
        ];

        $this->load->view('layout_member/base', $data);
    }

    public function getMateri()
    {
        $data = [
            'event_materi_t.is_active' => 1,
            'event_materi_t.is_approve' => 1,
            'id_event' => $_SESSION['id_event']
        ];
        echo json_encode(['data' => $this->Event_materiModel->findBy($data)->result_array()]);
    }

}
