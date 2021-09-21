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
    $sql ="INSERT INTO puntointeres SET  descripcionPuntointeres='" . $_POST['descripcion'] . "', popularPuntointeres='" . $_POST['popular'] . "', galeria_idGaleria='" . $_POST['galeria'] . "', estadoPuntointeres='" . $_POST['estado'] . "', latitudPuntoInteres='" . $_POST['latitud'] . "', longitudPuntoInteres='" . $_POST['longitud'] . "'";
    mysqli_query(conectar(), $sql);
}

function update(){
    $sql ="UPDATE puntointeres SET  descripcionPuntointeres='" . $_POST['descripcion'] . "', popularPuntointeres='" . $_POST['popular'] . "', galeria_idGaleria='" . $_POST['galeria'] . "',  estadoPuntointeres='" . $_POST['estado'] . "', latitudPuntoInteres='" . $_POST['latitud'] . "', longitudPuntoInteres='" . $_POST['longitud'] . "' WHERE idPuntointeres='".$_POST['id']."'";
    mysqli_query(conectar(), $sql);
}

function delete(){
    $sql = "UPDATE puntointeres SET estadoPuntointeres=0  WHERE idPuntointeres= '" . $_POST['id'] . "' ";
    mysqli_query(conectar(), $sql);
}

function show()
{
    $return_arr = array();
    $sqlser = "SELECT * FROM puntointeres WHERE estadoPuntointeres=1 or estadoPuntointeres=0";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $idPuntointeres = $datos['idPuntointeres'];
        $descripcionPuntointeres = $datos['descripcionPuntointeres'];
        $popularPuntointeres = $datos['popularPuntointeres'];
        $galeria_idGaleria = $datos['galeria_idGaleria'];
        $estado = $datos['estadoPuntointeres'];
        $latitudPuntoInteres = $datos['latitudPuntoInteres'];
        $longitudPuntoInteres = $datos['longitudPuntoInteres'];

        $return_arr[] = array(
            "idPuntointeres" => $idPuntointeres,
            "descripcionPuntointeres" => $descripcionPuntointeres,
            "popularPuntointeres" => $popularPuntointeres,
            "galeria_idGaleria" => $galeria_idGaleria,
            "estadoPuntointeres" => $estado,
            "latitudPuntoInteres" => $latitudPuntoInteres,
            "longitudPuntoInteres" => $longitudPuntoInteres
        );
    }
    echo json_encode($return_arr);
}

?>