<?php
//header('Content-Type: application/json; charset=utf-8');
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods: PUT, GET, POST");
    use Connection;

    require_once "../connection/Connection.php";

    class ReporteEncubierto{
        public static function accesoReporteEncubierto($contrasena_reporte_ecubierto){
            //SELECT * FROM `empresas`
                // contrasena_reporte_ecubierto (varchar, nullable)
                // correo (varchar, nullable)
                // estado (enum, Inacti..., nullable)
                // facebook (varchar, nullable)
                // gestion (tinyint)
                // googleplus (varchar, nullable)
                // iddireccion (MUL, int, nullable)
                // idempresa (PRI, int)
                // idgiro (MUL, char, nullable)
                // idstand (MUL, int, nullable)
                // idtest (MUL, int, nullable)
                // idusuario (MUL, int)
                // linkedin (varchar, nullable)
                // nombre_comercial (varchar, nullable)
                // patrocinador (tinyint, nullable)
                // razon_social (varchar)
                // RFC (varchar, nullable)
                // sitio_web (varchar, nullable)
                // telefono (varchar, nullable)
                // terminos_condiciones (char, Si)
                // tipo (MUL, int, nullable)
                // twitter (varchar, nullable)
                // youtube (varchar, nullable)
            $db = new Connection();
            $query = "SELECT * FROM empresas WHERE contrasena_reporte_ecubierto=$contrasena_reporte_ecubierto";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows){
                while($row = $resultado->fetch_assoc()){
                    $datos[]= [
                        'contrasena_reporte_ecubierto' => $row['contrasena_reporte_ecubierto'],
                        'correo' => $row['correo'],
                        'estado' => $row['estado'],
                        'facebook' => $row['facebook'],
                        'gestion' => $row['gestion'],
                        'googleplus' => $row['googleplus'],
                        'iddireccion' => $row['iddireccion'],
                        'idempresa' => $row['idempresa'],
                        'idgiro' => $row['idgiro'],
                        'idstand' => $row['idstand'],
                        'idtest' => $row['idtest'],
                        'idusuario' => $row['idusuario'],
                        'linkedin' => $row['linkedin'],
                        'nombre_comercial' => $row['nombre_comercial'],
                        'patrocinador' => $row['patrocinador'],
                        'razon_social' => $row['razon_social'],
                        'RFC' => $row['RFC'],
                        'sitio_web' => $row['sitio_web'],
                        'telefono' => $row['telefono'],
                        'terminos_condiciones' => $row['terminos_condiciones'],
                        'tipo' => $row['tipo'],
                        'twitter' => $row['twitter'],
                        'youtube' => $row['youtube']
                    ];
                }
            }
            return $datos;
        }//end accesoReporteEncubierto
        public static function catalogoSucursales($id_empresa){
            //SELECT * FROM `sucursales`
                // id_empresa (MUL, int)
                // id_sucursal (PRI, int)
                // nombre (varchar)
            $db = new Connection();
            $query = "SELECT *FROM sucursales WHERE id_empresa=$id_empresa";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id_empresa' => $row['id_empresa'],
                        'id_sucursal' => $row['id_sucursal'],
                        'nombre' => $row['nombre']    
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
            
        }//end catalogoSucursales
        public static function catalogoTiposReporte(){
            //SELECT * FROM `reporte_encubierto_tipo_hechos`
                // descripcion (varchar)
                // detalle (varchar, nullable)
                // id_reporte_encubierto_tipo_hecho (PRI, int)

            $db = new Connection();
            $query = "SELECT *FROM reporte_encubierto_tipo_hechos";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id_reporte_encubierto_tipo_hecho' => $row['id_reporte_encubierto_tipo_hecho'],
                        'descripcion' => $row['descripcion'],
                        'detalle' => $row['detalle']      
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end catalogoTiposReporte
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
        public static function getWhereReportesEncubierto($id_reporte){
            $db = new Connection();
            $query = "SELECT *FROM reporte_encubierto WHERE id_reporte=$id_reporte";
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
        }//end getWhereReportesEncubierto
        public static function deleteReporteEncubierto($id_reporte){
            $db = new Connection();
            $query = "DELETE FROM reporte_encubierto WHERE id_reporte=$id_reporte";
            $db->query($query);
            if($db->affected_rows >= 0) {
                return TRUE;
            }//end if
            return FALSE;
        }//end deleteReporteEncubierto
        public static function updateReporteEncubierto($id_reporte, $id_empresa, $id_reporte_encubierto_tipo_hecho, $id_sucursal, $fecha_denuncia, $denunciante, $reportado, $lugar, $archivos, $detalle, $estado ){
            $db = new Connection();
            $query = "UPDATE reporte_encubierto SET
            id_reporte='".$id_reporte."', 
            id_empresa='".$id_empresa."' , 
            id_reporte_encubierto_tipo_hecho='".$id_reporte_encubierto_tipo_hecho."', 
            id_sucursal='".$id_sucursal."' , 
            fecha_denuncia='".$fecha_denuncia."' , 
            denunciante='".$denunciante."' , 
            reportado='".$reportado."' , 
            lugar='".$lugar."' , 
            archivos='".$archivos."' , 
            detalle='".$detalle."' , 
            estado='".$estado."' 
            WHERE id_reporte=$id_reporte";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end updateReporteEncubierto
        public static function insertReporteEncubierto($id_empresa, $id_reporte_encubierto_tipo_hecho, $id_sucursal, $fecha_denuncia, $denunciante, $reportado, $lugar, $archivos, $detalle, $estado) {
            $db = new Connection();
            
            //$archivo = basename($_POST['archivos']['name']);
            //echo 'nam_file:',$archivo;
            //if(move_uploaded_file($archivos, './')){
            //    echo 'Archivo subido';
            //}

            $query = "INSERT INTO reporte_encubierto ( 
                id_empresa, 
                id_reporte_encubierto_tipo_hecho,
                id_sucursal, 
                fecha_denuncia, 
                denunciante, 
                reportado, 
                lugar, 
                archivos, 
                detalle, 
                estado)
            VALUES(
                '".$id_empresa."', 
                '".$id_reporte_encubierto_tipo_hecho."', 
                '".$id_sucursal."', 
                '".$fecha_denuncia."', 
                '".$denunciante."', 
                '".$reportado."', 
                '".$lugar."', 
                '".$archivos."', 
                '".$detalle."', 
                '".$estado."')";
            $db->query($query);
            if($db->affected_rows) {
                $last_id = $db->affected_rows;
                return $last_id;
            }//end if
            return FALSE;
        }//end insertReporteEncubierto
    }//end class Cliente
?>
