<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="my_style.css">
</head>

<body class="bkg2">

<poz_sageata><a href="homepage.php"><img src="img\sageata.png" alt="sageata"><text_inapoi_la> inapoi la pagina principala</text_inapoi_la></a></poz_sageata>
<br><br><br><br><br><br><br>
<center><img src="img\titlu1.png" alt="logo clinica"></center>
<center><titlu_homepage>Animalele mele</titlu_homepage></center>
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
			</tr>
		</thead>

        <tbody>
            <?php
			session_start();

			include("connection.php");
			include("functions.php");
			
			$user_data = check_login($con);
			$id = $_SESSION['id_stapan'];
            // read all rows from database table
			$sql1 = "SELECT id_pacient, P.numep, specie, rasa, data_nasterii, sex, greutate
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
                        <center><a href='istoric.php?id_i=".$row['id_pacient']."'><input type='submit' value='Istoric'></a> &nbsp;&nbsp;
						<a href='consultatii.php?id_c=".$row['id_pacient']."'><input type='submit' value='Consultatii'></a></center>
                    </td>

                </tr>";
            }
            ?>
        </tbody>
    </table></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>