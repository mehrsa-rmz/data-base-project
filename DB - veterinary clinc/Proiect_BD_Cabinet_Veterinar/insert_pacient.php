<?php 
session_start();

	include("connection.php");
	include("functions.php");
	$query = "select * from stapani where id_stapan = '$_GET[id_s]' limit 1";
	$result = mysqli_query($con, $query);
	$stapan = mysqli_fetch_assoc($result);

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
			$query = "insert into pacienti (id_stapan,numep,specie,rasa,data_nasterii,sex,greutate) values ('$stapan[id_stapan]','$numep','$specie','$rasa','$data_nasterii','$sex','$greutate')";
			mysqli_query($con, $query);
			header("Location: admin_stapani2.php?id_s=$stapan[id_stapan]");
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
<center><titlu>Adauga un animal<br>pentru <?php echo $stapan['prenume'] ?></titlu></center>
<br><br> 
<center><form method="post">
    <input type="text" name="numep" placeholder="Nume" class="input_sl">
    <br><br>
    <input type="text" name="specie" placeholder="Specie" class="input_sl">
	<br><br>
	<input type="text" name="rasa" placeholder="Rasa" class="input_sl">
    <br><br>
    <input type="text" name="data_nasterii" placeholder="Data nasterii (YYYY-MM-DD)" class="input_sl">
    <br><br>
    <input type="text" name="sex" placeholder="Sex (M/F)" class="input_sl">
    <br><br>
	<input type="text" name="greutate" placeholder="Greutate - kg" class="input_sl">
    <br><br><br>
    <center><input type="submit" value="Insereaza" class="button_sl"></center>
</form></center>

</box_personal>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br><br><br><br><br>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br><br><br><br><br><br><br><br>
</body>
</html>