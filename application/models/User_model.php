<?php 


class User_model extends CI_model{
	public function __controller(){
		parent::__controller();
	}

	public function get_user($user_id){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('registration','registration.iduser = user.id','left');
		$this->db->where('user.id',$user_id);
		$query = $this->db->get();
		return $query->row_array();
	}
}