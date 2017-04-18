<?php
class MY_Controller extends CI_Controller {

    var $activePages;
    
    function __construct($isPublic = FALSE) {
        parent::__construct();
       
        // Authentication biaaatch!
        // All pages are secure by default!
        if ($isPublic == FALSE && !$this->session->userdata('is_logged_in'))
        {
            redirect('authentication/restricted');    
        }
        
        $this->setUserMenuItems();
    }
    
    /// Helper methods used across different controllers
    public function pageTitle($title)
    {
        return array('pageTitle' => $title);
    }
    
    // Calculate menu items for user menu.
    public function setUserMenuItems()
    {
        $this->load->model('page_model');
        $this->activePages = $this->page_model->get_active_pages_data();
    }
}