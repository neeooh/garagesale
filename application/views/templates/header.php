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

    <title><?php echo (strlen($pageTitle) > 0) ? $pageTitle." | " : "" ?> TheGarage.Sale</title>

    <?php
      if (ENVIRONMENT == 'production')
      {
        Print 
        "
        <!-- Google Analytics -->  
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      
        ga('create', 'UA-64708477-1', 'auto');
        ga('send', 'pageview');
      </script>

      <!-- Piwik -->
      <script type=\"text/javascript\">
        var _paq = _paq || [];
        /* tracker methods like \"setCustomDimension\" should be called before \"trackPageView\" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
          var u=\"//ostatniaokazja.eu/analytics/\";
          _paq.push(['setTrackerUrl', u+'piwik.php']);
          _paq.push(['setSiteId', '1']);
          var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
          g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
        })();
      </script>
      <noscript><p><img src=\"//ostatniaokazja.eu/analytics/piwik.php?idsite=1&rec=1\" style=\"border:0;\" alt=\"\" /></p></noscript>
      <!-- End Piwik Code -->
        ";
      }
    ?>
  
</head>
<body>