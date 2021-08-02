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
    case 'show':
        show();
        break;
}

function insertar()
{
    $sql ="INSERT INTO multimediavideo SET  linkyoutubeMultimedia='" . $_POST['link'] . "', estadoMultimedia='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
   
}

function update(){
    $sql ="UPDATE multimediavideo SET  linkyoutubeMultimedia='" . $_POST['link'] . "', estadoMultimedia='" . $_POST['estado'] . "' WHERE idMultimediavideo='".$_POST['id']."'";
    mysqli_query(conectar(), $sql);
}

function delete(){
    $sql = "UPDATE multimediavideo SET estadoMultimedia=0  WHERE idMultimediavideo= '" . $_POST['id'] . "' ";
    mysqli_query(conectar(), $sql);

}

function show()
{
    $return_arr = array();
    $sqlser = "SELECT * FROM multimediavideo WHERE estadoMultimedia=1 or estadoMultimedia=0";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $idMultimediavideo = $datos['idMultimediavideo'];
        $linkyoutubeMultimedia = $datos['linkyoutubeMultimedia'];
        $estado = $datos['estadoMultimedia'];

        $return_arr[] = array(
            "idMultimediavideo" => $idMultimediavideo,
            "linkyoutubeMultimedia" => $linkyoutubeMultimedia,
            "estadoMultimedia" => $estado
        );
    }
    echo json_encode($return_arr);
}


?>