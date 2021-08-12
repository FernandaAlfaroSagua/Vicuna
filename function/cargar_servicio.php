<?php

include('setup.php');
$sql="SELECT * FROM servicio WHERE estadoServicio=1";
?>

<select class="form-control" id="servicio" name="servicio">
    <option value="">Seleccione</option>
    <?php 
        $result = mysqli_query(conectar(), $sql);
        while ($datos = mysqli_fetch_array($result)) {             
    ?>                      
    <option value="<?php echo $datos['idServicio'] ?>"><?php echo utf8_encode($datos['descripcionServicio']); ?></option>
    <?php }?>
</select>