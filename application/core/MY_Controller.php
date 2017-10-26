<?php
class MY_Controller extends CI_Controller {

    var $activePages, $selected_language;
    
    function __construct($isPublic = FALSE) {
        parent::__construct();
       
        $selected_language = $this->input->post('language');
        
        if($selected_language == 'polish')
            $this->lang->load('main', 'polish');
        else
            $this->lang->load('main');
        
        $data['selected_language'] = $selected_language;
        $this->load->vars($data);
        
        
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