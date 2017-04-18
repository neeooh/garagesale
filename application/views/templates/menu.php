<nav class='navbar navbar-default'>
    <a class='navbar-brand' href='<?php echo base_url(); ?>'>Ostatnia Okazja</a>
    <ul class='nav navbar-nav'>
<?php
    foreach($menuItems as $item)
    {
        $classHtml = strpos(current_url()."/", base_url().$item['url']) !== FALSE ? ' class="active"' : '';
        $anchor = anchor($item['url'], $item['title']);
        
        Print "<li".$classHtml.">".$anchor."</li>";
    }
    
    $logoutHtml = "<a href='".base_url()."home/logout'> wyloguj sie</a>"; 
?>
    </ul>
    <p class='navbar-text' style='float: right'>Witaj<?php echo $this->session->userdata('is_logged_in') == 1 ? " ".$this->session->userdata('name')."! ".$logoutHtml : ' gościu!'?></p>
</nav>