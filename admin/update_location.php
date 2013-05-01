<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript"
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuVdnaiCQhlWGZXK8hTQHSxhs4FKUfoi4&sensor=false">
</script>
<script>
$("#support_group_address").blur(function() {
	initialize();
})
function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(-34.397, 150.644),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
      }
</script>

<div id="map-canvas"/>