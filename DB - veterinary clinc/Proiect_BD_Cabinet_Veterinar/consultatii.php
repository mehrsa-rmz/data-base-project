<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$query = "select * from PACIENTI where id_pacient = '$_GET[id_c]' limit 1";
	$result = mysqli_query($con, $query);
	$pacient = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="my_style.css">
</head>

<body class="bkg2">

<poz_sageata><a href="animale.php"><img src="img\sageata.png" alt="sageata"><text_inapoi_la> inapoi la animalele mele</text_inapoi_la></a></poz_sageata>
<br><br><br><br><br><br><br>
<center><img src="img\titlu1.png" alt="logo clinica"></center>
<center><titlu_homepage><?php echo $pacient['numep']?>: Consultatii</titlu_homepage></center>
<br><br>

<center><table id="customers">
        <thead>
			<tr>
				<th>Tipul de consultatie</th>
				<th>Personal medical responsabil</th>
				<th>Data consultatiei</th>
			</tr>
		</thead>

        <tbody>
            <?php
			$id = $pacient['id_pacient'];
            // read all rows from database table
			$sql1 = "SELECT descriere, P.nume, P.prenume, C.data_consultatie
					FROM personal_medical P inner join tip_consultatii T on P.id_personal = T.id_personal 
								 inner join consultatii_pacienti C  on C.id_consultatie = T.id_consultatie
								 inner join Pacienti Pa on Pa.id_pacient = C.id_pacient
					WHERE Pa.id_pacient ='$id'";
			$result = $con->query($sql1);

            if (!$result) {
				die("Invalid query: " . $con->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
				
                echo "<tr>
                    <td>" . $row["descriere"] . "</td>
                    <td>" . $row["nume"] . " " . $row["prenume"] . "</td>
                    <td>" . $row["data_consultatie"] . "</td>
                </tr>";
			}
            ?>
        </tbody>
    </table></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>

