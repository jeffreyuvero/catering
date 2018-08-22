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

	public function update_user_account($user_id, $fname, $lname, $email, $password, $confirm){
		if($password != $confirm){
			return false;
		}else{
			$password = password_hash($password,PASSWORD_DEFAULT); // decript the password
			$user_update = array(
				'email' => $email, 
				'password' => $password, 
			);

			$this->db->where('id',$user_id);
			$this->db->set($user_update);
			$this->db->update('user');

			$reg_update = array(
				'first_name' => $fname, 
				'last_name' => $lname, 
			);

			$this->db->where('iduser',$user_id);
			$this->db->set($reg_update);
			$this->db->update('registration');

			return true; 
		}
	}
}