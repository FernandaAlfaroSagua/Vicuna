<?php

include('setup.php');
$sql="SELECT * FROM puntointeres WHERE estadoPuntointeres=1";
?>

<select class="form-control" id="interes" name="interes">
    <option value="">Seleccione</option>
    <?php 
        $result = mysqli_query(conectar(), $sql);
        while ($datos = mysqli_fetch_array($result)) {             
    ?>                      
    <option value="<?php echo $datos['idPuntointeres'] ?>"><?php echo ($datos['descripcionPuntointeres']); ?></option>
    <?php }?>
</select>