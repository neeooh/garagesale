<?php 

    if($hidden == 1)
    {
        echo "<p class='bg-warning'>Ta wiadomość jest usunięta lub ukryta!</p>";
    }
    else
    {
        $this->load->view('news/newsItemTemplate');
    }
    
?>