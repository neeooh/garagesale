<!DOCTYPE html>
<html>
<head>
    <?php 
      $this->load->helper('html');
      $this->load->helper('url');
      
      echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
      // Night theme
      // <link rel='stylesheet' href='css/nightly/bootstrap.css' />
      echo link_tag('assets/css/bootstrap.css');
      echo link_tag('assets/css/bootstrap-theme.css');
      echo link_tag('assets/lightbox2-master/css/lightbox.min.css');
    ?>

    <title><?php echo (strlen($pageTitle) > 0) ? $pageTitle." | " : "" ?> Ostatnia Okazja!</title>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  
    ga('create', 'UA-64708477-1', 'auto');
    ga('send', 'pageview');
  
  </script>
</head>
<body>