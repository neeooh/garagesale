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
		$this->form_validation->set_rules('productQuestionEmail', 'Zapytaj o ten produkt email', 'required|trim');
		
		if ($this->form_validation->run())
		{
			$queryData = array(
				'name' => 'productQuestionEmail',
				'value' => $this->input->post('productQuestionEmail')
			);
			
			$this->settings_model->update_settings($queryData);
		}
		
		$data['productQuestionEmail'] = $this->settings_model->get_settings('productQuestionEmail')['value'];
		
		$this->load->view('templates/adminmenu', $this->pageTitle('Admin: Ustawienia'));
		$this->load->view('settings/index', $data);
	}
	

	
}
