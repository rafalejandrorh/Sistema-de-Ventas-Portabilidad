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
      <h1><b>Ofertas Vigentes</b></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-compass"></i> Herramientas de Gestión</a></li>
        <li class="active">Ofertas Vigentes</li>
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
            <h2 class=""><b>Oferta Portabilidad Prepago</b></h2>
            <h4><b><a href="../Resources/Del 01 de junio al 31 de julio 2022 -VERANO-Prepago Rollover- Portabilidad.pdf">¿Prefieres tener el PDF? Descárgalo aquí</a></b></h4>
            <br>
            <div align="center"><img src="../Resources/Oferta_junio.jpg" alt="" style="width:80%"></div>
            <br>
            <h2 class=""><b>Duplicamos tus gigas (Después de culminar Oferta Prepago)</b></h2>
            <br>
            <div align="center"><img src="../Resources/Duplicamos tus gigas.png" alt="" style="width: 80%;"></div>
            <br>
            <h2 class=""><b>Parrilla Regular</b></h2>
            <br>
            <div align="center"><img src="../Resources/Parrilla Regular.png" alt="" style="width: 80%;"></div>
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