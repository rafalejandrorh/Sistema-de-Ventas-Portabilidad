<?php

    class Conectar {

        public static function conexion()
        {

           $conn = new mysqli('localhost', 'root', '', 'enlacecc');
           return $conn; 

        }

    }

?>