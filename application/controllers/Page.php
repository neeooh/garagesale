<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {	
	public function __construct()
    {
		
	}
    
    public function isPublic($bool)
    {
        parent::__construct($bool);
        $this->load->model('page_model');
    }
    
    public function view($slug = null)
    {   
        $this->isPublic(TRUE); // Public page, no authentication required.
        
        if($slug == null)
        {
            show_404();
        }
        
		$data = $this->page_model->get_page_data($slug);
        
        if($data == null || $data['hidden'] == 1 && !$this->session->userdata('is_logged_in'))
        {
            show_404();
        }

        $this->load->view('templates/usermenu', $this->pageTitle($data['title']));
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer');
    }
	
	public function add()
	{	
        $this->isPublic(FALSE);
        
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Tytuł', 'required|trim');
		$this->form_validation->set_rules('content', 'Treść', 'required|trim');
		
		if ($this->form_validation->run())
		{
			$title = $this->input->post('title');
			
			// Generate friendly URL from page title
			$slug = $this->generateSlug($title);
			
			$data = array(
				'slug' => $slug,
				'title' => $title,
				'content' => $this->input->post('content'),
                'hidden' => ($this->input->post('hidden') == 1) ? 1 : 0
			);
			
			$this->page_model->add_new_page($data);
		}
		
        $this->load->view('templates/adminmenu', $this->pageTitle('Admin: Dodaj nową stronę'));
		$this->load->view('pages/add');
		$this->load->view('templates/footer');
	}
	
	public function manage()
	{
        $this->isPublic(FALSE);
        
		// Get all pages
		$data['pages'] = $this->page_model->get_page_data();

        $this->load->view('templates/adminmenu', $this->pageTitle('Admin: Zarządzaj stronami'));
		$this->load->view('pages/manage', $data);
	}
	
	public function edit($slug)
	{
        $this->isPublic(FALSE);
        
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Tytuł', 'required|trim');
		$this->form_validation->set_rules('content', 'Treść', 'required|trim');
			
		if($this->form_validation->run())
		{
			$title = $this->input->post('title');
			
			// Generate friendly URL from page title
			$newSlug = $this->generateSlug($title);
						
			$data = array(
				'slug' => $newSlug, 
				'title' => $title,
				'content' => $this->input->post('content'),
                'hidden' => $this->input->post('hidden')
			);
			
			$this->page_model->update_page($slug, $data);
			
			redirect('page/edit/'.$newSlug.'?changesSaved=true');
		}
		
		// Get current page data
		$data = $this->page_model->get_page_data($slug);
        $this->load->view('templates/adminmenu', $this->pageTitle('Admin: Edytuj stronę'));
		$this->load->view('pages/edit', $data);
		$this->load->view('templates/footer');
	}

	public function deleteConfirmation($slug)
	{
        $this->isPublic(FALSE);

		$data = array(
			'slug' => $slug
		);

		$this->load->view('templates/adminmenu', $this->pageTitle('Admin: Usuń stronę'));
		$this->load->view('pages/deleteConfirmation', $data);
		$this->load->view('templates/footer');
	}
	
	public function delete($slug)
	{
        $this->isPublic(FALSE);
		
		// Remove page from DB
		$this->page_model->delete_page($slug);

		redirect("/page/manage");
	}
	
	public function generateSlug($title)
	{
		$this->load->helper('text');
		return url_title(convert_accented_characters($title), 'dash', true);
	}
}