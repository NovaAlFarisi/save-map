<?php 
require_once('koneksi.php');

if($stmt = $conn->prepare("SELECT * FROM tb_lokasi")){	
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows < 1) {
		echo "<script>window.location = 'index.php'; alert('Tidak ada data yang tersedia'); </script>";
	}
} else {
	die('Failed');
}

 ?>