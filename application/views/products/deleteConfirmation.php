<h1>Czy na pewno chcesz usunąć poniższy produkt?</h1>
<h2><?php echo $product['title']?></h2>
<h3><?php echo $product['price']?></h3>
<a href="<?php echo base_url()?>products/delete/<?php echo $product['id'] ?>"><button class="btn btn-danger">Usuń</button></a>
<a href="<?php echo base_url()?>products/manage"><button class="btn">Anuluj</button></a>