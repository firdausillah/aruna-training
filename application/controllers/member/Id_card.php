<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Id_card extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MemberModel');

        if ($this->session->userdata('role') != 'member') {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Id Card',
            'member' => $this->MemberModel->findBy(['members.id' => $_SESSION['id']])->row(),
            'content' => 'member/id_card/index'
        ];

        $this->load->view('layout_member/base', $data);
    }

    public function cetak()
    {
        $data = [
            'title' => 'Id Card',
            'member' => $this->MemberModel->findBy(['members.id' => $_SESSION['id']])->row(),
            'content' => 'member/id_card/cetak',
            'base_url' => base_url('uploads/img/id_card/')
        ];

        // print_r($data); exit();

        $this->load->view('layout_print/base_mpdf', $data);
    }
}
