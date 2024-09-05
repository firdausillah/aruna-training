<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_task_t extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('TaskModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function getMemberTask()
    {
        if ($_GET['id_member'] != null) {
            $data = [
                'tasks.id_member' => $_GET['id_member'],
                'tasks.is_active' => 1
            ];
            echo json_encode(['data' => $this->TaskModel->findBy($data)->result()]);
        } else {
            echo json_encode([]);
        }
    }

    public function getTaskRow()
    {
        if ($_GET['id_task'] != null) {
            $data = [
                'tasks.id' => $_GET['id_task'],
                'tasks.is_active' => 1
            ];
            echo json_encode(['data' => $this->TaskModel->findBy($data)->row()]);
        } else {
            echo json_encode([]);
        }
    }

    public function update_task()
    {
        // print_r($_POST); exit();
        if ($this->TaskModel->update(['id' => $_POST['id_task']], ['keterangan' => $_POST['task_keterangan'], 'nilai' =>$_POST['task_nilai']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
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

        if ($this->TaskModel->delete($data)) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        // redirect($this->url_index);
    }

    public function nonaktif($id)
    {
        if ($this->TaskModel->update(['id' => $id], ['is_active' => 0])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        // redirect($this->url_index);
    }
}
