<h1>Prehled tarfik</h1>
<?php

$dotaz = $conn->prepare("SELECT * FROM trafika");
$dotaz -> execute();

echo "<table>";
foreach($dotaz->fetchAll() as $row){
    echo "<tr>";
    echo "<td>" . $row["nazev"] . "</td>";
    echo "<td>";
    
    echo '<a href="index.php?site=trafika&id='.
            $row["id"].'">Upravit</a>';
    echo "</td>";
    echo "<td>";
    echo '<a href="index.php?site=smazat_trafiku&id='
            .$row["id"].'">smazat</a>';
    echo "</td>";
    
    echo "</tr>";
}
echo "</table>";