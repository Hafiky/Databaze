<?php
if(isset($_GET["id"])){
    $id=(int)$_GET["id"];
    
}else{
    $id=NULL;
}
if ($id==NULL){
    echo "Tak tato trafika neexistuje";
}else{
    $query=$conn->prepare("DELETE FROM trafika WHERE id=?");
    $query->bindParam(1,$id,PDO::PARAM_INT);
    $result = $query->execute();
    $pocet_radku=$query->rowCount();
    if($pocet_radku==0){
        echo "Zaznam nebyl nalezen";
    }  else {
        header("Location: index.php?site=prehled_trafiky");    
    }
}