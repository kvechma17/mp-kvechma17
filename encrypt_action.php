<?php
	session_start();

	include "../db.php";

	$zprava = $_POST["message"];
	$encryption_key = $_POST["key"];
	echo $_POST['id'];
	define('AES_256_CBC', 'aes-256-cbc');

	$iv = "1234567891234567";
	echo "Zpráva: $zprava\n";
	echo "<br>";
	echo "Encryption key: $encryption_key";
	echo "<br>";
	echo "IV : $iv";
	echo "<br>";

	$encrypted = openssl_encrypt($zprava, AES_256_CBC, $encryption_key, 0, $iv);
	echo "Encrypted: $encrypted\n";
	echo "<br>";

	$encrypted = $encrypted . ':' . base64_encode($iv);
	$parts = explode(':', $encrypted);

	$id_user = $_POST['id'];
	echo $id_user;
	if (!empty($_POST['message']) AND !empty($_POST['key'])) {

		$sql = "INSERT INTO projekt_kryptografie (`id_user`, `zprava`, `klic`) VALUES (:id_user, :zprava, :klic) ";
		$priprava = $db->prepare($sql);
		$poledat = array('id_user' => $id_user,
					 'zprava' => $zprava,
					 'klic' => $encryption_key);
		$priprava->execute($poledat);

	} else {

		echo "Fill the informations";
	}

//	$decrypted = openssl_decrypt($parts[0], AES_256_CBC, $encryption_key, 0, base64_decode($parts[1]));
//	echo "Decrypted: $decrypted\n";

?>