<?php 
        require_once "../config/conn.php";
        require_once "../models/plantilla.php";
        
        $plantilla = new plantilla();

        $obtener_plantilla_activa = $plantilla-> obtener_numero_de_activos();

        foreach($obtener_plantilla_activa as $row){
        }

        $activos = $row->num_rows;   

?>