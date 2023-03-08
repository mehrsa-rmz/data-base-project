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
<center><titlu_homepage>Specializarile clinicii</titlu_homepage></center>
<br><br>

<center><table id="customers">
        <thead>
			<tr>
				<th>Denumire</th>
				<th>Nr. angajati</th>
			</tr>
		</thead>

        <tbody>
            <?php
            // read all rows from database table
			$sql1 = "SELECT S.denumire, Count(P.id_personal) as 'nr_angajati'
					FROM Specializari S inner join Personal_medical P on P.id_specializare = S.id_specializare
					GROUP BY S.denumire";
			$result = $con->query($sql1);

            if (!$result) {
				die("Invalid query: " . $con->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
				
                echo "<tr>
                    <td>" . $row["denumire"] . "</td>
                    <td>" . $row["nr_angajati"] . "</td>
                </tr>";
			}
            ?>
        </tbody>
    </table></center>
<br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>