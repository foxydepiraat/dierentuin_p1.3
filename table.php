<?php
include ("DierDb.php");
$sql = "SELECT * FROM `dier` ORDER BY `dier`.`naam`  DESC;";
$stm=$conn->prepare($sql);
$stm->execute();
?>

<!DOCTYPE html>
<html>
    <table>
        <tr>
            <th>dier id</th>
            <th>dier naam</th>
            <th>dier soort</th>
            <th>verblijf</th>
        </tr>
        
        <?php

        foreach($dier as $item){
                echo "<tr>";
                echo "<Td>$item->naam</td>";
                echo "<td>$item->soort</td>";
                echo "<td>$item->gedrag</td>";
                echo "</tr>";
            }
        ?>
        
    </table>
</html>