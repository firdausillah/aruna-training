<?php
 class MemberModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function add_additional()
	{
		if (isset($_SESSION['id'])) {
			$user_id = $_SESSION['id'];
		} else {
			$user_id = '';
		}
		date_default_timezone_set('Asia/Jakarta');
		return $data = [
			'created_by' => $user_id,
			'created_on' => date('Y-m-d H:i:s')
		];
	}
 	
 	function get(){
 		// return $this->db->get('members');
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('users', 'users.id = members.id_user');
		return $this->db->get();
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('members');
 	}

 	function add($data){
		$additional_data = $this->add_additional();
		return $this->db->insert('members', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('members',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('members');
 	}
 }
