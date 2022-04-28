<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/timezone.php';?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>
<div class="content-wrapper">

    <section class="content-header">
    <h1 class="box-title"><b>CAV´S Movistar</b></h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-compass"></i>Herramientas</a></li>
            <li class="active">CAV´S Movistar</li>
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
                <h3 class="card-title"><B>Busca un Centro de Atención y Venta</B></h3></div>
                <div class="pull-right">
              </div>
              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
              <div class="box-body">

              <form method="POST" class="form-inline" action="resultado_consulta_cav.php">
                  <div class="form-group">
                    <select name="cav"  value="-- Selecciona un Estado --" class="form-control">
                        <option value="1">Aguascalientes</option>
                        <option value="2">Baja California Norte</option>
                        <option value="3">Baja California Sur</option>
                        <option value="4">Campeche</option>
                        <option value="5">Chiapas</option>
                        <option value="6">Chihuahua</option>
                        <option value="7">Coahuila de Zaragoza</option>
                        <option value="8">Colima</option>
                        <option value="9">Ciudad de México</option>
                        <option value="10">Durango</option>
                        <option value="11">Estado de México</option>
                        <option value="12">Guanajuato</option>
                        <option value="13">Guerrero</option>
                        <option value="14">Hidalgo</option>
                        <option value="15">Jalisco</option>
                        <option value="16">Michoacán</option>
                        <option value="17">Morelos</option>
                        <option value="18">Nayarit</option>
                        <option value="19">Nuevo León</option>
                        <option value="20">Oaxaca</option>
                        <option value="21">Puebla</option>
                        <option value="22">Querétaro</option>
                        <option value="23">Quintana Roo</option>
                        <option value="24">San Luis Potosí</option>
                        <option value="25">Sinaloa</option>
                        <option value="26">Sonora</option>
                        <option value="27">Tabasco</option>
                        <option value="28">Tamaulipas</option>
                        <option value="29">Tlaxcala</option>
                        <option value="30">Veracruz</option>
                        <option value="31">Yucatán</option>
                        <option value="32">Zacatecas</option>
                    </select>
                  </div>
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat" name="enviarcav"><i class="fa fa-search"></i> Buscar</button>
                  </div>
                </form>

                  </div>
                            </div>
                </div>
              </div>
            </div>
      </section>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger form-group mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
<?php include 'includes/footer.php' ?>	
<?php include 'includes/scripts.php' ?>

<script>

$(function(){+

  $('#payroll').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'ventasconsolidado_xlsx.php');
    $('#payForm').submit();
  });

  $('#payslip').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'ventasconsolidado_generate.php');
    $('#payForm').submit();
  });

});

</script>
</body>
</html>