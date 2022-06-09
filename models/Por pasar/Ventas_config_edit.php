<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$ID = $_POST['ID'];
		$MES_VENTAS = $_POST['MES_VENTAS'];

		$sql = "UPDATE ventas_config SET MES_VENTAS = '$MES_VENTAS' WHERE ID = '$ID'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Mes modificado satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Verifica que el mes ingresado sea correcto';
	}

	header('location:ventas_config.php');

?>