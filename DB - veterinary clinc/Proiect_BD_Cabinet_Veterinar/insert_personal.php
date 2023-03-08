<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// S-au completat inputurile
		$nume = $_POST['nume'];
		$prenume = $_POST['prenume'];
		$grad = $_POST['grad'];
		$specializare = $_POST['specializare'];
		$sql = "select id_specializare from specializari where denumire = '$specializare' limit 1";
		$result = $con->query($sql);
		$spc = $result->fetch_assoc();
		$id_specializare=$spc['id_specializare'];
		$CNP = $_POST['CNP'];
		$nr_telefon = $_POST['nr_telefon'];
		$e_mail = $_POST['e_mail'];
		
		// Se verifica sa fie completate toate campurile obligatorii
		if(!empty($nume) && !empty($prenume)  && !empty($specializare)  && !empty($CNP) && !empty($nr_telefon) && !empty($e_mail))
		{
			//se verifica veridicitatea email-ului
			if (!filter_var($e_mail, FILTER_VALIDATE_EMAIL))
				echo "<font color=white>Introduceti o adresa de e-mail valida! </font>";
			else
			{
				//se verifica veridicitatea CNP-ului
				if(strlen($CNP)!=13)
					echo "<font color=white>Introduceti un CNP valid!</font>";
				else
				{
					//se stocheaza in baza de date
					$query = "insert into personal_medical (id_specializare,nume,prenume,grad_medical,CNP,nr_telefon,e_mail) values ('$id_specializare','$nume','$prenume','$grad','$CNP','$nr_telefon','$e_mail')";
					mysqli_query($con, $query);
					header("Location: admin_personal1.php");
					die;
				}
			}
		}
		else
		{
			echo "<font color=white>Completati toate campurile!</font>";
		}		
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="my_style.css">
</head>
<body class="bkg">
<box_personal>
<img src="img\titlu1.png" alt="logo clinica" class="poz_logo">
<br><br><br><br>
<center><titlu>Adauga o persoana<br>la personalul medical</titlu></center>
<br><br> 
<center><form method="post">
    <input type="text" name="nume" placeholder="Nume" class="input_sl">
    <br><br>
    <input type="text" name="prenume" placeholder="Prenume" class="input_sl">
    <br><br>
	<select name="specializare" class="input_sl , text_select">
		<option value="" class="">Alege specializare</option>
		<option value="Dermatologie">Dermatologie</option>
		<option value="Gastroenterologie">Gastroenterologie</option>
		<option value="General">General</option>
		<option value="Ginecologie">Ginecologie</option>
		<option value="Oftalmologie">Oftalmologie</option>
		<option value="ORL">ORL</option>
	</select>
	<br></br>
	<input type="text" name="grad" placeholder="Grad medical" class="input_sl">
    <br><br>
    <input type="text" name="CNP" placeholder="CNP" class="input_sl">
    <br><br>
    <input type="text" name="nr_telefon" placeholder="Nr. telefon" class="input_sl">
    <br><br>
	<input type="email" name="e_mail" placeholder="E-mail" class="input_sl">
    <br><br><br>
    <center><input type="submit" value="Insereaza" class="button_sl"></center>
</form></center>

</box_personal>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br><br><br><br><br>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br><br><br><br><br><br><br><br>
</body>
</html>