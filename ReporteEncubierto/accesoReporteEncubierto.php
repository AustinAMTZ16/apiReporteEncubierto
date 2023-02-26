<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin,  Content-Type, Accept, Access-Control-Request-Method");

    require_once "../models/ReporteEncubierto.php";

    if(isset($_GET['contrasena_reporte_ecubierto'])) {
        echo json_encode(ReporteEncubierto::accesoReporteEncubierto($_GET['contrasena_reporte_ecubierto']));
    }
?>
