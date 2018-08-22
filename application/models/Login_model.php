<?php 

class Login_model extends CI_model{
	public function __construct(){
		parent::__construct();

		$this->load->database();
	}
	public function insert_registration($email,$password,$confirmPassword,$status,$first_name,$last_name,$group_type){
		// it will add values to 3 tables (user,registration,user_grp), this table is not reusable

		// first security, check of the password if it is correct
		if($password != $confirmPassword){
			return false;
			
		}else if($this->check_email($email)){
			return false;
		}else{
			 $password = password_hash($password,PASSWORD_DEFAULT); // decript the password
			// insert to user table
			$data_usr = array(
				'email' => $email,
				'password' => $password,
				'status' => $status,
				'date_register' => date('Y-m-d'),
				'time_register' => date('H:i:s'),
			);

			$this->db->insert('user',$data_usr);

			$last_id = $this->db->insert_id(); // last id inserted in user table

			// insert to registration table
			$data_reg = array(
				'iduser' => $last_id, 
				'first_name' => $first_name, 
				'last_name' => $last_name, 
			);

			$this->db->insert('registration',$data_reg);

			// inserty to user group table
			$data_grp = array(
				'group_id' => $group_type,
				'user_id' => $last_id,
			);

			$this->db->insert('user_group',$data_grp);

			return true;
		}
	}

	private function check_email($email){
		$this->db->where('email',$email);
		$query = $this->db->get('user');
		return $query->num_rows();
	}

	public function login($email,$passwrd){
		// check if the email is exist 
		$this->db->where('email', $email);
		$query =$this->db->get('user');

		// check  the password
		$verify = password_verify($passwrd,$query->row_array()['password']);
		return $verify;
	}

	public function get_user_grp($email){
		$this->db->where('email',$email);
		$query = $this->db->get('user');
		$user_id = $query->row_array()['id'];

		$this->db->where('user_id',$user_id);
		$group = $this->db->get('user_group');
		$group_id = $group->row_array()['group_id'];

		$user_group = array(
			'group_id' => $group_id,
			'user_id' => $user_id
		);
		return $user_group;
	}

}