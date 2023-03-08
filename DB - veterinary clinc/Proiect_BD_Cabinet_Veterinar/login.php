<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$e_mail = $_POST['e_mail'];
		$parola = $_POST['parola'];

		if(!empty($e_mail) && !empty($parola))
		{
			//read from database
			$query = "select * from STAPANI where e_mail = '$e_mail' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['parola'] === $parola)
					{

						$_SESSION['id_stapan'] = $user_data['id_stapan'];
						if($e_mail === "admin@pinkpaws.com") {header("Location: admin_homepage.php");}
						else {header("Location: homepage.php");}
						die;
					}
				}
			}
			
			echo "<font color=red>Parola sau e_mail gresite!</font>";
		}
		else
		{
			echo "<font color=red>Completati corespunzator toate campurile!</font>";
		}
	}

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="my_style.css">
</head>

<body class="bkg">

<box_log>

<img src="img\titlu1.png" alt="logo clinica" class="poz_logo">
<poz_titlu><titlu>&nbsp;&nbsp;&nbsp;&nbsp;Conecteaza-te</titlu></poz_titlu>
<poz_form><form method="post">
	<input type="email" name="e_mail" placeholder="E-mail" class="input_sl">
    <br><br>
    <input type="password" name="parola" placeholder="Parola" class="input_sl">
    <br><br>
	<subtext>Nu ai cont? </subtext><link_text><a href="signup.php">Inregistreaza-te aici</a></link_text>
	<br>
    <poz_button_l><input type="submit" value="Trimite" class="button_sl"></poz_button_l>

</form></poz_form>

</box_log>

<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br><br><br><br>

</body>

</html>