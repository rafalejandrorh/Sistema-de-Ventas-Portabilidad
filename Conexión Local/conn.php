<?php
	$conn = new mysqli('localhost', 'root', '', 'enlacecc_ventas');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>