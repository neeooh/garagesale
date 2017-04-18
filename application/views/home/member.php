<h1>Memebers!</h1>

<?php
	echo "<pre>";
	print_r($this->session->all_userdata());
	echo "</pre>";	
?>

<a href='<?php echo base_url()."/home/logout"; ?>'>Wyloguj sie</a>