<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'Ventasformulario.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$contacto = $_POST['contacto'];
		$correo = $_POST['correo'];
		$residencia = $_POST['residencia'];

		$banco = $_POST['banco'];
		$tipo_cuenta = $_POST['tipo_cuenta'];
		$nro_cuenta = $_POST['nro_cuenta'];

		$banco_pagomovil = $_POST['banco_pagomovil'];
		$telefono = $_POST['telefono'];
		$cititular = $_POST['cititular'];
		$nombre_titular = $_POST['nombre_titular'];

		if($curr_password = $user['PASSWORD']){

			$sql = "UPDATE plantilla SET RAC = '$username', PASSWORD = '$password', CONTACTO = '$contacto', CORREO = '$correo', RESIDENCIA = '$residencia' WHERE CEDULA = '".$user['CEDULA']."'";
			$sql2 = "UPDATE plantilla_cuentas_banco SET BANCO = '$banco', TIPO_CUENTA = '$tipo_cuenta', NRO_CUENTA = '$nro_cuenta' WHERE CEDULA = '".$user['CEDULA']."'";
			$sql3 = "UPDATE plantilla_pagomovil SET BANCO = '$banco_pagomovil', TELEFONO = '$telefono', CEDULA_TITULAR = '$cititular', NOMBRE_TITULAR = '$nombre_titular' WHERE CEDULA = '".$user['CEDULA']."'";
			
			if($conn->query($sql) && $conn->query($sql2) && $conn->query($sql3)){
				$_SESSION['success'] = 'Perfil actualizado correctamente';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'Contraseña Incorrecta';
		}
	}
	else{
		$_SESSION['error'] = 'Rellene los detalles requeridos primero';
	}

	header('location:'.$return);

?>