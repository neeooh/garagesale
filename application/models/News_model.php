<?php
	class News_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function add_news($data)
		{
			$this->db->insert('news', $data);
		}
		
		public function get_news($id = null, $hidden = null)
		{
			// when hidden = null; it displays all news
			// when hidden = 0; it displays all public news
			// when hidden = 1; it displays all private news
			if($hidden != null)
			{
				$this->db->where('hidden', $hidden);
			}

			if($id === null)
			{
				// Get all news
				$query = $this->db->get('news');
				return $query->result_array();
			}
			else
			{
				// Get a single news
				$query = $this->db->get_where('news', array('ID' => $id));
				return $query->row_array();
			}	
		}

		public function get_pinned_news($hidden = null)
		{
			$this->db->where('pinned', 1);
			return $this->get_news($id = null, $hidden);
		}
		
		public function update_news($id, $data)
		{
			$this->db->where('ID', $id);
			$this->db->update('news', $data);
		}

		public function delete_news($id)
		{
			$this->db->where('ID', $id);
			$this->db->delete('news');
		}
		
	}