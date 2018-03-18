<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct()
	{
	}

	public function isPublic($bool)
    {
        parent::__construct($bool);
		
		$this->load->model('products_model');
		$this->load->model('settings_model');
	}

	public function index()
	{
		/* ToDo Call out function from products->index() ? */
	}

	public function contact()
	{
		$this->isPublic(TRUE);

		$data = $this->settings_model->get_settings();
		
		$this->load->view('templates/usermenu', $this->pageTitle('Contact us'));
		$this->load->view('home/contact', $data);
		$this->load->view('templates/footer');
	}
    
    public function about()
	{
		$this->isPublic(TRUE);
		
		$this->load->view('templates/usermenu', lang('nav_item_03'));
		$this->load->view('home/about');
		$this->load->view('templates/footer');
	}
	
	public function login()
	{
		//$this->load->view('templates/header');
		$this->load->view('templates/usermenu');
		$this->load->view('home/login');
		$this->load->view('templates/footer');
	}
	
	public function login_validation()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		
		if ($this->form_validation->run())
		{
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => 1,
				'name' => 'Administrator'
			);
			$this->session->set_userdata($data);
			
			redirect('admin/manageProducts');
		}
		else
		{
			$this->login();
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
		$this->session->sess_destroy();
		
		redirect('/');
	}
	
	public function members()
	{
		if (!$this->session->userdata('is_logged_in')){
			redirect('home/restricted');
		}
		
		$this->load->view('home/member');
	}
	
	public function restricted()
	{
		$this->load->view('home/restricted');
	}
}
