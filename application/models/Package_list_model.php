<?php 


class Package_list_model extends CI_model{


	public function get_package_list(){
		$query = $this->db->get('package_list');
		return $query->result_array();
	}


	public function get_package($package_id){
		$this->db->where('id',$package_id);
		$query = $this->db->get('package_list');
		return $query->row_array();
	}

	public function add_package_list($name,$description,$price){
		$add = array(
			'package' => $name,
			'description' => $description,
			'price' => $price, 
		);

		$this->db->insert('package_list',$add);
		return $this->db->affected_rows();
	}

	public function update_package_list($package_id,$name,$description,$price){
		$update = array(
			'package' =>$name ,
			'description' => $description,
			'price' => $price, 
		);
		$this->db->where('id',$package_id);
		$this->db->set($update);
		$this->db->update('package_list');
		return true;
	}

	public function delete_package_list($package_id){
		$this->db->where('id',$package_id);
		$this->db->delete('package_list');
		return true;
	}

	public function get_package_inclusion($package_id,$type = false){
		if($type){
			$this->db->where('item_type',$type);
		}
		$this->db->where('idpackage_list',$package_id);
		$query = $this->db->get('packagelist_item');
		return $query->result_array();	
	}

	public function delete_package_item($package_id){
		$this->db->where('idpackage_list',$package_id);
		$this->db->delete('packagelist_item');
	}
	public function insert_package_item($package_id,$item,$type){
		$items = array(
			'idpackage_list' => $package_id, 
			'iditem' => $item, 
			'item_type' => $type, 
		);

		$this->db->insert('packagelist_item',$items);
		return true;
	}

	public function get_list_dishes($package_id,$type){
		
		$this->db->select('*');
		$this->db->from('packagelist_item');
		$this->db->join('dishes','packagelist_item.iditem = dishes.id','left');
		$this->db->join('package_list','package_list.id = packagelist_item.idpackage_list','left');
		$this->db->where('packagelist_item.idpackage_list',$package_id);
		$this->db->where('packagelist_item.item_type',$type);
		$query = $this->db->get();
		return $query->result_array();	
	}
}