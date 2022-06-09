<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$DN = $_POST['DN'];
		$NIP = $_POST['NIP'];
		$VIGNIP = $_POST['VIGNIP'];
		$FVC = $_POST['FVC'];
		$OFERTA = $_POST['OFERTA'];
		$ESTADO_CAV = $_POST['ESTADO_CAV'];
		$CAV = $_POST['CAV'];
		$NOMBRES_CLIENTE = $_POST['NOMBRES_CLIENTE'];
		$FECHA_NACIMIENTO = $_POST['FECHA_NACIMIENTO'];
		$CURP = $_POST['CURP'];
		$CONTACTO_1 = $_POST['CONTACTO_1'];
		$CONTACTO_2 = $_POST['CONTACTO_2'];
		$CORREO = $_POST['CORREO'];
		$ESTATUS = $_POST['ESTATUS'];
		
		$sql = "UPDATE ventastotales SET DN = '$DN', NIP = '$NIP', VIGENCIA_NIP = '$VIGNIP', FVC = '$FVC', OFERTA = '$OFERTA', ESTADO_CAV = '$ESTADO_CAV', CAV = '$CAV', NOMBRES_CLIENTE = '$NOMBRES_CLIENTE', FECHA_NACIMIENTO = '$FECHA_NACIMIENTO', CURP = '$CURP', CONTACTO_1 = '$CONTACTO_1', CONTACTO_2 = '$CONTACTO_2', CORREO = '$CORREO', ESTATUS = '$ESTATUS' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Venta Actualizada';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Error al actualizar la venta, verifica.';
	}

	header('location: home.php');
?>