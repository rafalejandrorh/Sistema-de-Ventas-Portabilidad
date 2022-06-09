<?php 
        require_once "../config/conn.php";
        require_once "../models/ventas.php";
        require_once "../models/plantilla.php";
        
        $ventas = new ventas();
        $plantilla = new plantilla();

        $obtener_plantilla_activa = $plantilla-> obtener_plantilla_activa();

        foreach($obtener_plantilla_activa as $row){

        $rac = $row['RAC'];

        $obtener_ventas_rac = $ventas-> obtener_ventasdia_rac($rac);
        foreach($obtener_ventas_rac as $row2){

        }

        $obtener_ventas_cargadas = $ventas-> obtener_ventasdia_rac_cargadas($rac);
        foreach($obtener_ventas_cargadas as $row3){

        }

        $sph = $row3->num_rows/7;
?>

        <tr>
                <td><?php echo $row['RAC']; ?></td>
                <td><?php echo $row2->num_rows; ?></td>
                <td><?php echo $row3->num_rows; ?></td>
                <td><?php echo number_format($sph,2); ?></td>
        </tr>

<?php } ?>