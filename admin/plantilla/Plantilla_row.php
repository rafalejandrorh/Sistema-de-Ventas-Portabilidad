<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, plantilla.CEDULA as cedid FROM plantilla LEFT JOIN estatus ON estatus.ID=plantilla.ESTATUS WHERE plantilla.CEDULA = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>