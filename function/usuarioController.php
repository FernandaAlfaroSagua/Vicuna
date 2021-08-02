<?php
/* Incluyo las funciones */
include("setup.php");

// tiempo
date_default_timezone_set('America/Santiago');

// menu de funciones
switch ($_POST['accion_oculta']) {
    case 'Ingresar':
        create();
        break;
    case 'Update':
        update();
        break;
    case 'show':
        show();
        break;
    case 'buscarUsuario':
        usuarioExistente();
        break;
       case 'Eliminar':
        eliminar();
        break;
    /*case 'Cancelar':
        cancel();
        break; */
}


function create()
{
    $nombreUsuario = $_POST['nombre'];
    $usuario = $_POST['usuario']; // tipo email
    $clave = $_POST['clave']; // encryptada
    $pass = md5($clave);
    $fechaCreacion = date('Y-m-d');
    $horaCreacion = date('H:i:s');
    $estado = $_POST['estado']; //1 es activo ; 0 Inactivo  */


    $sql = "INSERT INTO  usuario SET
    nombreUsuario='" . $nombreUsuario . "',
    usuario='" . $usuario . "',
    clave='" . $pass . "',
    fechaCreacion='" . $fechaCreacion . "',
    horaCreacion='" . $horaCreacion . "',
    estado='" . $estado . "'";
    mysqli_query(conectar(), $sql);
    // header("Location:../admin/usuarios.php");
}


function update()
{

    
    $idUsuario = $_POST['id'];
    $nombreUsuario = $_POST['nombre'];
    $usuario = $_POST['usuario']; // tipo email
    $clave = $_POST['clave']; // encryptada
    $pass = md5($clave);
    $estado = $_POST['estado']; //1 es activo ; 0 Inactivo  */


    $sql = "UPDATE usuario SET 
     nombreUsuario='" . $nombreUsuario . "',
     usuario ='" . $usuario . "',
     clave = '" . $pass . "',
     estado = '" . $estado . "' WHERE idUsuario='" . $idUsuario . "'";

    mysqli_query(conectar(), $sql);
}

function show()
{
    $return_arr = array();
    $sqlser = "SELECT * FROM usuario WHERE estado=1 or estado=0";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $idUsuario = $datos['idUsuario'];
        $nombreusuario = $datos['nombreusuario'];
        $usuario = $datos['usuario'];
        $clave = $datos['clave'];
        $fechacreacion = $datos['fechacreacion'];
        $horacreacion = $datos['horacreacion'];
        $estado = $datos['estado'];

        $return_arr[] = array(
            "idUsuario" => $idUsuario,
            "nombreusuario" => $nombreusuario,
            "usuario" => $usuario,
            "clave" => $clave,
            "fechacreacion" => fechaHTML($fechacreacion),
            "horacreacion" => $horacreacion,
            "estado" => $estado
        );
    }
    echo json_encode($return_arr);
}

function eliminar()
{
   
    $idUsuario = $_POST['id'];
    $sql = "UPDATE usuario SET estado=0  WHERE estado = 1 and idUsuario= '" . $idUsuario ."'";


    mysqli_query(conectar(), $sql);
}


function usuarioExistente()
{ 
    $usuario = $_POST['usuario'];
    $sqlser = "SELECT usuario FROM usuario WHERE usuario='" . $usuario . "'";
    $resultser = mysqli_query(conectar(), $sqlser);
    $num = mysqli_num_rows($resultser);

    echo $num;
} 
