<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assesment extends CI_Controller
{
    public $defaultVariable = 'assesment';
    public $url_index = 'member/assesment';

    function __construct()
    {
        parent::__construct();
        $this->load->model('AssesmentModel');
        $this->load->model('MemberModel');
        $this->load->model('ActivityModel');
        $this->load->model('AuthModel');
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
        $data = [
            'title' => 'Assesment',
            'activities' => $this->ActivityModel->findBy(['is_active' => 1, 'is_assesment' => 1, 'id_event' => $_SESSION['id_event']])->result(),
            'content' => $this->url_index 
        ];

        // print_r($data); exit();

        $this->load->view('layout_member/base', $data);
    }
    
    public function save()
    {

        $member_nama = $this->MemberModel->findBy(['members.id' => $_SESSION['id']])->row()->nama;

        $cek_assesment = $this->AuthModel->cekLogin('assesments', ['id_member' => $_SESSION['id'], 'is_active' => 1, 'tanggal' => $_POST['tanggal']])->num_rows();
        // print_r($cek_assesment); exit();

        if($cek_assesment == 0 || $cek_assesment == null){
            $data = [];
            $i = 0;
    
            while (isset($_POST["id_activity$i"]) && isset($_POST["point$i"])) {
    
                $activity_nama = $this->ActivityModel->findBy(['id' => $_POST["id_activity$i"]])->row()->nama;
                $data = [
                    'is_active' => 1,
                    'id_activity'   => $_POST["id_activity$i"],
                    'id_member'   => $_SESSION['id'],
                    'id_event'  => $this->MemberModel->findBy(['members.id' => $_SESSION['id']])->row()->id_event,
                    'member_nama'   => $member_nama,
                    'event_nama'    => $_SESSION['event_nama'],
                    'point'     => $_POST["point$i"],
                    'tanggal'     => $_POST['tanggal'],
                    'activity_nama' => $activity_nama
                ];
                $i++;
                
                try {
                    $this->AssesmentModel->add($data);
                } catch (Exception $e) {
                    exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
                }
            }
            // exit();
    
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
            redirect(base_url($this->url_index));
        }
        $this->session->set_flashdata(['status' => 'warning', 'message' => 'Anda sudah melakukan assesment untuk tanggal ini!']);
    }

    public function delete($id)
    {
        if ($this->AssesmentModel->delete(['id' => $id])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }

    public function nonaktif($id)
    {
        if ($this->AssesmentModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }
}
