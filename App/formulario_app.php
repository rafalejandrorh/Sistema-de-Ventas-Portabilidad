<?php

include 'includes/conn.php';

if(isset($_POST['enviar'])){

    $cedula = $_POST["cedula"];
    $rac = $_POST["rac"];
    $dn = $_POST["dn"];
    $nip = $_POST["nip"];
    $vignip = $_POST["vignip"];
    $fvc = $_POST["fvc"];
    $oferta = $_POST["oferta"];
    $estado_cav = $_POST["estado_cav"];
    $cav = $_POST["cav"];
    $nombre_cliente = $_POST["nombre_cliente"];
    $nacimiento = $_POST["nacimiento"];
    $curp = $_POST["curp"];
    $contacto1 = $_POST["contacto1"];
    $contacto2 = $_POST["contacto2"];
    $correo = $_POST["correo"];
    $fecha_carga = $_POST["fecha_carga"];
    $intervalo = $_POST["intervalo"];
    $semana = $_POST["semana"];
    $mes = $_POST["mes"];
    $contactorac = $_POST["contactorac"];
    $correorac = $_POST["correorac"];
  
  $sql = "INSERT INTO ventasapp (cedula, DN, NIP, VIGENCIA_NIP, FVC, OFERTA, ESTADO_CAV, CAV, NOMBRES_CLIENTE, FECHA_NACIMIENTO, CURP, CONTACTO_1, CONTACTO_2, CORREO, VENDEDOR, FECHA_CARGA, INTERVALO, SEMANA, MES, ESTATUS_CM) VALUES ('$cedula', '$dn', '$nip', '$vignip', '$fvc', '$oferta', '$estado_cav', '$cav','$nombre_cliente','$nacimiento','$curp','$contacto1','$contacto2','$correo', '$rac','$fecha_carga','$intervalo','$semana','$mes', 'SIN ESTATUS')";
                                                                                                                                                                                                                    
    if($conn->query($sql)){
  
      $rac = $_POST['rac']. " REDES VNZ";
      $email = 'rafalejandrorivero@gmail.com' . ',';
      $email .= 'jdcardozo0007@gmail.com';
      $message = 
      
      "*Redes VNZ:* BPCDMX1V1150 / BPCDMX1V1150H" . "\r\n". 
      "*DN:* " .$_POST['dn']. "\r\n". 
      "*NIP:* " .$_POST['nip']. "\r\n".   
      "*Vigencia del NIP:* " .$_POST['vignip']. "\r\n". 
      "*FVC:* " .$_POST['fvc']. "\r\n". 
      "*Oferta:* " .$_POST['oferta']. "\r\n". 
      "*Estado del CAV:* " .$_POST['estado_cav']. "\r\n". 
      "*CAV:* " .$_POST['cav']. "\r\n". 
      "*Nombres Cliente:* " .$_POST['nombre_cliente']. "\r\n". 
      "*Fecha de Nacimiento:* " .$_POST['nacimiento']. "\r\n". 
      "*CURP:* " .$_POST['curp']. "\r\n". 
      "*Contacto 1:* " .$_POST['contacto1']. "\r\n". 
      "*Contacto 2:* " .$_POST['contacto2']. "\r\n". 
      "*Correo:* " .$_POST['correo']. "\r\n". "\r\n".
      "Información de Contacto del RAC: " . ".$contactorac." . "-" . ".$correorac." . "\r\n";

      $header = 
      "From: enlacecc@enlacecc.emprende.ve" . "\r\n".

    mail($email, $rac, $message, $header);

    echo 'Venta cargada satisfactoriamente';
  }
  else{

      $rac = $_POST['rac']. " REDES VNZ";
      $email = 'rafalejandrorivero@gmail.com' . ',';
      $email .= 'jdcardozo0007@gmail.com';
      $message = "Este RAC intentó cargar una venta pero hubo un error. Contáctalo para informarle. " . ".$contactorac." . "-" . ".$correorac.";
      $header = "From: enlacecc@enlacecc.emprende.ve" . "\r\n";

    mail($email, $rac, $message, $header);
    
    echo 'Error, intenta nuevamente.';
  
    
  }}
  header('location:'.$return );
?>