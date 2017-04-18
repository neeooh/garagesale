<?php
    if ($this->form_validation->run())
	{
?>
<div id="messageToDismiss" class="row bg-success">
    <p>Strona dodana pomyślnie!<br>Możesz dodać kolejną stronę poniżej lub <a href='<?php echo base_url()?>page/manage'>zarządzać wszystkimi stronami</a>.</p>
    <button type="button" class="close" aria-label="Close" onclick="document.getElementById('messageToDismiss').setAttribute('style', 'display: none');">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<h1>Dodaj nową stronę</h1>

<?php 
    echo validation_errors();
    echo form_open_multipart();
?>        
<div class="form-group">
    <label>Tytuł</label>
    <input 
        type="text"
        name="title"
        class="form-control"
        placeholder="Tytuł">
</div>
<div class="form-group">
    <label>Treść</label>
    <textarea
        type="text"
        name="content"
        class="form-control"
        placeholder="Opis"></textarea>
</div>
<div class='form-group'>
    <label>
        <input type='checkbox' name='hidden' value='1'/>
        Ukryj stronę ze sklepu.
    </label>
    <span class="glyphicon glyphicon-question-sign text-muted" aria-hidden="true" title="Całkowicie ukrywa i odmawia dostępu do strony."></span>
</div>

<input type="submit" class="btn btn-default" value="Zapisz">
<?php
    echo form_close();
?>