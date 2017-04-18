<!-- Sort by button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sortuj <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <?php $okIconHtml = "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>"; ?>
    <li><a href="?sortMode=asc">Alfabetycznie (a - z) <?php echo ($activeSortMode == 'asc') ? $okIconHtml : '' ?></a></li>
    <li><a href="?sortMode=desc">Alfabetycznie (z - a) <?php echo ($activeSortMode == 'desc') ? $okIconHtml : '' ?></a></li>
    <li role="separator" class="divider"></li>
    <li><a href="?sortMode=newest">Od najnowszego <?php echo ($activeSortMode == 'newest') ? $okIconHtml : '' ?></a></li>
	<li><a href="?sortMode=oldest">Od najstarszego <?php echo ($activeSortMode == 'oldest') ? $okIconHtml : '' ?></a></li>
  </ul>
</div>

<table border=1 cellpadding=5 class='table table-striped table-hover products-table'>
	<th class="width-100">Główne zdjęcie</th><th>Tytuł</th><th>Opis</th><th>Cena</th><th>Kategorie</th><th>Akcje</th>
	
	<?php
	foreach($productObjects as $product)
	{
	    Print "<tr>";
		Print "<td class='width-100'>";
			$imgPath = (strlen($product->thumb_img['thumb_path']) > 0) ? $product->thumb_img['thumb_path'] : 'assets/img/placeholder.jpg';
			Print "<img src='".base_url().$imgPath."' class='width-100'/>";
		Print "</td>";
	    Print "<td>".($product->hidden == 1 ? "<span class='label label-warning tag-label' title='Produkt całkowicie ukryty ze sklepu.'>produkt ukryty</span><br>" : "").$product->title;
    
		// Display badges
		Print "<span class='horizontal-tag-line'>";
		if($product->badges['new'] == 1)
		{
			Print "<span class='label horizontal-label label-success tag-label' style='font-size: 14px;vertical-align: middle'>nowy</span>";
		}
		if($product->badges['sold'] == 1)
		{
			Print "<span class='label horizontal-label label-danger tag-label' style='font-size: 14px;vertical-align: middle'>sprzedany</span>";
		}
		if($product->badges['auction'] == 1)
		{
			Print "<span class='label horizontal-label label-warning tag-label' style='font-size: 14px;vertical-align: middle'>licytacja</span>";
		}
		Print "</span>";

        Print "</td>";
	    Print "<td>".$product->description."</td>";
	    Print "<td>".$product->price."</td>";
		Print "<td>";
		foreach($product->tags as $tag)
		{
			Print "<span class='label label-default tag-label'>".(($tag['tag_name'] === 'main') ? 'glowna' : $tag['tag_name'])."</span> ";
		}
		Print "</td>";
	    Print "<td>";
	    Print "<a href='".base_url()."product/".$product->id."/".$product->title."'>podgląd </a>";
	    Print "<a href='".base_url()."products/edit/".$product->id."'>edytuj </a>";
		Print "<a href='".base_url()."products/deleteConfirmation/".$product->id."'>usuń </a>";
	    Print "</td>";
	    Print "</tr>";
	}
	?>
</table>