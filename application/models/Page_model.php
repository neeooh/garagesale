<?php
	class Page_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function add_new_page($data)
		{
			$this->db->insert('pages', $data);
		}
		
		public function get_page_data($slug = null)
		{
			if($slug === null)
			{
				// Get all pages
				$query = $this->db->get('pages');
				return $query->result_array();
			}
			else
			{
				// Get one page
				$query = $this->db->get_where('pages', array('slug' => $slug));
				return $query->row_array();
			}	
		}
        
        public function get_active_pages_data()
		{
            $query = $this->db->get_where('pages', array('hidden' => 0));
            return $query->result_array();
		}
		
		public function get_pages_links()
		{
			$this->db->select('url, title');
			$query = $this->db->get('pages');
			
			return $query->result_array();
		}
		
		public function update_page($slug, $data)
		{
			$this->db->where('slug', $slug);
			$this->db->update('pages', $data);
		}

		public function delete_page($slug)
		{
			$this->db->where('slug', $slug);
			$this->db->delete('pages');
		}
		
	}