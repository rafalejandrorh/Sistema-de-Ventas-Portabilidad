<?php
	$conn = new mysqli('localhost', 'enlacecc_ventas', 'ventas*2022', 'enlacecc_ventas');
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>