<?php
 require('dierDB.php')
?>
<!doctype html>
<head>
	<title>
		inloggen bij blijdorp
	</title>
	<link rel="stylesheet" href="home.css" />
</head>
<form method="POST">
<div id="loginDiv">

	username:<input type="text" name="textgebruiker" style="width: 175px;" id="username"required/></br>
	Password:<input type="password" name="textPassword" style="width: 175px;" id="password" required/></br>

	<input type="submit" name="btnlogin" value="login" 
	style="width: 120px; height: 20px; background-color: rgb(232, 255, 198);  border-color: green;" id="btnlogin"/>
	<input type="submit" name="btnRegri" value="regristreren"
	style="width: 120px; height: 20px; background-color: rgb(232, 255, 198);  border-color: green;"/>

	
	
	
</form>

<?php
	if(isset($_POST['btnRegri'])){
		$query1="SELECT * FROM login";
		$stm=$conn->prepare($query1);
		$stm->execute();

		$result=$stm->fetchAll(PDO::FETCH_OBJ);
	
	//controleren of gebruikersnaam en wachtwoord juist is
	foreach($result as $item)
		if($_POST['textgebruiker'] == "$item->naam" && $_POST['textPassword'] != "$item->wachtwoord"){
			$naam=$_POST['textgebruiker'];
			$wachtwoord=$_POST['textPassword'];
		
			$query= "INSERT INTO login (naam, wachtwoord)values ('$naam','$wachtwoord')";
			$stm= $conn->prepare($query);
			if($stm->execute()){
				echo "gelukt";
			}else echo "dit account bestaat al";
		}
	}
	if(isset($_POST['btnlogin']))
	{
		$query1="SELECT * FROM login";
		$stm=$conn->prepare($query1);
		$stm->execute();

		$result=$stm->fetchAll(PDO::FETCH_OBJ);
	
	//controleren of gebruikersnaam en wachtwoord juist is
	foreach($result as $item)
		if($_POST['textgebruiker'] == "$item->naam" && $_POST['textPassword'] == "$item->wachtwoord")
		{
		//knop naar home pagina
			Header("location: home.php");
		}else echo "verkeerde usernaam of wachtwoord ";
	}
	
?>
</div>
