<?php
	header('content-type:application/xls');
	header('content-Disposition: attachment; filename=Ventascargadas.xls');

	include 'includes/session.php';
	include 'includes/conn.php';
?>
		
		<table>
		<thead>
					<th>CEDULA</th>
                    <th>DN</th>
                    <th>NIP</th>
					<th>VIGENCIA_NIP</th>
					<th>FVC</th>
					<th>OFERTA</th>
                    <th>ESTADO CAV</th>
					<th>CAV</th>
					<th>NOMBRES</th>
					<th>FECHA DE NACIMIENTO</th>
                    <th>CURP</th>
					<th>CONTACTO 1</th>
					<th>CONTACTO 2</th>
                    <th>CORREO</th>
                    <th>VENDEDOR</th>
                    <th>FECHA DE CARGA</th>
                    <th>ESTATUS</th>
					<th>INTERVALO</th>
                    <th>SEMANA</th>
                    <th>MES</th>
					<th>ESTATUS CM</th>
        </thead>
		<tbody>	
		<?php
		$range = $_POST['date_range'];
		$ex = explode(' - ', $range);
		$from = date('Y-m-d', strtotime($ex[0]));
		$to = date('Y-m-d', strtotime($ex[1]));

		$sql="SELECT * from ventastotales WHERE FECHA_CARGA BETWEEN '$from' AND '$to' ORDER BY FECHA_CARGA desc";
		$query = $conn->query($sql);
			while($row = $query->fetch_assoc()){
				echo "
                        <tr>
							<td>".$row['cedula']."</td>
                            <td>".$row['DN']."</td>
                            <td>".$row['NIP']."</td>
							<td>".$row['VIGENCIA_NIP']."</td>
							<td>".$row['FVC']."</td>
							<td>".$row['OFERTA']."</td>
                            <td>".$row['ESTADO_CAV']."</td>
							<td>".$row['CAV']."</td>
							<td>".$row['NOMBRES_CLIENTE']."</td>
							<td>".$row['FECHA_NACIMIENTO']."</td>
                            <td>".$row['CURP']."</td>
                            <td>".$row['CONTACTO_1']."</td>
							<td>".$row['CONTACTO_2']."</td>
							<td>".$row['CORREO']."</td>
                            <td>".$row['VENDEDOR']."</td>
                            <td>".$row['FECHA_CARGA']."</td>
                            <td>".$row['ESTATUS']."</td>
							<td>".$row['INTERVALO']."</td>
							<td>".$row['SEMANA']."</td>
                            <td>".$row['MES']."</td>
                            <td>".$row['ESTATUS_CM']."</td>
                        </tr>";
			};
?>
		</tbody>
		</table>