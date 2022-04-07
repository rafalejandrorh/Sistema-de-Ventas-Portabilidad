<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, tiempoextra.id AS otid FROM tiempoextra LEFT JOIN empleados on empleados.id=overtime.employee_id WHERE overtime.id='$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>