<h2>Trafika</h2>
<?php
var_dump($_POST);
if(isset($_POST["nazev"])) {
    if(strlen($_POST["nazev"]) < 3) {
        echo "Název trafiky musí být delší než 3 znaky.";
    } 
    else {
        $nazev = filter_var($_POST["nazev"], FILTER_SANITIZE_STRING);
        $query = $conn->prepare("INSERT INTO trafiky VALUES (NULL, ?)");
        $query->bindParam(1, $nazev, PDO::PARAM_STR);
        if($query->execute()) {
            echo "Pridano";
        }
        else {
            echo "Nepridano";
        }
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
        placeholder="Název trafiky"
        required="required"
        >
    <br>
    <button type="submit"><strong>Odeslat</strong></button>
</form>
