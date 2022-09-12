<?php
	$conn = new mysqli('localhost', 'root', '', 'enlacecc');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>