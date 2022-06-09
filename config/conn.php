<?php

    class Conectar {

        public static function conexion()
        {

           $conn = new mysqli('localhost', 'enlacecc_ventas', 'ventas*2022', 'enlacecc_ventas');
           return $conn; 

        }

    }

?>