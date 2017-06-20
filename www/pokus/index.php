<?php
echo "Ahoj pes karel skript <br>";
require_once ('connect_db.php');

?>

<html>
    <head>
        <title>LIBOR</title>
    </head>
    <body>
        <?php
        var_dump($conn);
        
        foreach ($conn->query("select * from trafiky") as $row){
        echo $row["nazev"] . "<br>";
        }
        
        ?>
    </body>
</html>
