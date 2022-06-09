<?php 
        require_once "../config/conn.php";
        require_once "../models/ventas.php";
        
        $ventas = new ventas();

        $configventas = $ventas-> obtener_configventas();

        foreach($configventas as $row){

        $MES = $row['MES_VENTAS'];

        $obtener_ventas_mes = $ventas-> obtener_ventas_mes($MES);
        foreach($obtener_ventas_mes as $row2){

        }

        $obtener_ventas_altas = $ventas-> obtener_ventas_altas($MES);
        foreach($obtener_ventas_altas as $row3){

        }

        $obtener_ventas_altas_pospago = $ventas-> obtener_ventas_altas_pospago($MES);
        foreach($obtener_ventas_altas_pospago as $row4){

        }

        $total = $row2->num_rows;
        $early = $row3->num_rows;
        $early2 = $row4->num_rows;

        $earlytotal = $early + $early2;

        if($earlytotal < 1){
                
        $percentage = 0;
                  
        }else{
                      
        $percentage = ($earlytotal/$total)*100;
                      
        }
    
        } ?>