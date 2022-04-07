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

		if($curr_password = $user['PASSWORD']){

			$sql = "UPDATE plantilla SET RAC = '$username', PASSWORD = '$password', CONTACTO = '$contacto', CORREO = '$correo', RESIDENCIA = '$residencia' WHERE CEDULA = '".$user['CEDULA']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Perfil de administrador actualizado correctamente';
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