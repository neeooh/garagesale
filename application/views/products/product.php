<!--
<ol class='breadcrumb'>
    <li><a href='<?php $this->load->helper('url'); echo site_url(); ?>'>Wszystkie produkty</a></li>
    <li class='active'><?php echo $product['title']?></li>
</ol>
-->

<?php echo ($product['hidden'] == 1) ? '<p class="bg-warning">Ten produkt jest ukryty!</p>' : '' ?>

<div class='page-header'>
    <h1>
        <?php 
            echo $product['title'];

            Print "<span class='horizontal-tag-line'>";
            if($currentBadges['new'] == 1)
            {
                Print "<span class='label horizontal-label label-success tag-label' style='font-size: 14px;vertical-align: middle'>nowy</span>";
            }
            if($currentBadges['sold'] == 1)
            {
                Print "<span class='label horizontal-label label-danger tag-label' style='font-size: 14px;vertical-align: middle'>sprzedany</span>";
            }
            if($currentBadges['auction'] == 1)
            {
                Print "<span class='label horizontal-label label-warning tag-label' style='font-size: 14px;vertical-align: middle'>licytacja</span>";
            }
            Print "</span>";

        ?>
    </h1> 
    <p><?php echo $product['description']?></p>
	
    <?php $priceMessaage = (strlen($product['price']) == 0) ? "zapytaj" : $product['price']." zł"?>
	<p><b>Cena: </b><?php echo $priceMessaage?></p>
	
    <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span>
    <a href="mailto:<?php echo $productQuestionEmail['value']?>?subject=Pytanie%20o%20produkt: <?php echo $product['title']?>&body=Link produktu: <?php $this->load->helper('url'); echo current_url()?>">Zapytaj o ten produkt.</a>
</div>

<?php
            
    // Print images
    Print "<div class='my-gallery img-container'";
    
    $i = 0;
    foreach($images as $image)
    {
        if($i%3 == 0){
		  Print "<div class='row'>";
		}
        
        Print "<div class='col-xs-6 col-sm-4 col-md-4'>";
        Print "<div class='thumbnail'>";
        Print "<a href='".base_url().$image['path']."' data-lightbox='roadtrip'><img src='".base_url().$image['thumb_path']."' /></a>";
        Print "</div>";
        Print "</div>";
        
        $i ++;
			
        if($i%3 == 0){
            Print "</div>
            ";
            $i = 0;
        }
    }
    
     if($i%3 != 0){
            Print "</div>
            ";
        }
        Print "</div>";
?>