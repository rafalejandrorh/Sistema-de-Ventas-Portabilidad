<?php
    include 'includes/session.php';
	include 'includes/conn.php';
	
	date_default_timezone_set('America/Caracas');
                        
	$Date2 = date('g-A');
	
	header('content-type:application/xls');
	header('content-Disposition: attachment; filename=Ventas_'.$Date2.'_RedesBPVNZ.xls');

?>
		<h2>VENTAS POR ENVIAR</h2>
		<table>
		<thead>
					<th>CENTRO</th>
                    <th>DN</th>
                    <th>NIP</th>
					<th>VIGENCIA_NIP</th>
					<th>NOMBRE COMPLETO</th>
					<th>FECHA DE NACIMIENTO</th>
                    <th>CURP</th>
					<th>FVC</th>
					<th>CONTACTO 1</th>
					<th>CONTACTO 2</th>
                    <th>CORREO</th>
                    <th>ESTATUS ONIX</th>
                    <th>FECHA DE CARGA</th>
					<th>HORA</th>
					<th>RECARGA</th>
					<th>CAV/ESTADO</th>
					<th>USUARIO VENTA</th>
					<th>CONTRASEÑA</th>
					
        </thead>
		<tbody>	
		<?php
		date_default_timezone_set('America/Caracas');
                        
		$Date = date('Y-m-d');
		
		$Date2 = date('A') ;

		$sql="SELECT * from ventastotales WHERE FECHA_CARGA = '$Date' AND ESTATUS = 'EN ESPERA'";
		$query = $conn->query($sql);
			while($row = $query->fetch_assoc()){
				echo "
                        <tr>
							<td> REDES VNZ</td>
                            <td>".$row['DN']."</td>
                            <td>".$row['NIP']."</td>
							<td>".$row['VIGENCIA_NIP']."</td>
							<td>".$row['NOMBRES_CLIENTE']."</td>
							<td>".$row['FECHA_NACIMIENTO']."</td>
                            <td>".$row['CURP']."</td>
							<td>".$row['FVC']."</td>
                            <td>".$row['CONTACTO_1']."</td>
							<td>".$row['CONTACTO_2']."</td>
							<td>".$row['CORREO']."</td>
							<td>".$row['ESTATUS']."</td>
                            <td>".$row['FECHA_CARGA']."</td>
							<td>CORTE ".$row['INTERVALO'].":00 ".$Date2."</td>
							<td>".$row['OFERTA']."</td>
							<td>".$row['ESTADO_CAV']." - ".$row['CAV']."</td>
							<td> BPCDMX1V1150</td>
							<td> BPCDMX1V1150H</td>
                        </tr>";
			};
?>
		</tbody>
		</table>
		
		<h2>VENTAS ENVIADAS</h2>
		<table>
		<thead>
					<th>CENTRO</th>
                    <th>DN</th>
                    <th>NIP</th>
					<th>VIGENCIA_NIP</th>
					<th>NOMBRE COMPLETO</th>
					<th>FECHA DE NACIMIENTO</th>
                    <th>CURP</th>
					<th>FVC</th>
					<th>CONTACTO 1</th>
					<th>CONTACTO 2</th>
                    <th>CORREO</th>
                    <th>ESTATUS ONIX</th>
                    <th>FECHA DE CARGA</th>
					<th>HORA</th>
					<th>RECARGA</th>
					<th>CAV/ESTADO</th>
					<th>USUARIO VENTA</th>
					<th>CONTRASEÑA</th>
					
        </thead>
		<tbody>	
		<?php
		date_default_timezone_set('America/Caracas');
                        
		$Date = date('Y-m-d');
		
		$Date2 = date('A') ;

		$sql="SELECT * from ventastotales WHERE FECHA_CARGA = '$Date' AND ESTATUS = 'ENVIADA'";
		$query = $conn->query($sql);
			while($row = $query->fetch_assoc()){
				echo "
                        <tr>
							<td> REDES VNZ</td>
                            <td>".$row['DN']."</td>
                            <td>".$row['NIP']."</td>
							<td>".$row['VIGENCIA_NIP']."</td>
							<td>".$row['NOMBRES_CLIENTE']."</td>
							<td>".$row['FECHA_NACIMIENTO']."</td>
                            <td>".$row['CURP']."</td>
							<td>".$row['FVC']."</td>
                            <td>".$row['CONTACTO_1']."</td>
							<td>".$row['CONTACTO_2']."</td>
							<td>".$row['CORREO']."</td>
							<td>".$row['ESTATUS']."</td>
                            <td>".$row['FECHA_CARGA']."</td>
							<td>CORTE ".$row['INTERVALO'].":00 ".$Date2."</td>
							<td>".$row['OFERTA']."</td>
							<td>".$row['ESTADO_CAV']." - ".$row['CAV']."</td>
							<td> BPCDMX1V1150</td>
							<td> BPCDMX1V1150H</td>
                        </tr>";
			};
?>
		</tbody>
		</table>

		<h2>VENTAS CARGADAS</h2>
		<table>
		<thead>
					<th>CENTRO</th>
                    <th>DN</th>
                    <th>NIP</th>
					<th>VIGENCIA_NIP</th>
					<th>NOMBRE COMPLETO</th>
					<th>FECHA DE NACIMIENTO</th>
                    <th>CURP</th>
					<th>FVC</th>
					<th>CONTACTO 1</th>
					<th>CONTACTO 2</th>
                    <th>CORREO</th>
                    <th>ESTATUS ONIX</th>
                    <th>FECHA DE CARGA</th>
					<th>HORA</th>
					<th>RECARGA</th>
					<th>CAV/ESTADO</th>
					<th>USUARIO VENTA</th>
					<th>CONTRASEÑA</th>
        </thead>
		<tbody>	
		<?php
		date_default_timezone_set('America/Caracas');
                        
		$Date = date('Y-m-d');

		$sql="SELECT * from ventastotales WHERE FECHA_CARGA = '$Date' AND ESTATUS = 'LISTA ONIX'";
		$query = $conn->query($sql);
			while($row = $query->fetch_assoc()){
				echo "
                        <tr>
							<td> REDES VNZ</td>
                            <td>".$row['DN']."</td>
                            <td>".$row['NIP']."</td>
							<td>".$row['VIGENCIA_NIP']."</td>
							<td>".$row['NOMBRES_CLIENTE']."</td>
							<td>".$row['FECHA_NACIMIENTO']."</td>
                            <td>".$row['CURP']."</td>
							<td>".$row['FVC']."</td>
                            <td>".$row['CONTACTO_1']."</td>
							<td>".$row['CONTACTO_2']."</td>
							<td>".$row['CORREO']."</td>
							<td>".$row['ESTATUS']."</td>
                            <td>".$row['FECHA_CARGA']."</td>
							<td>CORTE ".$row['INTERVALO'].":00 ".$Date2."</td>
							<td>".$row['OFERTA']."</td>
							<td>".$row['ESTADO_CAV']." - ".$row['CAV']."</td>
							<td> BPCDMX1V1150</td>
							<td> BPCDMX1V1150H</td>
                        </tr>";
			};
?>
		</tbody>
		</table>