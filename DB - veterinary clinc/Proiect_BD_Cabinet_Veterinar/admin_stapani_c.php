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
<center><titlu_homepage>Stapanii de catei</titlu_homepage></center>
<br><br>

<center><table id="customers">
        <thead>
			<tr>
				<th>Nume</th>
				<th>Nr. telefon</th>
				<th>E-mail</th>
				<th>Adresa</th>
			</tr>
		</thead>

        <tbody>
            <?php
            // read all rows from database table
			$sql1 = "SELECT nume, prenume, nr_telefon, e_mail, oras, judet_sector, strada, nr_strada
					FROM Stapani
					WHERE id_stapan in 
							(SELECT S.id_stapan
							FROM Stapani S, Pacienti P
							WHERE P.specie = 'catel' and P.id_stapan = S.id_stapan)";
			$result = $con->query($sql1);

            if (!$result) {
				die("Invalid query: " . $con->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
				
                echo "<tr>
                    <td>" . $row["nume"] . " " . $row["prenume"] . "</td>
                    <td>" . $row["nr_telefon"] . "</td>
                    <td>" . $row["e_mail"] . "</td>
                    <td>" . $row["oras"] . ", " . $row["judet_sector"] . ", " . $row["strada"] . " " . $row["nr_strada"] . "</td>
                </tr>";
			}
            ?>
        </tbody>
    </table></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>