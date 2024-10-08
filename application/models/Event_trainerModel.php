<?php
 class Event_trainerModel extends CI_Model{

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
		$this->db->select('*');
		$this->db->from('events');
		$this->db->join('event_trainer_t', 'event_trainer_t.id_event = events.id');
		$this->db->join('trainers', 'trainers.id = event_trainer_t.id_trainer');
		// $query = $this->db->get();
 		return $this->db->get();
 	}

 	function findBy($id){
		$this->db->select('trainers.id as id, trainers.id_user, trainers.foto as foto, trainers.nomor_telepon, trainers.email, trainers.specialization, users.nama as trainer_nama, users.username, users.password, users.role, events.nama as event_nama, events.pelaksanaan_tempat, events.pelaksanaan_tanggal, events.foto as event_foto, events.tanggal_buka_pendaftaran, events.tanggal_tutup_pendaftaran, events.file_info, events.token');
		$this->db->from('events');
		$this->db->join('event_trainer_t', 'event_trainer_t.id_event = events.id');
		$this->db->join('trainers', 'trainers.id = event_trainer_t.id_trainer');
		$this->db->join('users', 'users.id = trainers.id_user');
 		$this->db->where($id);
 		return $this->db->get();
 	}

 	function add($data){
		$additional_data = $this->add_additional();
		return $this->db->insert('event_trainer_t', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('event_trainer_t',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('event_trainer_t');
 	}
 }
