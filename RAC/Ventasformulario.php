<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>
<div class="content-wrapper">

    <section class="content-header">
    <h1 class="box-title"><b>Formulario de Ventas</b></h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-files-o"></i>Ventas</a></li>
            <li class="active">Ingreso de Ventas</li>
            </ol> 

    </section>

    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i>¡Proceso Exitoso!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border"> 
              <div class="pull-left">
              <h2><b>Hora Venezuela:</b></h2>
    	        <h3 id="time"></h3>
              </div>

            </div>
            <div class="box-body">
                  <div align="center">
                  <h3><b>ATENCIÓN! A partir del 1ro de Junio se aplicará una modificación a las Ofertas Comerciales de 100 y 50$; para descargar el PDF ve al apartado Herramientas/Ofertas Vigentes del Menú. Cualquier duda, comunícate con tu Supervisor.</b></h3>
                  <img src="../Resources/Oferta_junio.jpg" alt="" style="width:80%">
                  </div>
                </div>
            <div class="box-body">
    	          <h4 class="login-box-msg">Ingresa los datos de tu Venta 😎</h4>
                <form class="form-horizontal" action="formulario.php" method="POST">
                    
                   
                 <br>
                <h5><b>Recuerda colocar la FVC (Fecha Ventana de Cambio) Correcta, es decir el dia que tu cliente ira al CAV. De lo contrario tu venta no sera Cargada.</b></h5>
                <h5><b>En caso de existir un error, notificalo para que la FVC pueda ser modificada.</b></h5>
                 
                  <td>

                  <div class="form-group">
                    <div class="col-xs-10 col-sm-10 col-md-4">
                    <input type="hidden" class="form-control" value="<?php echo $user['CONTACTO']?>" name="contactorac" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="col-xs-10 col-sm-10 col-md-4">
                    <input type="hidden" class="form-control" value="<?php echo $user['CORREO']?>" name="correorac" required>
                    </div>
                    </div>
                  
                <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Cédula del RAC:</label>
                <div class="col-sm-6">  
                <input type="text" class="form-control" value="<?php echo  $_SESSION['user']?>" name="cedula" required>
                    </div>
                     </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">RAC:</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?php echo $user['RAC']?>" name="rac" required>
                    </div>
                    </div>

                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">DN a portar:</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="dn" placeholder="DN" maxlength="10" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">NIP:</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="nip" placeholder="NIP" maxlength="4" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Vigencia del NIP:</label>
                    <div class="col-sm-6">
                    <input type="date" class="form-control" name="vignip" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">FVC:</label>
                    <div class="col-sm-6">
                    <input type="date" class="form-control" name="fvc" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Oferta:</label>
                    <div class="col-sm-6">
                    <select class="form-control" name="oferta" id="oferta" required>
                        <option value="" selected>Oferta aceptada por tu Cliente</option>
                        <option value="$100 MXN">$100 Pesos</option>
                        <option value="$50 MXN">$50 Pesos</option>
                      </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Estado del CAV:</label>
                    <div class="col-sm-6">
                    <select class="form-control" name="estado_cav" id="estado_cav" placeholder="" required>
                        <option value="" selected>Estado en el que se encuentra el CAV Movistar asignado</option>
                        <option>Aguascalientes</option>
                        <option>Baja California Norte</option>
                        <option>Baja California Sur</option>
                        <option>Campeche</option>
                        <option>Chiapas</option>
                        <option>Chihuahua</option>
                        <option value="Ciudad de Mexico">Ciudad de México</option>
                        <option>Coahuila de Zaragoza</option>
                        <option>Colima</option>
                        <option>Durango</option>
                        <option value="Estado de Mexico">Estado de México</option>
                        <option>Guanajuato</option>
                        <option>Guerrero</option>
                        <option>Hidalgo</option>
                        <option>Jalisco</option>
                        <option value="Michoacan">Michoacán</option>
                        <option>Morelos</option>
                        <option>Nayarit</option>
                        <option value="Nuevo Leon">Nuevo León</option>
                        <option>Oaxaca</option>
                        <option>Puebla</option>
                        <option value="Queretaro">Querétaro</option>
                        <option>Quintana Roo</option>
                        <option value="San Luis Potosi">San Luis Potosí</option>
                        <option>Sinaloa</option>
                        <option>Sonora</option>
                        <option>Tabasco</option>
                        <option>Tamaulipas</option>
                        <option>Tlaxcala</option>
                        <option>Veracruz</option>
                        <option value="Yucatan">Yucatán</option>
                        <option>Zacatecas</option>
                      </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Nombre del CAV:</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="cav" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Nombre Cliente:</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre_cliente" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Fecha Nac. Cliente:</label>
                    <div class="col-sm-6">
                    <input type="date" class="form-control" name="nacimiento" required>
                    </div>
                    </div>
                  
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">CURP:</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="curp" placeholder="CURP" maxlength="18" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Número Contacto 1:</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="contacto1" maxlength="10" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Número de Contacto 2:</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="contacto2" maxlength="10" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Correo:</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="correo" value="" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-10 col-sm-10 col-md-4">
                    <input type="hidden" class="form-control" name="fecha_carga" value="<?php date_default_timezone_set ('America/Caracas'); echo 
                        $Date = date('Y-m-d');?>" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-10 col-sm-10 col-md-4">
                    <input type="hidden" class="form-control" name="intervalo" placeholder="Intervalo" value="<?php date_default_timezone_set ('America/Caracas'); echo 
                        $Date = date('G'); ?>" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-10 col-sm-10 col-md-4">
                    <input type="hidden" class="form-control" name="semana" value="0" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-10 col-sm-10 col-md-4">
                    <input type="hidden" class="form-control" name="mes" placeholder="Mes" value="<?php date_default_timezone_set ('America/Caracas'); echo 
                        $Date = date('F'); ?>" required>
                    </div>
                    </div>

                      <div class="form-group">
                      <div class="col-sm-12">
                          <button type="submit" class="btn btn-primary btn-block btn-flat" name="enviar"><i class="fa fa-sign-in"></i> Ingresar</button>
                      </div>
                    </div>
                    </td>
                </form>
            </div>
          </div>
        </div>
      </div>

      </section>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
<?php include 'includes/footer.php' ?>
<?php include 'includes/scripts.php' ?>
</body>
</html>
?>

<script type="text/javascript">

$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'asistencia.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
          
        }
      }
    });
  });
    
});
</script>