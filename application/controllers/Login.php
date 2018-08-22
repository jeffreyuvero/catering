<?php 

class Login extends CI_controller{
	public function __construct(){
		parent:: __construct();

		//model 
		$this->load->model('login_model');
		$this->load->model('user_model');
		
		$this->load->library('session_checker');
	}

	// dump function
	public function index(){
		$user_id = $this->session->userdata('user_id');

		// check if the session is expire
		if(!$this->session_checker->is_session_exist($user_id)){ 
			$data = array(
				'base_url' => base_url(),
				'site_url' => site_url(),
				'title' => 'Catering || Login'
			);
			$this->load->view('login/login',$data);
		}else{

			redirect('/base','refresh');
		}
		
	}

	// dump function
	public function registration(){

		
		$user_id = $this->session->userdata('user_id');		
		// check if the session is expire
		if(!$this->session_checker->is_session_exist($user_id)){
			$data = array(
				'base_url' => base_url(),
				'site_url' => site_url(),
				'title' => 'Catering || Registration'
			);
			$this->load->view('login/register',$data);

		}else{
			// redirect('base');
			redirect('base', 'refresh');
		}
		
	}

	// smart function
	// this function will execute after the user clicked the submit button to register
	public function submit($page = 'registration'){
		$fname = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$inputEmail = $this->input->post('inputEmail');
		$inputPassword = $this->input->post('inputPassword');	
		$confirmPassword = $this->input->post('confirmPassword');
		$status = 0; // new registed
		if(!$this->input->post('selectGroup')){
			$group_type = 4; // client	
		}else{
			$group_type = $this->input->post('selectGroup');
		}

		$insert = $this->login_model->insert_registration($inputEmail,$inputPassword,$confirmPassword,$status,$fname,$lastName,$group_type);

		// temp messaging
		if($insert){
			if($page == 'registration'){
				redirect('login');	
			}else{
				redirect('staff_registration');
			}
		}else{
			echo 'Error in registration' ; 
		}
	}

	//smart function
	public function login(){
		$inputEmail = $this->input->post('inputEmail');
		$inputPassword = $this->input->post('inputPassword');	

		$login_in_result = $this->login_model->login($inputEmail,$inputPassword);
		if($login_in_result){
			$user_group_ids = $this->login_model->get_user_grp($inputEmail); // this is the model for getting group id
			$this->session->set_userdata('group_type',$user_group_ids['group_id']); // group type passed to session
			$this->session->set_userdata('user_id',$user_group_ids['user_id']); // user_id passed to session

			$user_details = $this->user_model->get_user($user_group_ids['user_id']);

			if($user_details['status'] == 0){
				$reg_date = new DateTime ($user_details['date_register']);
				$now = new DateTime();
				$deadline_remaining = date_diff($reg_date,$now);
				if($deadline_remaining->format('%d') > 3 ){
					$this->session->unset_userdata('group_type'); 
					$this->session->unset_userdata('user_id');
					echo 'Your account is expired' ;
				}
			}else{
				redirect($site_url . '/base');
			}
			
		}else{
			echo 'Your Email address and Password is incorrect' ;
		}
	}
}