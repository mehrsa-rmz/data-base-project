<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$query = "select * from stapani where id_stapan = '$_GET[id_s]' limit 1";
	$result = mysqli_query($con, $query);
	$stapan = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="my_style.css">
</head>

<body class="bkg2">

<poz_sageata><a href="admin_stapani1.php"><img src="img\sageata.png" alt="sageata"><text_inapoi_la> inapoi la tabelul cu stapani</text_inapoi_la></a></poz_sageata>
<br><br><br><br><br><br><br>
<center><img src="img\titlu1.png" alt="logo clinica"></center>
<center><titlu_homepage><?php echo $stapan['nume'],' ',$stapan['prenume']?>: Animale</titlu_homepage></center>
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
				<th>Informatii</th>
				<th>Editare</th>
			</tr>
		</thead>

        <tbody>
            <?php
			$id = $stapan['id_stapan'];
            // read all rows from database table
			$sql1 = "SELECT P.id_stapan, id_pacient, P.numep, specie, rasa, data_nasterii, sex, greutate
					FROM stapani S inner join pacienti P on S.id_stapan = P.id_stapan
					WHERE S.id_stapan = '$id'";
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
					<td>
                        <center><a href='admin_stapani3.php?id_i=".$row['id_pacient']."'><input type='submit' value='Istoric'></a> &nbsp;&nbsp;
						<a href='admin_stapani4.php?id_c=".$row['id_pacient']."'><input type='submit' value='Consultatii'></a></center>
                    </td>
					<td>
                        <center><a href='edit_pacient.php?id_p=".$row['id_pacient']."'><input type='submit' value='Edit'></a> &nbsp;&nbsp;
                        <a href='delete_pacient.php?id_p=".$row['id_pacient']."'><input type='submit' value='Delete'></a></center>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table></center>
	<br><br><br>
	<center><?php echo "<a href='insert_pacient.php?id_s=".$stapan['id_stapan']."'><input type='button' value='Insereaza un animal in tabel' class='button_homepage_stapan'></a>"; ?></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>