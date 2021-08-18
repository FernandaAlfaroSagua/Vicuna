<?php

include('setup.php');
$sql="SELECT * FROM servicio WHERE estadoServicio=1";
$result = mysqli_query(conectar(), $sql);
?>

<?php
while ($datos = mysqli_fetch_array($result)) { 
?>
    <div class="card">
        <div class="card-body">
          <h3 clas="card-title"><?php echo $datos['descripcionServicio'] ?></h3>
          <a href="servicios.php?id=<?php echo $datos['idServicio']; ?>" class="btn btn-danger">Ver Detalles</a>
        </div>
    </div>

<?php } ?>