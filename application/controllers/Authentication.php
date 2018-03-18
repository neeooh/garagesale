<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MY_Controller {
	
	public function __construct()
	{
	}
    
    public function isPublic($bool)
    {
        parent::__construct($bool);
        $this->load->model('users_model');
    }

	public function login()
	{
        $this->isPublic(TRUE); // Public page, no authentication required.
        
		$this->load->view('templates/usermenu', $this->pageTitle(lang('login_page_title')));
		$this->load->view('authentication/login');
		$this->load->view('templates/footer');
	}
    
    public function signup()
	{
        $this->isPublic(TRUE); // Public page, no authentication required.
        
		$this->load->view('templates/usermenu', $this->pageTitle(lang('signup_page_title')));
		$this->load->view('authentication/signup');
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
            $userEmail = $this->input->post('email');
            $userData = $this->users_model->get_user_sess_data($userEmail);
            echo $userEmail;
            print_r($queryData);
            
			$data = array(
                'id' => $userData->id,
				'email' => $this->input->post('email'),
				'is_logged_in' => 1,
				'name' => $userData->name,
                'language' => $userData->language
			);
			$this->session->set_userdata($data);
			
			redirect('admin');
		}
		else
		{
			redirect('login');
		}
	}
    
    public function signup_validation()
    {
        // Validate form
        $this->isPublic(TRUE); // Public page, no authentication required.
        
		$this->load->library('form_validation');
		
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_signup_email');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		
		if ($this->form_validation->run())
		{
            $this->users_model->sign_up($this->input->post('name'), $this->input->post('email'), $this->input->post('password'));
            
            redirect('login/?msg=signupsuccess');
        }
        else
        {
			redirect('signup');
		}
            
    }
	
	public function validate_credentials()
	{      
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
    
    public function validate_signup_email()
    {
		if($this->users_model->can_sign_up($this->input->post('email')))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_signup_email', 'User already registered.');
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
        
        redirect('login');
        
        //$this->load->view('templates/usermenu', array('pageTitle' => 'No access!'));
		//$this->load->view('authentication/restricted');
	}
}
