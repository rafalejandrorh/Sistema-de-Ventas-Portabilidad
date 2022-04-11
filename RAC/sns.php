<?php include 'includes/session.php'; ?>
<?php include 'includes/conn.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>


    
  <div class="content-wrapper">
    <section class="content-header">
      <h1><b>SNS</b></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-compass"></i> Herramientas de Gestión</a></li>
        <li class="active">Consulta SNS</li>
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
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                  </div>
                </form>
              </div>
            </div>
            <div class="table-responsive">
            <div class="box-body">
            <h2 class=""><b>Consulta en qué Compañía se encuentra tu cliente.</b></h2>
            <h4>1. Haz Click en el enlace de abajo y ve a Consultas de Numeración.</h4>
            <h4>2. Haz Click en Consulta Numeración Geográfica.</h4>
            <h4>3. Coloca el DN a consultar en el apartado Número Nacional y haz click en Buscar.</h4>
            <h4>4. En Información del Número Consultado, al final encontrarás el Proveedor de telefonía que corresponde al DN.</h4>
            <h4><b><a href="https://sns.ift.org.mx:8081/sns-frontend/consulta-numeracion/numeracion-geografica.xhtml" target="_blank">Haz click aquí para ir al sitio.</a></b></h4>
            <br>
            </div> 
            </div>
          </div>
        </div>
      </div>
      </div>  
        </div>
      </div>
                     
      </section>
    </div>
    <footer>
  	<?php include 'includes/footer.php'; ?>
    </footer>
    <?php include 'includes/scripts.php'; ?>
    
</div>
</body>
</html>