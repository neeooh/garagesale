<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends MY_Controller {	
	public function __construct()
    {
		
	}
    
    public function isPublic($bool)
    {
        parent::__construct($bool);
    }
    
    public function index()
    {
        $this->isPublic(TRUE); // Public page, no authentication required.
        
        
        $this->load->view('templates/usermenu', $this->pageTitle(lang('help_page_title')));
        $this->load->view('help/index');
        $this->load->view('templates/footer');
    }
}