<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akhir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Evaluasi_akhirModel');
        $this->load->model('MemberModel');
        $this->load->model('EventModel');
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

        // print_r($_POST);
        // exit();

        $member_nama = $this->MemberModel->findBy(['members.id' => $_SESSION['id']])->row()->nama;
        $event_nama = $this->EventModel->findBy(['id' => $_SESSION['id_event']])->row()->nama;
        
        $data = [
            'id_event' => $_SESSION['id_event'],  
            'id_member' => $_SESSION['id'],  
            'is_active' => 1,
            'member_nama'   => $member_nama,
            'event_nama'    => $event_nama,
            'kesesuaian_pelatihan_dengan_kebutuhan' => $this->input->post('kesesuaian_pelatihan_dengan_kebutuhan'),
            'narasumber_fasilitator'    => $this->input->post('narasumber_fasilitator'),
            'materi_pelatihan'  => $this->input->post('materi_pelatihan'),
            'metode_bahan_alat' => $this->input->post('metode_bahan_alat'),
            'pengaturan_waktu'  => $this->input->post('pengaturan_waktu'),
            'penyerapan_materi_oleh_peserta'    => $this->input->post('penyerapan_materi_oleh_peserta'),
            'partisipasi_peserta'   => $this->input->post('partisipasi_peserta'),
            'akomodasi_konsumsi'    => $this->input->post('akomodasi_konsumsi'),
            'pelaksanaan_secara_keseluruhan'    => $this->input->post('pelaksanaan_secara_keseluruhan'),
            'komentar'  => $this->input->post('komentar'),
            'usul_saran'    => $this->input->post('usul_saran')
        ];

        if ($this->Evaluasi_akhirModel->add($data)) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
            redirect(base_url('member/evaluasi'));
        }
        exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
    }

}
