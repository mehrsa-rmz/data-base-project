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
<center><titlu_homepage>Analize recoltate</titlu_homepage></center>
<br><br>

<center><table id="customers">
        <thead>
			<tr>
				<th>Nume pacient</th>
				<th>Nume personal medical</th>
				<th>Data consultatiei</th>
			</tr>
		</thead>

        <tbody>
            <?php
            // read all rows from database table
			$sql1 = "SELECT Pa.numep, P.nume, P.prenume, C.data_consultatie
					FROM Tip_consultatii T inner join Consultatii_Pacienti C on T.id_consultatie = C.id_consultatie
								inner join Pacienti Pa on Pa.id_pacient = C.id_pacient
								inner join Personal_medical P on P.id_personal = T.id_personal
					WHERE T.descriere = 'Recoltare analize'";
			$result = $con->query($sql1);

            if (!$result) {
				die("Invalid query: " . $con->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
				
                echo "<tr>
                    <td>" . $row["numep"] . "</td>
                    <td>" . $row["nume"] . " " . $row["prenume"] . "</td>
					<td>" . $row["data_consultatie"] . "</td>
                </tr>";
			}
            ?>
        </tbody>
    </table></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>