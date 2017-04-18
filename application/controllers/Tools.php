<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends MY_Controller {	
	public function __construct()
	{
		parent::__construct(FALSE); // All pages are Private, authentication required.
        
		$this->load->model('products_model');
	}

	public function index()
	{
        $this->load->view('templates/adminmenu', $this->pageTitle('Admin: Hidden Tools'));
		$this->load->view('tools/index');
	}
	
	public function generate_thumbnails()
	{
		$this->load->library('image_lib');
		
		$picturesArray = $this->products_model->get_product_pictures();
		
		$this->benchmark->mark('start');
		$processedItems = array();
		foreach($picturesArray as $picture)
		{
			array_push($processedItems, $picture['path']);
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = $picture['path'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 350;

			$this->image_lib->initialize($config);
		
			if ( ! $this->image_lib->resize())
			{
				echo $this->image_lib->display_errors();
			}
		}
		$this->benchmark->mark('end');
		
		$data['processedItems'] = $processedItems;
		$data['benchmark_time'] = $this->benchmark->elapsed_time('start', 'end');
		
        $this->load->view('templates/adminmenu');
		$this->load->view('tools/generate_thumbnails', $data);
	}
}