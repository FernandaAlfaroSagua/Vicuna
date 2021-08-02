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
    $sql ="INSERT INTO rubro SET  nombreRubro='" . $_POST['nombre'] . "', estadoRubro='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);   
}

function update(){
    $sql ="UPDATE rubro SET  nombreRubro='" . $_POST['nombre'] . "', estadoRubro='" . $_POST['estado'] . "' WHERE idRubro='".$_POST['id']."'";
    mysqli_query(conectar(), $sql);}

function delete(){
    $sql = "UPDATE rubro SET estadoRubro=0  WHERE idRubro= '" . $_POST['id'] . "' ";
    mysqli_query(conectar(), $sql);
}
 
function show()
{
    $return_arr = array();
    $sqlser = "SELECT * FROM rubro WHERE estadoRubro=1 or estadoRubro=0";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $idRubro = $datos['idRubro'];
        $nombreRubro = $datos['nombreRubro'];
        $estado = $datos['estadoRubro'];

        $return_arr[] = array(
            "idRubro" => $idRubro,
            "nombreRubro" => $nombreRubro,
            "estadoRubro" => $estado
        );
    }
    echo json_encode($return_arr);
}
?>