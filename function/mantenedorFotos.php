<?php
include('setup.php');


if(isset($_GET['act'])){
    if($_GET['act']==1){
        $sql = "UPDATE galeriaempresa SET estado=1 WHERE idgaleriaEmpresa=".$_GET['idfoto'];
    } else {
        $sql = "UPDATE galeriaempresa SET estado=0 WHERE idgaleriaEmpresa=".$_GET['idfoto'];
    }

    mysqli_query(conectar(), $sql);
    header('Location:../admin/galeria-empresa.php?id='.$_GET['id'].'&servicio='.$_GET['servicio'].'&rubro='.$_GET['rubro']);

}

if(isset($_GET['delete'])){
    
    $sql = "DELETE FROM galeriaempresa WHERE idgaleriaEmpresa=".$_GET['idfoto'];
    mysqli_query(conectar(), $sql);
    header('Location:../admin/galeria-empresa.php?id='.$_GET['id'].'&servicio='.$_GET['servicio'].'&rubro='.$_GET['rubro']);

}

if(isset($_GET['principal'])){
    if($_GET['principal']==1 && $_GET['estado']==1){
        $sql = "UPDATE galeriaempresa SET principal=0 WHERE empresa_idEmpresa=".$_GET['id'];
        mysqli_query(conectar(), $sql);
        $sql = "UPDATE galeriaempresa SET principal=1 WHERE idgaleriaEmpresa=".$_GET['idfoto'];
    } else {
        $sql = "UPDATE galeriaempresa SET principal=0 WHERE idgaleriaEmpresa=".$_GET['idfoto'];
    }

    mysqli_query(conectar(), $sql);
    header('Location:../admin/galeria-empresa.php?id='.$_GET['id'].'&servicio='.$_GET['servicio'].'&rubro='.$_GET['rubro']);

}

?>