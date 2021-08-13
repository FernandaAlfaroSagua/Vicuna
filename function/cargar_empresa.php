<?php

include('setup.php');
$sql="SELECT * FROM empresa WHERE estadoEmpresa=1";
?>

<select class="form-control" id="empresa" name="empresa">
    <option value="">Seleccione</option>
    <?php 
        $result = mysqli_query(conectar(), $sql);
        while ($datos = mysqli_fetch_array($result)) {             
    ?>                      
    <option value="<?php echo $datos['idEmpresa'] ?>"><?php echo ($datos['nombreEmpresa']); ?></option>
    <?php }?>
</select>