<?php

include('setup.php');
$sql="SELECT * FROM calles WHERE estadoCalle=1";
?>

<select class="form-control" id="calle" name="calle">
    <option value="">Seleccione</option>
    <?php 
        $result = mysqli_query(conectar(), $sql);
        while ($datos = mysqli_fetch_array($result)) {             
    ?>                      
    <option value="<?php echo $datos['idcalles'] ?>"><?php echo ($datos['nombreCalle']); ?></option>
    <?php }?>
</select>