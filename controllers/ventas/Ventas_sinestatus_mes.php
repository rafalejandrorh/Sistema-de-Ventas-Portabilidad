<?php 
        require_once "../config/conn.php";
        require_once "../models/ventas.php";
        
        $ventas = new ventas();

        $configventas = $ventas-> obtener_configventas();

        foreach($configventas as $row){

        $MES = $row['MES_VENTAS'];

        $obtener_ventas_sinestatus = $ventas-> obtener_ventas_sinestatus($MES);
        foreach($obtener_ventas_sinestatus as $row2){

        }

        $sinestatus = $row2->num_rows;

        if($sinestatus < 1){
                
        $percentage = 0;
                
        }else{
                    
        $percentage = ($sinestatus/$total)*100;
                    
        }

        } ?>