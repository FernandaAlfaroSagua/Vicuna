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
    $sql ="INSERT INTO ubicacionesqr SET  descripcionUbicacionQR='" . $_POST['descripcion'] . "', latitududUbicacionQR='" . $_POST['latitud'] . "', longitudUbicacionQR='" . $_POST['longitud'] . "', estadoUbicacionQR='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/ubicaciones.php');
}

function update(){
    $sql ="UPDATE ubicacionesqr SET  descripcionUbicacionQR='" . $_POST['descripcion'] . "', latitududUbicacionQR='" . $_POST['latitud'] . "', longitudUbicacionQR='" . $_POST['longitud'] . "', estadoUbicacionQR='" . $_POST['estado'] . "' WHERE idUbicacionesQR='".$_POST['id_oculto']."'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/ubicaciones.php');
}

function delete(){
    $sql = "UPDATE ubicacionesqr SET estadoUbicacionQR=0  WHERE idUbicacionesQR= '" . $_POST['id_oculto'] . "' ";
    mysqli_query(conectar(), $sql);

    header('Location:../admin/ubicaciones.php');
}

function cancel(){

    header('Location:../admin/ubicaciones.php');
}

?>