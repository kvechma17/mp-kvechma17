<!DOCTYPE html>
<html>
<head>
	<title>Registrace</title>
	<link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>

<div class="container">

    <form id="signup" action="/Registrace/register_action.php" method="POST">

        <div class="header">
        
            <h3>Registrace</h3>
            
        </div>
        
        <div class="sep"></div>

        <div class="inputs">
        
            <input type="email" name="email" placeholder="Email"><br>
			<input type="password" name="password" placeholder="Password"><br>
			<a href="/Prihlaseni/login.php" id="Login">Přihlášení</a>
			<input type="submit" name="Registrovat" value="Registrovat" id="submit">
        	
        </div>

    </form>

</div>
​
</body>
</html>

