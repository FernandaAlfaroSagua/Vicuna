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
    case 'Cancelar':
        cancel();
        break;
}

function insertar()
{
    $sql ="INSERT INTO empresa SET  descripcionEmpresa='" . $_POST['descripcion'] . "', nombreEmpresa='" . $_POST['nombre'] . "', direccionEmpresa='" . $_POST['direccion'] . "', telefonofijoEmpresa='" . $_POST['telefono'] . "', telefonocelularEmpresa='" . $_POST['celular'] . "', correoEmpresa='" . $_POST['correo'] . "', paginawebEmpresa='" . $_POST['pagina'] . "', rrssfacebookEmpresa='" . $_POST['facebook'] . "', rrsstwitterEmpresa='" . $_POST['twitter'] . "', rrssinstagramEmpresa='" . $_POST['instagram'] . "', servicio_idServicio='" . $_POST['servicio'] . "', rubro_idRubro='" . $_POST['rubro'] . "', estadoEmpresa='" . $_POST['estado'] . "'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/empresa.php');
   
}

function update(){
    $sql ="UPDATE empresa SET   descripcionEmpresa='" . $_POST['descripcion'] . "', nombreEmpresa='" . $_POST['nombre'] . "', direccionEmpresa='" . $_POST['direccion'] . "', telefonofijoEmpresa='" . $_POST['telefono'] . "', telefonocelularEmpresa='" . $_POST['celular'] . "', correoEmpresa='" . $_POST['correo'] . "', paginawebEmpresa='" . $_POST['pagina'] . "', rrssfacebookEmpresa='" . $_POST['facebook'] . "', rrsstwitterEmpresa='" . $_POST['twitter'] . "', rrssinstagramEmpresa='" . $_POST['instagram'] . "', servicio_idServicio='" . $_POST['servicio'] . "', rubro_idRubro='" . $_POST['rubro'] . "',  estadoEmpresa='" . $_POST['estado'] . "' WHERE idEmpresa='".$_POST['id_oculto']."'";
    mysqli_query(conectar(), $sql);
    header('Location:../admin/empresa.php');
}

function delete(){
    $sql = "UPDATE empresa SET estadoEmpresa=0  WHERE idEmpresa= '" . $_POST['id_oculto'] . "' ";
    mysqli_query(conectar(), $sql);

    header('Location:../admin/empresa.php');
}

function cancel(){

    header('Location:../admin/empresa.php');
}

?>