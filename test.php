<?php

/* Read the image */
//$im = new imagick( "opona.jpg" );

//$imgprops = $im->getImageGeometry();
//echo $imgprops['width'];

/* create the thumbnail */
//$im->cropThumbnailImage( 100, 100 );

/* Write to a file */
//$im->writeImage( "opona_thumb.jpg" );

$imgUrl = $_GET['url'];
$imagick = new \Imagick($imgUrl);
    $imagick->setbackgroundcolor('rgb(64, 64, 64)');
    $imagick->cropThumbnailImage(280, 280);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();

?>
