<?php

   if ($this->input->get('msg') == 'signupsuccess')
   {
       $this->load->helper('frontend');
       showDismissibleMsg(lang('signup_success_msg'));
       
   }

?>
<div class="text-center">
<h1><?php echo lang('login_headline')?></h1>
<br>
<?php
	echo form_open('authentication/login_validation', array('class' => 'loginForm'));
	echo validation_errors();
		
	echo "<div class='form-group'>";
	echo form_input(array(
		'name' => 'email',
		'class' => 'form-control',
		'width' => '100px',
		'placeholder' => lang('login_email_bg')
		));
	echo "</div>";
	
	echo "<div class='form-group'>";
	echo form_password(array(
		'name' => 'password',
		'class' => 'form-control',
		'placeholder' => lang('login_pass_bg')
		));
	echo "</div>";
	
	echo "<div class='form-group'>";
	echo form_submit(
		array(
		'name' => 'login_submit',
		'value' => lang('login_submit_btn'),
		'class' => 'btn btn-default',
		'width' => '100px'
		));
	echo "</div>";
	
	echo form_close();
?>
</div>