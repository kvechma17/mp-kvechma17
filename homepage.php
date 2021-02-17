<?php

session_start();
include "../db.php";

  if($_SESSION["logged"] == "OK") {
  	echo "Přihlášen jako:\n" . $_SESSION['email'];
  } else {
      header('Location: /Prihlaseni/login.php');  
  }
?>


<!DOCTYPE html>	
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<a href="logout.php"><p class="logout">Odhlásit se</p></a><br>
</head>
<body>	

	<div id="newsletter" class="container">
		<div class="title">
			<h2>Šifrování textu</h2>
		<div class="content">
			<form method="POST" action="encrypt_action.php">

					<input type="hidden" name="id" value="<?php echo $_SESSION['id']?>"></input>

				<div class="row half">

					<div>
						<textarea name="message"  placeholder="Zde napište text pro zašifrování"></textarea>
					</div>

					<div>
						<input type="text" name="key" placeholder="Klíč pro zašifrování"></input>
					</div>

				</div>

				<div class="kategorie">

						<select value="kategorie" class="text">
							<option value="AES">AES 256</option>
						</select>

				</div>

				<div class="row">

					<div class="12u">

						<input type="submit" name="Odeslat" value="Odeslat" class="button_submit">

					</div>

				</div>

			</form>
		</div>
	</div>

</body>
</html>