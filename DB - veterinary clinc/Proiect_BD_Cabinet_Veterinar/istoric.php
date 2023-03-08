<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$query = "select * from PACIENTI where id_pacient = '$_GET[id_i]' limit 1";
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
<center><titlu_homepage><?php echo $pacient['numep']?>: Istoric medical</titlu_homepage></center>
<br><br>

<center><table id="customers">
        <thead>
			<tr>
				<th>Probleme ereditare</th>
				<th>Probleme anterioare</th>
				<th>Probleme curente</th>
				<th>Castrat</th>
				<th>Vaccinat</th>
				<th>Deparazitat intern</th>
				<th>Deparazitat extern</th>
			</tr>
		</thead>

        <tbody>
            <?php
			$id = $pacient['id_pacient'];
            // read all rows from database table
			$sql1 = "SELECT probleme_ereditare, probleme_anterioare, probleme_curente, castrat, vaccinat, deparazitat_intern, deparazitat_extern
					FROM istoric_medical I inner join pacienti P on I.id_pacient = P.id_pacient
					WHERE P.id_pacient = '$id'";
			$result = $con->query($sql1);

            if (!$result) {
				die("Invalid query: " . $con->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
				
                echo "<tr>
                    <td>" . $row["probleme_ereditare"] . "</td>
                    <td>" . $row["probleme_anterioare"] . "</td>
                    <td>" . $row["probleme_curente"] . "</td>
                    <td>" . $row["castrat"] . "</td>
                    <td>" . $row["vaccinat"] . "</td>
                    <td>" . $row["deparazitat_intern"] . "</td>
					<td>" . $row["deparazitat_extern"] . "</td>

                </tr>";
			}
            ?>
        </tbody>
    </table></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>