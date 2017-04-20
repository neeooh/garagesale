<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct(FALSE);
		$this->load->model('settings_model');
	}

	public function index()
	{		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('contactEmail', 'Adress email', 'required|trim');
		
		if ($this->form_validation->run())
		{
			$updatedData = array(
				'contactEmail' => $this->input->post('contactEmail'),
				'contactPhone' => $this->input->post('contactPhone'),
				'contactExtraNotes' => $this->input->post('contactExtraNotes')
			);
			
			$this->settings_model->update_settings($updatedData);
		}
		
		$data = $this->settings_model->get_settings();
		
		$this->load->view('templates/adminmenu', $this->pageTitle('Admin: Ustawienia'));
		$this->load->view('settings/index', $data);
		$this->load->view('templates/footer');
	}
	

	
}
