<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Harian extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MemberModel');
        $this->load->model('EventModel');
        $this->load->model('AuthModel');
        $this->load->model('ActivityModel');
        $this->load->model('TrainerModel');
        $this->load->model('Evaluasi_harianModel');
        $this->load->model('Evaluasi_activityModel');
        $this->load->model('Evaluasi_trainerModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'member') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        } 
    }

    public function save()
    {        

        // print_r(isset($_POST["point1"])); exit();
        $cek_evaluasi_harian = $this->AuthModel->cekLogin('evaluasi_harian', ['id_member' => $_SESSION['id'], 'is_active' => 1, 'tanggal' => $_POST['tanggal']])->num_rows();
        // print_r($cek_evaluasi_harian); exit();
        if ($cek_evaluasi_harian == 0 || $cek_evaluasi_harian == null) {
            $member_nama = $this->MemberModel->findBy(['members.id' => $_SESSION['id']])->row()->nama;
            $event_nama = $this->EventModel->findBy(['id' => $_SESSION['id_event']])->row()->nama;

            $data_activity = [];
            $data_trainer = [];
            $i = 0;
            $j = 0;

            // insert evaluasi harian
            $data_evaluasi_harian = [
                'id_member'    => $_SESSION['id'] ,
                'id_event'     => $_SESSION['id_event'] ,
                'is_active'    => 1 ,
                'member_nama'      => $member_nama ,
                'event_nama'       => $event_nama ,
                'tanggal'      => $this->input->post('tanggal') ,
                'keadaan_member'       => $this->input->post('keadaan_member') ,
                'keadaan_alasan'       => $this->input->post('keadaan_alasan') ,
                'materi_saran'     => $this->input->post('materi_saran') ,
                'trainer_saran'    => $this->input->post('trainer_saran') ,
                'pelayanan_panitia'    => $this->input->post('pelayanan_panitia') ,
                'pelayanan_alasan'     => $this->input->post('pelayanan_alasan') ,
                'komentar_usulan'      => $this->input->post('komentar_usulan')
            ];
            $id_evaluasi_harian = $this->Evaluasi_harianModel->add($data_evaluasi_harian);

            if ($id_evaluasi_harian) {
                while (isset($_POST["id_activity$i"]) && isset($_POST["point$i"])) {

                    // if(isset($_POST["point$i"])){
                        $activity_nama = $this->ActivityModel->findBy(['id' => $_POST["id_activity$i"]])->row()->nama;
                        $data_activity = [
                            'is_active' => 1,
                            'id_activity'   => $_POST["id_activity$i"],
                            'id_evaluasi_harian'  => $id_evaluasi_harian,
                            'activity_nama' => $activity_nama,
                            'point'     => $_POST["point$i"]
                        ];
                        $i++;
                        print_r($data_activity); 
        
                        try {
                            $this->Evaluasi_activityModel->add($data_activity);
                        } catch (Exception $e) {
                            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
                        }

                    // }
    
                }
    
                while (isset($_POST["id_trainer$j"]) && isset($_POST["t_point$j"])) {
    
                    // if(isset($_POST["t_point$i"])){
                        $trainer_nama = $this->TrainerModel->findBy(['trainers.id' => $_POST["id_trainer$j"]])->row()->trainer_nama;
                        $data_trainer = [
                            'is_active' => 1,
                            'id_trainer'   => $_POST["id_trainer$j"],
                            'id_evaluasi_harian'  => $id_evaluasi_harian,
                            'trainer_nama' => $trainer_nama,
                            'point'     => $_POST["t_point$j"]
                        ];
                        $j++;
                        print_r($data_trainer); 
        
                        try {
                            $this->Evaluasi_trainerModel->add($data_trainer);
                        } catch (Exception $e) {
                            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
                        }
                    // }
                }

                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url('member/evaluasi'));
            }

        }
        $this->session->set_flashdata(['status' => 'warning', 'message' => 'Anda sudah melakukan assesment untuk tanggal ini!']);
        redirect(base_url('member/evaluasi'));
    }

}
