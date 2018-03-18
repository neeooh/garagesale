<!-- Sort by button -->
<!--
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
-->
	
<div class="row">
   <div class="col">
       <form class="form-inline my-4" style="float:right">
  <label class="mr-sm-2" for="sortMode"><?php echo lang('sort') ?></label>
  <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="sortMode" onchange="javascript:this.form.submit();">
    <option selected value="newest">
        <?php echo lang('sort_date_newest') ?>
    </option>
    <option value="oldest">
        <?php echo lang('sort_date_oldest') ?>
    </option>
    <option value="price_low">
        <?php echo lang('sort_price_low') ?>
    </option>
    <option value="price_high">
        <?php echo lang('sort_price_high') ?>
    </option>
    <option value="asc">
        <?php echo lang('sort_alfa_asc') ?>
    </option>
    <option value="dsc">
        <?php echo lang('sort_alfa_dsc') ?>
    </option>
  </select>
  <label class="mr-sm-2" for="displayMode"><?php echo lang('display_label')?></label>
  <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="displayMode" onchange="javascript:this.form.submit();">
    <option selected value="newest">
        <?php echo lang('display_grid')?>
    </option>
    <option value="oldest">
        <?php echo lang('display_list')?>
    </option>
  </select>
</form>
   </div>
    
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
			<div class='col-sm-6 col-md-4 center-text'>
			<div class='card text-center'>
				<a href='product/".$product->id."/".$product->slug."'>
				";
		
		// Display thumb
		$imgPath = ($product->thumb_img['thumb_path']) ? $product->thumb_img['thumb_path'] : 'assets/img/placeholder.jpg';
        // To-Do Displaying full pictures instead of thumbnails
		//$imgPath = ($product->thumb_img['path']) ? $product->thumb_img['path'] : 'assets/img/placeholder.jpg';
        Print "<img src='".site_url().$imgPath."' class='card-img-top'/>";
					
		Print "
				</a>
				<div class='card-block'>
				<strong class='card-text'><a href='product/".$product->id."/".$product->slug."'>".$product->title."</a></strong>
				<p>".(($product->price) ? $product->price." zł" : "")."</p>
				</div>";

			Print "<div class='item-thumb-badges'>";  
       		if($product->badges['new'] == 1)
            {
                Print "<span class='badge horizontal-label badge-success tag-label' style='font-size: 14px;vertical-align: middle'>".lang('product_label_new')."</span>";
            }
            if($product->badges['sold'] == 1)
            {
                Print "<span class='badge horizontal-label badge-danger tag-label' style='font-size: 14px;vertical-align: middle'>".lang('product_label_sold')."</span>";
            }
            if($product->badges['auction'] == 1)
            {
                Print "<span class='badge horizontal-label badge-warning tag-label' style='font-size: 14px;vertical-align: middle'>".lang('product_label_auction')."</span>";
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
