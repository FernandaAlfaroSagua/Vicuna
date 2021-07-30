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
    $total = count($_FILES['fotos']['name']);
    for( $i=0 ; $i < $total ; $i++ ) {
        $file_name = $_FILES['fotos']['name'][$i];
        $file_extension = end(explode('.', $_FILES['fotos']['name'][$i]));
        $extensiones = array("jpg", "jpeg", "png");
        $tmpFilePath = $_FILES['fotos']['tmp_name'][$i];
        $dir = '../galeriaempresa/';
        
            $new_name = md5(rand()).'.'.$file_extension;
            if($i==1){
                $sql2 = "INSERT INTO galeriaempresa SET imagen = '".$new_name."', empresa_servicio_idServicio= '".$_POST['servicio_oculta']."' , empresa_rubro_idRubro= '".$_POST['rubro_oculta']."',  empresa_idEmpresa = '".$_POST['id_oculta']."', estado=1, principal=1";
            } else {
                $sql2 = "INSERT INTO galeriaempresa SET imagen = '".$new_name."', empresa_servicio_idServicio= '".$_POST['servicio_oculta']."' , empresa_rubro_idRubro= '".$_POST['rubro_oculta']."',  empresa_idEmpresa = '".$_POST['id_oculta']."', estado=1, principal=0";
            }
            
              if(mysqli_query(conectar(), $sql2)){
                move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $dir.$new_name );
              }

         
      }

    header('Location:../admin/galeria-empresa.php?id='.$_POST['id_oculta'].'&servicio='.$_POST['servicio_oculta'].'&rubro='.$_POST['rubro_oculta']);
   
}


?>