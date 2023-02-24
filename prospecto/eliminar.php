<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin,  Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: DELETE");

    require_once "../models/Prospecto.php";

    if(isset($_GET['idProspecto'])){
        if($resultado = Prospecto::delete($_GET['idProspecto'])) {
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