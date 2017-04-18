<?php
    if ($this->form_validation->run())
	{
?>
<div id="messageToDismiss" class="row bg-success">
    <div class="col-xs-11">
        <p>Edycja naglowka zapisana pomyslnie!<p>
    </div>
    <div class="col-xs-1">
        <button type="button" class="close" aria-label="Close" onclick="document.getElementById('messageToDismiss').setAttribute('style', 'display: none');">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<?php } ?>

<h1>Edytuj nagłówek</h1>

<?php 
    echo validation_errors();
    echo form_open_multipart();
?>
<div class='form-group'>
	<label>Tytuł</label>
	<input
		type='text'
		name='header'
		value="<?php echo $headline['header']?>"
		placeholder='Tytuł'
		class='form-control'>
</div>
<div class='form-group'>
	<label>Treść</label>
	<textarea
		type='text'
		name='content'
		placeholder='Treść'
		class='form-control'><?php echo $headline['content']?></textarea>
</div>
<div class='form-group'>
	<label>
		<input
			type='checkbox'
			name='headlineHidden'
			<?php echo (!$headline['enabled'] ? 'checked' : '') ?>> ukryj nagłówek
	</label> 
</div>
<input type='submit' class='btn btn-default' value='Zapisz'>
<?php
    echo form_close();
?>