<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
	}

	public function index()
	{
		$data['products'] = $this->products_model->get_active_products();
		
		$this->load->view('templates/header');
		$this->load->view('templates/usermenu');
		$this->load->view('home/products', $data);
		$this->load->view('templates/footer');
	}
	
	public function login()
	{
		$this->load->view('templates/header');
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
				'name' => 'Alek'
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
