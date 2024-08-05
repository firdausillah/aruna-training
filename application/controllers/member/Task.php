<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{
    public $defaultVariable = 'task';
    public $url_index = 'member/task';

    function __construct()
    {
        parent::__construct();
        $this->load->model('TaskModel', 'defaultModel');
        $this->load->model('ActivityModel');
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

        $page = (isset($_GET['page']) ? $_GET['page'] : 'index');

        if ($page == 'index') {
            $data = [
                'title' => 'Tugas',
                $this->defaultVariable => $this->defaultModel->get()->result(),
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_member/base', $data);
        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index . '/form',
                'activities' => $this->ActivityModel->findBy(['id_event' => $_SESSION['id_event']])->result(),
                'cropper' => 'components/hd_cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_member/base', $data);
        } else if ($page == 'edit') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/form',
                'cropper' => 'components/hd_cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_member/base', $data);
        }
    }

    public function save()
    {
        $member_nama = $this->MemberModel->findBy(['members.id' => $_SESSION['id']])->row()->nama;
        $activity_nama = $this->ActivityModel->findBy(['id' => $this->input->post('id_activity')])->row()->nama;

        $id = $this->input->post('id');
        $data = [
            'is_active' => 1,
            'id_activity'   => $this->input->post('id_activity'),
            'id_member'     => $_SESSION['id'],
            'id_event'      => $this->MemberModel->findBy(['members.id' => $_SESSION['id']])->row()->id_event,
            'task_link'     => $this->input->post('task_link'),
            'member_nama'   => $member_nama,
            'event_nama'    => $_SESSION['event_nama'],
            'activity_nama' => $activity_nama,
            'keterangan'    => $this->input->post('keterangan')
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

    public function getTask()
    {
        $data = [
            'is_active' => 1,
            'id_member' => $_SESSION['id']
        ];
        echo json_encode(['data' => $this->defaultModel->findBy($data)->result_array()]);
    }

    public function delete($id)
    {
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
