<?php
include('setup.php');

switch ($_POST['accion_oculta']) {
    case 'Ingresar':
        insertar();
        break;
    case 'Actualizar':
        update();
        break;
    case 'Eliminar':
        delete();
        break;
    case 'Cancelar':
        cancel();
        break;
}

function insertar()
{
    $sql ="INSERT INTO calles SET  nombreCalle='" . $_POST['nombre'] . "', estadoCalle='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/calles.php');
   
}

function update(){
    $sql ="UPDATE calles SET  nombreCalle='" . $_POST['nombre'] . "', estadoCalle='" . $_POST['estado'] . "' WHERE idcalles='".$_POST['id_oculto']."'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/calles.php');
}

function delete(){
    $sql = "UPDATE calles SET estadoCalle=0  WHERE idcalles= '" . $_POST['id_oculto'] . "' ";
    mysqli_query(conectar(), $sql);

    header('Location:../admin/calles.php');
}

function cancel(){

    header('Location:../admin/calles.php');
}

?>