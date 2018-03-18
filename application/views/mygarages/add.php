<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCz85Qt1iLaImiennRIfD-ip7Ik8nIy0HA&callback=initMap" async defer></script> 
    
   

   <?php
    if ($this->form_validation->run())
	{
?>
<div id="messageToDismiss" class="row bg-success">
    <p>Produkt dodany pomyślnie!<br>Możesz dodać kolejny produkt poniżej lub <a href='<?php echo base_url() ?>products/manage/'>zarządzać wszystkimi produktami</a>.</p>
    <button type="button" class="close" aria-label="Close" onclick="document.getElementById('messageToDismiss').setAttribute('style', 'display: none');">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<h3>Create new Garage</h3>

<?php 
    echo validation_errors();
    echo form_open_multipart();
?>
<div class='form-group'>
    <label>Garage name</label>
    <input 
        type='text' 
        name='name'
        placeholder='Garage name' 
        class='form-control'>
</div>
<div class='form-group'>
    <label>Garage location</label>
    <input 
        type='hidden'
        name='locationInput'
        id='locationInput'
        class='form-control'>
    <small id="emailHelp" class="form-text text-muted">This will help other users to discover your garage.</small>
    <div id="map" style="width:100%;height:250px"></div>
</div>
<button type='submit' class='btn btn-outline-success'>Zapisz</button>
<?php echo form_close()?>



        
<script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    
    
    var map;
    var marker;

    function initMap() {
        // Map options
        var options = {
            center: {lat: 54.584405, lng: -5.934065},
            zoom: 10
        }

        // New map
        map = new google.maps.Map(document.getElementById('map'), options);
        
        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
        });
    }
    
    function placeMarker(location) {
        if ( marker ) {
            marker.setPosition(location);
          } else {
        marker = new google.maps.Marker({
          position: location,
          draggable: true,
          map: map
      });    
          }
        //Update the input field
        document.getElementById('locationInput').value = marker.getPosition().lat() + "," + marker.getPosition().lng();
    }
    
    function showPosition(position) {
        placeMarker(new google.maps.LatLng(position.coords.latitude, position.coords.longitude)); 
    }

</script>