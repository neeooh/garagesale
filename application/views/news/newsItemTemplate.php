<?php
    Print "<h3>";
    
    if($pinned == 1)
    {
        Print "<span class='glyphicon glyphicon-pushpin' aria-hidden='true' style='font-size: 0.6em'></span> ";
    }

    Print $title." ";
    Print "<small>".$datetime."</small>";
    Print "</h3>";
    Print "<p>".$content."</p>";
?>