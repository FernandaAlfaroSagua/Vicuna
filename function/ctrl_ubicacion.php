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
    $sql ="INSERT INTO ubicacionesqr SET  descripcionUbicacionQR='" . $_POST['descripcion'] . "', latitududUbicacionQR='" . $_POST['latitud'] . "', longitudUbicacionQR='" . $_POST['longitud'] . "', estadoUbicacionQR='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
}

function update(){
    $sql ="UPDATE ubicacionesqr SET  descripcionUbicacionQR='" . $_POST['descripcion'] . "', latitududUbicacionQR='" . $_POST['latitud'] . "', longitudUbicacionQR='" . $_POST['longitud'] . "', estadoUbicacionQR='" . $_POST['estado'] . "' WHERE idUbicacionesQR='".$_POST['id']."'";
    mysqli_query(conectar(), $sql);
}

function delete(){
    $sql = "UPDATE ubicacionesqr SET estadoUbicacionQR=0  WHERE idUbicacionesQR= '" . $_POST['id'] . "' ";
    mysqli_query(conectar(), $sql);
}

function show()
{
    $return_arr = array();
    $sqlser = "SELECT * FROM ubicacionesqr WHERE estadoUbicacionQR=1 or estadoUbicacionQR=0";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $idUbicacionesQR = $datos['idUbicacionesQR'];
        $descripcionUbicacionQR = $datos['descripcionUbicacionQR'];
        $latitududUbicacionQR = $datos['latitududUbicacionQR'];
        $longitudUbicacionQR = $datos['longitudUbicacionQR'];
        $estado = $datos['estadoUbicacionQR'];

        $return_arr[] = array(
            "idUbicacionesQR" => $idUbicacionesQR,
            "descripcionUbicacionQR" => $descripcionUbicacionQR,
            "latitududUbicacionQR" => $latitududUbicacionQR,
            "longitudUbicacionQR" => $longitudUbicacionQR,
            "estadoUbicacionQR" => $estado
        );
    }
    echo json_encode($return_arr);
}
?>