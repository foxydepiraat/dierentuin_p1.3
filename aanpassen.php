<?php 
    require('dierDB.php');

    $dier_id=$_GET['ID'];
    

    $query = "SELECT * FROM dier WHERE dier_id=$dier_id";
    $stm = $conn->prepare($query);
    if($stm->execute()){
        $item = $stm->fetch(PDO::FETCH_OBJ);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aanpassen</title>
    <link rel="stylsheet" href="styles.css"/>
</head>
<div id="wijzig">
<body>
    <form method="POST">
        <input type="text" name="txtNaam" value="<?php echo "$item->naam";?>"/>
        <!-- <select name="verblijf"/> -->

        <!-- </select> --> 
        <input type="submit" name="btnSave" value="WIJZIG"
        style="width: 150px; height: 25px; background-color: rgb(232, 255, 198);  border-color: green;"/>
    </form>
    <?php
        //$Naam=$_POST['txtNaam'];

    ?>
</body>
</div>
</html>