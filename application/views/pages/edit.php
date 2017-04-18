<?php
    if ($this->form_validation->run() || $this->input->get('changesSaved'))
	{
?>
<div id="messageToDismiss" class="row bg-success">
    <p>Zmiany zostały zapisane.</p>
    <button type="button" class="close" aria-label="Close" onclick="document.getElementById('messageToDismiss').setAttribute('style', 'display: none');">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<h1>Edytuj stronę</h1>

<?php 
    echo validation_errors();
    echo form_open_multipart();
?>
<div class='form-group'>
	<label>Tytuł</label>
	<input 
        type='text'
        name='title'
        value='<?php echo $title?>'
        placeholder='Tytuł'
        class='form-control'>
</div>
<div class='form-group'>
	<label>Treść</label>
	<textarea
    type='text'
    name='content'
    placeholder='Treść'
    class='form-control'><?php echo $content?></textarea>
</div>
<div class='form-group'>
    <label>
        <input type='checkbox' name='hidden' <?php echo ($hidden == 1) ? ' checked ' : ' ' ?> value='1'/>
        Ukryj stronę ze sklepu.
    </label>
    <span class="glyphicon glyphicon-question-sign text-muted" aria-hidden="true" title="Całkowicie ukrywa i odmawia dostępu do strony."></span>
</div>

<input type='submit' class='btn btn-default' value='Zapisz'>
<?php
    echo form_close();
?>
