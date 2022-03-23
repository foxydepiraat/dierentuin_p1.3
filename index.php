<!doctype html>
<head>
	<title>
		inloggen bij blijdorp
	</title>
	<link rel="stylesheet" href="styles.css" />
</head>
<form method="POST">
<div id="loginDiv">

	username:<input type="text" name="textgebruiker" style="width: 175px;" id="username"/></br>
	Password:<input type="password" name="textPassword" style="width: 175px;" id="password"/></br>

	<input type="submit" name="btnlogin" value="login" 
	style="width: 175px; height: 20px; background-color: rgb(232, 255, 198);  border-color: green;" id="btnlogin"/>
</div>	
</form>

<?php
	session_start();
	if(isset($_POST['btnlogin']))
	{
	//controleren of gebruikersnaam en wachtwoord juist is
	if($_POST['textgebruiker'] == "Admin" && $_POST['textPassword'] == "Admin")
	{
	//knop naar home pagina
		Header("location: home.php");
	}
	else {
		echo "Uw gebruikersnaam of wachtwoord is onjuist";
	}
}

?>