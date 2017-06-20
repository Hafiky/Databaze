<h1>Prehled mest</h1>

<?php

$dotaz3 = $conn->prepare("SELECT mesta.nazev,mesta.id,count(internet_mesto.id_mesto) "
        . "FROM mesta LEFT JOIN internet_mesto "
        . "ON mesta.id=internet_mesto.id_mesto GROUP BY mesta.id ");
$dotaz3 -> execute();
echo "<table>";
echo "<tr>";
echo "<th>" . "Nazev mesta" ."</th>"  ;
echo "<th>" . "Počet internet provideru" ."</th>"  ;
echo "<th>" . "Smazání" ."</th>"  ;
echo "</tr>";
foreach($dotaz3->fetchAll() as $row2){
    echo "<tr>";
    echo "<td>" . $row2["nazev"] . "</td>";
    echo "<td>";

    echo $row2["count(internet_mesto.id_mesto)"];
    echo "</td>";
    
    echo "<td>";
    echo '<a href="index.php?site=smazat_mesta&id='
            .$row2["id"].'">smazat</a>';
    echo "</td>";
    
    echo "</tr>";
}
echo "</table>";