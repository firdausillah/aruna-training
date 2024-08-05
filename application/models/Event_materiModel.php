<?php
 class Event_materiModel extends CI_Model{

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
		$this->db->select("if(event_materi_t.is_approve=0,'Tutup','Buka') as akses, if(event_materi_t.is_approve=0,'warning','success') as bg, event_materi_t.id, materi.nama, file, materi.keterangan, event_materi_t.id_materi, events.id as id_event");
		$this->db->from('events');
		$this->db->join('event_materi_t', 'event_materi_t.id_event = events.id');
		$this->db->join('materi', 'materi.id = event_materi_t.id_materi');
		// $query = $this->db->get();
 		return $this->db->get();
 	}

 	function findBy($id){
		$this->db->select("if(event_materi_t.is_approve=0,'Tutup','Buka') as akses, if(event_materi_t.is_approve=0,'warning','success') as bg, event_materi_t.id, materi.nama, file, materi.keterangan, event_materi_t.id_materi, events.id as id_event");
		$this->db->from('events');
		$this->db->join('event_materi_t', 'event_materi_t.id_event = events.id');
		$this->db->join('materi', 'materi.id = event_materi_t.id_materi');
 		$this->db->where($id);
 		return $this->db->get();
 	}

 	function add($data){
		$additional_data = $this->add_additional();
		return $this->db->insert('event_materi_t', $additional_data + $data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('event_materi_t',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('event_materi_t');
 	}
 }
