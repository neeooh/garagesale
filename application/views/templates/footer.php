        <footer class='center-text text-muted'>
            <hr>
        <?php
            $currentPageName = basename($_SERVER['PHP_SELF']);
        
            Print "<p>Ostatnia Okazja &copy; 2015 - ".date("Y")."</p>";
            
            /*
            if(!($currentPageName == "index.php" || $currentPageName == "viewproduct.php" || $currentPageName == "viewpage.php")){
                Print "<small>Wersja: 1.1 Opublikowana: 10/07/2015 01:00</small>";
            }
            */
        ?>
        </footer>
    </div>
    <script type="text/javascript" src="<?php echo site_url()?>assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/nicEdit.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            nicEditors.allTextAreas({buttonList : ['bold','italic','underline','strikeThrough','subscript','superscript','ol','ul','link','unlink']});
        }); 
    </script>

    <script src="<?php echo site_url()?>assets/lightbox2-master/js/lightbox.min.js"></script>

    <!-- Bug Reporting - Instabug-->
    <script src='https://s3.amazonaws.com/instabug-pro/sdk_releases/instabugsdk-1.1.1.min.js'></script>
    <?php
        switch (ENVIRONMENT) {
            case 'development':
                # Development/Beta Site bug feed
                Print "
    <script>
        ibgSdk.init({
        token: 'ff16f88af27bcf08cde9e192c66fb10e'
        });
    </script>";
                break;
            
            default:
                # Production Site bug feed
                Print "
    <script>
        ibgSdk.init({
        token: 'c1497f366781048ec756eea08904a2d5'
        });
    </script>";
                break;
        }
    ?>

</body>
</html>