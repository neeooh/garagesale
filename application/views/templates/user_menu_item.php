<!-- User Account -->
<ul class='nav navbar-nav navbar-right'>
   <li>
        <a class='highlighted' href='<?php echo site_url().'products/add' ?>'><?php echo lang('nav_item_02')?></a>
    </li>
    
    <?php
    //echo lang('user_greeting')." ".$this->session->userdata('name');
        if ($this->session->userdata('is_logged_in') == 1)
        {
            Print "
            <li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
              My Garage
                <span class='caret'></span></a>
               <ul class='dropdown-menu'>
                   <li>
                        <a href='admin'>Manage my items</a>
                    </li>
                    <li>
                        <a href='settings'>".lang('admin_nav_settings')."</a>
                    </li>
                    <li>
                        ".anchor('authentication/logout', lang('user_logout'))."
                    </li>
               </ul>
           </li>
           ";
        }
        else
        {
            Print "
            <li>
                <a href='".site_url()."login'> ".lang('nav_item_login')."</a>
            </li>
            <li>
                <a href='".site_url()."signup'>".lang('nav_item_register')."</a>
            </li>
            ";
       }
    ?>
    </ul>