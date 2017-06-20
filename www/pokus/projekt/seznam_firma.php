<h1>Prehled internetu</h1>
<?php

$dotaz = $conn->prepare("SELECT internet.firma,count(internet_mesto.id_firma),internet.id FROM internet LEFT JOIN "
        . "internet_mesto ON internet.id=internet_mesto.id_firma "
        . "GROUP BY internet.id ORDER BY internet.firma");
$dotaz -> execute();

echo "<table>";
echo "<tr>";
echo "<th>" . "Nazev internetů" ."</th>"  ;
echo "<th>" . "Počet měst s tímhle internetem" ."</th>"  ;
//echo "<th>" . "Počet měst s internetem" ."</th>"  ;
echo "<th>" . "Upravit  Název" ."</th>"  ;
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
            .$row["id"].'">Smazat</a>';
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
    echo "Upravuješ internety jménem - ";?>
    <?php
    
    $dotaz2 = $conn->prepare("SELECT firma FROM internet WHERE id=$id");
    //$dotaz2 ->bindParam(1,$id,PDO::PARAM_STR);
    $dotaz2 -> execute();
    $row=$dotaz2->fetch();
    echo $row["firma"];
    //echo $id;
   // echo "pes";
    
    ?>
    <form method="POST">
          
   
    <label for="firma">
        Nové jméno internetů
    </label>
    <input type="text"
           name="firma"
           required="required"
           placeholder="Jméno internetů"
           id="firma" >
    <br>
    <button type="firma" name="submit">Odeslat</button>
</form>

 <?php  
 if(isset($_POST["firma"])) {
    $firma = $_POST["firma"];
        
            //$trafika = filter_var($_POST["trafika"], FILTER_SANITIZE_NUMBER_INT);
            $query = $conn->prepare("UPDATE internet SET firma=? WHERE id=$id");
            $query->bindParam(1, $firma, PDO::PARAM_STR);
            //$query->bindParam(1, $trafika, PDO::PARAM_INT);
            if($query->execute()) {
                echo "Povedlo se";
                header("Location: index.php?site=seznam_firma"); 
            }
            else {
                echo "Nepovedlo se :-(";
            }
        }

}