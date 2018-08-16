<?php 

class Transaction_model extends CI_model{
	public function __construct(){
		parent::__construct();
	}

	public function add_transaction($user_id,$event,$addons,$date,$time){

		$add_tran = array(
			'iduser' => $user_id,
			'event' => $event,
			'date' => $date,
			'time' => $time, 
		);
		$this->db->insert('transaction',$add_tran);

		foreach ($addons as $key => $addon) {
			$addon = array(
				'idtrans' => $this->db->insert_id(),
				'addons' => $addon  
			);
			$this->db->insert('addons',$addon);
		}
		return true;
	}
}