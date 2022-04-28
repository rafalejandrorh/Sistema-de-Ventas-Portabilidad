<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>
<div class="content-wrapper">

    <section class="content-header">
    <h1 class="box-title"><b>Información de Pago</b></h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class=""></i>Administración</a></li>
            <li class="active">Información de Pago</li>
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
              <div class="text-center">
            <h3> ¿Aún no haz proporcionado tus datos para recibir el pago de tus comisiones? Rellena el siguiente formulario.</h3>
            </div>
            </div>
            <div class="box-body">
                <h4><b>Nota: Si brindaste tu información bancaria a alguno de los administradores vía WhatsApp o cualquier otro medio, probablemente los datos ya estén en la Base de Datos, consulta con ellos antes de ingresar la información.</b></h4>
                <h4><b>Para Actualizar tu información de pago, haz click aquí: <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile"> Actualizar</a></b></h4>
                
                <form class="form-horizontal" action="formulario_pago.php" method="POST">

                <hr>
                <h4 class=""><b>Información del RAC</b></h4>
				        <hr>

                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Cédula</label>
                <div class="col-sm-6">  
                <input type="text" class="form-control" value="<?php echo  $_SESSION['user']?>" name="cedula" required>
                    </div>
                     </div>
                    
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Nombre </label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?php echo $user['RAC']?>" name="rac" required>
                    </div>
                    </div>

                <hr>
                <h4 class=""><b>Información de Cuenta Bancaria</b></h4>
				        <hr>

                  <td>

                  <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="hidden" class="form-control" value="<?php echo $user['CONTACTO']?>" name="contactorac">
                    </div>
                    </div>

                  <div class="form-group">
                  	<label for="lastname" class="col-sm-2 control-label">Banco</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="banco" name="banco" value="<?php echo $banks['BANCO']; ?>">
                  	</div>
                  </div>

                  <div class="form-group">
                  	<label for="lastname" class="col-sm-2 control-label">Tipo de Cuenta</label>

                    <div class="col-sm-6">
                    <select class="form-control" name="tipo_cuenta" id="tipo_cuenta">
                      <option value="">-- Selecciona una opción --</option>
                      <option value="CORRIENTE">Corriente</option>
                      <option value="AHORRO">Ahorro</option>
                      <option value="N/A">No Aplica</option>
                    </select>
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="lastname" class="col-sm-2 control-label">N° de Cuenta</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="nro_cuenta" name="nro_cuenta" value="">
                  	</div>
                </div>

                <hr>
                <h4 class=""><b>Información de Pago Móvil</b></h4>
				        <hr>
                    
                <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <input type="hidden" class="form-control" value="<?php echo $user['CORREO']?>" name="correorac">
                    </div>
                    </div>

                <div class="form-group">
                  	<label for="lastname" class="col-sm-2 control-label">Banco</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="banco" name="banco_pagomovil" value="<?php echo $payment['BANCO']; ?>">
                  	</div>
                </div>

                <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">Teléfono</label>

                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="telefono" name="telefono" value="">
                            </div>
                        </div>

                <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">Cédula del Titular</label>

                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="cititular" name="cititular" value="">
                            </div>
                        </div>

                <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">Nombre del Titular</label>

                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="nombre_titular" name="nombre_titular" value="">
                            </div>
                        </div>

                  <hr>      
                      <div class="form-group">
                      <div class="col-sm-4">
                          
                      </div>
                      <div class="col-sm-4">
                          <button type="submit" class="btn btn-primary btn-block btn-flat" name="enviar"><i class="fa fa-sign-in"></i> Ingresar</button>
                      </div>

                      <div class="col-sm-4">
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