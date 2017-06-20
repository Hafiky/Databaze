<h1>Prehled internetu</h1>
<?php

$dotaz = $conn->prepare("SELECT internet.firma,count(internet_mesto.id_firma),internet.id FROM internet LEFT JOIN "
        . "internet_mesto ON internet.id=internet_mesto.id_firma "
        . "GROUP BY internet.id");
$dotaz -> execute();

echo "<table>";
echo "<tr>";
echo "<th>" . "Nazev internetů" ."</th>"  ;
echo "<th>" . "Počet měst s tímhle internetem" ."</th>"  ;
//echo "<th>" . "Počet měst s internetem" ."</th>"  ;
echo "<th>" . "Upravit" ."</th>"  ;
echo "<th>" . "Smazání" ."</th>"  ;
echo "</tr>";

foreach($dotaz->fetchAll() as $row){
    echo "<tr>";
    echo "<td>" . $row["firma"] . "</td>";
    echo "<td>" . $row["count(internet_mesto.id_firma)"] . "</td>";
    //echo "<td>";
    //$dotaz2 = $conn->prepare("SELECT COUNT(*) FROM mesta WHERE id_firma=?");
    //$dotaz2 ->bindParam(1,$row["id"],PDO::PARAM_STR);
    //$dotaz2 -> execute();
   
    //$internet = $dotaz2->fetch();
    //echo $internet["COUNT(*)"];
   // echo "</td>";
    
    echo "<td>";
    echo '<a href="index.php?site=seznam_firma&id='
            .$row["id"].'">Upravit</a>';
    echo "</td>";
    
    echo "<td>";
    echo '<a href="index.php?site=smazat_firma&id='
            .$row["id"].'">smazat</a>';
    echo "</td>";
    
    echo "</tr>";
}
echo "</table>";


if(isset($_GET["id"])){
    $id=(int)$_GET["id"];
    
}else{
    $id=NULL;
}
if ($id!=NULL){
    echo "Upravuješ";
}