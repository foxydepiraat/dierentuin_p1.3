
<?php
    require ("dierDB.php");

    $query1= "SELECT * FROM dier NATURAL JOIN dierverblijf_id NATURAL JOIN verblijf ORDER BY naam asc";
    $stm=$conn->prepare($query1);
    $stm->execute();
    $dier = $stm->fetchAll(PDO::FETCH_OBJ); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        DIEREN LIJST
    </title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div id="overzicht">
    <form method="POST">
        <!--knop naar home pagina -->
        <input type="submit" name="btnHome" value="HOME"
        style="width: 150px; height: 25px; background-color: rgb(232, 255, 198);  border-color: green;"/>
        <?php
            if(isset($_POST['btnHome'])){
                header('location:home.php');
            }
        ?></br>
        <!-- overzicht van de dierenlijst voor het zoeken -->
        dier naam:<input type="text" name="txtnaam"/>
        dier soort:<input type="text" name="txtsoort" />
        gedrag: <select name="gedrag">
                    <option value="kalm">kalm           </option>
                    <option value="agressief">agressief </option>
                </select></br>
        gebied: <select  name="gebied">
                    <option value="">                   </option>
                    <option value="Afrika">       Afrika</option>
                    <option value="Australië">    Australië</option>
                    <option value="Azië">         Azië</option>
                    <option value="Europa">       Europa</option>
                    <option value="Oceanium">     Oceanium</option>
                    <option value="Noord-Amerika">Noord-Amerika</option>
                    <option value="Zuid-Amerika"> Zuid-Amerika</option>
                </select>
        veblijf nummer:<input type="text" Name="txtVerblijfNum"/><br/>
        <input type="submit" name="btnZoek" value="ZOEK"
        style="width: 150px; height: 25px; background-color: rgb(232, 255, 198);  border-color: green;"/>
        <input type="submit" name="btnNaam" value="sorteren op naam"
        style="width: 150px; height: 25px; background-color: rgb(232, 255, 198);  border-color: green;"/>
        <input type="submit" name="btnSoort" value="sorteren op soort"
        style="width: 150px; height: 25px; background-color: rgb(232, 255, 198);  border-color: green;"/>
    </form>
    </div>
    <div id="everything">
            
            <?php

            if(isset($_POST['btnZoek'])){
                
                
                $txtnaam=$_POST['txtnaam'];
                $txtsoort=$_POST['txtsoort'];
                $gedrag=$_POST['gedrag'];
                
                $query1="SELECT * FROM dier natural JOIN dierverblijf_id natural JOIN  verblijf WHERE naam LIKE '%$txtnaam%' AND soort LIKE '%$txtsoort%' AND gedrag = '$gedrag' ";
                $stm=$conn->prepare($query1);
                $stm->execute();
                
                $dier=$stm->fetchAll(PDO::FETCH_OBJ);
                

                
            }       
            
        ?>
    </div>
    <div id="tabel">
    <!-- de overzicht van alle dieren -->
    <table>
        <tr>
            <th>dier ID</th>
            <th>dier naam</th>
            <th>dier soort</th>
            <th>gedrag</th>
            <th>verblijf ID</th>
            <th>verblijf nummer</th>
            <th>gebied</th>
            <th>Aanpassen</th>
        </tr>
        
        <?php

        if(isset($_POST['btnNaam'])){
            
            $query = "SELECT * FROM dier natural JOIN dierverblijf_id natural JOIN  verblijf ORDER BY naam asc;";
            $stm=$conn->prepare($query);
            if($stm->execute() == true)
            {
                $dier = $stm->fetchAll(PDO::FETCH_OBJ);
                
            }else {
                echo "query mislukt";
            }
        }
        if(isset($_POST['btnSoort'])){
            $query = "SELECT * FROM dier natural JOIN dierverblijf_id natural JOIN  verblijf ORDER BY soort asc;";
            $stm=$conn->prepare($query);
            if($stm->execute())
            {
                $dier = $stm->fetchAll(PDO::FETCH_OBJ);
                
            }else {
                echo "query mislukt";
            }
        }
            foreach($dier as $item){
                    echo "<tr>";
                    echo "<Td>$item->dier_id</td>";
                    echo "<Td>$item->naam</td>";
                    echo "<td>$item->soort</td>";
                    echo "<td>$item->gedrag</td>";
                    echo "<td>$item->verblijf_id</td>";
                    echo "<td>$item->verblijf_num</td>";
                    echo "<td>$item->gebied</td>";
                    echo "<td><a href='aanpassen.php?ID=$item->dier_id'>wijzigen<a></td>";
                    echo "</tr>";
            }
            ?>
            </table>
    </div>

            

            

</body>
</html>
</div>