<?php 


class Services_model extends CI_model{


	public function get_service_list(){
		$query = $this->db->get('service');
		return $query->result_array();
	}


	public function get_services($services_id){
		$this->db->where('id',$services_id);
		$query = $this->db->get('service');
		return $query->row_array();
	}

	public function add_service($name,$price){
		$add = array(
			'name' => $name,
			'price' => $price, 
		);

		$this->db->insert('service',$add);
		return $this->db->affected_rows();
	}

	public function update_service($service_id,$name,$price){
		$update = array(
			'name' =>$name ,
			'price' => $price, 
		);
		$this->db->where('id',$service_id);
		$this->db->set($update);
		$this->db->update('service');
		return true;
	}

	public function delete_service($service_id){
		$this->db->where('id',$service_id);
		$this->db->delete('service');
		return true;
	}
}