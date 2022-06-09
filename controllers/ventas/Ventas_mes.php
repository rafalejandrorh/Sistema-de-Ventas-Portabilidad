<?php 
        require_once "../config/conn.php";
        require_once "../models/ventas.php";
        
        $ventas = new ventas();

        $configventas = $ventas-> obtener_configventas();

        foreach($configventas as $row){

        $MES = $row['MES_VENTAS'];

        $obtener_ventas_onix = $ventas-> obtener_ventas_onix($MES);
        foreach($obtener_ventas_onix as $row2){

        }

        $ventas_mes = $row2->num_rows;

        } ?>