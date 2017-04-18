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

<?php 
    echo validation_errors();
    echo form_open_multipart();
?>
	<div class="form-group row">
		<div class='col-xs-12 col-sm-3'>
			<p>"Zapytaj o ten produkt" email</p>
		</div>
		<div class='col-xs-12 col-sm-9'>
			<input
				type='text'
				name='productQuestionEmail'
				class='form-control'
				placeholder='Email'
				value="<?php echo $productQuestionEmail ?>">
		</div>
	</div>                
	<input type="submit" class="btn btn-default" value="Zapisz">
<?php echo form_close()?>