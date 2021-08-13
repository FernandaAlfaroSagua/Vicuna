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
    $sql ="INSERT INTO calles_has_ubicacionesqr SET  calles_idcalles='" . $_POST['calle'] . "', ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion'] . "'";
    mysqli_query(conectar(), $sql);
   
}

function update(){
    $sql ="UPDATE calles_has_ubicacionesqr SET  calles_idcalles='" . $_POST['calle'] . "', ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion'] . "' WHERE calles_idcalles='".$_POST['calle_pasado']."' AND ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion_pasado'] . "'";
    mysqli_query(conectar(), $sql);
}

function delete(){
    $sql = "DELETE FROM calles_has_ubicacionesqr WHERE calles_idcalles= '" . $_POST['calle'] . "' AND ubicacionesQR_idUbicacionesQR='" . $_POST['ubicacion']."'";
    mysqli_query(conectar(), $sql);
}

function show()
{
    $return_arr = array();
    $sqlser = "SELECT
    `calles_has_ubicacionesqr`.*,
    `calles`.`nombreCalle`,
    `ubicacionesqr`.`descripcionUbicacionQR`
  FROM
    `calles_has_ubicacionesqr`
    INNER JOIN `ubicacionesqr` ON `ubicacionesqr`.`idUbicacionesQR` =
  `calles_has_ubicacionesqr`.`ubicacionesQR_idUbicacionesQR`
    INNER JOIN `calles`
  ON `calles`.`idcalles` = `calles_has_ubicacionesqr`.`calles_idcalles`";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $ubicacionesQR_idUbicacionesQR = $datos['ubicacionesQR_idUbicacionesQR'];
        $descripcionUbicacionQR = $datos['descripcionUbicacionQR'];
        $calles_idcalles = $datos['calles_idcalles'];
        $nombreCalle = $datos['nombreCalle'];

        $return_arr[] = array(
            "ubicacionesQR_idUbicacionesQR" => $ubicacionesQR_idUbicacionesQR,
            "descripcionUbicacionQR" => $descripcionUbicacionQR,
            "calles_idcalles" => $calles_idcalles,
            "nombreCalle" => $nombreCalle,
        );
    }
    echo json_encode($return_arr);
}


?>