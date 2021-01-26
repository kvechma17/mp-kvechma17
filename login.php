<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../form.css">
</head>
<body>

<div class="container">

    <form id="signup" action="login_action.php" method="POST">

        <div class="header">
        
            <h3>Přihlášení</h3>	

        </div>
        
        <div class="sep"></div>

        <div class="inputs">  
           
			<input type="email" name="email" placeholder="Email"><br>
			<input type="password" name="password" placeholder="Password"><br>
			<a href="../index.php">Registrace</a>
			<input type="submit" name="Prihlasit" value="Prihlasit" id="submit">
		  
        </div>

    </form>

</div>
​
</body>
</html>

