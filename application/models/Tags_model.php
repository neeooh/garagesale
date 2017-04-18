<?php
	class Tags_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_all_tags()
		{
			$sql = "SELECT DISTINCT `tag_name` FROM `tags`";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		public function get_current_tags($productId)
		{
			$this->db->where('product_id', $productId);
			$query = $this->db->get('tags');
			return $query->result_array();
		}
		
		public function set_new_tag($tag, $productId)
		{
			$this->db->set('tag_name', $tag);
			$this->db->set('product_id', $productId);
			$this->db->insert('tags');	
		}
		
		public function assign_main_tag($productId)
		{
			$this->db->set('tag_name', 'main');
			$this->db->set('product_id', $productId);
			$this->db->insert('tags');
		}
		
		public function remove_all_tags($productId)
		{
			$this->db->where('product_id', $productId);
			$this->db->delete('tags');
		}
		
	}
?>