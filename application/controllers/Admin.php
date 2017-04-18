<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	public function __construct()
	{
	}
    
    public function isPublic($bool)
    {
        parent::__construct($bool);
    }
	
	public function index()
	{
        $this->isPublic(FALSE); // Private page, authentication required.
        
		redirect('products/manage');
	}
	
    public function editHeadline()
	{
        $this->isPublic(FALSE); // Private page, authentication required.
                
        $this->load->model('headline_model');
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
		
        $this->load->view('templates/adminmenu', $this->pageTitle('Admin: Edycja nagłówka'));
		$this->load->view('headline/edit', $data);
		$this->load->view('templates/footer');
	}
    
    public function settings()
	{	
        $this->isPublic(FALSE); // Private page, authentication required.
     
        $this->load->model('settings_model');
        
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

?>