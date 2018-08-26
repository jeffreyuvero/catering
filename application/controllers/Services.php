<?php 


class Services extends CI_controller{
	public function __construct(){
		parent::__construct();

		//libraries
		$this->load->library('session_checker');

		// model
		$this->load->model('services_model');
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
			
		$services = $this->services_model->get_service_list();


		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'services' => $services,
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/services/services',$data);
		$this->load->view('base/include/footer',$data);

	}


	public function add(){

		$user_id = $this->session->userdata('user_id');
		$group_type = $this->session->userdata('group_type');
		// $this->session->unset_userdata('transaction_id');

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
		$this->load->view('base/services/add_services',$data);
		$this->load->view('base/include/footer',$data);
	}

	public function insert(){
		$name = $this->input->post('name');
		// $description = $this->input->post('description');
		$price = $this->input->post('price');

		$user_id = $this->session->userdata('user_id');
		$group_type = $this->session->userdata('group_type');
		// $this->session->unset_userdata('transaction_id');

		if // check if the sessions are expire
		(
			(!$this->session_checker->is_session_exist($user_id)) &&  
			(!$this->session_checker->is_session_exist($group_type))
		){ 
			// redirect('error.html');
			redirect('login');
		}
		
		$is_insert = $this->services_model->add_service($name,$price);

		if ($is_insert) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('services','refresh');
		}
	}

	public function edit($service_id){

		$user_id = $this->session->userdata('user_id');
		$group_type = $this->session->userdata('group_type');
		// $this->session->unset_userdata('transaction_id');

		if // check if the sessions are expire
		(
			(!$this->session_checker->is_session_exist($user_id)) &&  
			(!$this->session_checker->is_session_exist($group_type))
		){ 
			// redirect('error.html');
			redirect('login');
		}

		$service = $this->services_model->get_services($service_id);
		
		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'service' => $service
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/services/edit_services',$data);
		$this->load->view('base/include/footer',$data);	
	}

	public function update($service_id){
		$name = $this->input->post('name');
		// $description = $this->input->post('description');
		$price = $this->input->post('price');

		$user_id = $this->session->userdata('user_id');
		$group_type = $this->session->userdata('group_type');
		// $this->session->unset_userdata('transaction_id');

		if // check if the sessions are expire
		(
			(!$this->session_checker->is_session_exist($user_id)) &&  
			(!$this->session_checker->is_session_exist($group_type))
		){ 
			// redirect('error.html');
			redirect('login');
		}
		
		$is_updated = $this->services_model->update_service($service_id,$name,$price);

		if ($is_updated) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('services','refresh');
		}
	}

	public function delete($service_id){
		$name = $this->input->post('name');
		// $description = $this->input->post('description');
		$price = $this->input->post('price');

		$user_id = $this->session->userdata('user_id');
		$group_type = $this->session->userdata('group_type');
		// $this->session->unset_userdata('transaction_id');

		if // check if the sessions are expire
		(
			(!$this->session_checker->is_session_exist($user_id)) &&  
			(!$this->session_checker->is_session_exist($group_type))
		){ 
			// redirect('error.html');
			redirect('login');
		}
		
		$is_deleted = $this->services_model->delete_service($service_id);

		if ($is_deleted) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('services','refresh');
		}
	}


}