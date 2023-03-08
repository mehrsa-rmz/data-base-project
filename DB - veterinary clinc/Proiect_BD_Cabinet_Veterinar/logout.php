<?php

session_start();

if(isset($_SESSION['id_stapan']))
{
	unset($_SESSION['id_stapan']);

}

header("Location: login.php");
die;