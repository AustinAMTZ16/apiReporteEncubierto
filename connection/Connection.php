<?php
    class Connection extends Mysqli {
        function __construct() {
            parent::__construct(
                '45.89.204.4', 
                'u115254492_root2909', 
                'AdminTrabajo2909', 
                'u115254492_admintrabajo');
            $this->set_charset('utf8');
            $this->connect_error == NULL ? 
                'Conexión exítosa a la DB' : 
                    die('Error al conectarse a la BD');
        }//end __construct
    }//end class Connection
?>
                <!-- '45.89.204.4', 
                'u115254492_root2909', 
                'AdminTrabajo2909', 
                'u115254492_admintrabajo' -->

                <!-- '66.172.11.28', 
                'synergy', 
                'Syn03#181', 
                'administrabajo' -->