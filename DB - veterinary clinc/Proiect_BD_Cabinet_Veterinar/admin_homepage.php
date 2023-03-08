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
<center><titlu_homepage>Bine ai revenit la</titlu_homepage> <titlu_pp>PinkPaws</titlu_pp> <titlu_cv>Veterinary Clinic</titlu_cv> <titlu_homepage>!</titlu_homepage></center>
<center><titlu_homepage>Esti conectat in calitate de admin.</titlu_homepage></center>
<br><br>

<center><a href="admin_personal1.php">
   <center><input type="button" value="Spre tabelul cu personalul medical" class="button_admin">
</a> &nbsp;&nbsp;&nbsp;

<a href="admin_stapani1.php">
   <input type="button" value="Spre tabelul cu stapanii pacientilor" class="button_admin">
</a> <br><br> </center>

<center><a href="admin_specializari.php">
   <input type="button" value="Spre tabelul cu specializari" class="button_admin">
</a> &nbsp;&nbsp;&nbsp;

<a href="admin_stapani_p.php">
   <input type="button" value="Spre tabelul cu stapanii de pisici" class="button_admin">
</a> <br><br> </center>

<center><a href="admin_consultatii_g.php">
   <input type="button" value="Spre tabelul cu consultatiile de la medicina generala" class="button_admin">
</a> &nbsp;&nbsp;&nbsp;

<a href="admin_stapani_c.php">
   <input type="button" value="Spre tabelul cu stapanii de catei" class="button_admin">
</a> <br><br> </center>

<center><a href="admin_animale_a.php">
   <input type="button" value="Spre tabelul cu analize recoltate" class="button_admin">
</a> &nbsp;&nbsp;&nbsp;

<a href="admin_animale_c.php">
   <input type="button" value="Spre tabelul cu animale castrate" class="button_admin">
</a> <br><br> </center>

<center><a href="admin_animale_e.php">
   <input type="button" value="Spre tabelul cu ecografii facute" class="button_admin">
</a> &nbsp;&nbsp;&nbsp;

<a href="admin_animale_v.php">
   <input type="button" value="Spre tabelul cu animale vaccinate" class="button_admin">
</a> </center>
<br><br><br><br>

<center><img src="img\animale.png" alt="animalute"></center>
<br><br>

</body>

</html>