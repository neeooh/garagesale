<?php
	class Menu_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_admin_menu_items()
		{
			$query = $this->db->get('admin_menu');
			return $query->result_array();
		}
		
		public function get_user_menu_items()
		{
			$query = $this->db->get('user_menu');
			return $query->result_array();		
		}
		
	}