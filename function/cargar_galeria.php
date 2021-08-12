<?php

include('setup.php');
$sql = "SELECT * FROM galeria WHERE estadoGaleria=1";
?>

<select class="form-control" id="galeria" name="galeria">
    <option value="">Seleccione</option>
    <?php
        $result = mysqli_query(conectar(), $sql);
        while ($datos = mysqli_fetch_array($result)) {             
    ?>                      
    <option value="<?php echo $datos['idGaleria'] ?>"><?php echo utf8_encode($datos['nombreGaleria']); ?></option>
    <?php }?>
</select>