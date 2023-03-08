<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// S-au completat inputurile
		$e_mail = $_POST['e_mail'];
		$parola = $_POST['parola'];
		$nume = $_POST['nume'];
		$prenume = $_POST['prenume'];
		$CNP = $_POST['CNP'];
		$nr_telefon = $_POST['nr_telefon'];
		$oras = $_POST['oras'];
		$judet_sector = $_POST['judet_sector'];
		$strada = $_POST['strada'];
		$nr_strada = $_POST['nr_strada'];
		$apartament = $_POST['apartament'];
		
		// Se verifica sa fie completate toate campurile obligatorii
		if(!empty($e_mail) && !empty($parola) && !empty($nume) && !empty($prenume) && !empty($CNP) && !empty($oras) && !empty($judet_sector) && !empty($strada) && !empty($nr_strada))
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
					$query = "insert into STAPANI (e_mail,parola,nume,prenume,CNP,nr_telefon,oras,judet_sector,strada,nr_strada,apartament) values ('$e_mail','$parola','$nume','$prenume','$CNP','$nr_telefon','$oras','$judet_sector','$strada','$nr_strada','$apartament')";
					mysqli_query($con, $query);
					header("Location: login.php");
					die;
				}
			}
		}
		else
		{
			echo "<font color=white>Completati toate campurile cu '*'!</font>";
		}		
	}
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="my_style.css">
</head>

<body class="bkg">

<box_sign>

<img src="img\titlu1.png" alt="logo clinica" class="poz_logo">
<poz_titlu><titlu>Creeaza-ti un cont</titlu></poz_titlu>
<poz_form><form method="post">
	<input type="email" name="e_mail" placeholder="E-mail *" class="input_sl">
    <br><br>
    <input type="password" name="parola" placeholder="Parola *" class="input_sl">
    <br><br>
    <input type="text" name="nume" placeholder="Nume *" class="input_sl">
    <br><br>
    <input type="text" name="prenume" placeholder="Prenume *" class="input_sl">
    <br><br>
    <input type="text" name="CNP" placeholder="CNP *" class="input_sl">
    <br><br>
    <input type="text" name="nr_telefon" placeholder="Nr. telefon" class="input_sl">
    <br><br>
    <input type="text" name="oras" placeholder="Oras *" class="input_sl">
    <br><br>
    <input type="text" name="judet_sector" placeholder="Judet/Sector *" class="input_sl">
    <br><br>
    <input type="text" name="strada" placeholder="Strada *" class="input_sl">
    <br><br>
    <input type="text" name="nr_strada" placeholder="Nr strada *" class="input_sl">
    <br><br>
    <input type="text" name="apartament" placeholder="Apartament" class="input_sl">
    <br><br>
	<subtext>Campurile cu * sunt obligatorii. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ai deja cont? </subtext><link_text><a href="login.php">Conecteaza-te aici</a></link_text>
	<br>
    <poz_button_s><input type="submit" value="Trimite" class="button_sl"></poz_button_s>
</form></poz_form>

</box_sign>

<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>

</body>

</html>