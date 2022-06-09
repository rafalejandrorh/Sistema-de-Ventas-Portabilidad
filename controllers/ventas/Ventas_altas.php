<?php 
        require_once "../config/conn.php";
        require_once "../models/ventas.php";
        
        $ventas = new ventas();

        $configventas = $ventas-> obtener_configventas();

        foreach($configventas as $row){

        $MES = $row['MES_VENTAS'];

        $obtener_ventas_altas = $ventas-> obtener_ventas_altas_CM($MES);
        foreach($obtener_ventas_altas as $row2){

        }

        $ventas_altas = $row2->num_rows;

        } ?>