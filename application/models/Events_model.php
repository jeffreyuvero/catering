<?php 


class Events_model extends CI_model{

	public function get_events_list(){
		$query = $this->db->get('events');
		return $query->result_array();
	}


	public function get_events($events){
		$this->db->where('id',$events);
		$query = $this->db->get('events');
		return $query->row_array();
	}

	public function add_events($name,$description){
		$add = array(
			'name' => $name,
			'description' => $description, 
		);

		$this->db->insert('events',$add);
		return $this->db->affected_rows();
	}

	public function update_events($events_id,$name,$description){
		$update = array(
			'name' =>$name,
			'description' => $description, 
		);
		$this->db->where('id',$events_id);
		$this->db->set($update);
		$this->db->update('events');
		return true;
	}

	public function delete_events($events_id){
		$this->db->where('id',$events_id);
		$this->db->delete('events');
		return true;
	}
}