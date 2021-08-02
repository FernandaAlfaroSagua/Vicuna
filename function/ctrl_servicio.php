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
    $sql ="INSERT INTO servicio SET  descripcionServicio='" . $_POST['descripcion'] . "', estadoServicio='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
}

function update(){
    $sql ="UPDATE servicio SET  descripcionServicio='" . $_POST['descripcion'] . "', estadoServicio='" . $_POST['estado'] . "' WHERE idServicio='".$_POST['id']."'";
    mysqli_query(conectar(), $sql);
}

function delete(){
    $sql = "UPDATE servicio SET estadoServicio=0  WHERE idServicio= '" . $_POST['id'] . "' ";
    mysqli_query(conectar(), $sql);
}
 
function show()
{
    $return_arr = array();
    $sqlser = "SELECT * FROM servicio WHERE estadoServicio=1 or estadoServicio=0";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $idServicio = $datos['idServicio'];
        $descripcionServicio = $datos['descripcionServicio'];
        $estado = $datos['estadoServicio'];

        $return_arr[] = array(
            "idServicio" => $idServicio,
            "descripcionServicio" => $descripcionServicio,
            "estadoServicio" => $estado
        );
    }
    echo json_encode($return_arr);
}
?>