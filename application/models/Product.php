<?php
	class Product extends CI_Model {
		
		// Product properties
		var $id = '';
		var $title = '';
		var $slug = '';
		var $description = '';
		var $price = '';
		var $images_ref = '';
		var $hidden = '';
		var $thumb_img = '';
		var $tags = '';
        var $badges = '';
			
		public function __construct()
		{			
			// Call model constructor
			parent::__construct();
			
			//Create slug from title
			$this->slug = $this->generateSlug($this->title);
			
			// Populate the product with $thumb_img
			$this->thumb_img = $this->products_model->get_product_main_thumb_img($this->images_ref);
			
			// Populate the product with Tags
			$this->tags = $this->tags_model->get_current_tags($this->id);
            
            // Populate the product with Badges
            $this->badges = $this->badges_model->get_current_badges($this->id);
		}
		
        
        // Helper method, used for debugging
		public function toString()
		{
			echo '$id : '."$this->id<br>";
			echo '$title : '."$this->title<br>";
			echo '$description : '."$this->description<br>";
			echo '$price : '."$this->price<br>";
			echo '$images_ref : '."$this->images_ref<br>";
			echo '$hidden : '."$this->hidden<br>";
			echo '$thumb_img : '.print_r($this->thumb_img)."<br>";
			echo '$tags : '."$this->tags<br>";
		}
		
		public function generateSlug($title)
		{
			$this->load->helper('text');
			return url_title(convert_accented_characters($title), 'dash', true);
		}
		
	}