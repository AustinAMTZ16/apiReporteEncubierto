<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin,  Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: DELETE");

    require_once "../models/ReporteEncubierto.php";

    if(isset($_GET['id_reporte'])){
        if($resultado = ReporteEncubierto::deleteReporteEncubierto($_GET['id_reporte'])) {
            echo json_encode(['delete' => TRUE]);
        }//end if
        else {
            echo json_encode(['delete' => FALSE]);
        }//end else
    }//end if 
    else {
        echo json_encode(['delete' => FALSE]);
    }//end else
?>