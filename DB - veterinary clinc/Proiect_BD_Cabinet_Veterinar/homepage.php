<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="my_style.css">
</head>
<body class="bkg2">

<a href="logout.php"><link_text>Deconecteaza-te aici</link_text></a>
<br><br>
<center><img src="img\logo.png" alt="logo clinica"></center>
<br><br>
<center><titlu_homepage>Bine ai revenit la</titlu_homepage> <titlu_pp>PinkPaws</titlu_pp> <titlu_cv>Veterinary Clinic</titlu_cv> <titlu_homepage>, <?php echo "$user_data[prenume]"; ?>!</titlu_homepage></center>
<center><titlu_homepage>Cu ce te putem ajuta astazi?</titlu_homepage></center>
<br><br>
<a href="animale.php">
   <center><input type="button" value="Spre tabelul cu animalele mele" class="button_homepage_stapan"></center>
</a>
<br><br><br><br>
<center><img src="img\animale.png" alt="animalute"></center>
<br><br>
</body>
</html>