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
    $sql ="INSERT INTO calles SET  nombreCalle='" . $_POST['nombre'] . "', estadoCalle='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);   
}

function update(){
    $sql ="UPDATE calles SET  nombreCalle='" . $_POST['nombre'] . "', estadoCalle='" . $_POST['estado'] . "' WHERE idcalles='".$_POST['id']."'";
    mysqli_query(conectar(), $sql);
}

function delete(){
    $sql = "UPDATE calles SET estadoCalle=0  WHERE idcalles= '" . $_POST['id'] . "' ";
    mysqli_query(conectar(), $sql);
}

function show()
{
    $return_arr = array();
    $sqlser = "SELECT * FROM calles WHERE estadoCalle=1 or estadoCalle=0";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $idcalles = $datos['idcalles'];
        $nombreRubro = $datos['nombreCalle'];
        $estado = $datos['estadoCalle'];

        $return_arr[] = array(
            "idcalles" => $idcalles,
            "nombreCalle" => $nombreRubro,
            "estadoCalle" => $estado
        );
    }
    echo json_encode($return_arr);
}
?>