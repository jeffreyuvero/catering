<?php 

class Order_summary extends CI_controller{
	public function __construct(){
		parent:: __construct();
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

		$package_id = $this->session->userdata('package_id');
		$transaction_id = $this->session->userdata('transaction_id');

		$get_order = $this->transaction_model->get_order_summary($user_id,$package_id);
		$addons = $this->transaction_model->get_addons_value($transaction_id);
		$selected_package = $this->transaction_model->get_selected_package($transaction_id);

		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type,
			'order_summary' => $get_order,
			'addons' => $addons,
			'package' => $selected_package,
		);

		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/order_summary',$data);
		$this->load->view('base/include/footer',$data);
	}	
}