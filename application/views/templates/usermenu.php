<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
    <nav class='navbar navbar-default'>
        <div class="container-fluid">
            <div class="navbar-header">
            <a class='navbar-brand' href='<?php echo site_url()?>'>Ostatnia Okazja</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class='nav navbar-nav'>
                    <li><a href='<?php echo site_url()?>'>Wszystkie produkty</a></li>
                    <?php
                            $pages = $this->activePages;
                            foreach($pages as $page)
                            {
                                Print "<li><a href='".site_url()."page/".$page['slug']."'>".$page['title']."</a></li>";
                            }
                    ?>
                </ul>
            </div>
            
        </div>
    </nav>