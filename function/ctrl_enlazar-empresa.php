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
    $sql ="INSERT INTO empresa_has_ubicacionesqr SET  empresa_idEmpresa='" . $_POST['empresa'] . "', ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion'] . "'";
    mysqli_query(conectar(), $sql);
   
}

function update(){
    $sql ="UPDATE empresa_has_ubicacionesqr SET  empresa_idEmpresa='" . $_POST['empresa'] . "', ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion'] . "' WHERE empresa_idEmpresa='".$_POST['empresa_pasado']."' AND ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion_pasado'] . "'";
    mysqli_query(conectar(), $sql);
}

function delete(){
    $sql = "DELETE FROM empresa_has_ubicacionesqr WHERE empresa_idEmpresa= '" . $_POST['empresa'] . "' AND ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion']."'";
    mysqli_query(conectar(), $sql);
}

function show()
{
    $return_arr = array();
    $sqlser = "SELECT
    `empresa`.`nombreEmpresa`,
    `empresa_has_ubicacionesqr`.*,
    `ubicacionesqr`.`descripcionUbicacionQR`
  FROM
    `empresa_has_ubicacionesqr`
    INNER JOIN `ubicacionesqr`
  ON `empresa_has_ubicacionesqr`.`ubicacionesQR_idUbicacionesQR` =
  `ubicacionesqr`.`idUbicacionesQR`
    INNER JOIN `empresa` ON `empresa_has_ubicacionesqr`.`empresa_idEmpresa` =
  `empresa`.`idEmpresa`";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $ubicacionesQR_idUbicacionesQR = $datos['ubicacionesQR_idUbicacionesQR'];
        $descripcionUbicacionQR = $datos['descripcionUbicacionQR'];
        $empresa_idEmpresa = $datos['empresa_idEmpresa'];
        $nombreEmpresa = $datos['nombreEmpresa'];

        $return_arr[] = array(
            "ubicacionesQR_idUbicacionesQR" => $ubicacionesQR_idUbicacionesQR,
            "descripcionUbicacionQR" => $descripcionUbicacionQR,
            "empresa_idEmpresa" => $empresa_idEmpresa,
            "nombreEmpresa" => $nombreEmpresa,
        );
    }
    echo json_encode($return_arr);
}


?>