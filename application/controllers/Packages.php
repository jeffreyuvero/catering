<?php 

class Packages extends CI_controller{
	public function __construct(){
		parent:: __construct();

		//libraries
		$this->load->library('session_checker');

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
}