<h1>Zarzadzaj stronami</h1>

<table border=1 cellpadding=5 class='table table-striped table-hover'>
	<th>Tytuł</th><th>Treść</th><th>Akcje</th>

	<?php
		foreach($pages as $page)
		{                    
			Print "<tr>";
			Print "<td>".$page['title']."</td>";
			Print "<td>".$page['content']."</td>";
			Print "<td>";
				Print "<a href='".base_url()."page/".$page['slug']."'>podgląd </a>";
				Print "<a href='".base_url()."page/edit/".$page['slug']."'>edytuj </a>";
				Print "<a href='".base_url()."page/deleteConfirmation/".$page['slug']."'>usuń </a>";
			Print "</td>";
			Print "</tr>";
		}
	?>
</table>