<?php
include 'setup.php';
switch ($_POST['accion_oculta']) {
    case 'QR':
        getDataQR();
        break;
    case 'Empresa':
        getDataEmpresa();
        break;
    case 'PuntosInteres':
        getDataPuntosInteres();
        break;
    case 'buscarUsuario':
        getDataPuntosInteres();
        break;
}

function getDataQR()
{
    $sqlser = "SELECT * FROM ubicacionesqr WHERE estadoUbicacionQR=1";
    $resultser = mysqli_query(conectar(), $sqlser);
    $rows = array();
    while ($r = mysqli_fetch_array($resultser)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
}
function getDataEmpresa()
{
    $sqlser = "SELECT * FROM empresa";
    $resultser = mysqli_query(conectar(), $sqlser);
    $rows = array();
    while ($r = mysqli_fetch_array($resultser)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
}

function getDataPuntosInteres()
{
    $sqlser = "SELECT * FROM puntointeres WHERE estadoPuntointeres=1";
    $resultser = mysqli_query(conectar(), $sqlser);
    $rows = array();
    while ($r = mysqli_fetch_array($resultser)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
}
