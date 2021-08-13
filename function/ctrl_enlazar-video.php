<?php
include('setup.php');

switch ($_POST['accion_oculta']) {
    case 'Ingresar':
        insertar();
        break;
    case 'Actualizar':
        update();
        break;
    case 'Eliminar':
        delete();
        break;
    case 'show':
        show();
        break;
}

function insertar()
{
    $sql ="INSERT INTO puntointeres_has_multimediavideo SET  puntointeres_idPuntointeres='" . $_POST['interes'] . "', multimediavideo_idMultimediavideo='" . $_POST['link'] . "', principal='".$_POST['principal']."'";
    mysqli_query(conectar(), $sql);
   
}

function update(){
    $sql ="UPDATE puntointeres_has_multimediavideo SET  puntointeres_idPuntointeres='" . $_POST['interes'] . "', multimediavideo_idMultimediavideo='" . $_POST['link'] . "', principal='".$_POST['principal']."' WHERE multimediavideo_idMultimediavideo='".$_POST['link_pasado']."' AND puntointeres_idPuntointeres='" . $_POST['interes_pasado'] . "' AND principal='".$_POST['principal_pasado']."'";
    mysqli_query(conectar(), $sql);
}

function delete(){
    $sql = "DELETE FROM puntointeres_has_multimediavideo WHERE puntointeres_idPuntointeres= '" . $_POST['interes'] . "' AND multimediavideo_idMultimediavideo='" . $_POST['link'] . "' AND principal='".$_POST['principal']."'";
    mysqli_query(conectar(), $sql);
}

function show()
{
    $return_arr = array();
    $sqlser = "SELECT
    `multimediavideo`.`linkyoutubeMultimedia`,
    `puntointeres`.`descripcionPuntointeres`,
    `puntointeres_has_multimediavideo`.*
  FROM
    `puntointeres_has_multimediavideo`
    INNER JOIN `puntointeres` ON `puntointeres`.`idPuntointeres` =
  `puntointeres_has_multimediavideo`.`puntointeres_idPuntointeres`
    INNER JOIN `multimediavideo` ON `multimediavideo`.`idMultimediavideo` =
  `puntointeres_has_multimediavideo`.`multimediavideo_idMultimediavideo`";
    $resultser = mysqli_query(conectar(), $sqlser);

    while ($datos = mysqli_fetch_array($resultser)) {
        $multimediavideo_idMultimediavideo = $datos['multimediavideo_idMultimediavideo'];
        $linkyoutubeMultimedia = $datos['linkyoutubeMultimedia'];
        $puntointeres_idPuntointeres = $datos['puntointeres_idPuntointeres'];
        $descripcionPuntointeres = $datos['descripcionPuntointeres'];
        $principal = $datos['principal'];

        $return_arr[] = array(
            "multimediavideo_idMultimediavideo" => $multimediavideo_idMultimediavideo,
            "linkyoutubeMultimedia" => $linkyoutubeMultimedia,
            "puntointeres_idPuntointeres" => $puntointeres_idPuntointeres,
            "descripcionPuntointeres" => $descripcionPuntointeres,
            "principal" => $principal
        );
    }
    echo json_encode($return_arr);
}


?>