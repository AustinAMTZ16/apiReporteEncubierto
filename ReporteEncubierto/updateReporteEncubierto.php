<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin,  Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: PUT");

    require_once "../models/ReporteEncubierto.php";

    $datos = json_decode(file_get_contents('php://input'));
    
    if($datos != NULL) {
        if($res = ReporteEncubierto::updateReporteEncubierto(
            $datos->id_reporte, 
            $datos->id_empresa, 
            $datos->id_reporte_encubierto_tipo_hecho, 
            $datos->id_sucursal, 
            $datos->fecha_denuncia,
            $datos->denunciante,
            $datos->reportado,
            $datos->lugar,
            $datos->archivos,
            $datos->detalle,
            $datos->estado)) {
            echo json_encode(['update' => TRUE]);
        }//end if
        else {
            echo json_encode(['update' => FALSE]);
        }//end else
    }//end if
    else {
        echo json_encode(['update' => FALSE]);
    }//end else
?>