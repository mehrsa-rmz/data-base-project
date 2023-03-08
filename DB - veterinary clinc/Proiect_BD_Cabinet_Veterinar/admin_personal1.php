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
<center><titlu_homepage>Personalul medical</titlu_homepage></center>
<br><br>

<center><table id="customers">
        <thead>
			<tr>
				<th>Nume</th>
				<th>Specializare</th>
				<th>Grad medical</th>
				<th>Nr. telefon</th>
				<th>E-mail</th>
				<th>Consultatii</th>
				<th>Editare</th>
			</tr>
		</thead>

        <tbody>
            <?php
			// read all rows from database table
			$sql1 = "SELECT id_personal, P.nume, P.prenume, S.denumire, P.grad_medical , nr_telefon, e_mail
					FROM personal_medical P INNER JOIN specializari S on S.id_specializare = P.id_specializare";
			$result = $con->query($sql1);

            if (!$result) {
				die("Invalid query: " . $con->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
				
                echo "<tr>
                    <td>" . $row["nume"] . " " . $row["prenume"] . "</td>
                    <td>" . $row["denumire"] . "</td>
                    <td>" . $row["grad_medical"] . "</td>
                    <td>" . $row["nr_telefon"] . "</td>
                    <td>" . $row["e_mail"] . "</td>
					<td>
                        <center><a href='admin_personal2.php?id_pm=".$row['id_personal']."'><input type='submit' value='Consultatii'></a></center>
                    </td>
					<td>
                        <center><a href='edit_personal.php?id_pm=".$row['id_personal']."'><input type='submit' value='Edit'></a> &nbsp;&nbsp;
                        <a href='delete_personal.php?id_pm=".$row['id_personal']."'><input type='submit' value='Delete'></a></center>
                    </td>
                </tr>";
			}
            ?>
        </tbody>
    </table></center>
	<br><br><br>
	<center><a href='insert_personal.php'><input type="button" value="Insereaza o persoana in tabel" class="button_homepage_stapan"></a></center>
<br><br><br><br>

</body>

</html>