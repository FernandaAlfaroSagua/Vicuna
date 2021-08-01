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
    $sql ="INSERT INTO galeria SET  nombreGaleria='" . $_POST['nombre'] . "', estadoGaleria='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/galeria.php');
   
}

function update(){
    $sql ="UPDATE galeria SET  nombreGaleria='" . $_POST['nombre'] . "', estadoGaleria='" . $_POST['estado'] . "' WHERE idGaleria='".$_POST['id_oculto']."'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/galeria.php');
}

function delete(){
    $sql = "UPDATE galeria SET estadoGaleria=0  WHERE idGaleria= '" . $_POST['id_oculto'] . "' ";
    mysqli_query(conectar(), $sql);

    header('Location:../admin/galeria.php');
}

function cancel(){

    header('Location:../admin/galeria.php');
}

?>