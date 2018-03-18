<?php
	class Products_model extends CI_Model {
		
		public function __construct()
		{
			$this->load->database();

		}
		
		public function search_products($query = null)
		{
			if($query != null)
			{
				// Load Product object class
				$this->load->model('product');
				
				// Split the whole query into individual keywords
				$matches = explode(" ", $query);
				
				$this->db->like('title', $matches[0], 'both');
				for($i = 1; $i < sizeof($matches); $i++)
				{
					$this->db->or_like('title', $matches[$i], 'both');
				}
			
				$query = $this->db->get('products');
				return $query->result('product');
			}
		}
        
        public function get_products_by_garage_id($garage_id = null)
		{
			if ($garage_id != null)
			{
                // Load Product object class
				$this->load->model('product');
                
                $this->db->where('garage_id', $garage_id);
				$query = $this->db->get('products');
				return $query->result('product');
			}
		}

		public function get_products($id = FALSE)
		{
			if ($id === FALSE)
			{
				// Get all products
				$query = $this->db->get('products');
				return $query->result_array();
			}
			
			// Get specific products
			$query = $this->db->get_where('products', array('id' => $id));
			return $query->row_array();	
		}
		
		// The same method as above but it returns an Product object
		public function get_products_objects($id = FALSE, $sortMode)
		{
			// Get specific product
			if ($id)
			{	
				$query = $this->db->get_where('products', array('id' => $id));
				return $query->row_array();
			}
			
			// Load Product object class
			$this->load->model('product');
			
			// Get all products and apply sorting		
			// To-Do
            // Again, this code is in 3 different place now. Needs to be fixed.
            switch ($sortMode){
				case 'asc':
					$this->db->order_by('title', 'ASC');
					break;
				case 'desc':
					$this->db->order_by('title', 'DESC');
					break;
				case 'newest':
					$this->db->order_by('id', 'DESC');
					break;
				case 'oldest':
					$this->db->order_by('id', 'ASC');
					break;
				default: $this->db->order_by('id', 'DESC');
			}
			
			$query = $this->db->get('products');			
			return $query->result('product');
		}
		
		
		public function get_active_products($productTags = FALSE)
		{
			if($productTags === FALSE)
			{
				$query = $this->db->get_where('products', array('hidden' => 0));
				return $query->result_array();
			}

			// TO-DO
			// Exercise:
			// Try to write below query using Query Builder Class
			$sql = "SELECT * FROM tags, products WHERE tags.product_id = products.id AND tags.tag_name = ?";
			$query = $this->db->query($sql, $productTags);
			return $query->result_array();
		}
		
		public function get_active_products_objects($productTags = FALSE, $sortMode)
		{
			$this->load->model('Product');
            
			if($productTags === FALSE)
			{
				// Apply SQL ORDER_BY
				$sqlSort = '';		
				switch ($sortMode){
					case 'asc':
						$this->db->order_by('title', 'ASC');
						break;
					case 'desc':
						$this->db->order_by('title', 'DESC');
						break;
					case 'newest':
						$this->db->order_by('id', 'DESC');
						break;
					case 'oldest':
						$this->db->order_by('id', 'ASC');
						break;
					default: 
						$this->db->order_by('id', 'DESC'); ;
				}
			
				$this->db->where('hidden', 0);
				$query = $this->db->get('products');
			}
			else
			{
				// Apply sorting
				// To-Do
                // This sucks... This is done twice basically.
				// Try to write below query using Query Builder Class or make sorting work 
				switch ($sortMode){
					case 'asc':
						$sqlSort = " ORDER BY products.title ASC";
						break;
					case 'desc':
						$sqlSort = " ORDER BY products.title DESC";
						break;
					case 'newest':
						$sqlSort = " ORDER BY products.id DESC";
						break;
					case 'oldest':
						$sqlSort = " ORDER BY products.id ASC";
						break;
					default:
						$sqlSort = " ORDER BY products.id DESC";
				}
				
				$sql = "SELECT * FROM tags, products WHERE hidden = 0 AND tags.product_id = products.id AND tags.tag_name = ?".$sqlSort;
				$query = $this->db->query($sql, $productTags);
			}

			return $query->result('product');
		}
		
		public function get_picture($picId)
		{
			$this->db->where('id', $picId);
			$query = $this->db->get('images');
			return $query->row_array();
		}
		
		public function get_product_pictures($ref = FALSE)
		{
			if($ref === FALSE)
			{
				$query = $this->db->get('images');
				return $query->result_array();	
			}
			
			$this->db->where('ref', $ref);
			$this->db->where("CHAR_LENGTH(path) > ", 1);
			$query = $this->db->get('images');
			return $query->result_array();
		}
		
		public function get_product_main_thumb_img($ref = FALSE)
		{
			if ($ref == FALSE)
			{	
				$query = $this->db->get_where('images', array('main' => 1));
				return $query->result_array();
			}
			
			// Get main picture for given $ref
			$this->db->where('ref', $ref);
			$this->db->where('main', 1);
			$query = $this->db->get('images');
			
			return $query->row_array();
		}
		
		public function get_product_img_ref($id)
		{
			$this->db->select('images_ref');
			$query = $this->db->get_where('products', array('id' => $id));
			
			return $query->row_array()['images_ref'];
		}
		
		public function get_imgRef_by_picId($picId)
		{
			$this->db->select('ref');
			$query = $this->db->get_where('images', array('id' => $picId));
			
			return $query->row_array()['ref'];
		}
		
		public function get_picture_path($pictureId)
		{
			$this->db->select('path');
			$query = $this->db->get_where('images', array('id' => $pictureId));
			return $query->row_array()['path'];
		}
		
		public function get_picture_thumb_path($pictureId)
		{
			$this->db->select('thumb_path');
			$query = $this->db->get_where('images', array('id' => $pictureId));
			return $query->row_array()['thumb_path'];
		}
		
		public function set_product($id = FALSE)
		{			
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
                'hidden' => ($this->input->post('hidden') == 1) ? 1 : 0,
                'hidden_notes' => $this->input->post('hidden_notes')
				);
				
			if ($id === FALSE)
			{
				// Insert new row
				$picRef = uniqid();
				$data['images_ref'] = $picRef;
				$this->db->insert('products', $data);
				
				// Return just created product
				$this->db->where('images_ref', $picRef);
				$query = $this->db->get('products');
				return $query->row_array();
			}
			else
			{
				// Update specific row
				$this->db->where('id', $id);
				$this->db->update('products', $data);

				// Return just created product
				$this->db->where('id', $id);
				$query = $this->db->get('products');
				return $query->row_array();
			}

		}
		
		public function set_product_main_picture($picId, $ref)
		{
			// First "clear" current main picture
			if ($picId)
			{
				$ref = $this->products_model->get_imgRef_by_picId($picId);
			}
			$this->db->query("UPDATE images SET main = 0 WHERE ref='".$ref."'");
			
			// Set the main picture
			if($picId)
			{			
				$this->db->where('id', $picId);
				$this->db->update('images', array('main' => 1));
			}
			else
			{
				// Pick first row for ref=$ref
				$this->db->query("UPDATE images SET main = 1 WHERE ref='".$ref."' LIMIT 1");	
			}
			
		}
		
		public function delete_product_images($idArray)
		{
			foreach($idArray as $id)
			{
				$this->db->where('id', $id);
				$this->db->delete('images');
			}
		}

		public function delete_product($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('products');
		}
		
	}