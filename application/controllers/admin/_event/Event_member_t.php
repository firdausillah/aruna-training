<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_member_t extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel', 'defaultModel');
        $this->load->model('Event_trainerModel');
        $this->load->model('TrainerModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function getEventTrainer()
    {
        if ($_GET['id_event'] != null) {
            $data = [
                'id_event' => $_GET['id_event'],
                'event_trainer_t.is_active' => 1
            ];
            echo json_encode(['data' => $this->Event_trainerModel->findBy($data)->result_array()]);
        } else {
            echo json_encode([]);
        }
    }

    public function getOptEventTrainer()
    {
        if ($_GET['id_event'] != null) {
            $id_event = $_GET['id_event'];
            $sql = 'SELECT
                        a.id as id_trainer, b.nama as trainer_nama
                    FROM
                        trainers a
                    LEFT JOIN users b ON
                        a.id_user = b.id
                    WHERE
                        a.id NOT IN(
                        SELECT
                            c.id_trainer
                        FROM
                            event_trainer_t c
                        WHERE
                            c.id_event = ' . $id_event . ' AND c.is_active = 1
                    ) AND a.is_active = 1';
            echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
        } else {
            echo json_encode([]);
        }
    }

    public function save_event_trainer()
    {
        $data = [
            'id_event' => $_POST['id_event'], 
            'id_trainer' => $_POST['id_trainer'], 
            'is_active' => 1
        ];

        if ($this->Event_trainerModel->add($data)) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil ditambahkan']);
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
