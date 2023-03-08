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

<poz_sageata><a href="admin_homepage.php"><img src="img\sageata.png" alt="sageata"><text_inapoi_la> inapoi la pagina principala</text_inapoi_la></a></poz_sageata>
<br><br><br><br><br><br><br>
<center><img src="img\titlu1.png" alt="logo clinica"></center>
<center><titlu_homepage>Animale castrate</titlu_homepage></center>
<br><br>

<center><table id="customers">
        <thead>
			<tr>
				<th>Nume</th>
				<th>Specie</th>
				<th>Rasa</th>
				<th>Data nasterii</th>
				<th>Sex</th>
				<th>Greutate (kg)</th>
			</tr>
		</thead>

        <tbody>
            <?php
            // read all rows from database table
			$sql1 = "SELECT numep, specie, rasa, data_nasterii, sex, greutate
					FROM Pacienti
					WHERE id_pacient in 
							(SELECT Pa.id_pacient
							FROM Pacienti Pa, Istoric_medical I
							WHERE I.id_pacient = Pa.id_pacient and I.castrat = 'D')";
			$result = $con->query($sql1);

            if (!$result) {
				die("Invalid query: " . $con->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
				
                echo "<tr>
                    <td>" . $row["numep"] . "</td>
                    <td>" . $row["specie"] . "</td>
                    <td>" . $row["rasa"] . "</td>
                    <td>" . $row["data_nasterii"] . "</td>
                    <td>" . $row["sex"] . "</td>
                    <td>" . $row["greutate"] . "</td>
                </tr>";
			}
            ?>
        </tbody>
    </table></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 

</body>

</html>