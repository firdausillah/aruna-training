<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_materi_t extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel', 'defaultModel');
        $this->load->model('Event_materiModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function getEventMateri()
    {
        if ($_GET['id_event'] != null) {
            $data = [
                'id_event' => $_GET['id_event'],
                'event_materi_t.is_active' => 1
            ];
            echo json_encode(['data' => $this->Event_materiModel->findBy($data)->result_array()]);
        } else {
            echo json_encode([]);
        }
    }

    public function getOptEventMateri()
    {
        if ($_GET['id_event'] != null) {
            $id_event = $_GET['id_event'];
            $sql = 'SELECT
                        a.id as id_materi, a.nama as materi_nama
                    FROM
                        materi a
                    WHERE
                        a.id NOT IN(
                        SELECT
                            c.id_materi
                        FROM
                            event_materi_t c
                        WHERE
                            c.id_event = ' . $id_event . ' AND c.is_active = 1
                    ) AND a.is_active = 1';
            echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
        } else {
            echo json_encode([]);
        }
    }

    public function save_event_materi()
    {
        $data = [
            'id_event' => $_POST['id_event'], 
            'id_materi' => $_POST['id_materi'], 
            'is_active' => 1
        ];

        if ($this->Event_materiModel->add($data)) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil ditambahkan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function update_akses_materi()
    {
        if ($this->Event_materiModel->update(['id' => $_POST['id']], ['is_approve' => $_POST['is_approve']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function delete()
    {
        $data = [
            'id_event' => $_POST['id_event'],
            'id_materi' => $_POST['id_materi']
        ];


        // print_r($data); exit();

        if ($this->Event_materiModel->delete($data)) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        // redirect($this->url_index);
    }

    public function nonaktif($id)
    {
        if ($this->defaultModel->update(['id' => $id], ['is_active' => 0])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        // redirect($this->url_index);
    }
}
