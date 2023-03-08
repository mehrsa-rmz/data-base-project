<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "cabinet_veterinar";

if(!($con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)))
{

	die("<font color=red>Eroare la conectare!</font>");
}

