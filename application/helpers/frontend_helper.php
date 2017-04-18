<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    // Calculate menu items for user menu.
    if ( ! function_exists('setUserMenuItems'))
    {
        function setUserMenuItems()
        {
            $this->load->model('page_model');
            $pages = $this->page_model->get_active_pages_data();

            return $pages;
        }
    }