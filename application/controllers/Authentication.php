<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MY_Controller {
	
	public function __construct()
	{
	}
    
    public function isPublic($bool)
    {
        parent::__construct($bool);
    }

	public function login()
	{
        $this->isPublic(TRUE); // Public page, no authentication required.
        
		$this->load->view('templates/usermenu', $this->pageTitle('Administracja - logowanie'));
		$this->load->view('authentication/login');
		$this->load->view('templates/footer');
	}
	
	public function login_validation()
	{
        $this->isPublic(TRUE); // Public page, no authentication required.
        
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		
		if ($this->form_validation->run())
		{
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => 1,
				'name' => 'Alek',
                'language' => 'polish'
			);
			$this->session->set_userdata($data);
			
			redirect('admin');
		}
		else
		{
			redirect('authentication/login');
		}
	}
	
	public function validate_credentials()
	{        
		$this->load->model('users_model');
		
		if($this->users_model->can_log_in())
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/password.');
			return false;
		}
	}
	public function logout()
	{
        $this->isPublic(TRUE); // Public page, no authentication required.
        
		$this->session->sess_destroy();
		
		redirect('/');
	}
	
	public function members()
	{
        $this->isPublic(FALSE); // Private page, authentication required.
        
		$this->load->view('authentication/member');
	}
	
	public function restricted()
	{
        $this->isPublic(TRUE); // Public page, no authentication required.
        
        $this->load->view('templates/usermenu', array('pageTitle' => 'Brak dostępu!'));
		$this->load->view('authentication/restricted');
	}
}
