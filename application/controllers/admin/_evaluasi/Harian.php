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
        $this->load->model('Evaluasi_harianModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function getEvaluasiHarian()
    {
        // print_r($_GET); exit();
        $tanggal = $_GET['tanggal'];
        $id_event = $_GET['id_event'];
        $field = $_GET['field'];

        $sql = "
                SELECT
                    *
                FROM
                    evaluasi_harian
                WHERE
                    id_event = $id_event AND tanggal = '$tanggal' AND $field != '';
            ";

        echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
    }

    public function getKeadaan()
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
                        keadaan_member = 3 AND tanggal = '".$tanggal."' AND id_event = '".$id_event. "'
                ) AS baik
                FROM
                    evaluasi_harian
                WHERE 
                    tanggal = '" . $tanggal . "' AND id_event = '" . $id_event . "'                   
                GROUP BY
                    tanggal, id_event
            ";

        echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
    }

    public function getPemahamanMateri()
    {
        $tanggal = $_GET['tanggal'];
        $id_event = $_GET['id_event'];
        $sql = "
                SELECT
                    a.activity_nama,
                    COUNT(IF(a.point = 1, 1, NULL)) AS sangat_kurang,
                    COUNT(IF(a.point = 2, 1, NULL)) AS kurang,
                    COUNT(IF(a.point = 3, 1, NULL)) AS cukup,
                    COUNT(IF(a.point = 4, 1, NULL)) AS baik,
                    COUNT(IF(a.point = 5, 1, NULL)) AS sangat_baik
                FROM
                    evaluasi_activity_t a
                LEFT JOIN evaluasi_harian b ON
                    a.id_evaluasi_harian = b.id
                WHERE
                    a.is_active = 1 AND b.is_active AND b.tanggal = '$tanggal' AND b.id_event = '$id_event'
                GROUP BY
                    a.id_activity
            ";
        $data_query = $this->RawModel->sqlRaw($sql)->result_array();
        // $data = [
        //     'activity_nama' =>''
        // ];
        // print_r($data);
        // exit();

        echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
    }

    public function getPerformaPemateri()
    {
        $tanggal = $_GET['tanggal'];
        $id_event = $_GET['id_event'];
        $sql = "
                SELECT
                    a.trainer_nama,
                    COUNT(IF(a.point = 1, 1, NULL)) AS sangat_kurang,
                    COUNT(IF(a.point = 2, 1, NULL)) AS kurang,
                    COUNT(IF(a.point = 3, 1, NULL)) AS cukup,
                    COUNT(IF(a.point = 4, 1, NULL)) AS baik,
                    COUNT(IF(a.point = 5, 1, NULL)) AS sangat_baik
                FROM
                    evaluasi_trainer_t a
                LEFT JOIN evaluasi_harian b ON
                    a.id_evaluasi_harian = b.id
                WHERE
                    a.is_active = 1 AND b.is_active AND b.tanggal = '$tanggal' AND b.id_event = '$id_event'
                GROUP BY
                    a.id_trainer
            ";

        echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
    }

    public function getPelayananPanitia()
    {
        $tanggal = $_GET['tanggal'];
        $id_event = $_GET['id_event'];
        $sql = "
                SELECT
                    (
                    SELECT
                        COUNT(pelayanan_panitia)
                    FROM
                        evaluasi_harian
                    WHERE
                        pelayanan_panitia = 1 AND tanggal = '".$tanggal."' AND id_event = '".$id_event."'
                ) AS tidak_baik,
                (
                    SELECT
                        COUNT(pelayanan_panitia)
                    FROM
                        evaluasi_harian
                    WHERE
                        pelayanan_panitia = 2 AND tanggal = '".$tanggal."' AND id_event = '".$id_event."'
                ) AS biasa,
                (
                    SELECT
                        COUNT(pelayanan_panitia)
                    FROM
                        evaluasi_harian
                    WHERE
                        pelayanan_panitia = 3 AND tanggal = '".$tanggal."' AND id_event = '".$id_event. "'
                ) AS baik
                FROM
                    evaluasi_harian
                WHERE 
                    tanggal = '" . $tanggal . "' AND id_event = '" . $id_event . "'
                GROUP BY
                    tanggal, id_event
            ";

        echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
    }
}
