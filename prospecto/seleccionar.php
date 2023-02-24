<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin,  Content-Type, Accept, Access-Control-Request-Method");

    require_once "../models/Prospecto.php";

    if(isset($_GET['idProspecto'])) {
        echo json_encode(Prospecto::getWhere($_GET['idProspecto']));
    }//end if
    else {
        echo json_encode(Prospecto::getAllReportesEncubierto());
    }//end else
?>
