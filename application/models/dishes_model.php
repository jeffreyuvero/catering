<?php 

class dishes_model extends CI_model{
	
	public function get_dishes_list(){
		$query = $this->db->get('dishes');
		return $query->result_array();
	}


	public function get_dishes($dish_id){
		$this->db->where('id',$dish_id);
		$query = $this->db->get('dishes');
		return $query->row_array();
	}

	public function add_dish($name,$description,$price){
		$add = array(
			'name' => $name,
			'description' => $description,
			'price' => $price, 
		);

		$this->db->insert('dishes',$add);
		return $this->db->affected_rows();
	}

	public function update_dish($dish_id,$name,$description,$price){
		$update = array(
			'name' =>$name ,
			'description' => $description,
			'price' => $price, 
		);
		$this->db->where('id',$dish_id);
		$this->db->set($update);
		$this->db->update('dishes');
		return true;
	}

	public function delete_dish($dish_id){
		$this->db->where('id',$dish_id);
		$this->db->delete('dishes');
		return true;
	}


}