        <footer class='text-center text-muted'>
            <hr>
            
            <nav class="nav justify-content-center">
              <a data-toggle="modal" data-target="#aboutUsModal" class="nav-link active" href="<?php echo site_url().'about' ?>"><?php echo lang('nav_item_03')?></a>
<!--
              <a class="nav-link disabled" href="">FAQ</a>
              <a class="nav-link disabled" href="">Help</a>
-->
            </nav>
            

<!-- Modal -->
<div class="modal fade" id="aboutUsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">About us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>TheGarage.Sale is a simple app where you can host your unwanted items which you want to sell. <br>There are no limits on how many items you can post and they stay online forever, or until you sell them successfully!</p>
        <h3>Current features</h3>
        <ul>
            <li>Unlimited items</li>
            <li>Unlimited high-res photos</li>
            <li>Unlimited time on your ads</li>
            <li>Small and simple fees - 10% on final item price, only paid when sold.</li>
            <li>Continuous development</li>
        </ul>

        <h3>Future features</h3>
        <ul>
            <li>Unlimited Garages</li>
            <li>eBay and Gumtree Import/Export</li>
            <li>Native Android and iOS app</li>
            <li>Debit card and Bitcoin integration</li>
        </ul>
      </div>
    </div>
  </div>
</div>
            
            
            
            
        <?php
            
            echo form_open();
            echo lang('site_lang', 'selectedlanguage');
        ?>

        
          <select name="language" class="custom-select" onchange="javascript:this.form.submit();">
             <?php
                $languages = array('english'=>"English", 'polish'=>"Polski");

                foreach($languages as $key=>$val) {
                  if($key == $selected_language)
                        echo "<option value='".$key."' selected>".$val."</option>";
                   else
                        echo "<option value='".$key."'>".$val."</option>";
                }
             ?>

          </select>
          <br>
            
        <?php
            form_close();
            
            
            $currentPageName = basename($_SERVER['PHP_SELF']);
        
            Print "<p>The Garage Sale &copy; 2015 - ".date("Y")."</p>";
            
            /*
            if(!($currentPageName == "index.php" || $currentPageName == "viewproduct.php" || $currentPageName == "viewpage.php")){
                Print "<small>Wersja: 1.1 Opublikowana: 10/07/2015 01:00</small>";
            }
            */
        ?>
        </footer>
    </div>
<!--    <script type="text/javascript" src="<?php echo site_url()?>assets/js/jquery-2.1.4.min.js"></script>-->
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
   
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
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