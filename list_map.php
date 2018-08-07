<?php
require_once('inc/get_list.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lokasi Tersimpan</title>
	<style type="text/css">
		#map{
			width: 100%;
			height: 400px;
			margin-bottom: 15px;
		}
	</style>
</head>
<body>
<a href="index.php">Tambah Lokasi</a> | <a href="list_map.php">Lokasi Tersimpan</a> <br>
<form method="get" style="margin-bottom: 25px; margin-top: 25px;">
	<label>Cari Lokasi</label><br>
	<input type="text" name="nama_lokasi" placeholder="Nama Lokasi">
	<button style="margin-top: 10px;" type="submit">Cari Lokasi</button>
</form>
<div id="map"></div>
	<table border="1" width="100%" style="text-align: center;">
		<tr>
			<th>#</th>
			<th>Nama Lokasi</th>
			<th>Latitude</th>
			<th>Longitude</th>
		</tr>
		<?php 
		$no = 0;
			while ($r = $result->fetch_assoc()):
			?>
			<tr width="100%">
				<td><?=++$no;?></td>
				<td><?=$r['nama_lokasi'];?></td>
				<td><?=$r['lat_map'];?></td>
				<td><?=$r['lng_map'];?></td>
			</tr>
		<?php 
			$data[] = array('name'=>$r['nama_lokasi'], 'lat'=>$r['lat_map'], 'lng'=>$r['lng_map']);
			$markers = json_encode($data);
			endwhile;
			 ?>
	</table>
<script>
	var markers = <?=$markers;?>;
	var map;
	var marker;
	function initMap(){
   		var centerPosition = new google.maps.LatLng(-6.220228647, 106.841067438);
		map = new google.maps.Map(document.getElementById('map'), {
			center: centerPosition,
			zoom: 10
		});
		for(var i = 0; i < markers.length; i++) {
				var mark = new google.maps.LatLng(markers[i].lat,markers[i].lng);
				create_marker(mark, markers[i].name);
				new google.maps.InfoWindow({
					content: '<b>' + markers[i].name + '</b> <br> Lat: ' + markers[i].lat + '<br> Lng: ' + markers[i].lng
				}).open(map, marker);
				if(markers.length < 2){
					map.setCenter(mark);
				} else {
					map.setZoom(4);
				}
			}
	}

	function create_marker(post, name){
		marker = new google.maps.Marker({
			name: name,
			position: post,
			map: map,
			title: name
		});
	}



</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
</body>
</html>
