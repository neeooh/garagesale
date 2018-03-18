<?php
	class Users_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();
		}
		
		public function can_log_in()
		{
			$this->db->where('email', $this->input->post('email'));
			$this->db->where('password', md5($this->input->post('password')));
			$query = $this->db->get('users');
			
			if ($query->num_rows() == 1)
				return true;
			else
				return false;
		}

        public function sign_up($name = NULL, $email = NULL, $password = NULL)
		{
            if ($name != NULL || $email != NULL || $password != NULL)
            {
                $data = array(
                'name' => $name,
                'email' => $email,
                'password' => $password
                );
                $this->db->insert('users', $data);
            }
			
		}
        
        public function can_sign_up($email = NULL)
		{
            if ($email != NULL)
            {
                $this->db->where('email', $email);
                $query = $this->db->get('users');
                
                if ($query->num_rows() == 0)
				    return true;
                else
                    return false;
            }
        }
        
        public function get_user_sess_data($email = NULL){
            if ($email != NULL)
            {
                $this->db->select('id, name, language');
                $this->db->where('email', $email);
                $query = $this->db->get('users');
                
                return $query->row();
            }
        }
        
	}