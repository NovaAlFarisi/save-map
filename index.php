<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        height: 400px; 
        width: 100%; 
        margin-bottom: 20px;
       }
       input {
       	margin-bottom: 10px;
       }
    </style>
  </head>
  <body>
    <a href="index.php">Tambah Lokasi</a> | <a href="list_map.php">Lokasi Tersimpan</a>
    <div id="map"></div>
    <form action="inc/tambah_lokasi.php" method="post">
    	<input type="text" name="nama_lokasi" placeholder="Nama Lokasi"><br>
    	<input type="text" id="lat" name="lat" placeholder="Lat"> <br>
   	 	<input type="text" id="lng" name="lng" placeholder="Lang"> <br>	
   	 	<button type="submit">Tambah lokasi</button>
    </form>
    <script>

var map;
var marker;

function placeMarker(location) {
    if (marker) {
        marker.setPosition(location);
    } else {
        marker = new google.maps.Marker({          
            position: location,
            map: map,
            title: 'Your position'
        });
    }
}

function initMap() {
    var centerPosition = new google.maps.LatLng(-6.051183833800273, 106.02067417734588);
    map = new google.maps.Map(document.getElementById('map'), {
    	zoom:10,
    	center: centerPosition,
    });

    google.maps.event.addListener(map, 'click', function (evt) {
        placeMarker(evt.latLng);
        console.log(evt.latLng.lat() + ' ' +  evt.latLng.lng());
        document.getElementById('lat').value = evt.latLng.lat();
        document.getElementById('lng').value = evt.latLng.lng();
    });
}


    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4ihGVL6SmggKxvTYeO4oyQBTjxCYg6cA&callback=initMap">
    </script>
  </body>
</html>
