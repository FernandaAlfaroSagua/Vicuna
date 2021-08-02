<?php

function conectar()
{
    $con = mysqli_connect("localhost", "root", "123456789", "vicuna_qr");
    return $con;
}


function fecha()
{
    $fecha_es = date('d-m-Y');
    return $fecha_es;
}

function fecha_bd($fecha)
{
    $dia = substr($fecha, 0, 2);
    $mes = substr($fecha, 3, 2);
    $anio = substr($fecha, 6, 4);
    $f = $anio . "-" . $mes . "-" . $dia;

    return $f;
}

function fechaHTML($fecha){
    $newDate = date("d/m/Y", strtotime($fecha));
    return $newDate; // Outputs: 31-03-2019
}
?>