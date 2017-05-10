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
        
    }
    
    /// Helper methods used across different controllers
    public function pageTitle($title)
    {
        return array('pageTitle' => $title);
    }
    
}