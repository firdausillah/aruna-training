<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Harian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel');
        $this->load->model('Evaluasi_trainerModel');
        $this->load->model('TrainerModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function getEvaluasi()
    {
        $tanggal = $_GET['tanggal'];
        $id_event = $_GET['id_event'];
        $sql = "
                SELECT
                    (
                    SELECT
                        COUNT(keadaan_member)
                    FROM
                        evaluasi_harian
                    WHERE
                        keadaan_member = 1 AND tanggal = '".$tanggal."' AND id_event = '".$id_event."'
                ) AS tidak_baik,
                (
                    SELECT
                        COUNT(keadaan_member)
                    FROM
                        evaluasi_harian
                    WHERE
                        keadaan_member = 2 AND tanggal = '".$tanggal."' AND id_event = '".$id_event."'
                ) AS biasa,
                (
                    SELECT
                        COUNT(keadaan_member)
                    FROM
                        evaluasi_harian
                    WHERE
                        keadaan_member = 3 AND tanggal = '".$tanggal."' AND id_event = '".$id_event."'
                ) AS baik
                FROM
                    evaluasi_harian
                GROUP BY
                    tanggal, id_event
            ";

        echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
    }
}
