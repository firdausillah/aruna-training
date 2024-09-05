<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Certificate extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('CertificateModel');

        if ($this->session->userdata('role') != 'member') {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Id Card',
            'certificate' => $this->CertificateModel->findBy(['certificates.id_member' => $_SESSION['id']])->row(),
            'content' => 'member/certificate/index'
        ];
        // print_r($data['certificate']); exit();
        $this->load->view('layout_member/base', $data);
    }
}
