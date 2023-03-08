<?php 
session_start();

	include("connection.php");
	include("functions.php");
	$query = "select * from personal_medical where id_personal = '$_GET[id_pm]' limit 1";
	$result = mysqli_query($con, $query);
	$personal = mysqli_fetch_assoc($result);
	
	$query = "DELETE FROM personal_medical
			WHERE id_personal = '$personal[id_personal]'";
	$result = mysqli_query($con, $query);
	
	header("Location: admin_personal1.php");
	
?>