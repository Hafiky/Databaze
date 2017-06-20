<?php
if(isset($_GET["id"])){
    $id=(int)$_GET["id"];
    
}else{
    $id=NULL;
}
if ($id==NULL){
    echo "Tak tato firma neexistuje";
}else{
    $query2=$conn->prepare("DELETE FROM internet_mesto WHERE id_firma=?");
    $query2->bindParam(1,$id,PDO::PARAM_INT);
    $result = $query2->execute();
    $pocet_radku2=$query2->rowCount();
    
    
    
    
    
    $query=$conn->prepare("DELETE FROM internet WHERE id=?");
    $query->bindParam(1,$id,PDO::PARAM_INT);
    $result = $query->execute();
    $pocet_radku=$query->rowCount();
    
   /* $query2=$conn->prepare("DELETE FROM mesta WHERE id_firma=?");
    $query2->bindParam(1,$id,PDO::PARAM_INT);
    $result2 = $query2->execute();
    $pocet_radku2=$query2->rowCount();
    
    */
    if($pocet_radku==0 ||$pocet_radku2==0  ){
        echo "Zaznam nebyl nalezen";
    }  else {
        header("Location: index.php?site=seznam_firma");    
    }
}