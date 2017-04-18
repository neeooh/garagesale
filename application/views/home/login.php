<h1>Zaloguj się</h1>
<br>
<?php
	echo form_open('home/login_validation', array('class' => 'loginForm'));
	echo validation_errors();
		
	echo "<div class='form-group'>";
	echo form_input(array(
		'name' => 'email',
		'class' => 'form-control',
		'width' => '100px',
		'placeholder' => 'Email or username'
		));
	echo "</div>";
	
	echo "<div class='form-group'>";
	echo form_password(array(
		'name' => 'password',
		'class' => 'form-control',
		'placeholder' => 'Password'
		));
	echo "</div>";
	
	echo "<div class='form-group'>";
	echo form_submit(
		array(
		'name' => 'login_submit',
		'value' => 'Login',
		'class' => 'btn btn-default',
		'width' => '100px',
		'placeholder' => 'Email or username'
		));
	echo "</div>";
	
	echo form_close();
?>