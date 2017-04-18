<?php
	class Settings_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_settings($name = FALSE)
		{
			if($name === FALSE)
			{
				$query = $this->db->get('settings');
				return $query->result_array();
			}
			
			$query = $this->db->get_where('settings', array('name' => $name));
			return $query->row_array();
		}
		
		public function update_settings($data)
		{
			$query = $this->db->update('settings', $data);
		}

	}