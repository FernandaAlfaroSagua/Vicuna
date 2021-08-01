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
    $sql ="INSERT INTO puntointeres SET  descripcionPuntointeres='" . $_POST['descripcion'] . "', popularPuntointeres='" . $_POST['popular'] . "', galeria_idGaleria='" . $_POST['galeria'] . "', estadoPuntointeres='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/punto-de-interes.php');
}

function update(){
    $sql ="UPDATE puntointeres SET  descripcionPuntointeres='" . $_POST['descripcion'] . "', popularPuntointeres='" . $_POST['popular'] . "', galeria_idGaleria='" . $_POST['galeria'] . "',  estadoPuntointeres='" . $_POST['estado'] . "' WHERE idPuntointeres='".$_POST['id_oculto']."'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/punto-de-interes.php');
}

function delete(){
    $sql = "UPDATE puntointeres SET estadoPuntointeres=0  WHERE idPuntointeres= '" . $_POST['id_oculto'] . "' ";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/punto-de-interes.php');
}

function cancel(){

    header('Location:../admin/punto-de-interes.php');
}

?>