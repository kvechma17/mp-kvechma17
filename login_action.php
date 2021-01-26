<?php

include "../db.php";
session_start();

if (ctype_alpha($_POST["password"])) {
	echo "Zadané heslo musí obsahovat alespoň jedno číslo!";
	echo "<br>";
	echo "<a href='login.php'>Zkus to znovu !</a>";
} elseif (ctype_alpha($_POST["email"])) {
	echo "Email nesmí obsahovat jiné než povolené znaky";
	echo "<br>";
	echo "<a href='login.php'>Zkus to znovu !</a>";
} elseif (strlen($_POST['password']) < 6) {
	echo "Heslo musí obsahovat minimálně 6 znaků a minimálně jedno číslo.";
	echo "<br>";
	echo "<a href='login.php'>Zkus to znovu !</a>";
} elseif (isset($_POST["Prihlasit"])) {

	$email = $_POST['email'];
	$password = hash('sha512', $_POST["password"]);
	$sql = "SELECT * FROM projekt_prihlaseni WHERE `email`= :email AND `password`= :password";
	$pole_dat = array('email' => $email, 'password' => $password );
	$priprava = $db->prepare($sql);
	$priprava->execute($pole_dat);
	$data= $priprava->fetchall();

	if ($data == FALSE) {
		header('location: login.php');
	} else {
		$_SESSION['loggedIn'] = true;  
		header('location: /Homepage/homepage.php');
	}
 }

?>

