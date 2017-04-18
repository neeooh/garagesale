        <?php require 'adminmenu.php'; ?>
    
        <h1>Wszystkie produkty</h1>

        <?php
            require 'dbconnect.php';

            $allProductsQuery = mysqli_query($db_connection, "SELECT * FROM products") or die(mysql_error());

            Print "<table border=1 cellpadding=5 class='table table-striped table-hover'>";
            Print "<th>Tytuł</th><th>Opis</th><th>Cena</th><th>Zdjęcia</th><th>Akcje</th>";
            while($products = mysqli_fetch_array($allProductsQuery))
            {
                Print "<tr>";
                Print "<td>".$products['title']."</td>";
                Print "<td>".$products['description']."</td>";
                Print "<td>".$products['price']."</td>";
                Print "<td>w kolejnej wersji</td>";
                Print "<td>";
                Print "<a href='viewproduct.php?id=".$products['id']."'>podgląd </a>";
                Print "<a href='editproduct.php?id=".$products['id']."'>edytuj </a>";
                $toggleMessage = ($products['hidden'] ? "pokaż" : "ukryj");
                Print "<a href='deleteproduct.php?id=".$products['id']."'>".$toggleMessage."</a>";
                Print "</td>";
                Print "</tr>";
            }
                Print "</table>";
        ?>


