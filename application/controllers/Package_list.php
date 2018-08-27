<?php 


class Package_list extends CI_controller{
	public function __construct(){
		parent::__construct();

		//libraries
		$this->load->library('session_checker');

		// model
		$this->load->model('package_list_model');
		$this->load->model('dishes_model');
		$this->load->model('services_model');
	}

	public function index(){
		
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
			
		$packages = $this->package_list_model->get_package_list();


		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'packages' => $packages,
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/package_list/package_list',$data);
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
		$this->load->view('base/package_list/add_package_list',$data);
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
		
		$is_insert = $this->package_list_model->add_package_list($name,$description,$price);

		if ($is_insert) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('package_list','refresh');
		}
	}

	public function edit($package_id){

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

		$package = $this->package_list_model->get_package($package_id);
		
		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'package' => $package
		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/package_list/edit_package_list',$data);
		$this->load->view('base/include/footer',$data);	
	}

	public function update($package_id){
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
		
		$is_updated = $this->package_list_model->update_package_list($package_id,$name,$description,$price);

		if ($is_updated) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('package_list','refresh');
		}
	}

	public function delete($package_id){
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
		
		$is_deleted = $this->package_list_model->delete_package_list($package_id);

		if ($is_deleted) {
			// $alert = array('success' => 1); 
	  //       echo json_encode($alert);
			redirect('package_list','refresh');
		}
	}

	public function package_inclusion($package_id){

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

		// $package = $this->package_list_model->get_package($package_id);
		$dishes = $this->dishes_model->get_dishes_list();
		$services = $this->services_model->get_service_list();
		$items_dishes = $this->package_list_model->get_package_inclusion($package_id,0); 
		$items_services = $this->package_list_model->get_package_inclusion($package_id,1); 

		// get array of dishes
		$items_dishes_checker = [];
		foreach ($items_dishes as $key => $items_dishe) {
			array_push( $items_dishes_checker,$items_dishe['iditem']);
		}

		// get array of services
		$items_services_checker = [];
		foreach ($items_services as $key => $items_service) {
			array_push( $items_services_checker,$items_service['iditem']);
		}

		
		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type, 
			'dishes' => $dishes,
			'services' => $services,
			'items_dishes_checker' => $items_dishes_checker,
			'items_services_checker' => $items_services_checker,
			'package_id' => $package_id,

		);
		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/package_list/package_inclusion',$data);
		$this->load->view('base/include/footer',$data);	
	}

	public function replace_items(){
		$package_id = $this->input->post('package_id');
		$items = $this->input->post('items');

		$this->package_list_model->delete_package_item($package_id);
		foreach ($items as $key => $item) {
			$this->package_list_model->insert_package_item($package_id,$item['items_item'],$item['items_type']);
		}
		$alert = array('success' => 1); 
		echo json_encode($alert);
	}
}