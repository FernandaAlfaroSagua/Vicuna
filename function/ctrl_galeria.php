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
    $sql ="INSERT INTO galeria SET  nombreGaleria='" . $_POST['nombre'] . "', estadoGaleria='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
   
}

function update(){
    $sql ="UPDATE galeria SET  nombreGaleria='" . $_POST['nombre'] . "', estadoGaleria='" . $_POST['estado'] . "' WHERE idGaleria='".$_POST['id']."'";
    mysqli_query(conectar(), $sql);
}

function delete(){
    $sql = "UPDATE galeria SET estadoGaleria=0  WHERE idGaleria= '" . $_POST['id'] . "'";
    mysqli_query(conectar(), $sql);
}

function show(){
    $return_arr = array();
    $sqlser = "SELECT * FROM galeria WHERE estadoGaleria=1 or estadoGaleria=0";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $idGaleria = $datos['idGaleria'];
        $nombreGaleria = $datos['nombreGaleria'];
        $estado = $datos['estadoGaleria'];

        $return_arr[] = array(
            "idGaleria" => $idGaleria,
            "nombreGaleria" => $nombreGaleria,
            "estadoGaleria" => $estado
        );
    }
    echo json_encode($return_arr);
}

?>