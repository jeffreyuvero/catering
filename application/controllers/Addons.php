<?php 


class Addons extends CI_controller{
	public function __construct(){
		parent::__construct();

		//libraries
		$this->load->library('session_checker');

		// model
		$this->load->model('addons_model');
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
			
		$addons = $this->addons_model->get_addons_list();


		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'addons' => $addons,
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/addons/addons',$data);
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
		$this->load->view('base/addons/add_addons',$data);
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
		
		$is_insert = $this->addons_model->add_addons($name,$price);

		if ($is_insert) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('addons','refresh');
		}
	}

	public function edit($addons_id){

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

		$addon = $this->addons_model->get_addons($addons_id);
		
		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'addon' => $addon
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/addons/edit_addons',$data);
		$this->load->view('base/include/footer',$data);	
	}

	public function update($addons_id){
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
		
		$is_updated = $this->addons_model->update_addons($addons_id,$name,$price);

		if ($is_updated) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('addons','refresh');
		}
	}

	public function delete($addons_id){
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
		
		$is_deleted = $this->addons_model->delete_addons($addons_id);

		if ($is_deleted) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('addons','refresh');
		}
	}


}