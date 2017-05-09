<?php
	if($productObjects == null || sizeof($productObjects) == 0)
	{
		Print "<h2>Brak wynikow wyszukiwnia dla \"".$query."\"</h2>";
		return;
	}
?>

<h2>Wyniki wyszukiwania dla "<?php echo $query ?>"</h2>
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

<?php
	$i = 0;
	$j = 0;

	foreach($productObjects as $product)
	{
		if($i%6 == 0){
			Print "<div class='row'>";
		}
		
		Print "
			<div class='col-xs-6 col-sm-3 col-md-2 center-text'>
			<div class='thumbnail'>
				<a href='product/".$product->id."/".$product->slug."'>
				";
		
		// Display thumb
		$imgPath = ($product->thumb_img['thumb_path']) ? $product->thumb_img['thumb_path'] : 'assets/img/placeholder.jpg';
        // To-Do Displaying full pictures instead of thumbnails
		//$imgPath = ($product->thumb_img['path']) ? $product->thumb_img['path'] : 'assets/img/placeholder.jpg';
        Print "<img src='".site_url().$imgPath."' />";
					
		Print "
				</a>
				<div class='caption'>
				<h3><a href='product/".$product->id."/".$product->slug."'>".$product->title."</a></h3>
				<p>".(($product->price) ? $product->price." zł" : "")."</p>
				</div>";

			Print "<div class='item-thumb-badges'>";  
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
			Print "</div>";
        
        Print "        
			</div>
			</div>";
		
		$i ++;
		$j ++;
		
		if($i%6 == 0){
			Print "</div>
			";
			$i = 0;
		}
	}
	
	if($i%6 != 0){
			Print "</div>
			";
		}
	?>
