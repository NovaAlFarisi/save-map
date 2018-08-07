<?php 
require_once('koneksi.php');

if(isset($_GET['nama_lokasi'])){
	if($stmt = $conn->prepare("SELECT * FROM tb_lokasi where nama_lokasi LIKE ? ")){	
		$param = "%{$_GET['nama_lokasi']}%";
		$stmt->bind_param('s', $param);
		if($stmt->execute()){	
			$result = $stmt->get_result();
			if ($result->num_rows < 1) {
				echo "<script>window.location = 'index.php'; alert('Tidak ada data yang tersedia'); </script>";
			}
		} else {
			die('Gagal mengeksekusi');
		}
	} else {
		die('Failed');
	}
} else {
	if($stmt = $conn->prepare("SELECT * FROM tb_lokasi")){	
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows < 1) {
			echo "<script>window.location = 'index.php'; alert('Tidak ada data yang tersedia'); </script>";
		}
	} else {
		die('Failed');
	}	
}

 ?>