<?php 

class Billing_statement extends CI_controller{
	public function __construct(){
		parent::__construct();

		//libraries
		$this->load->library('session_checker');

		// model
		$this->load->model('transaction_model');
		$this->load->model('user_model');
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

		// to get the total price of the addons
		$addons_total = 0;
		foreach ($addons as $key => $addon) {
			$addons_total += $addon['price']; 
		}
		// $addons_total
		$total_package = $selected_package['price'];
		$total_amount = $total_package + $addons_total;

		$data = array(
			'base_url' => base_url(),
			'site_url' => site_url(),
			'title' => 'Catering Online', 
			'group_type' => $group_type,
			'order_summary' => $get_order,
			'addons' => $addons,
			'package' => $selected_package,
			'total_amount' => number_format(floatval($total_amount)),
			'transaction_date' => date('Y - m- d'),
		);


		$this->load->view('base/include/header',$data);
		$this->load->view('base/include/menu',$data);
		$this->load->view('base/billing_statement',$data);
		$this->load->view('base/include/footer',$data);
	}


	public function add_record(){

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

		// $package_id = $this->session->userdata('package_id');
		$transaction_id = $this->session->userdata('transaction_id');

		
		// $get_order = $this->transaction_model->get_order_summary($user_id,$package_id);
		$addons = $this->transaction_model->get_addons_value($transaction_id);
		$selected_package = $this->transaction_model->get_selected_package($transaction_id);

		// to get the total price of the addons
		$addons_total = 0;
		foreach ($addons as $key => $addon) {
			$addons_total += $addon['price']; 
		}
		// $addons_total
		$total_package = $selected_package['price'];
		$total_amount = $total_package + $addons_total;

		$total_amount = number_format(floatval($total_amount));
		$transaction_date = date('Y-m-d');

		$add = $this->transaction_model->add_record($transaction_id,$total_amount,$transaction_date);
		$confirmed = 1;

		if($add){
			$user = $this->user_model->get_user($user_id); // check first if the user is already confirmed. 
			if($user['status'] == 0){
				$is_update = $this->transaction_model->update_status($user_id,$confirmed);
			}
			
			$alert = array('success' => 1); 
	        echo json_encode($alert);
		}
	}
}