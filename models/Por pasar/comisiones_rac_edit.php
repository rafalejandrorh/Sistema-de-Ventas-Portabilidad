<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$rac = $_POST['rac'];
		$referencia = $_POST['referencia'];
		$pago = $_POST['pago'];
		
		$sql = "UPDATE Calculo_Comisiones SET NRO_REFERENCIA = '$referencia', PAGO = '$pago' WHERE RAC = '$rac'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Información de pago Actualizada';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Error al actualizar la información de pago, verifica.';
	}

	header('location: comisiones_rac.php');
?>