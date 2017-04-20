<h1>Ustawienia</h1>

<?php
    if ($this->form_validation->run())
	{
?>
<div id="messageToDismiss" class="row bg-success">
    <div class="col-xs-11">
        <p>Zmiany zapisane pomyslnie!</p>
    </div>
    <div class="col-xs-1">
        <button type="button" class="close" aria-label="Close" onclick="document.getElementById('messageToDismiss').setAttribute('style', 'display: none');">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<?php } ?>


<h2>Kontakt</h2>
<?php 
    echo validation_errors();
    echo form_open_multipart();
?>
	<!-- Contact Email -->
	<div class="form-group row">
		<div class='col-xs-12 col-sm-2'>
			<p>Email</p>
		</div>
		<div class='col-xs-12 col-sm-10'>
			<input
				type='text'
				name='contactEmail'
				class='form-control'
				placeholder='Adres email'
				value="<?php echo $contactEmail ?>">
		</div>
	</div>

	<!-- Contact Phone-->
	<div class="form-group row">
		<div class='col-xs-12 col-sm-2'>
			<p>Telefon</p>
		</div>
		<div class='col-xs-12 col-sm-10'>
			<input
				type='text'
				name='contactPhone'
				class='form-control'
				placeholder='Numer telefonu'
				value="<?php echo $contactPhone ?>">
		</div>
	</div>
	
	<!-- Contact Extra Notes -->
	<div class="form-group row">
		<div class='col-xs-12 col-sm-2'>
			<p>Uwagi</p>
		</div>
		<div class='col-xs-12 col-sm-10'>
			<textarea
				name='contactExtraNotes'
				class='form-control'
				placeholder='Dodatkowe uwagi które będą pokazane użytkownikowi...'>
<?php echo $contactExtraNotes ?>
			</textarea>
		</div>
	</div>

	<!-- Save button -->
	<input type="submit" class="btn btn-default" value="Zapisz">
<?php echo form_close()?>