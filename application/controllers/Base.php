<?php 


class Base extends CI_controller{
	public function __construct(){
		parent::__construct();

		//library
		$this->load->library('session');
		$this->load->library('session_checker');

		// model 
		$this->load->model('user_model');
		$this->load->model('transaction_model');
	}

	public function index(){
		$user_id = $this->session->userdata('user_id');
		$group_type = $this->session->userdata('group_type');

		if // check if the sessions are expire
		(
			(!$this->session_checker->is_session_exist($user_id)) &&  
			(!$this->session_checker->is_session_exist($group_type))
		){ 
			redirect('/login','refresh');
		}

		$user_datails = $this->user_model->get_user($user_id); 
		$transaction_record = $this->transaction_model->get_transactions_user($user_id);

		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'user_details' => $user_datails, 
			'transaction_records' => $transaction_record,
		);

		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/dashboard',$data);
		$this->load->view('base/include/footer',$data);
	}


	public function logout(){
		$user_id = $this->session->userdata('user_id');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('group_type');
		$this->session->unset_userdata('transaction_id');
		redirect('login');		
	}
}