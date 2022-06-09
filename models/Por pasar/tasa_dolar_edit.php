<?php
	include 'includes/session.php';

	if(isset($_POST['actualizar'])){

		$string = file_get_contents("https://s3.amazonaws.com/dolartoday/data.json");
        $json = json_decode($string, true);
        $dolarbcv = $json["USD"]["promedio_real"];

		$sql = "UPDATE tasa_dolar SET rate_dolar = '$dolarbcv' WHERE id = 1";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Tasa del dólar modificada satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Verifique que el monto sea correcto y vuelva a intentarlo';
	}

	header('location:tasa_dolar.php');

?>