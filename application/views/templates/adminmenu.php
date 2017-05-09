<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
    <nav class='navbar navbar-inverse navbar-fixed-top'>
        <div class="container-fluid">
                <div class="navbar-header">
                <a class='navbar-brand' href='<?php echo base_url()."admin"; ?>'>Ostatnia Okazja | Administracja</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class='nav navbar-nav'>
                    <?php
                        $menuItems = $this->menu_model->get_admin_menu_items();
                        foreach($menuItems as $item)
                        {
                            $classHtml = strpos(current_url()."/", base_url().$item['url']) !== FALSE ? ' class="active"' : '';
                            $anchor = anchor($item['url'], $item['title']);

                            Print "<li".$classHtml.">".$anchor."</li>";
                        }

                        $logoutHtml = "<a href='".base_url()."authentication/logout'> wyloguj się</a>"; 
                    ?>
                    </ul>
                    <p class='navbar-text' style='float: right'>Witaj<?php echo $this->session->userdata('is_logged_in') == 1 ? " ".$this->session->userdata('name')."! ".$logoutHtml : ' gościu!'?></p>
                </div>
        </div>
    </nav>
    <!-- Empty div - used to add extra spacing etween the nav ar and the rest of ody-->
    <div style='margin-top: 60px'></div>