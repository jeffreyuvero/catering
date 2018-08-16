<?php 

class Session_checker {
	public function __construct(){
		// parent::__construct();
	}

	function is_session_exist($user_id){
		if(!$user_id){
			return false;
		}else{
			return true;
		}
	}

}