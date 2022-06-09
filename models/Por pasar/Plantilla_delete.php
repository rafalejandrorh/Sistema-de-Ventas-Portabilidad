<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$cedula = $_POST['id'];
		$sql = "DELETE FROM plantilla WHERE CEDULA = '$cedula'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Empleado eliminado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Inserte el ID del empleado a eliminar';
	}

	header('location: Plantilla_egreso.php');
	
?>