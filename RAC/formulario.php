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
  
  $sql = "INSERT INTO ventastotales (cedula, DN, NIP, VIGENCIA_NIP, FVC, OFERTA, ESTADO_CAV, CAV, NOMBRES_CLIENTE, FECHA_NACIMIENTO, CURP, CONTACTO_1, CONTACTO_2, CORREO, VENDEDOR, FECHA_CARGA, INTERVALO, SEMANA, MES, ESTATUS_CM) VALUES ('$cedula', '$dn', '$nip', '$vignip', '$fvc', '$oferta', '$estado_cav', '$cav','$nombre_cliente','$nacimiento','$curp','$contacto1','$contacto2','$correo', '$rac','$fecha_carga','$intervalo','$semana','$mes', 'SIN ESTATUS')";
                                                                                                                                                                                                                    
    if($conn->query($sql)){
  
      $_SESSION['success'] = 'Venta cargada satisfactoriamente';
  }
  else{
    
    $_SESSION['error'] = 'Error, intenta nuevamente';
  
    
  }}
  header('location:'.$return );
?>