<h2>Trafika</h2>
<?php 

if(isset($_GET["id"]) && is_numeric($_GET["id"])){
    $id = (int) $_GET["id"];
    $query = $conn->prepare("SELECT * FROM trafika WHERE id=?");
    $query->bindParam(1,$id,PDO::PARAM_STR);
    $query->execute();
    $trafika = $query->fetch();
    var_dump($trafika);
   
} else {
    $id = NULL;
}


if (isset($_POST["nazev"])){
    if (strlen($_POST["nazev"]) < 3) {
        echo 'Nazev musí byt delsi nez 3 znaky';
    } else {
    $nazev = filter_var($_POST["nazev"], FILTER_SANITIZE_STRING);  
    if ($id==NULL){
    $query = $conn->prepare("INSERT INTO trafika VALUES (NULL,?)");
    $query->bindParam(1,$nazev,PDO::PARAM_STR);
    }else{
        $query = $conn->prepare("UPDATE trafika SET "." nazev = ? WHERE id = ?");
        $query->bindParam(1,$nazev,PDO::PARAM_STR);
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
    $query = $conn->prepare("SELECT * FROM trafika WHERE id=?");
    $query->bindParam(1,$id,PDO::PARAM_STR);
    $query->execute();
    $trafika = $query->fetch();
    if ($trafika){
        echo "Upravuješ trafiku - ". $trafika["nazev"]."<br>";
    } else{
        die("Tahle trafika neexistuje");
    }
}

?>
<form method="POST">
    <label for="nazev">
        Název trafiky
    </label>
    <input 
        type="text" 
        name="nazev" 
        id="nazev" 
        value="<?php if ($id != NULL){ echo $trafika["nazev"];}?>"
        placeholder="Název trafiky"
        required="required"
        >
    <br>
    <button type="submit"><strong>Odeslat</strong></button>
</form>

<?php
if ($id !=NULL){
    echo "<h2>Zaměstnanci</h2>";
    $query = $conn->prepare("SELECT * FROM zamestnanci " . "WHERE trafika = ?");
    $query->bindParam(1,$id,PDO::PARAM_STR);
    $query->execute();
    echo "<table>";
    foreach ($query->fetchAll() as $clen){
        echo "<tr>";
        echo "<td>".$clen["jmeno"]."</td>";
        echo '<td><a href="index.php?site=zamestnanec' . '&id='.$clen["id"].'">Upravit</td>';
        echo "</tr>";
    }
    echo "</table>";
}