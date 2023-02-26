<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin,  Content-Type, Accept, Access-Control-Request-Method");

    require_once "../models/ReporteEncubierto.php";
    
    echo json_encode(ReporteEncubierto::catalogoTiposReporte());
?>
