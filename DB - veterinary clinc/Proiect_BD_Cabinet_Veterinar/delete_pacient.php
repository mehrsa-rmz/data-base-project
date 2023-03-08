<?php 
session_start();

	include("connection.php");
	include("functions.php");
	
	$query = "select * from pacienti where id_pacient = '$_GET[id_p]' limit 1";
	$result = mysqli_query($con, $query);
	$pacient = mysqli_fetch_assoc($result);
	
	$query = "select * from stapani where id_stapan = '$pacient[id_stapan]' limit 1";
	$result = mysqli_query($con, $query);
	$stapan = mysqli_fetch_assoc($result);
	
	$query = "DELETE FROM pacienti
			WHERE id_pacient = '$pacient[id_pacient]'";
	$result = mysqli_query($con, $query);
	
	header("Location: admin_stapani2.php?id_s=$stapan[id_stapan]");
	
?>