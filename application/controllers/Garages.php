<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Garages extends MY_Controller {	
	public function __construct()
	{
	}

    public function isPublic($bool)
    {
        parent::__construct($bool);
        
        $this->load->model('garages_model');
        $this->load->model('products_model');
    }

	public function index($garageUrl = null)
	{
		$this->isPublic(FALSE); // Public page, no authentication required.
        
        if($garageUrl == null) //Manage a list of Garages
        {
            $data['garages'] = $this->garages_model->getGarages($this->session->userdata('id'))->result();
        
            $this->load->view('templates/usermenu', $this->pageTitle(lang('mygarages')));
            $this->load->view('mygarages/manage', $data);
            $this->load->view('templates/footer');
            
        }
        else  //Manage a single Garages
        {
            $data['garage'] = $this->garages_model->getGarageByUrl($garageUrl);
            
            $data['products'] = $this->products_model->get_products_by_garage_id();
            
            $this->load->view('templates/usermenu', $this->pageTitle(lang('mygarages')));
            $this->load->view('mygarages/garage', $data);
            $this->load->view('products/products', $data);
            $this->load->view('templates/footer');
        }
        
        

	}
    
    public function add()
	{
		$this->isPublic(FALSE); // Public page, no authentication required.
        
        $this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Garage name', 'required|trim');
        $this->form_validation->set_rules('locationInput', 'Garage location', 'required');
        
		if ($this->form_validation->run())
		{
            //Add Garage to the DB
            $data = array(
                'owner_id' => $this->session->userdata('id'),
                'name' => $this->input->post('name'),
                'url' => url_title($this->input->post('name')),
                'location' => $this->input->post('locationInput')
            );
            
            $this->garages_model->add($data);
            
            redirect(garages);
        }

        $this->load->view('templates/usermenu', $this->pageTitle(lang('mygarages')));
        $this->load->view('mygarages/add');
        $this->load->view('templates/footer');

	}
}