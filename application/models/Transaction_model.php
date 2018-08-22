<?php 

class Transaction_model extends CI_model{
	public function __construct(){
		parent::__construct();
	}

	public function add_transaction($user_id,$event,$addons,$time){

		$add_tran = array(
			'iduser' => $user_id,
			'event' => $event,
			// 'date' => $date,
			'time' => $time, 
		);
		$this->db->insert('transaction',$add_tran);

		$transaction_id = $this->db->insert_id();
		if($addons){
			foreach ($addons as $key => $addon) {
				$addon = array(
					'idtrans' => $transaction_id,
					'idaddons_list' => $addon  
				);
				$this->db->insert('addons',$addon);
			}
		}
		return $transaction_id;
	}

	public function add_package($user_id,$transaction_id,$package_id,$date){

		$this->db->where('id',$transaction_id);
		$this->db->set('date',$date);
		$this->db->update('transaction');

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
			transaction.event,
			transaction.date,
			package.idpackage_list,
		');

		$this->db->from('user');
		$this->db->join('registration','user.id = registration.iduser','left');
		$this->db->join('transaction','user.id = transaction.iduser','left');
		$this->db->join('package','package.idtrans = transaction.id','left');
		$this->db->where('user.id',$user_id);
		$this->db->where('package.id',$package_id);
		$query = $this->db->get();
		return $query->row_array();

		// return $this->db->last_query();
	}

	public function get_addons_value($transaction_id){	
		$this->db->select('addons.id,addons_list.addons_list,addons_list.price');
		$this->db->from('addons');
		$this->db->join('addons_list','addons_list.id = addons.idaddons_list','left');
		$this->db->where('addons.idtrans',$transaction_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_selected_package($transaction_id){
		$this->db->select('package.idpackage_list,package_list.package,package_list.price');
		$this->db->from('package');
		$this->db->join('package_list','package_list.id = package.idpackage_list','left');
		$this->db->where('package.idtrans',$transaction_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function add_record($transaction_id,$total_amount,$transaction_date){
		$records = array(
			'idtrans' => $transaction_id,
			'total_amount' => $total_amount,
			'transaction_date' => $transaction_date,
		); 

		$this->db->insert('records',$records);
		return $this->db->affected_rows();
	}
}