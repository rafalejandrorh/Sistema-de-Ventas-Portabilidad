<?php 


if(isset($_POST['enviar'])){
  $output = array('error'=>false);
  
  include '../conn.php';
  include '../timezone.php';


  $cedula = $_POST["cedula"];
  $nombre = $_POST["nombre"];
  $contacto = $_POST["contacto"];
  $correo = $_POST["correo"];
  $residencia = $_POST["residencia"];
  $equipos = $_POST["equipos"];
  $date_now = date('d-m-y');

$sql = "INSERT INTO plantilla (CEDULA, RAC, FECHA_INGRESO, ESTATUS, CONTACTO, CORREO, RESIDENCIA, EQUIPOS) VALUES ('$cedula', '$nombre', '$date_now', 0, '$contacto', '$correo', '$residencia', '$equipos')";

if($conn->query($sql)){

  echo '<H3>Usuario registrado satisfactoriamente. En breve el administrador activará tus credenciales. <a href="index.php"> Haz click aquí para volver al Inicio de Sesión de Usuario </a></H3>';
}
else{
  
  echo '<H3>DError al Ingresar los datos. Probablemente ya estés registrado, verifica y vuelve a intentarlo.</H3>';

  
}}


?>