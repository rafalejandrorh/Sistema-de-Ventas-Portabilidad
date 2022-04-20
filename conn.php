<?php
	$conn = new mysqli('localhost', 'root', '', 'enlace cc');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>