<h1>Prehled mest</h1>

<?php

$dotaz3 = $conn->prepare("SELECT mesta.nazev,mesta.id,count(internet_mesto.id_mesto) "
        . "FROM mesta LEFT JOIN internet_mesto "
        . "ON mesta.id=internet_mesto.id_mesto GROUP BY mesta.id ORDER BY mesta.nazev");
$dotaz3 -> execute();
echo "<table>";
echo "<tr>";
echo "<th>" . "Nazev mesta" ."</th>"  ;
echo "<th>" . "Počet internet provideru" ."</th>"  ;
echo "<th>" . "Upravení jména" ."</th>"  ;
echo "<th>" . "Smazání" ."</th>"  ;
echo "</tr>";
foreach($dotaz3->fetchAll() as $row2){
    echo "<tr>";
    echo "<td>" . $row2["nazev"] . "</td>";
    echo "<td>";

    echo $row2["count(internet_mesto.id_mesto)"];
    echo "</td>";
    
    echo "<td>";
    echo '<a href="index.php?site=seznam_mesta&id='
            .$row2["id"].'">Upravit</a>';
    echo "</td>";
      echo "<td>";
    echo '<a href="index.php?site=smazat_mesta&id='
            .$row2["id"].'">Smazat</a>';
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
    echo "Upravuješ mšsta jménem - ";?>
    <?php
    
    $dotaz2 = $conn->prepare("SELECT nazev FROM mesta WHERE id=$id");
    //$dotaz2 ->bindParam(1,$id,PDO::PARAM_STR);
    $dotaz2 -> execute();
    $row=$dotaz2->fetch();
    echo $row["nazev"];
    //echo $id;
   // echo "pes";
    
    ?>
    <form method="POST">
          
   
    <label for="firma">
        Nové jméno města
    </label>
    <input type="text"
           name="firma"
           required="required"
           placeholder="Jméno města"
           id="firma" >
    <br>
    <button type="firma" name="submit">Odeslat</button>
</form>

 <?php  
 if(isset($_POST["firma"])) {
    $firma = $_POST["firma"];
        
            //$trafika = filter_var($_POST["trafika"], FILTER_SANITIZE_NUMBER_INT);
            $query = $conn->prepare("UPDATE mesta SET nazev=? WHERE id=$id");
            $query->bindParam(1, $firma, PDO::PARAM_STR);
            //$query->bindParam(1, $trafika, PDO::PARAM_INT);
            if($query->execute()) {
                echo "Povedlo se";
                header("Location: index.php?site=seznam_mesta"); 
            }
            else {
                echo "Nepovedlo se :-(";
            }
        }

}
