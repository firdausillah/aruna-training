<?php
 class Evaluasi_trainerModel extends CI_Model{

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
 		return $this->db->get('evaluasi_trainer_t');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('evaluasi_trainer_t');
 	}

 	function add($data){
		$additional_data = $this->add_additional();
		// print_r($additional_data + $data); exit();
		return $this->db->insert('evaluasi_trainer_t', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('evaluasi_trainer_t',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('evaluasi_trainer_t');
 	}
 }
