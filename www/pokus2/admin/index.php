<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    require_once '../connect_db.php';
    if(isset($_GET["site"])) {
        switch ($_GET["site"]) {
            case "trafika":
                $site = "trafika.php";
                break;
            case "zamestnanec":
                $site = "zamestnanec.php";
                break;
            default:
                $site = "domu.php";
        }
    }
    else {
        $site = "domu.php";
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <ul>
            <li><a href="index.php?site=domu">Domů</a></li>
            <li><a href="index.php?site=trafika">Trafika</a></li>
            <li><a href="index.php?site=zamestnanec">Zaměstnanec</a></li>
        </ul>
        <?php
            include_once $site;
        ?>
    </body>
</html>
