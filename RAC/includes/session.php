<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM plantilla WHERE CEDULA = '".$_SESSION['user']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();

	$sql2 = "SELECT * FROM plantilla_cuentas_banco WHERE CEDULA = '".$_SESSION['user']."'";
	$query2 = $conn->query($sql2);
	$banks = $query2->fetch_assoc();

	$sql3 = "SELECT * FROM plantilla_pagomovil WHERE CEDULA = '".$_SESSION['user']."'";
	$query3 = $conn->query($sql3);
	$payment = $query3->fetch_assoc();
	
?>