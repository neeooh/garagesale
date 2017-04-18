<?php
    if ($this->form_validation->run())
	{
?>
<div id="messageToDismiss" class="row bg-success">
    <p>Zmiany zostały zapisane.</p>
    <button type="button" class="close" aria-label="Close" onclick="document.getElementById('messageToDismiss').setAttribute('style', 'display: none');">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<h1>Edytuj produkt</h1>
<?php 
    echo validation_errors();
    echo form_open_multipart();
?>
<div class='form-group'>
    <label>Tytuł</label>
    <input 
        type='text' 
        name='title' 
        value='<?php echo $product['title']?>' 
        placeholder='Tytuł' 
        class='form-control'>
</div>
<div class='form-group'>
    <label>Opis</label>
    <textarea 
        type='text' 
        name='description' 
        placeholder='Opis' 
        class='form-control'><?php echo $product['description']?></textarea>
</div>
<div class='form-group'>
    <label>Cena</label>
    <div class='input-group'>
        <input type='text' name='price' placeholder='Cena' value='<?php echo $product['price']?>' class='form-control'>
        <span class='input-group-addon'>zł</span>
    </div>
</div>
<div class='form-group'>
    <label>Zdjęcia</label>
    <div class='row'>
    <?php
    	$i = 0;
    	foreach($images as $image){
    	    $image_path = base_url().$image['thumb_path'];
    ?>

        <div class='col-xs-6 col-md-2'>
            <div class='thumbnail'>
                <img src='<?php echo $image_path ?>' height='300px'/>
                <label>
                    <input type='checkbox' name='deleteimg[]' value='<?php echo $image['id']?>'> usuń
                </label>
                <label>
                    <input 
                        type='radio' 
                        name='mainimg' 
                        value='<?php echo $image['id']?>'
                        <?php echo (($main_image['thumb_path'] == $image['thumb_path']) ? "checked='checked'" : "")?>> główne zdjęcie
                </label>
            </div>
        </div>
    	   
           <?php } // Closing foreach ?> 
    </div>
    <input type='file' name='userfile[]' multiple>
</div>
    
<div class='form-group row'>
    <div class="col-xs-12 col-sm-4 col-md-4">
        <label>Kategorie</label>
        <div class="list-group">
            <?php
                foreach($allTags as $tag)
                {
                    Print "<label class='list-group-item'>";

                    $checkedBool = false;
                    foreach($currentTags as $currentTag)
                    {
                        if($tag['tag_name'] === $currentTag['tag_name'])
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
      
    <div class="col-xs-12 col-sm-4 col-md-4">
        <label>Odznaki</label>
        <div class="list-group">
            <label class='list-group-item'>
                <input type='checkbox' name='selectedBadges[]' value='new' <?php echo ($currentBadges['new'] == 1)?'checked':'' ?>>
                <span class='label label-success tag-label'>nowy</span>
            </label>
            <label class='list-group-item'>
                <input type='checkbox' name='selectedBadges[]' value='sold' <?php echo ($currentBadges['sold'] == 1)?'checked':'' ?>>
                <span class='label label-danger tag-label'>sprzedany</span>
            </label>
            <label class='list-group-item'>
                <input type='checkbox' name='selectedBadges[]' value='auction' <?php echo ($currentBadges['auction'] == 1)?'checked':'' ?>>
                <span class='label label-warning tag-label'>licytacja</span>
            </label>
        </div>
    </div>

    <div class='col-xs-12 col-sm-4 col-md-4'>
        <label>Ukryte notatki</label>
        <textarea 
            type='text' 
            name='hidden_notes' 
            placeholder='Ta notatka jest prywatna i nie zostanie wyświetlona na stronie.' 
            class='form-control'><?php echo $product['hidden_notes']?></textarea>
    </div>

</div>

<div class='form-group'>
    <label>
        <input type='checkbox' name='hidden' <?php echo ($hidden == 1) ? ' checked ' : ' ' ?> value='1'/>
        Ukryj produkt ze sklepu.
    </label>
    <span class="glyphicon glyphicon-question-sign text-muted" aria-hidden="true" title="Całkowicie ukrywa produkt ze sklepu i odmawia dostępu do strony produktu."></span>
</div>



<input type='submit' class='btn btn-default' value='Zapisz'>

<?php echo form_close()?>