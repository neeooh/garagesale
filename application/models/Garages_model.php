<?php
	class Garages_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
        
        public function add($data)
		{
			$this->db->insert('garages', $data);
		}
        
        public function getGarages($ownerId = null)
		{
            if ($ownerId == null)
            {
                $query = $this->db->get('garages');
                return $query;
            }
            else
            {
                $this->db->where('owner_id', $ownerId);
                $query = $this->db->get('garages');
                return $query;
            }
                
			$this->db->insert('garages', $data);
		}
        
        public function getGarageByUrl($garageUrl = null)
		{
            if ($garageUrl != null)
            {
                $this->db->where('url', $garageUrl);
                $query = $this->db->get('garages');
                return $query->row();
            }
        }
    }