<?php 
        require_once "../config/conn.php";
        require_once "../models/ventas.php";
        
        $ventas = new ventas();

        $configventas = $ventas-> obtener_configventas();

        foreach($configventas as $row){

        $MES = $row['MES_VENTAS'];

        $obtener_ventas_bajas = $ventas-> obtener_ventas_bajas($MES);
        foreach($obtener_ventas_bajas as $row2){

        }

        $bajasexp = $query->num_rows;

        if($bajasexp < 1){      
                
        $percentage = 0;
                  
        }else{
                      
        $percentage = ($bajasexp/$total)*100;
                      
        }

        } ?>