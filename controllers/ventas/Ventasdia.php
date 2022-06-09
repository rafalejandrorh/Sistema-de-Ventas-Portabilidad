<?php 
        require_once "../config/conn.php";
        require_once "../models/ventas.php";
        $ventas = new ventas();

        $obtener = [];

        $obtener = $ventas-> obtener_ventasdia();
 
 ?>