<?php

/* Incluyo las funciones */
 include ("../Models/funciones.php");


/* recibo las variables de la vista */
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];




$sql ="SELECT usuario,clave FROM usuario WHERE usuario = '$usuario' AND clave = '$clave'";
$result = mysqli_query(conectar(),$sql);
$num = mysqli_num_rows($result); // cantidad de datos que hay en la tabla.
$datosAdmin = mysqli_fetch_array($result); 
header("Location:../portal.php");






?>
