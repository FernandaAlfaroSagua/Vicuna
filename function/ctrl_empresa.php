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
    $sql ="INSERT INTO empresa SET  descripcionEmpresa='" . $_POST['descripcion'] . "', nombreEmpresa='" . $_POST['nombre'] . "', direccionEmpresa='" . $_POST['direccion'] . "', telefonofijoEmpresa='" . $_POST['telefono'] . "', telefonocelularEmpresa='" . $_POST['celular'] . "', correoEmpresa='" . $_POST['correo'] . "', paginawebEmpresa='" . $_POST['pagina'] . "', rrssfacebookEmpresa='" . $_POST['facebook'] . "', rrsstwitterEmpresa='" . $_POST['twitter'] . "', rrssinstagramEmpresa='" . $_POST['instagram'] . "', servicio_idServicio='" . $_POST['servicio'] . "', rubro_idRubro='" . $_POST['rubro'] . "', estadoEmpresa='" . $_POST['estado'] . "'";
    var_dump($sql);
    mysqli_query(conectar(), $sql);
   
}

function update(){
    $sql ="UPDATE empresa SET   descripcionEmpresa='" . $_POST['descripcion'] . "', nombreEmpresa='" . $_POST['nombre'] . "', direccionEmpresa='" . $_POST['direccion'] . "', telefonofijoEmpresa='" . $_POST['telefono'] . "', telefonocelularEmpresa='" . $_POST['celular'] . "', correoEmpresa='" . $_POST['correo'] . "', paginawebEmpresa='" . $_POST['pagina'] . "', rrssfacebookEmpresa='" . $_POST['facebook'] . "', rrsstwitterEmpresa='" . $_POST['twitter'] . "', rrssinstagramEmpresa='" . $_POST['instagram'] . "', servicio_idServicio='" . $_POST['servicio'] . "', rubro_idRubro='" . $_POST['rubro'] . "',  estadoEmpresa='" . $_POST['estado'] . "' WHERE idEmpresa='".$_POST['id']."'";
    mysqli_query(conectar(), $sql);
}

function delete(){
    $sql = "UPDATE empresa SET estadoEmpresa=0  WHERE idEmpresa= '" . $_POST['id'] . "'";
    mysqli_query(conectar(), $sql);
}

function show(){
    $return_arr = array();
    $sqlser = "SELECT * FROM empresa";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $idEmpresa = $datos['idEmpresa'];
        $nombreEmpresa = $datos['nombreEmpresa'];
        $descripcionEmpresa = $datos['descripcionEmpresa'];
        $direccionEmpresa = $datos['direccionEmpresa'];
        $telefonofijoEmpresa = $datos['telefonofijoEmpresa'];
        $telefonocelularEmpresa = $datos['telefonocelularEmpresa'];
        $correoEmpresa = $datos['correoEmpresa'];
        $paginawebEmpresa = $datos['paginawebEmpresa'];
        $rrssfacebookEmpresa = $datos['rrssfacebookEmpresa'];
        $rrsstwitterEmpresa = $datos['rrsstwitterEmpresa'];
        $rrssinstagramEmpresa = $datos['rrssinstagramEmpresa'];
        $servicio = $datos['servicio_idServicio'];
        $rubro = $datos['rubro_idRubro'];
        $estado = $datos['estadoEmpresa'];


        $return_arr[] = array(
            "idEmpresa" => $idEmpresa,
            "nombreEmpresa" => $nombreEmpresa,
            "descripcionEmpresa" => $descripcionEmpresa,
            "direccionEmpresa" => $direccionEmpresa,
            "telefonofijoEmpresa" => $telefonofijoEmpresa,
            "telefonocelularEmpresa" => $telefonocelularEmpresa,
            "correoEmpresa" => $correoEmpresa,
            "paginawebEmpresa" => $paginawebEmpresa,
            "rrssfacebookEmpresa" => $rrssfacebookEmpresa,
            "rrsstwitterEmpresa" => $rrsstwitterEmpresa,
            "rrssinstagramEmpresa" => $rrssinstagramEmpresa,
            "servicio_idServicio" => $servicio,
            "rubro_idRubro" => $rubro,
            "estadoEmpresa" => $estado
        );
    }
    echo json_encode($return_arr);
}

?>