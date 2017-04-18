<?php
    if ($this->form_validation->run())
	{
?>
<div id="messageToDismiss" class="row bg-success">
    <p>Produkt dodany pomyślnie!<br>Możesz dodać kolejny produkt poniżej lub <a href='<?php echo base_url() ?>products/manage/'>zarządzać wszystkimi produktami</a>.</p>
    <button type="button" class="close" aria-label="Close" onclick="document.getElementById('messageToDismiss').setAttribute('style', 'display: none');">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<h1>Dodaj nowy produkt</h1>

<?php 
    echo validation_errors();
    echo form_open_multipart();
?>
<div class='form-group'>
    <label>Tytuł</label>
    <input 
        type='text' 
        name='title'
        placeholder='Tytuł' 
        class='form-control'>
</div>
<div class='form-group'>
    <label>Opis</label>
    <textarea 
        type='text' 
        name='description' 
        placeholder='Opis' 
        class='form-control'></textarea>
</div>
<div class='form-group'>
    <label>Cena</label>
    <div class='input-group'>
        <input type='text' name='price' placeholder='Cena' class='form-control'>
        <span class='input-group-addon'>zł</span>
    </div>
</div>
<div class='form-group'>
    <label>Zdjęcia</label>
    <input type='file' name='userfile[]' multiple>
</div>

<div class='form-group row'>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <label>Kategorie</label>
        <div class="list-group">
            <?php 
                foreach($allTags as $tag)
                {
                    Print "<label class='list-group-item'>";

                    $checkedBool = false;
                    foreach($currentTags as $currentTag)
                    {
                        if($tag['tag_name'] === $currentTag)
                        {
                            $checkedBool = true;
                            break;
                        }
                    }

                    Print "<input type='checkbox' name='selectedTags[]'".(($checkedBool) ? ' checked ' : ' ')."value='".$tag['tag_name']."'>".(($tag['tag_name'] === 'main') ? 'glowna' : $tag['tag_name']);
                    Print "</label>";        
                }
            ?>
            <input type='text' class="list-group-item" name='newTags' placeholder='Dodaj nową kategorię' class='form-control'>
        </div>
    </div>
    
    <div class="col-xs-6 col-sm-6 col-md-6">
        <label>Odznaki</label>   
        <div class="list-group">
            <label class='list-group-item'>
                <input type='checkbox' name='selectedBadges[]' value='new'>
                <span class='label label-success tag-label'>nowy</span>
            </label>
            <label class='list-group-item'>
                <input type='checkbox' name='selectedBadges[]' value='sold'>
                <span class='label label-danger tag-label'>sprzedany</span>
            </label>
            <label class='list-group-item'>
                <input type='checkbox' name='selectedBadges[]' value='auction'>
                <span class='label label-warning tag-label'>licytacja</span>
            </label>
            <!--<input type='text' class="list-group-item" name='newBadges' placeholder='Dodaj nową odznakę' class='form-control'>-->
        </div>
    </div>
</div>

<div class='form-group'>
    <label>
        <input type='checkbox' name='hidden' value='1'/>
        Ukryj produkt ze sklepu.
    </label>
    <span class="glyphicon glyphicon-question-sign text-muted" aria-hidden="true" title="Całkowicie ukrywa produkt ze sklepu i odmawia dostępu do strony produktu."></span>
</div>

<div class='form-group'>
    <label>Ukryte notatki</label>
    <textarea 
        type='text' 
        name='hidden_notes' 
        placeholder='Ta notatka jest prywatna i nie zostanie wyświetlona na stronie.' 
        class='form-control'></textarea>
</div>

<input type='submit' class='btn btn-default' value='Zapisz'>
<?php echo form_close()?>

