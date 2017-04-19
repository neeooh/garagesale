<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {	
	public function __construct()
	{
	}

    public function isPublic($bool)
    {
        parent::__construct($bool);
        
        $this->load->model('products_model');
		$this->load->model('settings_model');
		$this->load->model('headline_model');
		$this->load->model('tags_model');
        $this->load->model('badges_model');
        
        $this->load->library('image_lib');
    }

	public function search()
	{
		$this->isPublic(TRUE); // Public page, no authentication required.

		$query = $this->input->post("query");
		$data['productObjects'] = $this->products_model->search_products($query);

		// Get sortMode from GET
        $sortMode = $this->input->get('sortMode');
		if ($sortMode != 'asc' && $sortMode != 'desc' && $sortMode != 'newest' && $sortMode != 'oldest')
		{
            $sortMode = 'newest';   
        }
        $data['activeSortMode'] = $sortMode;
        $data['query'] = $query;

        $this->load->view('templates/usermenu', $this->pageTitle('Wyniki wyszukiwania'));
        $this->load->view('products/search', $data);
        $this->load->view('templates/footer');

	}
    
	public function index()
	{
        $this->isPublic(TRUE); // Public page, no authentication required.
        
        // Get sortMode from GET
        $sortMode = $this->input->get('sortMode');
        
		if ($sortMode != 'asc' && $sortMode != 'desc' && $sortMode != 'newest' && $sortMode != 'oldest')
		{
            $sortMode = 'newest';   
        }
        
        $data['headline'] = $this->headline_model->get_headline_data();

        // Get Product objects
        // TO-DO
        // Getting products with multiple tags doesn't work ... yet.
        $productTags = array(
            'tag_name'		=> "main"
            );
        $products = $this->products_model->get_active_products_objects($productTags, $sortMode);
        $data['productObjects'] = $products;
        $data['activeSortMode'] = $sortMode;
        
        $this->load->view('templates/usermenu', $this->pageTitle('Wiosenna Wyprzedaż!'));
        $this->load->view('products/products', $data);
        $this->load->view('templates/footer');
	}
	
	// Temporary page
	// Tata chcial strone do jarmarku
	public function jarmark()
	{
        $this->isPublic(TRUE); // Public page, no authentication required.
        
		// Get sortMode from GET
        $sortMode = $this->input->get('sortMode');
        
		if ($sortMode != 'asc' && $sortMode != 'desc' && $sortMode != 'newest' && $sortMode != 'oldest')
		{
            $sortMode = 'newest';   
        }
        
        // Get Product objects
        // TO-DO
        // Getting products with multiple tags doesn't work ... yet.
        $productTags = array(
            'tag_name'		=> "jarmark"
            );
        $data['productObjects'] = $this->products_model->get_active_products_objects($productTags, $sortMode);
        $data['activeSortMode'] = $sortMode;
        
        $this->load->view('templates/usermenu', $this->pageTitle('Wiosenna Wyprzedaż!'));
        $this->load->view('products/jarmark', $data);
        $this->load->view('templates/footer');
	}
	
	public function product($id)
	{
        $this->isPublic(TRUE); // Public page, no authentication required.
        
		$data['product'] = $this->products_model->get_products($id);
        
        if($data['product'] == null || ($data['product']['hidden'] == 1 && !$this->session->userdata('is_logged_in')))
        {
            show_404();   
        }
        
		$imgRef = $data['product']['images_ref'];
		$data['images'] = $this->products_model->get_product_pictures($imgRef);
		$data['productQuestionEmail'] = $this->settings_model->get_settings("productQuestionEmail");
        
        // Load badges
        $data['currentBadges'] = $this->badges_model->get_current_badges($id);
        
		
        $this->load->view('templates/usermenu', $this->pageTitle($data['product']['title']));
		$this->load->view('products/product', $data);
		$this->load->view('templates/footer');
	}
    
    public function manage()
	{	
        $this->isPublic(FALSE); // Private page, authentication required.
        
		// Get sortMode from GET
        $sortMode = $this->input->get('sortMode');
        
		if ($sortMode != 'asc' && $sortMode != 'desc' && $sortMode != 'newest' && $sortMode != 'oldest')
		{
            $sortMode = 'newest';   
        }
        
        $data['productObjects'] = $this->products_model->get_products_objects('', $sortMode);
        $data['activeSortMode'] = $sortMode;

        $this->load->view('templates/adminmenu', $this->pageTitle('Admin: Zarządzaj produktami'));
        $this->load->view('admin/manageProducts', $data);
        $this->load->view('templates/footer');
	}
	
	public function add()
	{
        $this->isPublic(FALSE); // Private page, authentication required.
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Tytuł', 'required|trim');
		$product;
		if ($this->form_validation->run())
		{
			// Update 'title', 'description' and 'price' fields in DB
			$product = $this->products_model->set_product();
			$this->product = $product;
				
			// Upload new pictures to server and DB
			$this->addProductPictures($product['id']);
			
			// Set main image
			$this->setProductMainPicture('', $product['images_ref']);
			
			// Set selected tags
			$this->setSelectedTags($this->input->post('selectedTags'), $product['id']);
			
			// Set new Tags
			// TO-DO: support multiple tags, fix bug where tags can be duplicated - when checked-selected tag and new tag is the same
			$newTags = $this->input->post('newTags');
			if(strlen($newTags) > 0)
			{
				$this->tags_model->set_new_tag($newTags, $product['id']);
			}
            
            // Set selected badges			
			$this->setBadges($product['id']);
		}
	
		// Load tags
		$data['allTags'] = $this->tags_model->get_all_tags();
		$data['currentTags'] = array('tag_name' => 'main');
		
        $this->load->view('templates/adminmenu', $this->pageTitle('Admin: Dodaj nowy produkt'));
		$this->load->view('products/add', $data);
		$this->load->view('templates/footer');		
	}
	
	public function edit($id)
	{
		$this->isPublic(FALSE); // Private page, authentication required.
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Tytuł', 'required|trim');
		
		if ($this->form_validation->run())
		{
			// Update 'title', 'description', 'price', hidden fields in DB
			$product = $this->products_model->set_product($id);
				
			// Upload new pictures to server and DB
			$this->addProductPictures($id);
			
			// Delete selected images by supplying image paths
			$this->deleteProductPictures($this->input->post('deleteimg'));
			// To-Do
			// Can image paths be security issue? $POST manipulation and the attacker deletes some pictures
			
			// Set main image
			$this->setProductMainPicture($this->input->post('mainimg'), $product['images_ref']);
			
			// Set selected tags
			$this->setSelectedTags($this->input->post('selectedTags'), $id);
			
			// Set new Tags
			// TO-DO: support multiple tags, fix bug where tags can be duplicated - when checked-selected tag and new tag is the same
			$newTags = $this->input->post('newTags');
			if(strlen($newTags) > 0)
			{
				$this->tags_model->set_new_tag($newTags, $id);
			}
            
            // Set selected badges
			$this->deleteBadges($id);
			$this->setBadges($id);
		}
		
		$data['product'] = $this->products_model->get_products($id);
		$imgRef = $data['product']['images_ref'];
		$data['images'] = $this->products_model->get_product_pictures($imgRef);
		$data['main_image'] = $this->products_model->get_product_main_thumb_img($imgRef);
		
		// Load tags
		$data['allTags'] = $this->tags_model->get_all_tags();
		$data['currentTags'] = $this->tags_model->get_current_tags($id);
		
        // Load badges
        $data['currentBadges'] = $this->badges_model->get_current_badges($id);
        
        $data['hidden'] = $data['product']['hidden'];
        
		$this->load->view('templates/adminmenu', $this->pageTitle('Admin: Edycja produktu'));
		$this->load->view('products/edit', $data);
		$this->load->view('templates/footer');
	}

    
	// addPicturesToProduct()
	// This function does two things.
	// First it uploads pictures to the server. Second it populates `images` table.
	public function addProductPictures($productId)
	{
		// Upload pictures to the 'ref' folder on the server
		$imagesRef = $this->products_model->get_product_img_ref($productId);
		$serverImageDir = "assets/images/".$imagesRef."/";
		if(!file_exists($serverImageDir))
		{
			mkdir($serverImageDir);
		}
		
		$config['upload_path'] = $serverImageDir;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '30000';
		$config['remove_spaces'] = FALSE; // This setting is not reccommended but otherwise the upload fails...
		$this->load->library('upload', $config);
		
		$allFiles = $_FILES['userfile']; // RETURNS 5 array items ['name'], ['type'], [tmp_name], ['error'], ['size']
										 // Each points to multidimentsional array with actual values
		
		// Process every picture that was sent
		$newPicCount = count($allFiles['name']);
		for($i = 0; $i < $newPicCount; $i ++)
		{
			if($allFiles['error'][$i] === 0)
			{
				$_FILES['userfile']['name'] = $allFiles['name'][$i];
				$_FILES['userfile']['type'] = $allFiles['type'][$i];
				$_FILES['userfile']['tmp_name'] = $allFiles['tmp_name'][$i];
				$_FILES['userfile']['error'] = $allFiles['error'][$i];
				$_FILES['userfile']['size'] = $allFiles['size'][$i];
				
				if (!$this->upload->do_upload())
				{
					$errors = $this->upload->display_errors();

					// Ignore displaying error details when error about no selected files to upload
					if (strpos($errors, "You did not select a file to upload.") == false)
					{
						echo "errors: '".$errors."'";
					}
				}
				else
				{
					// Generate thumb image from uploaded picture					
					$thumbName = $this->do_resize($serverImageDir.$allFiles['name'][$i], $serverImageDir);
					
					// Insert into DB
					$data = array(
							'ref' => $imagesRef,
							'path' => $serverImageDir.$this->upload->data()['file_name'],
							'thumb_path' => $thumbName,
							'main' => 0,
						);
					$this->db->insert('images', $data);
				}
			}
		}
	}
	
	public function do_resize($filename, $serverImgDir)
	{
		$config_manip = array(
			'image_library' => 'gd2',
			'source_image' => $filename,
			'new_image' => $serverImgDir,
			'maintain_ratio' => TRUE,
			'create_thumb' => TRUE,
			'thumb_marker' => '_thumb',
			'height' => 300
		);
		$this->load->library('image_lib');
		 $this->image_lib->initialize($config_manip);

		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		// clear //
		$this->image_lib->clear();

		return preg_replace('/(\.gif|\.jpg|\.jpeg|\.png|\.GIF|\.JPG|\.JPEG|\.PNG)/', '_thumb$1', $filename);
	}

	public function deleteConfirmation($id)
	{
		$this->isPublic(FALSE); // Private page, authentication required.

		$data['product'] = $this->products_model->get_products($id);

		$this->load->view('templates/adminmenu', $this->pageTitle('Admin: Usuń produkt'));
		$this->load->view('products/deleteConfirmation', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		$this->isPublic(FALSE); // Private page, authentication required.

		$this->products_model->delete_product($id);

		redirect('/products/manage');
	}

	// deleteProductPictures($picIdArray)
	// This function does three things.
	// 1. Deletes pictures from the file system. 2. Deletes them from the DB
	// 3. Checks whether one of the deleted items were a main picture and if so, it resets main pic again.
	private function deleteProductPictures($picIdArray)
	{	
		$picArrayCount = count($picIdArray);
		if ($picArrayCount > 0)
		{		
			// Delete pictures from the file system 
			// Well, just move it to deleted folder
			// To-Do
			// Bug: deleted pictures are renamed instead of going to deleted folder 
			foreach($picIdArray as $pictureId)
			{
				$path = $this->products_model->get_picture_path($pictureId);
				$thumb_path = $this->products_model->get_picture_thumb_path($pictureId);

				unlink($path);
				unlink($thumb_path);
			}	
			
			// Get current main picture id
			$imgRef = $this->products_model->get_picture($picIdArray[0])['ref'];
			$mainPicId = $this->products_model->get_product_main_thumb_img($imgRef)['id'];
			
			// Delete pictures from DB
			$this->products_model->delete_product_images($picIdArray);
			
			// Check if any deleted pictures were main
			foreach($picIdArray as $pictureId)
			{
				if($pictureId == $mainPicId)
				{
					// Set new main pic
					$this->setProductMainPicture('', $imgRef);
				}
			}
		}
	}
	
	// Set Product Main Picture
	private function setProductMainPicture($picId, $imgRef)
	{
		$this->products_model->set_product_main_picture($picId, $imgRef);
	}
	
	private function setSelectedTags($selectedTags, $productId)
	{
		$this->tags_model->remove_all_tags($productId);
		
		if($selectedTags === NULL)
		{
			$this->tags_model->assign_main_tag($productId);
			return;
		}
		
		foreach($selectedTags as $tag)
		{
			$this->tags_model->set_new_tag($tag, $productId);	
		}
	}
    
    private function setBadges($productId)
	{
		$selectedBadges = array(
				'new' => 0,
				'sold' => 0,
				'auction' => 0
			);

		$postBadges = $this->input->post('selectedBadges');

		if($postBadges != null)
		{
			foreach($this->input->post('selectedBadges') as $badge)
			{
				if($badge == 'new')
					{ $selectedBadges['new'] = 1; }
				elseif($badge == 'sold')
					{ $selectedBadges['sold'] = 1; }
				elseif($badge == 'auction')
					{ $selectedBadges['auction'] = 1; }
			}
			$this->badges_model->set_new_badge($selectedBadges, $productId);
		}	
	}

	private function deleteBadges($productId)
	{
			$this->badges_model->remove_all_badges($productId);
	}
}