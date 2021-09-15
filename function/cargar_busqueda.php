<?php
        include('setup.php');
        $emp="SELECT * FROM empresa  WHERE estadoEmpresa=1 AND nombreEmpresa LIKE '%".$_GET['q']."%' OR descripcionEmpresa LIKE '%".$_GET['q']."%'";
        $res = mysqli_query(conectar(), $emp);
        $numEmp = mysqli_num_rows($res);
    ?>
    <h2 class="mt-2">Busqueda: <?php echo $_GET['q']; ?></h2>
    <?php if ($numEmp!=0) {
        $sql="SELECT
        `galeriaempresa`.`imagen`,
        `galeriaempresa`.`estado`,
        `galeriaempresa`.`principal`,
        `empresa`.*
    FROM
        `empresa`
        INNER JOIN `galeriaempresa` ON `empresa`.`idEmpresa` =
    `galeriaempresa`.`empresa_idEmpresa` WHERE estadoEmpresa=1 AND principal=1 AND nombreEmpresa LIKE '%".$_GET['q']."%' OR descripcionEmpresa LIKE '%".$_GET['q']."%' GROUP BY idEmpresa";
        $result = mysqli_query(conectar(), $sql);
        while ($datos = mysqli_fetch_array($result)) { 
    ?>
        <div class="card my-4" style="width=100%">
            <div class="row no-gutters">
                <div class="col-sm-5" style="background: #868e96;">
                    <img src="./galeriaempresa/<?php echo $datos['imagen'] ?>" class="card-img-top h-100" alt="...">
                </div>
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $datos['nombreEmpresa'] ?></h5>
                        <p class="card-text"><?php echo $datos['descripcionEmpresa'] ?></p>
                        <a href="empresa.php?id=<?php echo $datos['idEmpresa'] ?>" class="btn btn-danger stretched-link">Ver Detalles</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    }

    $int="SELECT * FROM puntointeres  WHERE estadoPuntointeres=1 AND descripcionPuntointeres LIKE '%".$_GET['q']."%'";
        $res = mysqli_query(conectar(), $int);
        $numPunto = mysqli_num_rows($res);
        if ($numPunto!=0) {
        $sql="SELECT
        `puntointeres`.*,
        `fotosgaleria`.`principalfotoGaleria`,
        `fotosgaleria`.`estadofotoGaleria`,
        `fotosgaleria`.`nombrefotoGaleria`
        FROM
        `puntointeres`
        INNER JOIN `galeria`
        ON `galeria`.`idGaleria` = `puntointeres`.`galeria_idGaleria`
        INNER JOIN `fotosgaleria` ON `galeria`.`idGaleria` =
        `fotosgaleria`.`galeria_idGaleria` WHERE principalfotoGaleria=1 AND descripcionPuntointeres LIKE '%".$_GET['q']."%'";
        $result = mysqli_query(conectar(), $sql);
        while ($datos = mysqli_fetch_array($result)) { 
    ?>
        <div class="card my-4" style="width=100%">
            <div class="row no-gutters">
                <div class="col-sm-5" style="background: #868e96;">
                    <img src="./galeria/<?php echo $datos['nombrefotoGaleria'] ?>" class="card-img-top h-100" alt="...">
                </div>
                <div class="col-sm-7">
                    <div class="card-body">
                    <h5 clas="card-title"><?php echo $datos['descripcionPuntointeres'] ?></h5>
                    <a href="interes.php?id=<?php echo $datos['idPuntointeres'] ?>" class="btn btn-danger">Ver Detalles</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    }

    if ($numPunto===0 && $numEmp===0) {

    ?>
    
    <p class="mt-2"> 0 Encontradas</p>


    <?php
    }
    ?>