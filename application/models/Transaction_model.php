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

		$transaction_id = $this->db->insert_id();
		foreach ($addons as $key => $addon) {
			$addon = array(
				'idtrans' => $this->db->insert_id(),
				'addons' => $addon  
			);
			$this->db->insert('addons',$addon);
		}
		return $transaction_id;
	}

	public function add_package($user_id,$transaction_id,$package_id){
		$add_package = array(
			'iduser' => $user_id,
			'idtrans' => $transaction_id,
			'idpackage_list' => $package_id, 
		);
		$this->db->insert('package',$add_package);
		return $this->db->insert_id();
	}

	public function get_order_summary($user_id,$package_id){

		$this->db->select('
			user.email,
			registration.first_name,
			registration.last_name,
			addons.addons,
			transaction.event,
			transaction.date,
			package.idpackage_list,
		');

		$this->db->from('user');
		$this->db->join('registration','user.id = registration.iduser','left');
		$this->db->join('transaction','user.id = transaction.iduser','left');
		$this->db->join('addons','transaction.id = addons.idtrans','left');
		$this->db->join('package','package.idtrans = transaction.id','left');
		$this->db->where('user.id',$user_id);
		$this->db->where('package.id',$package_id);
		$query = $this->db->get();
		return $query->result_array();

		return $this->db->last_query();
	}
}