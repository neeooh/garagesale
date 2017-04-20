<?php
	class Settings_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_settings()
		{
			$query = $this->db->get('settings');
			return $query->row_array();
		}
		
		public function update_settings($data)
		{
			$query = $this->db->update('settings', $data);
		}

	}