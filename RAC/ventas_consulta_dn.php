<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>
<div class="content-wrapper">

    <section class="content-header">
    <h1 class="box-title"><b>Consulta de Ventas</b></h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i>Consulta de Ventas</a></li>
            <li class="active">Consulta por DN</li>
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
                <h3 class="card-title"><B>Consulta por DN</B></h3>
              </div>

              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
              <div class="box-body">
              <form class="form-horizontal" action="resultado_consulta_dn.php" method="POST">
              <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                    <input type="hidden" class="form-control" name="" placeholder="" value="" required>
                    </div>
                    

                    <div class="col-xs-12 col-sm-12 col-md-4">
                    <input type="text" class="form-control" name="DN" placeholder="Ingresa el DN a Consultar"  required>
                    </div>

                    

                    <div class="col-xs-12 col-sm-12 col-md-4">
                    <input type="hidden" class="form-control" name="" placeholder="" value="" required>
                    </div>
                    </div>

                <div class="form-group">
                        <div class="col-sm-4">       
                        </div>

                        <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="enviardn"><i class="fa fa-search"></i> Consultar</button>
                        </div>

                        <div class="col-sm-4">   
                        </div>

                </div>
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
</body>
</html>