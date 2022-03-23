<!doctype html>
<html>
    <head>
        <title>
            dierentuin blijdorp
        </title>
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
        
        <form method="POST">
            <div id="homeDiv">
            
            <input type="submit" name="btnLogin"  value="UITLOGGEN" 
            style="width: 200px; height: 30px; background-color: rgb(232, 255, 198); border-color: green;"/>

            <input type="submit" name="btnToevoegen" value="DIEREN TOEVOEGEN"
            style="width: 200px; height: 30px; background-color: rgb(232, 255, 198);  border-color: green;"/>

            <input type="submit" name="btnErbij" value="DIEREN LIJST"
            style="width: 200px; height: 30px; background-color: rgb(232, 255, 198);  border-color: green;"/>
            </div>
        </form>
    <?php
    session_start();
    if(isset($_POST['btnLogin']))  
    {  
        header('location:index.php');
    }
    if(isset($_POST['btnZoeken']))
    {
        header('location:zoeken.php');
    }
    if(isset($_POST['btnToevoegen']))
    {
        header('location:dierenToevoegen.php');
    }
    if(isset($_POST['btnErbij']))
    {
        header('location:dierenLijst.php');
    }
    ?>
</body>
</html>
