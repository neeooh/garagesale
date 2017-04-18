<h1>Web Tools</h1>
<h2>Generate thumbnails</h2>

<p>Processed images:</p>
<?php
	foreach($processedItems as $item)
	{
		echo $item;
		echo "<br>";		
	}
	
	
	echo "<br><b>Total # of items: </b>".sizeof($processedItems);	
	echo "<br>Benchmark time: ".$benchmark_time;
	echo "<br>Memory usage: ".$this->benchmark->memory_usage();
	echo "<br>memory_get_usage: ".memory_get_usage();
	
?>
