<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM empleados WHERE employee_id = '$id'";
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

	header('location: empleados.php');
	
?>