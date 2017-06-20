<h1>Pridat mesta</h1>
<?php
//var_dump($_POST);
if(isset($_POST["submit"])) {
    if(isset($_POST["jmeno"]) && strlen($_POST["jmeno"]) > 3) {
        $jmeno = filter_var($_POST["jmeno"], FILTER_SANITIZE_STRING);
        
            //$trafika = filter_var($_POST["trafika"], FILTER_SANITIZE_NUMBER_INT);
            $query = $conn->prepare("INSERT INTO mesta VALUES (NULL,? )");
            $query->bindParam(1, $jmeno, PDO::PARAM_STR);
            //$query->bindParam(1, $trafika, PDO::PARAM_INT);
            if($query->execute()) {
                echo "Zamestnanec pridan";
            }
            else {
                echo "Zamestnanec nepridan :-(";
            }
        }
        
    
    else {
        echo "Jméno nebylo správně odesláno";
    }
}
$query = $conn->prepare("SELECT * FROM internet");
$query->execute();
?>
<form method="POST">
          
   
    <label for="zamestnanec">
        Jméno města
    </label>
    <input type="text"
           name="jmeno"
           required="required"
           placeholder="Jméno města"
           id="zamestnanec" >
    <br>
    <button type="submit" name="submit">Odeslat</button>
</form>