<h1>Konekty</h1>
<?php
//var_dump($_POST);

if(isset($_POST["submit"])) {
    $internet = (int) $_POST["internet"];
    $mesto = (int) $_POST["mesto"];
    $query = $conn->prepare("SELECT * FROM internet_mesto WHERE id_mesto=? and id_firma=?");
    $query->bindParam(2, $internet, PDO::PARAM_INT);
    $query->bindParam(1, $mesto, PDO::PARAM_INT);
    $query->execute();
    $pocet = $query->rowCount();
    if($pocet == 0) {
        
       
        if(true) {       
            $internet = (int) $_POST["internet"];
            $mesto = (int) $_POST["mesto"];
            $query = $conn->prepare("INSERT INTO internet_mesto VALUES (NULL, ?,? )");
            $query->bindParam(2, $internet, PDO::PARAM_INT);
            $query->bindParam(1, $mesto, PDO::PARAM_INT);
            
            if($query->execute()) {
                echo "Konekt proveden";
            }
            else {
                echo "Konekt neproveden:-(";
            }
        }
        else {
            echo "Nebyla zadána trafika";
        }
    }
    else {
        echo "Toto už existuje";
    }
}
$query = $conn->prepare("SELECT * FROM internet");
$query->execute();
$query2 = $conn->prepare("SELECT * FROM mesta");
$query2->execute();
?>
<form method="POST">
    <label for="internet"> Internet </label>        
    <select name="internet" id="internet">
        <?php foreach($query->fetchAll() as $row) { ?>
            <option value="<?php echo $row["id"]; ?>">
                <?php echo $row["firma"]; ?>
            </option>
        <?php } ?>
    </select>
    <br>
    <label for="mesto"> mesto </label>        
    <select name="mesto" id="mesto">
        <?php foreach($query2->fetchAll() as $row2) { ?>
            <option value="<?php echo $row2["id"]; ?>">
                <?php echo $row2["nazev"]; ?>
            </option>
        <?php } ?>
    </select>
    <br>
    <button type="submit" name="submit">Odeslat</button>
</form>