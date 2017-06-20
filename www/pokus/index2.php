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
      
        
        foreach ($conn->query("select * from kraj") as $row){
            echo '<a href="kraje.php?kraj_kod=' . $row["kraj_kod"] . '">' . $row["nazev"] . "</a><br>";
       
        }
        
        ?>
    </body>
</html>
