<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// S-au completat inputurile
		$nume = $_POST['nume'];
		$prenume = $_POST['prenume'];
		$CNP = $_POST['CNP'];
		$nr_telefon = $_POST['nr_telefon'];
		$e_mail = $_POST['e_mail'];
		$oras = $_POST['oras'];
		$judet_sector = $_POST['judet_sector'];
		$strada = $_POST['strada'];
		$nr_strada = $_POST['nr_strada'];
		$apartament = $_POST['apartament'];
		$parola = $_POST['parola'];
		
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
					$query = "insert into stapani (nume,prenume,CNP,nr_telefon,e_mail,oras, judet_sector, strada, nr_strada, apartament, parola) values ('$nume','$prenume','$CNP','$nr_telefon','$e_mail','$oras', '$judet_sector', '$strada', '$nr_strada', '$apartament', '$parola')";
					mysqli_query($con, $query);
					header("Location: admin_stapani1.php");
					die;
				}
			}
		}
		else
		{
			echo "<font color=white>Completati toate campurile cu *!</font>";
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
<br><br><br><br>
<center><titlu>Adauga o persoana la stapani</titlu></center>
<br><br> 
<form method="post">
    <center><input type="text" name="nume" placeholder="Nume *" class="input_sl">
    <br><br>
    <input type="text" name="prenume" placeholder="Prenume *" class="input_sl">
    <br><br>
    <input type="text" name="CNP" placeholder="CNP *" class="input_sl">
    <br><br>
    <input type="text" name="nr_telefon" placeholder="Nr. telefon" class="input_sl">
    <br><br>
	<input type="email" name="e_mail" placeholder="E-mail *" class="input_sl">
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
	<input type="password" name="parola" placeholder="Parola *" class="input_sl">
    <br><br></center>
	 &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<subtext>Campurile cu * sunt obligatorii.</subtext>
    <br><br><br>
    <center><input type="submit" value="Insereaza" class="button_sl"></center>
</form>

</box_sign>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>