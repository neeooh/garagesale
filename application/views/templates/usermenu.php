<?php 

$this->load->view('templates/header'); 
?>

<div class="container">
   <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between mt-3">
      <a class="navbar-brand" href="<?php echo site_url() ?>">
        <img src="<?php echo site_url() ?>assets/img/logo.svg" height="25px" alt="" class="d-inline-block align-top"/>
        TheGarage.Sale
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Search box -->
        <?php echo form_open('/products/search', array('id' => 'search_form','class' => 'form-inline mx-4-lg')); ?>
            <div class="input-group">
                <input type="text" class="form-control" name="query" placeholder="<?php echo lang('searchbox_msg')?>">
                
<!--
                <div class="input-group-btn">
                    <button type="button" class="btn btn-secondary dropdown-toggle m-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Search globaly
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#">Search my garage</a>
                    </div>
                  </div>
-->
            </div>
        <?php echo form_close(); ?>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-item nav-link" href="<?php echo site_url() ?>products/add"><?php echo lang('post_item') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="<?php echo site_url() ?>garages"><?php echo lang('mygarages') ?></a>
                </li>
            </ul>
        </div>

    </nav>
   
