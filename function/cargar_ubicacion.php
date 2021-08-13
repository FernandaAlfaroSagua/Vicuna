<?php

include('setup.php');
$sql="SELECT * FROM ubicacionesqr WHERE estadoUbicacionQR=1";
?>

<select class="form-control" id="ubicacion" name="ubicacion">
    <option value="">Seleccione</option>
    <?php 
        $result = mysqli_query(conectar(), $sql);
        while ($datos = mysqli_fetch_array($result)) {             
    ?>                      
    <option value="<?php echo $datos['idUbicacionesQR'] ?>"><?php echo ($datos['descripcionUbicacionQR']); ?></option>
    <?php }?>
</select>