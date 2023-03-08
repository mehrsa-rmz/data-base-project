<?php 
session_start();

	include("connection.php");
	include("functions.php");
	$query = "select * from stapani where id_stapan = '$_GET[id_s]' limit 1";
	$result = mysqli_query($con, $query);
	$stapan = mysqli_fetch_assoc($result);
	
	$query = "DELETE FROM stapani
			WHERE id_stapan = '$stapan[id_stapan]'";
	$result = mysqli_query($con, $query);
	
	header("Location: admin_stapani1.php");
	
?>