<?php

include "../db.php";
session_start();

$email = $_POST['email'];
$query = $db->prepare( "SELECT `email` FROM `projekt_prihlaseni` WHERE `email` = '$email'" );
$query->bindValue( 1, $email );
$query->execute();

$pass = $_POST['password'];
$pass_check = $_POST['password2'];

if (ctype_alpha($_POST["password"])) {
	echo "Zadané heslo musí obsahovat alespoň jedno číslo!";
	echo "<br>";
	echo "<a href='../index.php'>Zkus to znovu !</a>";
} elseif (ctype_alpha($_POST["email"])) {
	echo "Email nesmí obsahovat jiné než povolené znaky";
	echo "<br>";
	echo "<a href='../index.php'>Zkus to znovu !</a>";
} elseif (strlen($_POST['password']) < 6) {
	echo "Heslo musí obsahovat minimálně 6 znaků a jedno číslo.";
	echo "<br>";
	echo "<a href='../index.php'>Zkus to znovu !</a>";
} elseif ($query->rowCount() > 	0) {
	echo "Email je již zaregistrován"; 
	echo "<br>";
	echo "<a href='../index.php'>Zkus to znovu !</a>";
} elseif ($pass != $pass_check){
	echo "Zadané hesla se neshodují";
	echo "<br>";
	echo "<a href='../index.php'>Zkus to znovu !</a>";
} elseif (!empty($_POST['email']) && !empty($_POST['password'])) {

	$password = hash('sha512', $_POST["password"]);
	$sql = "INSERT INTO projekt_prihlaseni (`email`, `password`) VALUES (:email, :password)";
	$priprava = $db->prepare($sql);
	$pole_dat = array('email' => $_POST['email'], ':password' => $password);
	$priprava->execute($pole_dat);
	header("location: /Prihlaseni/login.php");
}  else {
	echo "Vyplňte prosím chybějící informace";
	echo "<br>";
	echo "<a href='../index.php'>Zkus to znovu !</a>";
} 



?>
