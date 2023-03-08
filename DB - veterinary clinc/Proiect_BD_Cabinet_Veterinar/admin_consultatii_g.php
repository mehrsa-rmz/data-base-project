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
<center><titlu_homepage>Servicii medicina veterinara generala</titlu_homepage></center>
<br><br>

<center><table id="customers">
        <thead>
			<tr>
				<th>Denumire</th>
				<th>Nr. consultatii</th>
			</tr>
		</thead>

        <tbody>
            <?php
            // read all rows from database table
			$sql1 = "SELECT T.descriere, count(CP.id_consultatie) as 'nr_consultatii'
					FROM Tip_consultatii T inner join Consultatii_Pacienti CP on T.id_consultatie=CP.id_consultatie
					WHERE T.id_consultatie in 
							(SELECT Tp.id_consultatie
							FROM Tip_consultatii Tp, Specializari S, Personal_medical P
							WHERE S.denumire = 'General' and S.id_specializare = P.id_specializare and P.id_personal = T.id_personal)
					GROUP BY T.descriere";
			$result = $con->query($sql1);

            if (!$result) {
				die("Invalid query: " . $con->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
				
                echo "<tr>
                    <td>" . $row["descriere"] . "</td>
                    <td>" . $row["nr_consultatii"] . "</td>
                </tr>";
			}
            ?>
        </tbody>
    </table></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>