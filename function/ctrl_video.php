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
    $sql ="INSERT INTO multimediavideo SET  linkyoutubeMultimedia='" . $_POST['nombre'] . "', estadoMultimedia='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/videos.php');
   
}

function update(){
    $sql ="UPDATE multimediavideo SET  linkyoutubeMultimedia='" . $_POST['nombre'] . "', estadoMultimedia='" . $_POST['estado'] . "' WHERE idMultimediavideo='".$_POST['id_oculto']."'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/videos.php');
}

function delete(){
    $sql = "UPDATE multimediavideo SET estadoMultimedia=0  WHERE idMultimediavideo= '" . $_POST['id_oculto'] . "' ";
    mysqli_query(conectar(), $sql);

    header('Location:../admin/videos.php');
}

function cancel(){

    header('Location:../admin/videos.php');
}

?>