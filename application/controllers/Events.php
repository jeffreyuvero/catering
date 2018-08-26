<?php 


class Events extends CI_controller{
	public function __construct(){
		parent::__construct();

		//libraries
		$this->load->library('session_checker');

		// model
		$this->load->model('events_model');
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
			
		$events = $this->events_model->get_events_list();


		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'events' => $events,
		);

		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/events/events',$data);
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
		$this->load->view('base/events/add_events',$data);
		$this->load->view('base/include/footer',$data);
	}

	public function insert(){
		$name = $this->input->post('name');
		$description = $this->input->post('description');

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
		
		$is_insert = $this->events_model->add_events($name,$description);

		if ($is_insert) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('events','refresh');
		}
	}

	public function edit($events_id){

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

		$event = $this->events_model->get_events($events_id);
		
		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'event' => $event
		);

		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/events/edit_events',$data);
		$this->load->view('base/include/footer',$data);	
	}

	public function update($events_id){
		$name = $this->input->post('name');
		$description = $this->input->post('description');

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
		
		$is_updated = $this->events_model->update_events($events_id,$name,$description);

		if ($is_updated) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('events','refresh');
		}
	}

	public function delete($events_id){
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
		
		$is_deleted = $this->events_model->delete_events($events_id);

		if ($is_deleted) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('events','refresh');
		}
	}


}