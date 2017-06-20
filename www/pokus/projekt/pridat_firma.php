<h1>Pridat internet</h1>
<?php 

if(isset($_GET["id"]) && is_numeric($_GET["id"])){
    $id = (int) $_GET["id"];
    $query = $conn->prepare("SELECT * FROM internet WHERE id=?");
    $query->bindParam(1,$id,PDO::PARAM_STR);
    $query->execute();
    $internet = $query->fetch();
    var_dump($internet);
   
} else {
    $id = NULL;
}


if (isset($_POST["firma"])){
    if (strlen($_POST["firma"]) < 3) {
        echo 'Nazev musí byt delsi nez 3 znaky';
    } else {
    $firma = filter_var($_POST["firma"], FILTER_SANITIZE_STRING);  
    if ($id==NULL){
    $query = $conn->prepare("INSERT INTO internet VALUES (NULL,?)");
    $query->bindParam(1,$firma,PDO::PARAM_STR);
    }else{
        $query = $conn->prepare("UPDATE internet SET "." firma = ? WHERE id = ?");
        $query->bindParam(1,$firma,PDO::PARAM_STR);
        $query->bindParam(2,$id,PDO::PARAM_STR);
        
    }
    
    if ($query->execute()) {
        echo "Pridano";
    }else{
        echo "Nepridano";
    }
    
    }
}

if ($id != NULL){
    $query = $conn->prepare("SELECT * FROM internet WHERE id=?");
    $query->bindParam(1,$id,PDO::PARAM_STR);
    $query->execute();
    $internet = $query->fetch();
    if ($internet){
        echo "Upravuješ internet - ". $internet["firma"]."<br>";
    } else{
        die("Tahle internet neexistuje");
    }
}

?>

<form method="POST">
    <label for="firma">
        Název internetů
    </label>
    <input 
        type="text" 
        name="firma" 
        id="firma" 
        value="<?php if ($id != NULL){ echo $trafika["firma"];}?>"
        placeholder="Název internetů"
        required="required"
        >
    <br>
    <button type="submit"><strong>Odeslat</strong></button>
</form>

<?php
if ($id !=NULL){
    echo "<h2>Zaměstnanci</h2>";
    $query = $conn->prepare("SELECT * FROM mesta " . "WHERE id_firma = ?");
    $query->bindParam(1,$id,PDO::PARAM_STR);
    $query->execute();
    echo "<table>";
    foreach ($query->fetchAll() as $mesta){
        echo "<tr>";
        echo "<td>".$mesta["nazev"]."</td>";
        echo '<td><a href="index.php?site=home' . '&id='.$mesta["id"].'">Upravit</td>';
        echo "</tr>";
    }
    echo "</table>";
}