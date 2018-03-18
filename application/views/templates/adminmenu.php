<?php $this->load->view('templates/header'); ?>

<div class="container">
    <nav class='navbar navbar-inverse'>
        <div class="container-fluid">
                <div class="navbar-header">
                    <a class='navbar-brand' href='<?php echo base_url(); ?>'>TheGarage.Sale |</a>
                <a class='navbar-brand' href='<?php echo base_url()."admin"; ?>'>Manage my items</a>
                
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
                            $menuItems = array(
                                    array('products/manage', 'admin_nav_products'),
                                    array('products/add', 'admin_nav_products_new')
                                );
                            
                            foreach($menuItems as $item)
                            {
                                $classHtml = strpos(current_url()."/", base_url().$item[0]) !== FALSE ? ' class="active"' : '';
                                $anchor = anchor($item[0], lang($item[1]));

                                Print "<li".$classHtml.">".$anchor."</li>";
                            }
                            ?>
                        <!-- Search box -->
                        <li>
                            <?php $this->load->view('templates/search_box'); ?>
                        </li>
                    </ul>
                
                <!-- User Account -->
                <?php $this->load->view('templates/user_menu_item'); ?>
                
                </div>
        </div>
    </nav>
    <!-- Empty div - used to add extra spacing etween the nav ar and the rest of ody-->
    <div style='margin-top: 60px'></div>