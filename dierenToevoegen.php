<!DOCTYPE html>
<?php
require ("dierDB.php");
$query = "SELECT * FROM verblijf ORDER BY verblijf_num asc;";
    $stm=$conn->prepare($query);
    if($stm->execute() == true)
    {
        $verblijf = $stm->fetchAll(PDO::FETCH_OBJ);

    }else {
        echo "query mislukt";
    }
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
        <a href="home.php">Home</a><br/>
        
        <!-- formulier voor de dieren in de lijst te zetten -->
        diersoort:<input type="text"   name="txtDier" required/><br/>
        diername: <input type="text"   name="txtName" required/><br/>
        
        gedrag:   <select  name="gedrag">
                    <option value="kalm">     kalm</option>
                    <option value="agressief">agressief</option>
                  </select><br/>

        gebied:   <select  name="gebied">
                    <option value="">                   </option>
                    <option value="Afrika">       Afrika</option>
                    <option value="Australië">    Australië</option>
                    <option value="Azië">         Azië</option>
                    <option value="Europa">       Europa</option>
                    <option value="Oceanium">     Oceanium</option>
                    <option value="Noord-Amerika">Noord-Amerika</option>
                    <option value="Zuid-Amerika"> Zuid-Amerika</option>
                  </select><br/>
        veblijf nummer:<input type="text" Name="txtVerblijfNum"/>



                  <br/>
        <input type="submit" name="btnErbij" value="TOEVOEGEN" `
        style="width:200px; background-color: rgb(232, 255, 198); border-color:green;"/>
        
        </div>
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

            $gebied=$_POST['gebied'];
            $verblijf_num=$_POST['txtVerblijfNum'];

            $query1="INSERT INTO verblijf ( verblijf_num, gebied) values($verblijf_num,'$gebied' )";
            $stm=$conn->prepare($query1);
            if($stm->execute());
                echo "gelukt";
        }
    ?>
            <div id="verblijfOverzicht">
        <table>
            <tr>
                <th>verblijf ID</th>
                <th>verblijf nummer</th>
                <th>gebied</th>
            </tr>
            <?php
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
