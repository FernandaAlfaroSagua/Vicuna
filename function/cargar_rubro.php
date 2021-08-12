<?php

include('setup.php');
$sql="SELECT * FROM rubro WHERE estadoRubro=1";
?>

<select class="form-control" id="rubro" name="rubro">
    <option value="">Seleccione</option>
    <?php 
        $result = mysqli_query(conectar(), $sql);
        while ($datos = mysqli_fetch_array($result)) {             
    ?>                      
    <option value="<?php echo $datos['idRubro'] ?>"><?php echo utf8_encode($datos['nombreRubro']); ?></option>
    <?php }?>
</select>