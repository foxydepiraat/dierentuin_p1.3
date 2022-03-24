<?php
    require ("dierDB.php");
    $query = "SELECT * FROM dier ORDER BY naam asc;";
    $stm=$conn->prepare($query);
    if($stm->execute() == true)
    {
        $dier = $stm->fetchAll(PDO::FETCH_OBJ);
        
    }else {
        echo "query mislukt";
    }
    
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
        <a href="home.php">home</a><br/>
        <!-- overzicht van de dierenlijst voor het zoeken -->
        dier naam:<input type="text" name="txtnaam"/>
        dier soort:<input type="text" name="txtsoort"/>
        gedrag: <select name="gedrag">
                    <option value="">                   </option>
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
        <input type="submit" name="btnZoek" value="ZOEK"/>
    </form>
    <!-- de overzicht van alle dieren -->
    <table>
        <tr>
            <th>dier id</th>
            <th>dier naam</th>
            <th>dier soort</th>
            <th>gedrag</th>
            <th>gebied</th>
            <th>Verblijf nummer</th>
        </tr>
        
        <?php

            foreach($dier as $item){
                    echo "<tr>";
                    echo "<Td>$item->dier_id</td>";
                    echo "<Td>$item->naam</td>";
                    echo "<td>$item->soort</td>";
                    echo "<td>$item->gedrag</td>";
                    //echo "<td>$item->gebied</td>";
                    //echo "<td>$item->verblijfNum</td>";
                    echo "</tr>";
            }
            if(isset($_POST['btnZoek'])){
                echo "gelukt";
                $query1="SELECT * FROM dier WHERE naam LIKE '%%'";
                $stm=$conn->prepare($query1);
                $stm->execute();
                


            }       
            
        ?>
        </div>
        <form>
            </table>
        </form>
</body>
</html>