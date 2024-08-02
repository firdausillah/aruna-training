<?php
 class PresensiModel extends CI_Model{

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
 		return $this->db->get('presensi');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('presensi');
 	}

 	function add($data){
		$additional_data = $this->add_additional();
		return $this->db->insert('presensi', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('presensi',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('presensi');
 	}
 }
