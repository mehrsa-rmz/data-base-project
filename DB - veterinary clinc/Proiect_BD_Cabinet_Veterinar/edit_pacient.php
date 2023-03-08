<?php 
session_start();

	include("connection.php");
	include("functions.php");
	$query = "select * from pacienti where id_pacient = '$_GET[id_p]' limit 1";
	$result = mysqli_query($con, $query);
	$pacient = mysqli_fetch_assoc($result);
	
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// S-au completat inputurile
		$numep = $_POST['numep'];
		$specie = $_POST['specie'];
		$rasa = $_POST['rasa'];
		$data_nasterii = $_POST['data_nasterii'];
		$sex = $_POST['sex'];
		$greutate = $_POST['greutate'];
		
		// Se verifica sa fie completate toate campurile obligatorii
		if(!empty($numep) && !empty($specie)  && !empty($rasa)  && !empty($data_nasterii) && !empty($sex) && !empty($greutate))
		{
			//se stocheaza in baza de date
			$query = "UPDATE pacienti
							SET numep='$numep',specie='$specie',rasa='$rasa',data_nasterii='$data_nasterii',sex='$sex',greutate='$greutate'
							WHERE id_pacient = '$pacient[id_pacient]'";
			mysqli_query($con, $query);
			header("Location: admin_stapani2.php?id_s=$pacient[id_stapan]");
			die;
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
<center><titlu>Editeaza<br>pacientul selectat</titlu></center>
<br><br> 
<center><form method="post">
    <input type="text" name="numep" placeholder="Nume" class="input_sl" <?php echo "value= ".$pacient['numep']."" ?>>
    <br><br>
    <input type="text" name="specie" placeholder="Specie" class="input_sl" <?php echo "value= ".$pacient['specie']."" ?>>
	<br><br>
	<input type="text" name="rasa" placeholder="Rasa" class="input_sl" <?php echo "value= ".$pacient['rasa']."" ?>>
    <br><br>
    <input type="text" name="data_nasterii" placeholder="Data nasterii (YYYY-MM-DD)" class="input_sl" <?php echo "value= ".$pacient['data_nasterii']."" ?>>
    <br><br>
    <input type="text" name="sex" placeholder="Sex (M/F)" class="input_sl" <?php echo "value= ".$pacient['sex']."" ?>>
    <br><br>
	<input type="text" name="greutate" placeholder="Greutate - kg" class="input_sl" <?php echo "value= ".$pacient['greutate']."" ?>>
    <br><br><br>
    <center><input type="submit" value="Modifica" class="button_sl"></center>
</form></center>

</box_personal>

<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br><br><br><br><br>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br><br><br><br><br><br><br><br>

</body>

</html>