<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');
        $this->load->model('MemberModel');

        if ($this->session->userdata('role') != 'member') {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'member' => $this->MemberModel->findBy(['members.id' => $this->session->userdata('id')])->row(),
            'content' => 'member/dashboard'
        ];

        $this->load->view('layout_member/base', $data);
    }
}
