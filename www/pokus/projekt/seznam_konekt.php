<h1>Prehled konektu</h1>
<?php
$dotaz = $conn->prepare("SELECT mesta.nazev, internet.firma,internet_mesto.id FROM"
        . " internet_mesto LEFT JOIN mesta ON mesta.id = internet_mesto.id_mesto "
        . "LEFT JOIN internet ON internet.id = internet_mesto.id_firma "
        . "GROUP BY internet_mesto.id");
$dotaz -> execute();

echo "<table>";
echo "<tr>";
echo "<th>" . "Nazev města" ."</th>"  ;
echo "<th>" . "Jméno internet providera" ."</th>"  ;
//echo "<th>" . "Počet měst s internetem" ."</th>"  ;

echo "<th>" . "Smazání" ."</th>"  ;
echo "</tr>";

foreach($dotaz->fetchAll() as $row){
    echo "<tr>";
    echo "<td>" . $row["nazev"] . "</td>";
    echo "<td>" . $row["firma"] . "</td>";
    //echo "<td>";
    //$dotaz2 = $conn->prepare("SELECT COUNT(*) FROM mesta WHERE id_firma=?");
    //$dotaz2 ->bindParam(1,$row["id"],PDO::PARAM_STR);
    //$dotaz2 -> execute();
   
    //$internet = $dotaz2->fetch();
    //echo $internet["COUNT(*)"];
   // echo "</td>";
    
    echo "<td>";
    echo '<a href="index.php?site=smazat_konekt&id='
            .$row["id"].'">smazat</a>';
    echo "</td>";
    
    echo "</tr>";
}
echo "</table>";
