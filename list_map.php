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
		}
	</style>
</head>
<body>
<div id="map"></div>
	<table border="1" width="100%" style="text-align: center;">
		<tr>
			<th>#</th>
			<th>Nama Lokasi</th>
			<th>Latitude</th>
			<th>Langitude</th>
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
		endwhile; ?>
	</table>
<script>
	var markers = <?=$markers;?>;
	var map;
	var marker;

	function initMap(){
   		var centerPosition = new google.maps.LatLng(-6.051183833800273, 106.02067417734588);
		map = new google.maps.Map(document.getElementById('map'), {
			center: centerPosition,
			zoom: 10
		});

		for(var i = 0; i < markers.length; i++) {
				var test = new google.maps.LatLng(markers[i].lat,markers[i].lng);
				create_marker(test, markers[i].name);
			}
	}

	function create_marker(post, name){
		marker = new google.maps.Marker({
			position: post,
			map: map,
			title: name
		});
	}



</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4ihGVL6SmggKxvTYeO4oyQBTjxCYg6cA&callback=initMap"></script>
</body>
</html>