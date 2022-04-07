<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$ID = $_POST['MES'];
		$META = $_POST['META'];

		$sql = "UPDATE ventas_meta SET META = '$META' WHERE MES = '$ID'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Meta modificado satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Verifica que la meta ingresado sea válida';
	}

	header('location:ventas_config.php');

?>