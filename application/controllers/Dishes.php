<?php 


class Dishes extends CI_controller{
	public function __construct(){
		parent::__construct();

		//libraries
		$this->load->library('session_checker');

		// model
		$this->load->model('dishes_model');
	}

	public function index(){

		// model
		$this->load->model('transaction_model');
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
			
		$dishes = $this->dishes_model->get_dishes_list();


		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'dishes' => $dishes,
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/dishes/dishes',$data);
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
		$this->load->view('base/dishes/add_dishes',$data);
		$this->load->view('base/include/footer',$data);
	}

	public function insert(){
		$name = $this->input->post('name');
		$description = $this->input->post('description');
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
		
		$is_insert = $this->dishes_model->add_dish($name,$description,$price);

		if ($is_insert) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('dishes','refresh');
		}
	}

	public function edit($dish_id){

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

		$dish = $this->dishes_model->get_dishes($dish_id);
		
		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'dish' => $dish
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/dishes/edit_dishes',$data);
		$this->load->view('base/include/footer',$data);	
	}

	public function update($dish_id){
		$name = $this->input->post('name');
		$description = $this->input->post('description');
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
		
		$is_updated = $this->dishes_model->update_dish($dish_id,$name,$description,$price);

		if ($is_updated) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('dishes','refresh');
		}
	}

	public function delete($dish_id){
		$name = $this->input->post('name');
		$description = $this->input->post('description');
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
		
		$is_deleted = $this->dishes_model->delete_dish($dish_id);

		if ($is_deleted) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('dishes','refresh');
		}
	}


}