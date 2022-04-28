<?php

include 'includes/conn.php';
include 'includes/session.php';


if(isset($_GET['return'])){
  $return = $_GET['return'];
  
}
else{
  $return = 'home.php';
}
if(isset($_POST['enviar'])){

    $cedula = $_POST["cedula"];
    $rac = $_POST["rac"];

    $banco = $_POST['banco'];
		$tipo_cuenta = $_POST['tipo_cuenta'];
		$nro_cuenta = $_POST['nro_cuenta'];

		$banco_pagomovil = $_POST['banco_pagomovil'];
		$telefono = $_POST['telefono'];
		$cititular = $_POST['cititular'];
		$nombre_titular = $_POST['nombre_titular'];

    $contactorac = $_POST["contactorac"];
    $correorac = $_POST["correorac"];
  
    $sql2 = "INSERT INTO plantilla_cuentas_banco (CEDULA, BANCO, TIPO_CUENTA, NRO_CUENTA) VALUES ('$cedula','$banco', '$tipo_cuenta', '$nro_cuenta')";
    $sql3 = "INSERT INTO plantilla_pagomovil (CEDULA, BANCO, TELEFONO, CEDULA_TITULAR, NOMBRE_TITULAR) VALUES ('$cedula','$banco_pagomovil', '$telefono', '$cititular', '$nombre_titular')";
                                                                                                                                                                                                                    
    if($conn->query($sql2) && $conn->query($sql3)){
  
      $rac = $_POST['rac']. " REDES VNZ";
      $email = 'rafalejandrorivero@gmail.com' . ',';
      $email .= 'jdcardozo0007@gmail.com';
      $message = 
      
      "Este RAC acaba de registrar sus datos bancarios en la Base de Datos." . "\r\n".
      "Información de Cuenta Bancaria:" . "\r\n". 
      "Banco: " .$_POST['banco']. "\r\n". 
      "Tipo de Cuenta: " .$_POST['tipo_cuenta']. "\r\n".   
      "Número de Cuenta: " .$_POST['nro_cuenta']. "\r\n".
      "Información de Pago Móvil:" . "\r\n". 
      "Banco: " .$_POST['banco_pagomovil']. "\r\n". 
      "Teléfono: " .$_POST['telefono']. "\r\n". 
      "Cédula del Titular: " .$_POST['cititular']. "\r\n". 
      "Nombre del Titular: " .$_POST['nombre_titular']. "\r\n". 

      "Información de Contacto del RAC: " . ".$contactorac." . "-" . ".$correorac." . "\r\n";

      $header = 
      "From: enlacecc@enlacecc.emprende.ve" . "\r\n".

    mail($email, $rac, $message, $header);

      $_SESSION['success'] = 'Venta cargada satisfactoriamente';
  }
  else{

      $rac = $_POST['rac']. " REDES VNZ";
      $email = 'rafalejandrorivero@gmail.com' . ',';
      $email .= 'jdcardozo0007@gmail.com';
      $message = "Este RAC intentó ingresar sus datos bancarios pero hubo un error. Contáctalo para informarle. " . ".$contactorac." . "-" . ".$correorac.";
      $header = "From: enlacecc@enlacecc.emprende.ve" . "\r\n";

      mail($email, $rac, $message, $header);
    
    $_SESSION['error'] = 'Error, intenta nuevamente.';
  
    
  }}
  header('location:'.$return );
?>