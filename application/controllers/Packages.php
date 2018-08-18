<?php 

class Packages extends CI_controller{
	public function __construct(){
		parent:: __construct();

		//libraries
		$this->load->library('session_checker');

		// model
		$this->load->model('transaction_model');
	}

	public function index(){
		$user_id = $this->session->userdata('user_id');
		$group_type = $this->session->userdata('group_type');

		if // check if the sessions are expire
		(
			(!$this->session_checker->is_session_exist($user_id)) ||  
			(!$this->session_checker->is_session_exist($group_type))
		){ 
			// redirect('error.html');
			redirect('login');
		}
			
		 

		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/packages',$data);
		$this->load->view('base/include/footer',$data);
	}

	public function add(){
		$user_id = $this->session->userdata('user_id');
		$group_type = $this->session->userdata('group_type');

		if // check if the sessions are expire
		(
			(!$this->session_checker->is_session_exist($user_id)) ||  
			(!$this->session_checker->is_session_exist($group_type))
		){ 
			// redirect('error.html');
			redirect('login');
		}

		$package = $this->input->post('package');
		$transaction_id = $this->session->userdata('transaction_id');

		$package_id = $this->transaction_model->add_package($user_id,$transaction_id,$package);
		$this->session->set_userdata('package_id',$package_id);

		if($package_id){
			$alert = array('success' => 1); 
	        echo json_encode($alert);
		}else{
			$error = array('error' => 'Error in database'); 
	        echo json_encode($error);
		}

	}
}