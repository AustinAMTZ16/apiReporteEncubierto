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


    /*
    
    
        $ssh = ssh2_connect('66.172.11.28');
        ssh2_auth_password($ssh, 'synergy', 'Tis03#181');
        $stream = ssh2_tunnel($ssh, '66.172.11.28', 3306);
        $link = new MysqlStreamDriver($stream, 'synergy', 'Syn03#181', 'administrabajo');
        $link->query('SELECT * FROM ...')->fetch_assoc();
    
        ip del server: 66.172.11.28
        
        ssh:
        u= synergy
        p= Tis03#181
        Puerto-shh: 22
        
        Base de datos:
        u= synergy
        p= Syn03#181
        bd: administrabajo
        Puerto-bd: 3307
    */
?>
