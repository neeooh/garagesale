<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Headline extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('headline_model');
	}

	public function edit()
	{		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('header', 'Tytuł', 'required|trim');
		
		if ($this->form_validation->run())
		{					
			$data = array(
				'header' => $this->input->post('header'),
				'content' => $this->input->post('content')
			);
			
			//check if headlineHidden checkbox is checked
			if(null !== $this->input->post('headlineHidden')){
				$data['enabled'] = 0;
			}
			else{
				$data['enabled'] = 1;
			}
			
			$this->headline_model->update_headline_data($data);
		}
		
		$data['headline'] = $this->headline_model->get_headline_data();
		
		$this->load->view('templates/adminmenu', $this->pageTitle('Admin: Edytuj nagłówek'));
		$this->load->view('headline/edit', $data);
		$this->load->view('templates/footer');
	}	
}