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
	$this->load->helper('url');
	
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
					<a href='product/".$product->id."/".$product->title."'>
					";
			
			// Display thumb
			$imgPath = ($product->thumb_img['thumb_path']) ? $product->thumb_img['thumb_path'] : 'assets/images/placeholder.jpg';
			Print "<img src='".site_url().$imgPath."' />";
						
			Print "
					</a>
					<div class='caption'>
					<h3><a href='product/".$product->id."/".$product->title."'>".$product->title."</a></h3>
					<p>".(($product->price) ? $product->price." zł" : "")."</p>
					</div>
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
