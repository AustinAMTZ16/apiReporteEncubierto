<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin,  Content-Type, Accept, Access-Control-Request-Method");

    require_once "../models/Prospecto.php";
    
    $datos = json_decode(file_get_contents('php://input'));
    
    if($datos != NULL) {
        if(Prospecto::insert($datos->nombre, $datos->apellidoPaterno, $datos->apellidoMaterno, $datos->telefono, $datos->correo, $datos->asunto, $datos->mensaje, $datos->dominioOrigen, $datos->giroDominio, $datos->categoriaProspecto, $datos->estadoSistema, $datos->conversacion)) {
            echo json_encode(['insert' => TRUE]);
        }//end if
        else {
            echo json_encode(['insert' => FALSE]);
        }//end else
    }//end if
    else {
        echo json_encode(['insert' => FALSE]);
    }//end else
?>