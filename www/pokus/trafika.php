<?php
require_once ('connect_db.php');
?>

<html>
    <head>
        <title>LIBOR</title>
    </head>
    <body>
        <?php
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id_trafiky = $_GET["id"];
            echo $id_trafiky . "<br>";
            $query = $conn->prepare("select * from zamestnanci where trafika = ?");
            $query->bindParam(1, $id_trafiky, PDO::PARAM_INT);
            $query->execute();
            echo "Zaměstnaců je " . $query->rowCount() . "<br>";
            foreach ($query->fetchAll() as $row) {
                echo $row["jmeno"] . "<br>";
            }
        } else {
            echo "Pes";
        }
        ?>
    </body>
</html>
