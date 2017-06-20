<?php
echo "Ahoj pes karel skript <br>";
require_once ('connect_db.php');
echo "<br>";
?>

<html>
    <head>
        <title>LIBOR</title>
    </head>
    <body>
        <?php
      
        
        foreach ($conn->query("select * from trafika") as $row){
            echo '<a href="trafika.php?id=' . $row["id"] . '">' . $row["nazev"] . "</a><br>";
       
        }
        
        ?>
    </body>
</html>
