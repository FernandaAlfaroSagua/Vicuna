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
    $sql ="INSERT INTO servicio SET  descripcionServicio='" . $_POST['descripcion'] . "', estadoServicio='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/servicios.php');
   
}

function update(){
    $sql ="UPDATE servicio SET  descripcionServicio='" . $_POST['descripcion'] . "', estadoServicio='" . $_POST['estado'] . "' WHERE idServicio='".$_POST['id_oculto']."'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/servicios.php');
}

function delete(){
    $sql = "UPDATE servicio SET estadoServicio=0  WHERE idServicio= '" . $_POST['id_oculto'] . "' ";
    mysqli_query(conectar(), $sql);

    header('Location:../admin/servicios.php');
}

function cancel(){

    header('Location:../admin/servicios.php');
}

?>