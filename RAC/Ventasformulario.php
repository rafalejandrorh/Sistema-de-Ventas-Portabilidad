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
              <div class="pull-right">
              <h2><b>Hora México (CDMX):</b></h2>
              <?php date_default_timezone_set('America/Mexico_City'); 
                        $Time = date('h:i:s A', Time()); 
                        echo "<h3>".$Time."</h3>";
                        ?>
                        </div>
            </div>
            <div class="box-body">
    	          <h4 class="login-box-msg">Ingresa los datos de tu Venta 😎</h4>
                <form class="form-horizontal" action="formulario.php" method="POST">
                  <td>
                  
                <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-6">  
                <input type="text" class="form-control" value="<?php echo  $_SESSION['user']?>" name="cedula" required>
                    </div>
                     </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" value="<?php echo $user['RAC']?>" name="rac" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" name="nip" placeholder="NIP" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" name="vignip" id="datepicker_add" placeholder="Vigencia del NIP (Formato: Año-Mes-Día Ejemplo: 2022-03-14)" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" name="fvc" id="datepicker_add2" placeholder="FVC de Portabilidad (Formato: Año-Mes-Día Ejemplo: 2022-03-14)" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <select class="form-control" name="oferta" id="oferta" required>
                        <option value="" selected>Ingresa la Oferta aceptada por tu Cliente</option>
                        <option value="$100 MXN">$100 Pesos</option>
                        <option value="$50 MXN">$50 Pesos</option>
                      </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <select class="form-control" name="estado_cav" id="estado_cav" placeholder="" required>
                        <option value="" selected>Ingresa el Estado en el que se encuentra el CAV Movistar asignado</option>
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
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" name="cav" placeholder="Nombre del CAV al que asistirá tu cliente" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" name="nombre_cliente" placeholder="Nombre del Cliente" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" name="dn" placeholder="DN" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" name="nacimiento" id="datepicker_add3" placeholder="Fecha de Nacimiento (Formato: Año-Mes-Día Ejemplo: 2000-12-06)" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" name="curp" placeholder="CURP" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" name="contacto1" placeholder="Número de Contacto 1" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" name="contacto2" placeholder="Número de Contacto 2" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="text" class="form-control" name="correo" placeholder="Correo" value="" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="hidden" class="form-control" name="fecha_carga" value="<?php date_default_timezone_set ('America/Caracas'); echo 
                        $Date = date('Y-m-d');?>" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="hidden" class="form-control" name="intervalo" placeholder="Intervalo" value="<?php date_default_timezone_set ('America/Caracas'); echo 
                        $Date = date('G'); ?>" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="hidden" class="form-control" name="semana" value="0" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="hidden" class="form-control" name="mes" placeholder="Mes" value="<?php date_default_timezone_set ('America/Caracas'); echo 
                        $Date = date('F'); ?>" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
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