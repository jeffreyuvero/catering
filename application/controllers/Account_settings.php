<?php 


class Account_settings extends CI_Controller{
	public function __construct(){
		parent::__construct();

		//libraries
		$this->load->library('session_checker');

		// model
		$this->load->model('transaction_model');
		$this->load->model('user_model');

	}

	public function index(){

		$user_id = $this->session->userdata('user_id');	
		$group_type = $this->session->userdata('group_type');
		$this->session->unset_userdata('transaction_id');

		if // check if the sessions are expire
		(
			(!$this->session_checker->is_session_exist($user_id)) &&  
			(!$this->session_checker->is_session_exist($group_type))
		){ 
			// redirect('error.html');
			redirect('login');
		}
			
		$user_details = $this->user_model->get_user($user_id);

		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'user_details' => $user_details,
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/account_settings',$data);
		$this->load->view('base/include/footer',$data);

	}

	public function update(){
		$user_id = $this->session->userdata('user_id');	
		$group_type = $this->session->userdata('group_type');


		if // check if the sessions are expire
		(
			(!$this->session_checker->is_session_exist($user_id)) &&  
			(!$this->session_checker->is_session_exist($group_type))
		){ 
			// redirect('error.html');
			redirect('login');
		}

		$fname = $this->input->post('fname');   
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm = $this->input->post('cpass');
		
		$user_update = $this->user_model->update_user_account($user_id, $fname, $lname, $email, $password, $confirm); 

		if($user_update){
			$alert = array('success' => 1); 
	        echo json_encode($alert);
		}
	}
}