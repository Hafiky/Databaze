<?php
require_once ("connect_db.php");
?>
<html>
    <head>
        <title>Supr web. aplikace</title>
    </head>
    <body>
        <h1>Trafiky</h1>
        <?php
        foreach($conn->query("SELECT * FROM trafiky") as $row) {
            //trafika.php?id=<cislo_trafiky>
            //<a href="trafika.php?id=<cislo>">nazev</a>
            echo '<a href="trafika.php?id=' . $row["id"] . '">' .
                    $row["nazev"] . "</a><br>";
        }
        ?>
    </body>
</html>