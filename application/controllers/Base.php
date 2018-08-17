<?php 


class Base extends CI_controller{
	public function __construct(){
		parent::__construct();

		//library
		$this->load->library('session');
		$this->load->library('session_checker');
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

		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/sample');
		$this->load->view('base/include/footer',$data);
	}


	public function logout(){
		$user_id = $this->session->userdata('user_id');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('group_type');
		redirect('login');		
	}
}