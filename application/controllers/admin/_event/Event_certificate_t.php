<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_certificate_t extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel', 'defaultModel');
        $this->load->model('CertificateModel');
        $this->load->model('MemberModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function getCertificate()
    {
        if ($_GET['id_event'] != null) {
            $sql = '
                SELECT users.nama as member_nama, certificates.file as file, certificates.id as id FROM members LEFT JOIN users ON members.id_user = users.id RIGHT JOIN certificates ON members.id = certificates.id_member WHERE members.id_event = '.$_GET["id_event"].'        
            ';
            echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
        } else {
            echo json_encode([]);
        }
    }

    public function getOptEventMember()
    {
        if ($_GET['id_event'] != null) {
            $id_event = $_GET['id_event'];
            $sql = 'SELECT
                        a.id AS id_member,
                        b.nama AS member_nama
                    FROM
                        members a
                    LEFT JOIN users b ON
                        a.id_user = b.id
                    WHERE
                        a.id NOT IN(
                        SELECT
                            c.id_member
                        FROM
                            certificates c
                        WHERE
                            c.id_event = ' . $id_event . ' AND c.is_active = 1
                    ) AND a.is_active = 1';
            echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result_array()]);
        } else {
            echo json_encode([]);
        }
    }

    public function save_file($file, $slug, $folderPath)
    {
        if (!empty($file)) { // $_FILES untuk mengambil data file
            $cfg = [
                'upload_path' => $folderPath,
                'allowed_types' => 'pdf',
                'file_name' => $slug,
                'overwrite' => (empty($file) ? FALSE : TRUE),
                // 'max_size' => '2028',
            ];
            $this->load->library('upload', $cfg);

            if ($this->upload->do_upload('file')) {
                return $file_name = $this->upload->data('file_name');
            } else {
                exit('Error : ' . $this->upload->display_errors());
            }
        }
    }

    public function save_event_certificate()
    {

        $member = $this->MemberModel->findBy(['members.id' => $_POST['id_member']])->row();
        
        $slug_file = slugify('Sertifikat-'.$member->nama.'-'.$member->event_nama);

        $file_pdf = (isset($_FILES['file']) ? $_FILES['file'] : $file_pdf['name'] = false);
        $folderPath_file = './uploads/file/certificate/';

        if ($file_pdf['name'] != null) {
            $file_name = $this->save_file(
                $file_pdf,
                $slug_file,
                $folderPath_file
                // return $file -> nama file
            );
        }

        $data = [
            'id_event' => $_POST['id_event'], 
            'file' => $file_name, 
            'id_member' => $_POST['id_member'], 
            'is_active' => 1
        ];

        if ($this->CertificateModel->add($data)) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil ditambahkan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function delete()
    {
        $where = [
            'id_event' => $_POST['id_event'],
            'id_member' => $_POST['id_member']
        ];
        $data = $this->defaultModel->findBy($where)->row();
        @unlink(FCPATH . 'uploads/file/certificate/' . $data->file);
        if ($this->CertificateModel->delete($where)) {
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
