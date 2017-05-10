<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {	
	public function __construct()
    {
		
	}
    
    public function isPublic($bool)
    {
        parent::__construct($bool);
        $this->load->model('news_model');
    }
    
    public function view($id = null)
    {   
        $this->isPublic(TRUE); // Public page, no authentication required.
        
       /* if($data == null || $data['hidden'] == 1 && !$this->session->userdata('is_logged_in'))
        {
            show_404();
        }*/

		if($id === null)
		{
			$data['pinnedNews'] = $this->news_model->get_pinned_news($hidden=0);
			$data['allNews'] = $this->news_model->get_news($id=null,$hidden=0);

			$this->load->view('templates/usermenu', $this->pageTitle("Wiadomości"));
        	$this->load->view('news/newsList', $data);
		}
		else
		{
			$data = $this->news_model->get_news($id, $hidden=0);

			$this->load->view('templates/usermenu', $this->pageTitle($data['title']));
        	$this->load->view('news/index', $data);
		}
        
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
			
			// Generate friendly URL from news title
			$slug = $this->generateSlug($title);
			
			$data = array(
				'slug' => $slug,
				'title' => $title,
				'content' => $this->input->post('content'),
                'hidden' => ($this->input->post('hidden') == 1) ? 1 : 0,
				'pinned' => ($this->input->post('pinned') == 1) ? 1 : 0
			);
			
			$this->news_model->add_news($data);
		}
		
        $this->load->view('templates/adminmenu', $this->pageTitle('Admin: Nowa wiadomość'));
		$this->load->view('news/add');
		$this->load->view('templates/footer');
	}
	
	public function manage()
	{
        $this->isPublic(FALSE);
        
		// Get all news
		$data['allNews'] = $this->news_model->get_news();

        $this->load->view('templates/adminmenu', $this->pageTitle('Admin: Wiadomości'));
		$this->load->view('news/manage', $data);
	}
	
	public function edit($id)
	{
        $this->isPublic(FALSE);
        
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Tytuł', 'required|trim');
		$this->form_validation->set_rules('content', 'Treść', 'required|trim');
			
		if($this->form_validation->run())
		{
			$title = $this->input->post('title');
			
			// Generate friendly URL from news title
			$newSlug = $this->generateSlug($title);
						
			$data = array(
				'slug' => $newSlug, 
				'title' => $title,
				'content' => $this->input->post('content'),
				'hidden' => ($this->input->post('hidden') == 1) ? 1 : 0,
				'pinned' => ($this->input->post('pinned') == 1) ? 1 : 0
			);
			
			$this->news_model->update_news($id, $data);
			
			redirect('news/edit/'.$id.'?changesSaved=true');
		}
		
		// Get current news data
		$data = $this->news_model->get_news($id);
        $this->load->view('templates/adminmenu', $this->pageTitle('Admin: Edytuj wiadomość'));
		$this->load->view('news/edit', $data);
		$this->load->view('templates/footer');
	}

	public function deleteConfirmation($id)
	{
        $this->isPublic(FALSE);

		$data = array(
			'ID' => $id
		);

		$this->load->view('templates/adminmenu', $this->pageTitle('Admin: Usuń wiadomość'));
		$this->load->view('news/deleteConfirmation', $data);
		$this->load->view('templates/footer');
	}
	
	public function delete($id)
	{
        $this->isPublic(FALSE);
		
		// Remove news from DB
		$this->news_model->delete_news($id);

		redirect("/news/manage");
	}
	
	public function generateSlug($title)
	{
		$this->load->helper('text');
		return url_title(convert_accented_characters($title), 'dash', true);
	}
}