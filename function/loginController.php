<?php

/* Incluyo las funciones */
include("../function/setup.php");


// menu de funciones
switch ($_POST['accion']) {
    case 'buscarUsuario':
        buscarUsuarioLogin();
        break;
    case 'cargarInicio':
       cargarInicio();
        break;
}


function buscarUsuarioLogin()
{

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $pass = md5($clave);
    $sql = "SELECT * FROM usuario WHERE usuario = '" . $usuario . "' AND clave = '" . $pass . "'";
    $result = mysqli_query(conectar(), $sql);
    $num = mysqli_num_rows($result); // cantidad de datos trae la query en este caso un 1 o un 0
    $datos = mysqli_fetch_array($result); // datos del usuario

   
    // si no encuentra al usuario en el sistema
    if ($num == 1) {
        session_start();
        $_SESSION['usuario'] = $datos['idUsuario'];
        echo json_encode($num);

    } else  {
        echo json_encode($num);
    }

}


function cargarInicio()
{
    $urlInicio = "../admin/portal.php";
    echo $urlInicio;
}

?>






