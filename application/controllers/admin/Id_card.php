<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Id_card extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MemberModel');
        $this->load->model('Event_trainerModel');

        if ($this->session->userdata('role') != 'superadmin') {
            redirect(base_url("login"));
        }
    }


    public function cetak_trainer($id)
    {
        $trainer = $this->Event_trainerModel->findBy(['trainers.id' => $id])->row();
        $data = [
            'title' => 'Id Card '.$trainer->trainer_nama,
            'trainer' => $trainer,
            // 'event' => $this->TrainerModel->findBy(['trainers.id' => $id])->row(),
            'content' => 'admin/id_card/cetak_trainer',
            'base_url' => base_url('uploads/img/id_card/')
        ];

        // print_r($data); exit();

        $this->load->view('layout_print/base_mpdf', $data);
    }

    public function cetak_member($id)
    {
        $member = $this->MemberModel->findBy(['members.id' => $id])->row();
        $data = [
            'title' => 'Id Card '.$member->nama,
            'member' => $member,
            'content' => 'admin/id_card/cetak_member',
            'base_url' => base_url('uploads/img/id_card/')
        ];

        // print_r($data); exit();

        $this->load->view('layout_print/base_mpdf', $data);
    }
}
