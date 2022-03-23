<!DOCTYPE html>
<html>
<?php
session_start();
//database
$host = "localhost";
$dbname = "dierentuinblijdorp";
$user = "root";
$password = "";

//database checken als hij kan verbinden
try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user, $password);
    
    }catch(PDOException $ex){
        echo "verbinding mislukt"."<br>";
    }
?>
</html>
