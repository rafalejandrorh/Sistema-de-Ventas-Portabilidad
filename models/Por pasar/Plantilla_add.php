<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$cedula= $_POST['id'];
		$nombres = $_POST['names'];
		$correo = $_POST['correo'];
		$residencia = $_POST['address'];
		$ingreso = $_POST['ingreso'];
		$contacto = $_POST['contact'];
		$estatus = $_POST['estatus'];
		$contraseña = $_POST['pass'];
		 
		$sql = "INSERT INTO plantilla (CEDULA, RAC, FECHA_INGRESO, ESTATUS, CONTACTO, CORREO, RESIDENCIA, EQUIPOS, PASSWORD) VALUES ('$cedula', '$nombres', '$ingreso', '$estatus', '$contacto', '$correo', '$residencia', 'SMARTPHONE','$contraseña')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Empleado añadido satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Error, intenta nuevamente';
	}

	header('location: Plantilla_activa.php');
?>