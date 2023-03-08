<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$query = "select * from personal_medical where id_personal = '$_GET[id_pm]' limit 1";
	$result = mysqli_query($con, $query);
	$personal = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="my_style.css">
</head>

<body class="bkg2">

<poz_sageata><a href="admin_personal1.php"><img src="img\sageata.png" alt="sageata"><text_inapoi_la> inapoi la tabelul cu personalul medical</text_inapoi_la></a></poz_sageata>
<br><br><br><br><br><br><br>
<center><img src="img\titlu1.png" alt="logo clinica"></center>
<center><titlu_homepage><?php echo $personal['nume'],' ',$personal['prenume']?>: Consultatii</titlu_homepage></center>
<br><br>
<center><table id="customers">
        <thead>
			<tr>
				<th>Tipul consultatiei</th>
				<th>Numele pacientului</th>
				<th>Numele stapanului</th>
				<th>Data consultatiei</th>
			</tr>
		</thead>

        <tbody>
            <?php
			$id = $personal['id_personal'];
            // read all rows from database table
			$sql1 = "SELECT T.descriere, Pa.numep, S.nume, S.prenume, C.data_consultatie
					FROM Personal_medical P inner join Tip_consultatii T on P.id_personal = T.id_personal 
								 inner join Consultatii_Pacienti C  on C.id_consultatie = T.id_consultatie
								 inner join Pacienti Pa on Pa.id_pacient = C.id_pacient 
								 inner join Stapani S on S.id_stapan = Pa.id_stapan
					WHERE P.id_personal = '$id'";
			$result = $con->query($sql1);

            if (!$result) {
				die("Invalid query: " . $con->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
				
                echo "<tr>
                    <td>" . $row["descriere"] . "</td>
                    <td>" . $row["numep"] . "</td>
                    <td>" . $row["nume"] . " " . $row["prenume"] . "</td>
                    <td>" . $row["data_consultatie"] . "</td>

                </tr>";
			}
            ?>
        </tbody>
    </table></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>