<?php
	header('content-type:application/xls');
	header('content-Disposition: attachment; filename=Comisiones_RAC_RedesBPVNZ.xls');

	include 'includes/session.php';
	include 'includes/conn.php';
?>
		
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
        </thead>
		<tbody>	
		<?php
                        
						$sql="SELECT * from Calculo_Comisiones_Second";;
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
					</tr>
					<?php
					}?>
		</tbody>
		</table>