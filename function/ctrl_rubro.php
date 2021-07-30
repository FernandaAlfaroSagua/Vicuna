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
    $sql ="INSERT INTO rubro SET  nombreRubro='" . $_POST['nombre'] . "', estadoRubro='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/rubros.php');
   
}

function update(){
    $sql ="UPDATE rubro SET  nombreRubro='" . $_POST['nombre'] . "', estadoRubro='" . $_POST['estado'] . "' WHERE idRubro='".$_POST['id_oculto']."'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/rubros.php');
}

function delete(){
    $sql = "UPDATE rubro SET estadoRubro=0  WHERE idRubro= '" . $_POST['id_oculto'] . "' ";
    mysqli_query(conectar(), $sql);

    header('Location:../admin/rubros.php');
}

function cancel(){

    header('Location:../admin/rubros.php');
}

?>