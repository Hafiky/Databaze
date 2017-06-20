<?php
require_once 'connect_db.php';
echo "<br>";echo "<br>";
if (isset($_GET["site"])){
    switch ($_GET["site"]){
        case "seznam_firma":
            $site ="seznam_firma.php";
            break;
        case "seznam_mesta":
            $site ="seznam_mesta.php";
            break;
        case "seznam_konekt":
            $site ="seznam_konekt.php";
            break;
        case "pridat_firma":
            $site ="pridat_firma.php";
            break;
        case "pridat_mesta":
            $site ="pridat_mesta.php";
            break;
        case "pridat_konekt":
            $site ="pridat_konekt.php";
            break;              
        case "smazat_firma":
            $site ="smazat_firma.php";
            break;
        case "smazat_mesta":
            $site ="smazat_mesta.php";
            break;
        case "smazat_konekt":
            $site ="smazat_konekt.php";
            break;
        
       
        
        default :
            $site ="home.php";
    }
    
    }
    else
        {
       $site ="home.php"; 
        
    }    
?>
    <html>
    <head>
        <title>LIBOR</title>
        <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #111111;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
tr:nth-child(odd) {
    background-color: #ffffff;
}
ul, li
{
  display: inline;
}

li
{
  border: solid 1px #111111;
  padding: 5px;
  margin: 5px;
  background-color: #ffffff;
}
body{
   background-color: #DDDDB7;  
}
a {
    text-decoration: none;
}
</style>
    </head>
    
    <body>
        <ul>
            <li><a href="index.php?site=home">Domu</a></li>
            <li><a href="index.php?site=seznam_firma">Seznam Internetů</a></li>
            <li><a href="index.php?site=seznam_mesta">Seznam Mesta</a></li>
            <li><a href="index.php?site=seznam_konekt">Seznam Konektu</a></li>
            <li><a href="index.php?site=pridat_firma">Pridat Internet</a></li>
            <li><a href="index.php?site=pridat_mesta">Pridat Mesto</a></li>
            <li><a href="index.php?site=pridat_konekt">Pridat Konekt</a></li>          
        </ul>
        <?php        include_once $site; ?>
    </body>
</html>
