<?php 

class Staff_registration extends CI_controller{
	public function __construct(){
		parent:: __construct();

		$this->load->library('session_checker');
	}

	public function index(){

		$user_id = $this->session->userdata('user_id');

		// check if the session is expire
		if(!$this->session_checker->is_session_exist($user_id)){ 
			// redirect('error.html');
			redirect('login/login');
		}
			
		$group_type = $this->session->userdata('group_type'); 

		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/Staff_registration',$data);
		$this->load->view('base/include/footer',$data);
	}
}