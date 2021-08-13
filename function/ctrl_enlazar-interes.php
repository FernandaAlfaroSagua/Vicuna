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
    $sql ="INSERT INTO ubicacionesqr_has_puntointeres SET  puntointeres_idPuntointeres='" . $_POST['interes'] . "', ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion'] . "'";
    mysqli_query(conectar(), $sql);
   
}

function update(){
    $sql ="UPDATE ubicacionesqr_has_puntointeres SET  puntointeres_idPuntointeres='" . $_POST['interes'] . "', ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion'] . "' WHERE puntointeres_idPuntointeres='".$_POST['interes_pasado']."' AND ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion_pasado'] . "'";
    mysqli_query(conectar(), $sql);
}

function delete(){
    $sql = "DELETE FROM ubicacionesqr_has_puntointeres WHERE puntointeres_idPuntointeres= '" . $_POST['interes'] . "' AND ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion']."'";
    mysqli_query(conectar(), $sql);
}

function show()
{
    $return_arr = array();
    $sqlser = "SELECT
    `ubicacionesqr_has_puntointeres`.*,
    `ubicacionesqr`.`descripcionUbicacionQR`,
    `puntointeres`.`descripcionPuntointeres`
  FROM
    `ubicacionesqr_has_puntointeres`
    INNER JOIN `ubicacionesqr` ON `ubicacionesqr`.`idUbicacionesQR` =
  `ubicacionesqr_has_puntointeres`.`ubicacionesQR_idUbicacionesQR`
    INNER JOIN `puntointeres` ON `puntointeres`.`idPuntointeres` =
  `ubicacionesqr_has_puntointeres`.`puntointeres_idPuntointeres`";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $ubicacionesQR_idUbicacionesQR = $datos['ubicacionesQR_idUbicacionesQR'];
        $descripcionUbicacionQR = $datos['descripcionUbicacionQR'];
        $puntointeres_idPuntointeres = $datos['puntointeres_idPuntointeres'];
        $descripcionPuntointeres = $datos['descripcionPuntointeres'];

        $return_arr[] = array(
            "ubicacionesQR_idUbicacionesQR" => $ubicacionesQR_idUbicacionesQR,
            "descripcionUbicacionQR" => $descripcionUbicacionQR,
            "puntointeres_idPuntointeres" => $puntointeres_idPuntointeres,
            "descripcionPuntointeres" => $descripcionPuntointeres,
        );
    }
    echo json_encode($return_arr);
}


?>