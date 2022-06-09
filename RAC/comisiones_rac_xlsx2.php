<?php
	include 'includes/session.php';
	include 'includes/conn.php';
	
	header('content-type:application/xls');
	header('content-Disposition: attachment; filename=Comisiones_RAC_'.$user['RAC'].'_RedesVNZ.xls');
?>
		<?php $sql2 = "SELECT * from fecha_comisiones WHERE ID = 2";
                  $query2 = $conn->query($sql2);
                  $row2 = $query2->fetch_assoc();
              ?>
              <h2><b>Semana del <?php echo $from = $row2['DESDE'];?> al <?php echo $from = $row2['HASTA'];?></b></h2>
		<table>
		<thead>
                    <th class="">RAC</th>
                    <th class="">ALTAS</th>
                    <th class="">MONTO ALTA</th>
                    <th class="">MONTO A COBRAR</th>
                    <th class="">MONTO BS</th>
                    <th class="">TASA DÓLAR BCV</th>
                    <th class="">N° REF</th>
                    <th class="">PAGO</th>
                    <th class="">N° CUENTA</th>
                    <th class="">PAGO MÓVIL</th>
                  </thead>
		<tbody>	
		<?php
                        
                        $RAC = $_SESSION['user'];

                        $sql="SELECT * from Calculo_Comisiones WHERE id = $RAC";
                        $query = $conn->query($sql);

                            while($row = $query->fetch_assoc()){

                            $sql2="SELECT *, rate_dolar from tasa_dolar";;
                            $query2 = $conn->query($sql2);
                            $dolarbcv = $query2 ->fetch_assoc();

                            /*$string = file_get_contents("https://s3.amazonaws.com/dolartoday/data.json");
                            $json = json_decode($string, TRUE);
                            $dolarbcv = $json["USD"]["promedio_real"];*/

                            $monto_a_cobrar = $row['ALTAS'] * $row['MONTO_ALTA'];  

                            $monto_bs = $monto_a_cobrar * $dolarbcv['rate_dolar'];
                        ?>
                        <tr>
                            <td><?php echo $row['RAC']; ?></td>
                            <td><?php echo $row['ALTAS']; ?></td>
                            <td><?php echo '$ '.$row['MONTO_ALTA']; ?></td>
                            <td><?php echo '$ '.number_format($monto_a_cobrar,2); ?></td>
                            <td><?php echo 'Bs.S '.number_format($monto_bs,2); ?></td>
                            <td><?php echo 'Bs.S '.number_format($dolarbcv['rate_dolar'],2); ?></td>
                            <td><?php echo $row['NRO_REFERENCIA']; ?></td>
                            <td><?php echo $row['PAGO']; ?></td>
                            <td><?php echo $row['NRO_CUENTA']; ?></td>
                            <td><?php echo $row['PAGO_MOVIL']; ?></td>        
                        </tr>
                        <?php
                        }?>
		</tbody>
		</table>
		<br>
		<h2><b>Altas</b></h2>
		<table>
			<thead>
					<th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th> 
                    <th>FECHA DE CARGA</th>
                    <th>ESTATUS</th>
                    <th>FVC</th>
                    <th>ESTATUS CM</th>
                    <th>FECHA DE ALTA</th>
			</thead>
			<tbody>
				<?php

				$sql2 = "SELECT * from fecha_comisiones WHERE ID = 2";
				$query2 = $conn->query($sql2);
				$row2 = $query2->fetch_assoc();

				$from = $row2['DESDE'];
				$to = $row2['HASTA'];

				$CEDULA = $_SESSION['user'];
				$sql="SELECT * from ventastotales WHERE FECHA_ALTA BETWEEN '$from' AND '$to' AND cedula = $CEDULA";
				$query = $conn->query($sql);
					while($row = $query->fetch_assoc()){
					?>
					<tr>
						<td><?php echo $row['DN']; ?></td>
						<td><?php echo $row['NIP']; ?></td>
						<td><?php echo $row['ESTADO_CAV']; ?></td>
						<td><?php echo $row['CURP']; ?></td>
						<td><?php echo $row['FECHA_CARGA']; ?></td>
						<td><?php echo $row['ESTATUS']; ?></td>
						<td><?php echo $row['FVC']; ?></td>
						<td><?php echo $row['ESTATUS_CM']; ?></td>  
						<td><?php echo $row['FECHA_ALTA']; ?></td>     
					</tr>
				<?php
				}?>
			</tbody>
		</table>
		<br>
		<h2><b>Bajas Exportadas del Mes</b></h2>
		<table>
			<thead>
					<th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th>
                    <th>FECHA DE CARGA</th>
                    <th>ESTATUS</th>
                    <th>FVC</th>
                    <th>ESTATUS CM</th>
                    <th>FECHA DE ALTA</th>
			</thead>
			<tbody>
			<?php

					$sql2="SELECT MES_VENTAS from ventas_config WHERE ID = 1";
					$rquery = $conn->query($sql2);
					$MES = $rquery->fetch_assoc();
					$MES2 = $MES['MES_VENTAS'];

					$CEDULA = $_SESSION['user'];
					$sql="SELECT * from ventastotales WHERE ESTATUS_CM = 'BAJA/EXPORTADA' AND cedula = $CEDULA AND MES_BAJA = '$MES2'";
					$query = $conn->query($sql);
						while($row = $query->fetch_assoc()){
						?>
						<tr>
							<td><?php echo $row['DN']; ?></td>
							<td><?php echo $row['NIP']; ?></td>
							<td><?php echo $row['ESTADO_CAV']; ?></td>
							<td><?php echo $row['CURP']; ?></td>
							<td><?php echo $row['FECHA_CARGA']; ?></td>
							<td><?php echo $row['ESTATUS']; ?></td>
							<td><?php echo $row['FVC']; ?></td>
							<td><?php echo $row['ESTATUS_CM']; ?></td>  
							<td><?php echo $row['FECHA_ALTA']; ?></td>     
						</tr>
						<?php
						}?>
			</tbody>
		</table>
		<br>
		<h2><b>Sin Estatus del Mes</b></h2>
		<table>
			<thead>
			<th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th>
                    <th>FECHA DE CARGA</th>
                    <th>ESTATUS</th>
                    <th>FVC</th>
                    <th>ESTATUS CM</th>
                    <th>FECHA DE ALTA</th>
			</thead>
			<tbody>
			<?php

					$sql2="SELECT MES_VENTAS from ventas_config WHERE ID = 1";
					$rquery = $conn->query($sql2);
					$MES = $rquery->fetch_assoc();
					$MES2 = $MES['MES_VENTAS'];

					$CEDULA = $_SESSION['user'];
					$sql="SELECT * from ventastotales WHERE ESTATUS_CM = 'SIN ESTATUS' AND cedula = $CEDULA AND MES = '$MES2'";
					$query = $conn->query($sql);
						while($row = $query->fetch_assoc()){
						?>
						<tr>
							<td><?php echo $row['DN']; ?></td>
							<td><?php echo $row['NIP']; ?></td>
							<td><?php echo $row['ESTADO_CAV']; ?></td>
							<td><?php echo $row['CURP']; ?></td>
							<td><?php echo $row['FECHA_CARGA']; ?></td>
							<td><?php echo $row['ESTATUS']; ?></td>
							<td><?php echo $row['FVC']; ?></td>
							<td><?php echo $row['ESTATUS_CM']; ?></td>  
							<td><?php echo $row['FECHA_ALTA']; ?></td>     
						</tr>
						<?php
						}?>
			</tbody>
		</table>