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
<center><titlu_homepage>Stapanii pacientiilor</titlu_homepage></center>
<br><br>

<center><table id="customers">
        <thead>
			<tr>
				<th>Nume</th>
				<th>Nr. telefon</th>
				<th>E-mail</th>
				<th>Adresa</th>
				<th>Nr. Animale</th>
				<th>Informatii</th>
				<th>Editare</th>
			</tr>
		</thead>

        <tbody>
            <?php
			// read all rows from database table
			$sql1 = "SELECT S.id_stapan, S.nume, S.prenume, nr_telefon, e_mail, oras, judet_sector, strada, nr_strada, (SELECT count(PA.id_pacient) FROM Pacienti Pa WHERE S.id_stapan = Pa.id_stapan GROUP BY S.nume, S.prenume) as 'nr_animale'
					FROM Stapani S left join Pacienti P on S.id_stapan = P.id_stapan
					WHERE S.id_stapan not in (SELECT id_stapan FROM stapani WHERE e_mail = 'admin@pinkpaws.com')
					";
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
					<td>" . $row["nr_animale"] . "</td>
					<td>
                        <center><a href='admin_stapani2.php?id_s=".$row['id_stapan']."'><input type='submit' value='Animale'></a></center>
                    </td>
					<td>
                        <center><a href='edit_stapan.php?id_s=".$row['id_stapan']."'><input type='submit' value='Edit'></a> &nbsp;&nbsp;
                        <a href='delete_stapan.php?id_s=".$row['id_stapan']."'><input type='submit' value='Delete'></a></center>
                    </td>
                </tr>";
			}
            ?>
        </tbody>
    </table></center>
	<br><br><br>
	<center><a href='insert_stapan.php'><input type="button" value="Insereaza o persoana in tabel" class="button_homepage_stapan"></a></center>
<br><br><br>

</body>

</html>