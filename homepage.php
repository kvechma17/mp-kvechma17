<?php
session_start();
  if($_SESSION['loggedIn']) {

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
			<form method="POST" action="HomepageNapsatUkol_action.php">

				<div class="row half">

					<div class="12u">
						<textarea name="Ukol" placeholder="Zde napište text pro zašifrování"></textarea>
					</div>

				</div>

				<div class="kategorie">
						<select name="kategorie_ukol" value="kategorie_ukol" class="text">
							<option value="School">School</option>
							<option value="Personal">Personal</option>
							<option value="Important">Important</option>
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