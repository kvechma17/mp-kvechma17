<?php

include "../db.php";
session_start();

if (ctype_alpha($_POST["password"])) {
	echo "Zadané heslo musí obsahovat alespoň jedno číslo!";
	echo "<br>";
	echo "<a href='register.php'>Zkus to znovu !</a>";
} elseif (ctype_alpha($_POST["email"])) {
	echo "Email nesmí obsahovat jiné než povolené znaky";
} elseif (!empty($_POST['email']) AND !empty($_POST['password'])) {

	$password = hash('sha512', $_POST["password"]);
	$sql = "INSERT INTO projekt_prihlaseni (`email`, `password`) VALUES (:email, :password)";
	$priprava = $db->prepare($sql);
	$pole_dat = array('email' => $_POST['email'], ':password' => $password);
	$priprava->execute($pole_dat);
	header("location: /Prihlaseni/login.php");
	}  else {
		echo $_POST['email'];
		echo $_POST['password'];
} 



?>
