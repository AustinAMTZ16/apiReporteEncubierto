<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin,  Content-Type, Accept, Access-Control-Request-Method");

    require_once "../models/ReporteEncubierto.php";
    
    $datos = json_decode(file_get_contents('php://input'));


    $directorio = "file/";
    $archivo = ($_FILES["archivos"]["name"]);
    if(move_uploaded_file($_FILES["archivos"]["tmp_name"],$archivo)){
        echo 'Archivo subido';
    }



    //if($datos != NULL) {
        if(ReporteEncubierto::insertReporteEncubierto(
            $datos->id_empresa, 
            $datos->id_reporte_encubierto_tipo_hecho, 
            $datos->id_sucursal, 
            $datos->fecha_denuncia,
            $datos->denunciante,
            $datos->reportado,
            $datos->lugar,
            $datos->'img',
            $datos->detalle,
            $datos->estado
        )) {
            echo json_encode(['insert' => TRUE]);
        }//end if
        else {
            echo json_encode(['insert' => FALSE]);
        }//end else
    //}end if
    //else {
        //echo json_encode(['insert' => FALSE]);
    //}end else
?>
