<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_member_t extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel', 'defaultModel');
        $this->load->model('MemberModel');
        $this->load->model('RawModel');
        $this->load->model('PresensiModel');
        $this->load->model('TaskModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function getEventMember()
    {
        if ($_GET['id_event'] != null) {
            $data = [
                'id_event' => $_GET['id_event'],
                'members.is_active' => 1
            ];
            echo json_encode(['data' => $this->MemberModel->findBy($data)->result_array()]);
        } else {
            echo json_encode([]);
        }
    }

    public function getMemberBiodata()
    {
        if ($_GET['id_member'] != null) {
            $data = [
                'members.id' => $_GET['id_member'],
                'members.is_active' => 1
            ];
            echo json_encode(['data' => $this->MemberModel->findBy($data)->row()]);
        } else {
            echo json_encode([]);
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

    public function getMemberPresensi()
    {
        if ($_GET['id_member'] != null) {
            $data = [
                'presensi.id_member' => $_GET['id_member'],
                'presensi.is_active' => 1
            ];
            echo json_encode(['data' => $this->PresensiModel->findBy($data)->result()]);
        } else {
            echo json_encode([]);
        }
    }

    public function getPresensiAkumulasi()
    {
        if ($_GET['id_event'] != null) {
            $data = [
                'presensi.id_event' => $_GET['id_event'],
                'presensi.is_active' => 1
            ];
            echo json_encode(['data' => $this->PresensiModel->findBy($data)->result()]);
        } else {
            echo json_encode([]);
        }
    }

    public function update_catatan()
    {
        // print_r($_POST); exit();
        if ($this->MemberModel->update(['id' => $_POST['id_event_member']], ['keterangan' => $_POST['event_member_keterangan']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function update_status_member()
    {
        if ($this->MemberModel->update(['id' => $_POST['id']], ['is_approve' => $_POST['is_approve']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function delete($id)
    {
        if ($this->defaultModel->delete(['id' => $id])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        // redirect($this->url_index);
    }

    public function nonaktif()
    {
        // print_r($_POST); exit();
        if ($this->MemberModel->update(['id' => $_POST['id_member']], ['is_active' => 0])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        // redirect($this->url_index);
    }
}
