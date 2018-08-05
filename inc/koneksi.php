<?php 
$conn = new mysqli('localhost', 'root','', 'db_map');
if($conn->connect_error){
 	die($conn->connect_error);
 } 
 ?>
