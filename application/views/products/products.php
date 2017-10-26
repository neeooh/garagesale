<?php
	$this->load->helper('url');
	
	//Jumbotron
	if($headline['enabled'] == 1){
		Print 
		"<header class='jumbotron center-text'>
			<h1>".$headline['header']."</h1>
			<h2>".$headline['content']."</h2>
		</header>
		";
	}
?>
	
	<!-- Sort by button -->
	<div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<?php echo $this->lang->line('sort') ?> <span class="caret"></span>
	</button>
	<ul class="dropdown-menu">
        <?php $okIconHtml = "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>"; ?>
		<li><a href="?sortMode=asc"><?php echo lang('sort_alfa_asc') ?><?php echo ($activeSortMode == 'asc') ? $okIconHtml : '' ?></a></li>
		<li><a href="?sortMode=desc"><?php echo lang('sort_alfa_dsc') ?> <?php echo ($activeSortMode == 'desc') ? $okIconHtml : '' ?></a></li>
		<li role="separator" class="divider"></li>
		<li><a href="?sortMode=newest"><?php echo lang('sort_date_newest') ?> <?php echo ($activeSortMode == 'newest') ? $okIconHtml : '' ?></a></li>
		<li><a href="?sortMode=oldest"><?php echo lang('sort_date_oldest') ?> <?php echo ($activeSortMode == 'oldest') ? $okIconHtml : '' ?></a></li>
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
                Print "<span class='label horizontal-label label-success tag-label' style='font-size: 14px;vertical-align: middle'>".lang('product_label_new')."</span>";
            }
            if($product->badges['sold'] == 1)
            {
                Print "<span class='label horizontal-label label-danger tag-label' style='font-size: 14px;vertical-align: middle'>".lang('product_label_sold')."</span>";
            }
            if($product->badges['auction'] == 1)
            {
                Print "<span class='label horizontal-label label-warning tag-label' style='font-size: 14px;vertical-align: middle'>".lang('product_label_auction')."</span>";
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
