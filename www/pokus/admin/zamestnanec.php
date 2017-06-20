<h2>Zamestnanci</h2>
<?php
var_dump($_POST);
if(isset($_POST["submit"])) {
    if(isset($_POST["jmeno"]) && strlen($_POST["jmeno"]) > 3) {
        $jmeno = filter_var($_POST["jmeno"], FILTER_SANITIZE_STRING);
        if(isset($_POST["trafika"]) && is_numeric($_POST["trafika"])) {
            $trafika = filter_var($_POST["trafika"], FILTER_SANITIZE_NUMBER_INT);
            $query = $conn->prepare("INSERT INTO zamestnanci VALUES (NULL, ?,? )");
            $query->bindParam(1, $jmeno, PDO::PARAM_STR);
            $query->bindParam(2, $trafika, PDO::PARAM_INT);
            if($query->execute()) {
                echo "Zamestnanec pridan";
            }
            else {
                echo "Zamestnanec nepridan :-(";
            }
        }
        else {
            echo "Nebyla zadána trafika";
        }
    }
    else {
        echo "Jméno nebylo správně odesláno";
    }
}
$query = $conn->prepare("SELECT * FROM trafika");
$query->execute();
?>
<form method="POST">
    <label for="trafika"> Trafika </label>        
    <select name="trafika" id="trafika">
        <?php foreach($query->fetchAll() as $row) { ?>
            <option value="<?php echo $row["id"]; ?>">
                <?php echo $row["nazev"]; ?>
            </option>
        <?php } ?>
    </select>
    <br>
    <label for="zamestnanec">
        Jméno zaměstnance
    </label>
    <input type="text"
           name="jmeno"
           required="required"
           placeholder="Jméno zaměstnance"
           id="zamestnanec" >
    <br>
    <button type="submit" name="submit">Odeslat</button>
</form>