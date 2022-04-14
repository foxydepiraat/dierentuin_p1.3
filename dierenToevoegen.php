<!DOCTYPE html>
<?php

require ("dierDB.php");


?>

<head>
    <title>
        dieren toevoegen
    </title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form method="POST">
        <div id="toevoegen">
        <!-- knop naar home -->
        <input type="submit" name="btnHome" value="HOME" class="homebtn"/><br/>
        <?php
            if(isset($_POST['btnHome'])){
                header('location:home.php');
            }
        ?>
        <!-- formulier voor de dieren in de lijst te zetten -->
        diersoort:<input type="text"   name="txtDier" /><br/>
        diername: <input type="text"   name="txtName" /><br/>
        
        gedrag:   <select  name="gedrag">
                    <option value="kalm">     kalm</option>
                    <option value="agressief">agressief</option>
                  </select><br/>
                  <input type="submit" name="btnErbij" value="TOEVOEGEN" class="homebtn"/>
        </div>
</form>
        <div id="Koppelen">
        <form method="POST">
    
        verblijf nummer en gebied:<select  name="gebied">
                                    <?php 
                                    $query = "SELECT * FROM verblijf WHERE verblijf_id NOT IN(SELECT verblijf_id FROM dierverblijf_id)";
                                    $stm=$conn->prepare($query);
                                    if($stm->execute())
                                    {
                                        while($verblijf = $stm->fetch(PDO::FETCH_ASSOC)){
                                            echo "<option value='".$verblijf['verblijf_num']."' >".$verblijf['verblijf_num']."-".$verblijf['gebied']."<option/>";
                                        }
                                    }else {
                                        echo "query mislukt <br/>";
                                    }
                                    ?>
                                    </select><br/>
                    
                dier naam en dier soort:   <select  name="dierID">
                    <?php 
                    $query1 = "SELECT * FROM dier WHERE dier_id NOT IN(SELECT dier_id FROM dierverblijf_id)";
                    $stm=$conn->prepare($query1);
                    if($stm->execute())
                    {
                        while($dierNaam = $stm->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='".$dierNaam['naam']."' >".$dierNaam['naam']."-".$dierNaam['soort']."<option/>";
                        }
                    }else {
                        echo "query mislukt";
                    }
                        
                    
                    
                    ?>
                    
                  </select>
<br/>
        <input type="submit" name="btnKoppelen" value="KOPPELEN" `
        style="width:200px; background-color: rgb(232, 255, 198); border-color:green;"/>
        
        
    </form>
    <?php
        if(isset($_POST['btnErbij']))
        {
            $txtDier=$_POST['txtDier'];
            $txtName=$_POST['txtName'];
            $gedrag=$_POST['gedrag'];
            
            
            $query="INSERT INTO dier (soort, naam, gedrag) values('$txtDier', '$txtName', '$gedrag')";
            $stm=$conn->prepare($query);
			$stm->execute();
        }
        if(isset($_POST['btnKoppelen'])){

            $dierID=$_POST['dierID'];

            $query2="SELECT dier_id FROM dier WHERE naam='$dierID'";
            $stm=$conn->prepare($query2);
            $stm->execute();
            $dierID=$stm->fetch(PDO::FETCH_OBJ);

            $verblijfNum=$_POST['gebied'];

            $query3="SELECT verblijf_id FROM verblijf WHERE verblijf_num=$verblijfNum ";
            $stm=$conn->prepare($query3);
            $stm->execute();
            $verblijfID=$stm->fetch(PDO::FETCH_OBJ);
            

            $query4="INSERT INTO dierverblijf_id ( dier_id, verblijf_id) values($dierID->dier_id,'$verblijfID->verblijf_id' )";
            $stm=$conn->prepare($query4);   
            if($stm->execute()){
                echo "gelukt";
                header('location:dierentoevoegen.php');
            }
        }

    ?>
        </table>
        </div>
            
            <div id="verblijfOverzicht">
        <table>
            <tr>
                <th>verblijf ID</th>
                <th>verblijf nummer</th>
                <th>gebied</th>
            </tr>
            <?php
            $query = "SELECT * FROM verblijf  WHERE verblijf_id NOT IN(SELECT verblijf_id FROM dierverblijf_id) ORDER BY verblijf_num asc;";
            $stm=$conn->prepare($query);
            if($stm->execute() == true)
            {
                $verblijf = $stm->fetchAll(PDO::FETCH_OBJ);
        
            }else {
                echo "query mislukt";
            }
                 foreach($verblijf as $item){
                    echo "<tr>";
                    echo "<td>$item->verblijf_id</td>";
                    echo "<td>$item->verblijf_num</td>";
                    echo "<td>$item->gebied</td>";
                    echo "</tr>";
                 }
                 
                 
                 ?>



        </table>
        </div>



</body>
