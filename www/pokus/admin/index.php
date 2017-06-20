<?php
require_once '../connect_db.php';
if (isset($_GET["site"])){
    switch ($_GET["site"]){
        case "trafika":
            $site ="trafika.php";
            break;
        case "zamestnanec":
            $site ="zamestnanec.php";
            break;
        case "prehled_trafiky":
            $site ="prehled_trafiky.php";    
            break;
        case "smazat_trafiku":
            $site ="smazat_trafiku.php";    
            break;
        
        default :
            $site ="domu.php";
    }
    
    }
    else
        {
       $site ="domu.php"; 
        
    }    
?>
    <html>
    <head>
        <title>LIBOR</title>
    </head>
    <body>
        <ul>
            <li><a href="index.php?site=domu">Domu</a></li>
            <li><a href="index.php?site=trafika">Trafika</a></li>
            <li><a href="index.php?site=prehled_trafiky">Prehled trafiky</a></li> 
            <li><a href="index.php?site=smazat_trafiku">Smazat trafiky</a></li>  
            <li><a href="index.php?site=zamestnanec">Zamestnanec</a></li>
        </ul>
        <?php        include_once $site; ?>
    </body>
</html>
