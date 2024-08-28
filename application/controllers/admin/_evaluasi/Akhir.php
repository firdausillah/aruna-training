<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akhir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel');
        $this->load->model('Evaluasi_trainerModel');
        $this->load->model('TrainerModel');
        $this->load->model('Evaluasi_akhirModel');
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
        // print_r($_GET); exit();
        $tanggal = $_GET['tanggal'];
        $id_event = $_GET['id_event'];
        $field = $_GET['field'];

        $sql = "
                SELECT
                    *
                FROM
                    evaluasi_akhir
                WHERE
                    id_event = $id_event AND tanggal = '$tanggal' AND $field != '';
            ";

        echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
    }

    public function getEvaluasiAkhir()
    {
        $tanggal = $_GET['tanggal'];
        $id_event = $_GET['id_event'];
        $sql = "
                SELECT
                    'Kesesuaian Pelatihan dengan Kebutuhan' AS category,
                    COUNT(IF(a.kesesuaian_pelatihan_dengan_kebutuhan = 1, 1, NULL)) AS sangat_kurang,
                    COUNT(IF(a.kesesuaian_pelatihan_dengan_kebutuhan = 2, 1, NULL)) AS kurang,
                    COUNT(IF(a.kesesuaian_pelatihan_dengan_kebutuhan = 3, 1, NULL)) AS cukup,
                    COUNT(IF(a.kesesuaian_pelatihan_dengan_kebutuhan = 4, 1, NULL)) AS baik,
                    COUNT(IF(a.kesesuaian_pelatihan_dengan_kebutuhan = 5, 1, NULL)) AS sangat_baik
                FROM
                    evaluasi_akhir a
                WHERE
                    a.is_active = 1 AND a.tanggal = '$tanggal' AND a.id_event = '$id_event'
                UNION
                SELECT
                    'Narasumber Fasilitator' AS category,
                    COUNT(IF(a.narasumber_fasilitator = 1, 1, NULL)) AS sangat_kurang,
                    COUNT(IF(a.narasumber_fasilitator = 2, 1, NULL)) AS kurang,
                    COUNT(IF(a.narasumber_fasilitator = 3, 1, NULL)) AS cukup,
                    COUNT(IF(a.narasumber_fasilitator = 4, 1, NULL)) AS baik,
                    COUNT(IF(a.narasumber_fasilitator = 5, 1, NULL)) AS sangat_baik
                FROM
                    evaluasi_akhir a
                WHERE
                    a.is_active = 1 AND a.tanggal = '$tanggal' AND a.id_event = '$id_event'
                UNION
                SELECT
                    'Materi Pelatihan' AS category,
                    COUNT(IF(a.materi_pelatihan = 1, 1, NULL)) AS sangat_kurang,
                    COUNT(IF(a.materi_pelatihan = 2, 1, NULL)) AS kurang,
                    COUNT(IF(a.materi_pelatihan = 3, 1, NULL)) AS cukup,
                    COUNT(IF(a.materi_pelatihan = 4, 1, NULL)) AS baik,
                    COUNT(IF(a.materi_pelatihan = 5, 1, NULL)) AS sangat_baik
                FROM
                    evaluasi_akhir a
                WHERE
                    a.is_active = 1 AND a.tanggal = '$tanggal' AND a.id_event = '$id_event'
                UNION
                SELECT
                    'Metode Bahan Alat' AS category,
                    COUNT(IF(a.metode_bahan_alat = 1, 1, NULL)) AS sangat_kurang,
                    COUNT(IF(a.metode_bahan_alat = 2, 1, NULL)) AS kurang,
                    COUNT(IF(a.metode_bahan_alat = 3, 1, NULL)) AS cukup,
                    COUNT(IF(a.metode_bahan_alat = 4, 1, NULL)) AS baik,
                    COUNT(IF(a.metode_bahan_alat = 5, 1, NULL)) AS sangat_baik
                FROM
                    evaluasi_akhir a
                WHERE
                    a.is_active = 1 AND a.tanggal = '$tanggal' AND a.id_event = '$id_event'
                UNION
                SELECT
                    'Pengaturan Waktu' AS category,
                    COUNT(IF(a.pengaturan_waktu = 1, 1, NULL)) AS sangat_kurang,
                    COUNT(IF(a.pengaturan_waktu = 2, 1, NULL)) AS kurang,
                    COUNT(IF(a.pengaturan_waktu = 3, 1, NULL)) AS cukup,
                    COUNT(IF(a.pengaturan_waktu = 4, 1, NULL)) AS baik,
                    COUNT(IF(a.pengaturan_waktu = 5, 1, NULL)) AS sangat_baik
                FROM
                    evaluasi_akhir a
                WHERE
                    a.is_active = 1 AND a.tanggal = '$tanggal' AND a.id_event = '$id_event'
                UNION
                SELECT
                    'Penyerapan Materi Oleh Peserta' AS category,
                    COUNT(IF(a.penyerapan_materi_oleh_peserta = 1, 1, NULL)) AS sangat_kurang,
                    COUNT(IF(a.penyerapan_materi_oleh_peserta = 2, 1, NULL)) AS kurang,
                    COUNT(IF(a.penyerapan_materi_oleh_peserta = 3, 1, NULL)) AS cukup,
                    COUNT(IF(a.penyerapan_materi_oleh_peserta = 4, 1, NULL)) AS baik,
                    COUNT(IF(a.penyerapan_materi_oleh_peserta = 5, 1, NULL)) AS sangat_baik
                FROM
                    evaluasi_akhir a
                WHERE
                    a.is_active = 1 AND a.tanggal = '$tanggal' AND a.id_event = '$id_event'
                UNION
                SELECT
                    'Partisipasi Peserta' AS category,
                    COUNT(IF(a.partisipasi_peserta = 1, 1, NULL)) AS sangat_kurang,
                    COUNT(IF(a.partisipasi_peserta = 2, 1, NULL)) AS kurang,
                    COUNT(IF(a.partisipasi_peserta = 3, 1, NULL)) AS cukup,
                    COUNT(IF(a.partisipasi_peserta = 4, 1, NULL)) AS baik,
                    COUNT(IF(a.partisipasi_peserta = 5, 1, NULL)) AS sangat_baik
                FROM
                    evaluasi_akhir a
                WHERE
                    a.is_active = 1 AND a.tanggal = '$tanggal' AND a.id_event = '$id_event'
                UNION
                SELECT
                    'Akomodasi Konsumsi' AS category,
                    COUNT(IF(a.akomodasi_konsumsi = 1, 1, NULL)) AS sangat_kurang,
                    COUNT(IF(a.akomodasi_konsumsi = 2, 1, NULL)) AS kurang,
                    COUNT(IF(a.akomodasi_konsumsi = 3, 1, NULL)) AS cukup,
                    COUNT(IF(a.akomodasi_konsumsi = 4, 1, NULL)) AS baik,
                    COUNT(IF(a.akomodasi_konsumsi = 5, 1, NULL)) AS sangat_baik
                FROM
                    evaluasi_akhir a
                WHERE
                    a.is_active = 1 AND a.tanggal = '$tanggal' AND a.id_event = '$id_event'
                UNION
                SELECT
                    'Pelaksanaan Secara Keseluruhan' AS category,
                    COUNT(IF(a.pelaksanaan_secara_keseluruhan = 1, 1, NULL)) AS sangat_kurang,
                    COUNT(IF(a.pelaksanaan_secara_keseluruhan = 2, 1, NULL)) AS kurang,
                    COUNT(IF(a.pelaksanaan_secara_keseluruhan = 3, 1, NULL)) AS cukup,
                    COUNT(IF(a.pelaksanaan_secara_keseluruhan = 4, 1, NULL)) AS baik,
                    COUNT(IF(a.pelaksanaan_secara_keseluruhan = 5, 1, NULL)) AS sangat_baik
                FROM
                    evaluasi_akhir a
                WHERE
                    a.is_active = 1 AND a.tanggal = '$tanggal' AND a.id_event = '$id_event'
            ";

        echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
    }

}
