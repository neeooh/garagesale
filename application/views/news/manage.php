<h1>Ogłoszenia</h1>

<table border=1 cellpadding=5 class='table table-striped table-hover'>
	<th>Tytuł</th><th>Treść</th><th>Akcje</th>

	<?php
		foreach($allNews as $news)
		{                    
			Print "<tr>";
			Print "<td>".$news['title']."</td>";
			Print "<td>".$news['content']."</td>";
			Print "<td>";
				Print "<a href='".base_url()."news/".$news['ID']."/".$news['slug']."'>podgląd </a>";
				Print "<a href='".base_url()."news/edit/".$news['ID']."'>edytuj </a>";
				Print "<a href='".base_url()."news/deleteConfirmation/".$news['ID']."'>usuń </a>";
			Print "</td>";
			Print "</tr>";
		}
	?>
</table>