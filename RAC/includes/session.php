<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM plantilla WHERE CEDULA = '".$_SESSION['user']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>