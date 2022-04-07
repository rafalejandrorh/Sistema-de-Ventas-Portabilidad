<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM ventastotales WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Venta Eliminada';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Hubo un error, verifica y vuelve a intentarlo.';
	}

	header('location: home.php');
	
?>