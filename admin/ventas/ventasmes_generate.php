<?php
	include 'includes/session.php';
	function generateRow($conn){
		$mes= $_POST['date_range'];
		$contents = '';
		$sql="SELECT * from ventastotales WHERE MES= '$mes' ORDER BY FECHA_CARGA desc";
		$query = $conn->query($sql);
			while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
				<td>".$row['DN']."</td>
				<td>".$row['NIP']."</td>
				<td>".$row['ESTADO_CAV']."</td>
				<td>".$row['CURP']."</td>
				<td>".$row['VENDEDOR']."</td>
				<td>".$row['FECHA_CARGA']."</td>
				<td>".$row['ESTATUS']."</td>
			</tr>
			";
		}
		return $contents;
	}

	require_once('../tcpdf_min/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('Ventas Cargadas Enlace CC ');  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage(); 
    $content = '';  
    $content .= '

			<h2 align="center">Ventas Cargadas</h2>
			<h4 align="center">Enlace CC</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
           		<th width="14%" align="center"><b>DN</b></th>
				<th width="7%" align="center"><b>NIP</b></th>
				<th width="14%" align="center"><b>ESTADO CAV</b></th>
				<th width="27%" align="center"><b>CURP</b></th>
				<th width="15%" align="center"><b>VENDEDOR</b></th>
				<th width="13%" align="center"><b>FECHA CARGA</b></th>
				<th width="12%" align="center"><b>ESTATUS</b></th> 
           </tr>  
      ';  
    $content .= generateRow($conn); 
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('Ventas Cargadas.pdf', 'I');
?>