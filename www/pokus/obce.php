<?php
require_once ('connect_db.php');
?>

<html>
    <head>
        <title>LIBOR</title>
    </head>
    <body>
        <?php
        if (isset($_GET["okres_kod"]) && is_numeric($_GET["okres_kod"])) {
            $id_kraje = $_GET["okres_kod"];
            echo $id_kraje . "<br>";
            $query = $conn->prepare("select * from obec where okres_kod = ?");
            $query->bindParam(1, $id_kraje, PDO::PARAM_INT);
            $query->execute();
            echo "Obce jsou " . $query->rowCount() . "<br>";
            foreach ($query->fetchAll() as $row) {
                echo $row["nazev"] . "<br>";
            }
        } else {
            echo "Pes";
        }
        ?>
    </body>
</html>
