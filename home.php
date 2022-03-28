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

            <div id="Europe">
                <input type="submit" name="btnEurope"  value="EUROPA" 
                style="width: 170px; height: 50px; background-color: rgba(106,57,24,255); border-color: rgba(106,57,24,255); color: white;"/>
            </div>

            <div id="Australië">
                <input type="submit" name="btnAustralië"  value="AUTRALIË" 
                style="width: 195px; height: 50px; background-color: rgba(241,170,82,255); border-color: rgba(241,170,82,255); color: white;"/>
            </div>

            <div id="Azië">
                <input type="submit" name="btnAzië"  value="AZIË" 
                style="width: 130px; height: 50px; background-color: rgba(158,203,139,255); border-color: rgba(158,203,139,255); color: white;"/>
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
    if(isset($_POST['btnEurope']))
    {
        header('location:https://nl.wikipedia.org/wiki/Europa_(werelddeel)');
    }
    if(isset($_POST['btnAustralië']))
    {
        header('location:https://nl.wikipedia.org/wiki/Australië_(land)');
    }
    if(isset($_POST['btnAzië']))
    {
        header('location:https://nl.wikipedia.org/wiki/Azië');
    }
    
    ?>
 </body>
</html>
