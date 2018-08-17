<?php 


class Transaction extends CI_controller{
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
			(!$this->session_checker->is_session_exist($user_id)) &&  
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
		$this->load->view('base/transaction',$data);
		$this->load->view('base/include/footer',$data);
	}

	public function events(){
		$user_id = $this->session->userdata('user_id');
		$group_type = $this->session->userdata('group_type');

		
		if // check if the sessions are expire
		(
			(!$this->session_checker->is_session_exist($user_id)) &&
			(!$this->session_checker->is_session_exist($group_type))
		){ 
			// redirect('error.html');
			redirect('login/login');
		}
			 

		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/events',$data);
		$this->load->view('base/include/footer',$data);	
	}


	public function addons(){
		$user_id = $this->session->userdata('user_id');
		$group_type = $this->session->userdata('group_type');

		
		if // check if the sessions are expire
		(
			(!$this->session_checker->is_session_exist($user_id)) &&
			(!$this->session_checker->is_session_exist($group_type))
		){ 
			// redirect('error.html');
			redirect('login/login');
		}
			

		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/addons',$data);
		$this->load->view('base/include/footer',$data);	
	}

	public function event_submit(){
		$user_id = $this->session->userdata('user_id');
		$event = $this->input->post('event');
		$addons = $this->input->post('addons');
		$date = $this->input->post('date');
		$time = "";

		$add_trans = $this->transaction_model->add_transaction($user_id,$event,$addons,$date,$time);

		$alert = array('add' => $add_trans, 'status_message' => 'Verification code is sucessfully send to your email, please check'); 
        echo json_encode($alert);
	}
}