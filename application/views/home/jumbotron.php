<?php
	$this->load->helper('url');
	
	//Jumbotron
	if($headline['enabled'] == 1){
		Print 
		"<header class='jumbotron center-text'>
			<h1>".$headline['header']."</h1>
			<h2>".$headline['content']."</h2>
		</header>
		";
	}  
?>
    <div id='messageToDismiss' class="jumbotron jumbotron-fluid bg-light mt-4">
        <div class="container">
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('messageToDismiss').setAttribute('style', 'display: none');">
                <span aria-hidden="true">&times;</span>
            </button>
            <h1 class="display-4"><?php echo lang('welcome')?>,</h1>
            <p class="lead"><?php echo lang('jumbo_text')?></p>
            <button type="button" class="btn btn-outline-success my-2"><?php echo lang('jumbo_action')?></button>
        </div>
    </div>