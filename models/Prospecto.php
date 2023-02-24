<?php
    require_once "../connection/Connection.php";
/*
    idProspecto : 'int : identificador de prospecto', 
    nombre : 'varchar : nombre del prospecto', 
    apellidoPaterno : 'varchar : primer apellido del prospecto', 
    apellidoMaterno : 'varchar : Segundo apellido del prospecto', 
    telefono : 'varchar : Numero de contacto del prospecro', 
    correo : 'varchar : Correo electronico del prospecto', 
    asunto : 'varchar : Motivo por el cual el prospecto se pone en contacto', 
    mensaje : 'varchar : Descripcion de la solicitud del prospecto', 
    dominioOrigen : 'varchar : Pagina web origen del prospecto', 
    giroDominio : 'varchar : Giro de la pagina web origen', 
    categoriaProspecto : 'varchar : Categoria de la pagina web origen', 
    fechaCreacion : 'varchar : Fecha que el prospecto llena el formulario de contacto', 
    estadoSistema : 'varchar : Identificador de visibilidad en el sistema dck', 
    conversacion  : 'varchar : Bitacora del prospecto con el objetivo de saber cuál fue el ultimo contacto y que sucedio'
*/


    class Prospecto {

        public static function getAllReportesEncubierto() {
            $db = new Connection();
            $query = "SELECT *FROM reporte_encubierto";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id_reporte' => $row['id_reporte'],
                        'id_empresa' => $row['id_empresa'],
                        'id_reporte_encubierto_tipo_hecho' => $row['id_reporte_encubierto_tipo_hecho'],
                        'id_sucursal' => $row['id_sucursal'],
                        'fecha_denuncia' => $row['fecha_denuncia'],
                        'denunciante' => $row['denunciante'],
                        'reportado' => $row['reportado'],
                        'lugar' => $row['lugar'],
                        'archivos' => $row['archivo'],
                        'detalle' => $row['detalle'],
                        'estado' => $row['estado']      
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getAll









        public static function getAll() {
            $db = new Connection();
            $query = "SELECT *FROM tb_prospecto";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'idProspecto' => $row['idProspecto'],
                        'nombre' => $row['nombre'],
                        'apellidoPaterno' => $row['apellidoPaterno'],
                        'apellidoMaterno' => $row['apellidoMaterno'],
                        'telefono' => $row['telefono'],
                        'correo' => $row['correo'],
                        'asunto' => $row['asunto'],
                        'mensaje' => $row['mensaje'],
                        'dominioOrigen' => $row['dominioOrigen'],
                        'giroDominio' => $row['giroDominio'],
                        'categoriaProspecto' => $row['categoriaProspecto'],
                        'fechaCreacion' => $row['fechaCreacion'],
                        'estadoSistema' => $row['estadoSistema'],
                        'conversacion' => $row['conversacion']        
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getAll

        public static function getWhere($id_prospecto) {
            $db = new Connection();
            $query = "SELECT *FROM tb_prospecto WHERE idProspecto=$id_prospecto";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'idProspecto' => $row['idProspecto'],
                        'nombre' => $row['nombre'],
                        'apellidoPaterno' => $row['apellidoPaterno'],
                        'apellidoMaterno' => $row['apellidoMaterno'],
                        'telefono' => $row['telefono'],
                        'correo' => $row['correo'],
                        'asunto' => $row['asunto'],
                        'mensaje' => $row['mensaje'],
                        'dominioOrigen' => $row['dominioOrigen'],
                        'giroDominio' => $row['giroDominio'],
                        'categoriaProspecto' => $row['categoriaProspecto'],
                        'fechaCreacion' => $row['fechaCreacion'],
                        'estadoSistema' => $row['estadoSistema'],
                        'conversacion' => $row['conversacion']  
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getWhere

        public static function insert($nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $asunto, $mensaje, $dominioOrigen, $giroDominio, $categoriaProspecto, $estadoSistema, $conversacion) {
            $db = new Connection();
            $query = "INSERT INTO tb_prospecto (nombre, apellidoPaterno, apellidoMaterno,telefono, correo, asunto, mensaje, dominioOrigen, giroDominio, categoriaProspecto, estadoSistema, conversacion)
            VALUES('".$nombre."', '".$apellidoPaterno."', '".$apellidoMaterno."', '".$telefono."', '".$correo."', '".$asunto."', '".$mensaje."', '".$dominioOrigen."', '".$giroDominio."', '".$categoriaProspecto."', '".$estadoSistema."', '".$conversacion."')";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end insert

        public static function update($id_prospecto, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $asunto, $mensaje, $dominioOrigen, $giroDominio, $categoriaProspecto, $fechaCreacion, $estadoSistema, $conversacion) {
            $db = new Connection();
            $query = "UPDATE tb_prospecto SET
            nombre='".$nombre."', apellidoPaterno='".$apellidoPaterno."' , apellidoMaterno='".$apellidoMaterno."', telefono='".$telefono."' , correo='".$correo."' , asunto='".$asunto."' , mensaje='".$mensaje."' , dominioOrigen='".$dominioOrigen."' , giroDominio='".$giroDominio."' , categoriaProspecto='".$categoriaProspecto."' , fechaCreacion='".$fechaCreacion."' , estadoSistema='".$estadoSistema."' , conversacion='".$conversacion."' 
            WHERE idProspecto=$id_prospecto";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function delete($id_prospecto) {
            $db = new Connection();
            $query = "DELETE FROM tb_prospecto WHERE idProspecto=$id_prospecto";
            $db->query($query);
            if($db->affected_rows >= 0) {
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

    }//end class Cliente
