<?php
include('setup.php');


if(isset($_GET['act'])){
    if($_GET['act']==1){
        $sql = "UPDATE fotosgaleria SET estadofotoGaleria=1 WHERE idfotosGaleria=".$_GET['idfoto'];
    } else {
        $sql = "UPDATE fotosgaleria SET estadofotoGaleria=0 WHERE idfotosGaleria=".$_GET['idfoto'];
    }

    mysqli_query(conectar(), $sql);
    header('Location:../admin/galeria-fotos.php?id='.$_GET['id']);

}

if(isset($_GET['delete'])){
    
    $sql = "DELETE FROM fotosgaleria WHERE idfotosGaleria=".$_GET['idfoto'];
    mysqli_query(conectar(), $sql);
    header('Location:../admin/galeria-fotos.php?id='.$_GET['id']);

}

if(isset($_GET['principal'])){
    if($_GET['principal']==1 && $_GET['estado']==1){
        $sql = "UPDATE fotosgaleria SET principalfotoGaleria=0 WHERE idfotosGaleria=".$_GET['idfoto'];
    } else {
        $sql = "UPDATE fotosgaleria SET principalfotoGaleria=0 WHERE idfotosGaleria=".$_GET['idfoto'];
    }

    mysqli_query(conectar(), $sql);
    header('Location:../admin/galeria-fotos.php?id='.$_GET['id']);

}

?>