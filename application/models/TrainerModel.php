<?php
 class TrainerModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
 		return $this->db->get('trainers');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('trainers');
 	}

 	function add($data){
 		return $this->db->insert('trainers',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('trainers',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('trainers');
 	}
 }
