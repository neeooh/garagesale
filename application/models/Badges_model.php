<?php
	class Badges_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
    
		/*
		public function get_all_badges()
		{
			$query = $this->db->get('badges');
			return $query->result_array();
		}*/
		
		public function get_current_badges($productId)
		{
			$this->db->where('product_id', $productId);
			$query = $this->db->get('badges');
			return $query->row_array();
		}
		
		public function set_new_badge($badges, $productId)
		{
			$this->db->set('product_id', $productId);
			$this->db->set('new', $badges['new']);
			$this->db->set('sold', $badges['sold']);
			$this->db->set('auction', $badges['auction']);
			$this->db->insert('badges');	
		}
		
        /*
		public function assign_main_badge($productId)
		{
			$this->db->set('badge_name', 'nowy');
			$this->db->set('product_id', $productId);
			$this->db->insert('badges');
		}
        */
		
		public function remove_all_badges($productId)
		{
			$this->db->where('product_id', $productId);
			$this->db->delete('badges');
		}
		
	}
?>