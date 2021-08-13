<?php

include('setup.php');
$sql="SELECT * FROM multimediavideo WHERE estadoMultimedia=1";
?>

<select class="form-control" id="link" name="link">
    <option value="">Seleccione</option>
    <?php 
        $result = mysqli_query(conectar(), $sql);
        while ($datos = mysqli_fetch_array($result)) {             
    ?>                      
    <option value="<?php echo $datos['idMultimediavideo'] ?>"><?php echo ($datos['linkyoutubeMultimedia']); ?></option>
    <?php }?>
</select>