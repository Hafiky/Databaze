<?php
require_once ('connect_db.php');
?>

<html>
    <head>
        <title>LIBOR</title>
    </head>
    <body>
        <?php
        if (isset($_GET["kraj_kod"]) && is_numeric($_GET["kraj_kod"])) {
            $id_kraje = $_GET["kraj_kod"];
            echo $id_kraje . "<br>";
            $query = $conn->prepare("select * from okres where kraj_kod = ?");
            $query->bindParam(1, $id_kraje, PDO::PARAM_INT);
            $query->execute();
            echo "Okresy jsou " . $query->rowCount() . "<br>";
            foreach ($query->fetchAll() as $row) {
                echo '<a href="obce.php?okres_kod=' . $row["okres_kod"] . '">' . $row["nazev"] . "</a><br>";
            }
        } else {
            echo "Pes";
        }
        ?>
    </body>
</html>
