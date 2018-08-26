<?php 


class Addons_model extends CI_model{


	public function get_addons_list(){
		$query = $this->db->get('addons_list');
		return $query->result_array();
	}


	public function get_addons($addons){
		$this->db->where('id',$addons);
		$query = $this->db->get('addons_list');
		return $query->row_array();
	}

	public function add_addons($name,$price){
		$add = array(
			'addons_list' => $name,
			'price' => $price, 
		);

		$this->db->insert('addons_list',$add);
		return $this->db->affected_rows();
	}

	public function update_addons($addons_id,$name,$price){
		$update = array(
			'addons_list' =>$name ,
			'price' => $price, 
		);
		$this->db->where('id',$addons_id);
		$this->db->set($update);
		$this->db->update('addons_list');
		return true;
	}

	public function delete_addons($addons_id){
		$this->db->where('id',$addons_id);
		$this->db->delete('addons_list');
		return true;
	}
}