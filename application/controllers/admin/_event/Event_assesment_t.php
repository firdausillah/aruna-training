<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_assesment_t extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AssesmentModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function getAssesmentChart()
    {
        if ($_GET['id_event'] != null) {
            $id_event = $_GET['id_event'];
            $id_member = $_GET['id_member'];
            // $id_member = $_GET['id_member'];
            $sql = 'SELECT * FROM assesments WHERE id_event = '.$id_event.' AND id_member = '.$id_member.' GROUP BY id_activity';
            $assesment_data_activities = $this->RawModel->sqlRaw($sql)->result_array();
            $sql2 = 'SELECT DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal FROM assesments WHERE id_event = '.$id_event. ' AND id_member = ' . $id_member . ' GROUP BY tanggal';
            $assesment_data_tanggals = $this->RawModel->sqlRaw($sql2)->result_array();

            foreach ($assesment_data_activities as $key => $assesment_data_activity) {
                $where = [
                    'id_event' => $id_event,
                    'is_active' => 1,
                    'id_activity' => $assesment_data_activity['id_activity'],
                    'id_member' => $id_member
                ];
                $assesment_datas = $this->AssesmentModel->findBy($where)->result_array();

                $point = [];
                foreach ($assesment_datas as $assesment_data) {
                    $point[] = $assesment_data['point'];
                }

                $data[] = array_merge(['activity_nama' => $assesment_data_activity['activity_nama'], 'point' => $point]);
                // print_r($value['activity_nama']);
            }

            foreach ($assesment_data_tanggals as $key => $assesment_data_tanggal) {
                $tanggal[] = $assesment_data_tanggal['tanggal'];
            }
            // print_r($data);
            echo json_encode([['data' => $data], ['tanggal' => $tanggal]]);
        } else {
            echo json_encode([]);
        }
    }
}
