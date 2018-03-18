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

    if ( ! function_exists('showDismissibleMsg'))
    {
        function showDismissibleMsg($msg)
        {
            Print "<div id='messageToDismiss' class='row bg-success'>
    <p>".$msg."</p>
    <button type='button' class='close' aria-label='Close' onclick='document.getElementById('messageToDismiss').setAttribute('style', 'display: none');'>
        <span aria-hidden='true'>&times;</span>
    </button>
</div>";
        }
    }