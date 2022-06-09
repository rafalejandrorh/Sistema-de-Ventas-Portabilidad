<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$cedula= $_POST['id'];
		$nombres = $_POST['names'];
		$correo = $_POST['correo'];
		$residencia = $_POST['address'];
		$ingreso = $_POST['ingreso'];
		$contacto = $_POST['contact'];
		$estatus = $_POST['estatus'];
		$contraseña = $_POST['pass'];
		
		$sql = "UPDATE plantilla SET CEDULA = '$cedula', RAC = '$nombres', FECHA_INGRESO = '$ingreso', ESTATUS = '$estatus', CONTACTO = '$contacto', CORREO = '$correo', RESIDENCIA = '$residencia', PASSWORD = '$contraseña' WHERE CEDULA = '$cedula'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Empleado actualizado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Seleccionar empleado para editar primero';
	}

	header('location: Plantilla_activa.php');
?>