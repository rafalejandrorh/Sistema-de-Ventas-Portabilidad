<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM plantilla WHERE CEDULA = '$username' AND ESTATUS = 1";

		$query = $conn->query($sql);
		if($query->num_rows < 1){
			echo 'No se encontró una cuenta con ese Usuario o está Inactivo. Comunícate con tu Supervisor.';
		}
		else{
			$row = $query->fetch_assoc();
			if($password == $row['PASSWORD']){
				$_SESSION['user'] = $row['CEDULA'];
			}
			else{
				echo 'Contraseña Incorrecta';
			}
		}
		
	}
	else{
		echo 'Primero ingrese sus credenciales de Administrador';
	}

?>