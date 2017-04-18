<?php
	class Headline_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_headline_data()
		{
			$query = $this->db->get('mod_jumbotron');
			return $query->row_array();
		}
		
		public function update_headline_data($data)
		{
			$this->db->where('id', 1);
			$this->db->update('mod_jumbotron', $data);
		}
	}