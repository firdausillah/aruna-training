<?php
 class MateriModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function add_additional()
	{
		$user_id = $_SESSION['id'];
		date_default_timezone_set('Asia/Jakarta');
		return $data = [
			'created_by' => $user_id,
			'created_on' => date('Y-m-d H:i:s')
		];
	}
 	
 	function get(){
		$this->db->select("if(is_approve=0,'Tutup','Buka') as akses, if(is_approve=0,'warning','success') as bg, id, nama, file, keterangan");
		$this->db->from('materi');
 		return $this->db->get();
 	}

 	function findBy($id){
		$this->db->select("if(is_approve=0,'Tutup','Buka') as akses, if(is_approve=0,'warning','success') as bg, id, nama, file, keterangan");
		$this->db->from('materi');
 		$this->db->where($id);
 		return $this->db->get();
 	}

 	function add($data){
		$additional_data = $this->add_additional();
		return $this->db->insert('materi', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('materi',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('materi');
 	}
 }
