<h1 class="sr-only sr-only-focusable">Wiadomości</h1>
<h2 class="sr-only sr-only-focusable">Przypięte</h2>
<?php 
    foreach($pinnedNews as $news)
    {
        $this->load->view('news/newsItemTemplate', $news);
    }
?>
<hr/>
<h2 class="sr-only sr-only-focusable">Wszystkie</h2>
<?php 
    foreach($allNews as $news)
    {
        $this->load->view('news/newsItemTemplate', $news);
    }
?>