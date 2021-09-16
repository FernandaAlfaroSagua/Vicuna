<?php

include('setup.php');

switch ($_POST['accion_oculta']) {
    case 'numEmpresa':
        numEmpresa();
        break;
    case 'actEmpresa':
        actEmpresa();
        break; 
    case 'inactEmpresa':
        inactEmpresa();
        break;
    case 'numPunto':
        numPunto();
        break;
    case 'actPunto':
        actPunto();
        break; 
    case 'inactPunto':
        inactPunto();
        break;
    case 'numUser':
        numUser();
        break;
    case 'actUser':
        actUser();
        break; 
    case 'inactUser':
        inactUser();
        break;
}

function numEmpresa()
{
    $sql = "SELECT * FROM empresa";
    $res = mysqli_query(conectar(), $sql);
    $num = mysqli_num_rows($res);

    echo json_encode($num);
}

function actEmpresa()
{
    $sql = "SELECT * FROM empresa WHERE estadoEmpresa=1 ";
    $res = mysqli_query(conectar(), $sql);
    $num = mysqli_num_rows($res);

    echo json_encode($num);
}

function inactEmpresa()
{
    $sql = "SELECT * FROM empresa WHERE estadoEmpresa=0 ";
    $res = mysqli_query(conectar(), $sql);
    $num = mysqli_num_rows($res);

    echo json_encode($num);
}

function numPunto()
{
    $sql = "SELECT * FROM puntointeres";
    $res = mysqli_query(conectar(), $sql);
    $num = mysqli_num_rows($res);

    echo json_encode($num);
}

function actPunto()
{
    $sql = "SELECT * FROM puntointeres WHERE estadoPuntointeres=1 ";
    $res = mysqli_query(conectar(), $sql);
    $num = mysqli_num_rows($res);

    echo json_encode($num);
}

function inactPunto()
{
    $sql = "SELECT * FROM puntointeres WHERE estadoPuntointeres=0 ";
    $res = mysqli_query(conectar(), $sql);
    $num = mysqli_num_rows($res);

    echo json_encode($num);
}

function numUser()
{
    $sql = "SELECT * FROM usuario";
    $res = mysqli_query(conectar(), $sql);
    $num = mysqli_num_rows($res);

    echo json_encode($num);
}

function actUser()
{
    $sql = "SELECT * FROM usuario WHERE estado=1 ";
    $res = mysqli_query(conectar(), $sql);
    $num = mysqli_num_rows($res);

    echo json_encode($num);
}

function inactUser()
{
    $sql = "SELECT * FROM usuario WHERE estado=0 ";
    $res = mysqli_query(conectar(), $sql);
    $num = mysqli_num_rows($res);

    echo json_encode($num);
}

?>