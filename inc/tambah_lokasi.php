<?php 
require_once('koneksi.php');
if(!empty($_REQUEST)){
	$stmt = $conn->prepare("INSERT INTO tb_lokasi VALUES(NULL, ?, ?, ?)");
	$nama_lokasi = $_REQUEST['nama_lokasi'];
	$lat = $_REQUEST['lat'];
	$lng = $_REQUEST['lng'];
	$stmt->bind_param('sss',$nama_lokasi, $lat, $lng);
	if($stmt->execute()){
		header('location: ../index.php');
	}
}

 ?>