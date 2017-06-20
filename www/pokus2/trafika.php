<?php
require_once ("connect_db.php");
?>
<html>
    <head>
        <title>Trafika</title>
    </head>
    <body>
        <h1>Zaměstnanci trafiky</h1>
        <?php
        if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id_trafiky = $_GET["id"];
            echo $id_trafiky . "<br>";
            $query = $conn->prepare("SELECT * FROM zamestnanci WHERE trafika = ?");
            $query->bindParam(1, $id_trafiky, PDO::PARAM_INT);
            $query->execute();
            echo "Zaměstnanců je: " . $query->rowCount() . "<br>";
            foreach($query->fetchAll() as $row) {
                echo $row["jmeno"] . "<br>";
            }
        }
        else {
            echo "Nevybrána trafika";
        }
        ?>
    </body>
</html>