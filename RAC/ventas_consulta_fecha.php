<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/timezone.php';
$range_to = date('m/d/Y');
$range_from = date('m/d/Y', strtotime('-15 day', strtotime($range_to)));
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>
<div class="content-wrapper">

    <section class="content-header">
    <h1 class="box-title"><b>Consulta de Ventas</b></h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i>Consulta de Ventas</a></li>
            <li class="active">Consulta por Fecha</li>
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
                <h3 class="card-title"><B>Consulta por Fecha</B></h3></div>
                <div class="pull-right">
                <form method="POST" class="form-inline" id="payForm">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from.' - '.$range_to; ?>">
                  </div>
                  <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll"><span class=""></span> Descargar en Excel</button>
                  <button type="button" class="btn btn-primary btn-sm btn-flat" id="payslip"><span class=""></span> Descargar en PDF</button>
                </form>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
              <div class="box-body">
                <table id="example2" class="table table-bordered">
                <thead>
                    <th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th>
                    <th>VENDEDOR</th>
                    <th>FECHA DE CARGA</th>
                    <th>ESTATUS</th>
                    <th>FVC</th>
                    <th>ESTATUS CM</th>
                  </thead>
                  <tbody>
                        <?php

                        $to = date('Y-m-d');
                        $from = date('Y-m-d', strtotime('-1 day', strtotime($to)));

                        if(isset($_GET['range'])){
                          $range = $_GET['range'];
                          $ex = explode(' - ', $range);
                          $from = date('Y-m-d', strtotime($ex[0]));
                          $to = date('Y-m-d', strtotime($ex[1]));
                        }
                        $CEDULA = $_SESSION['user'];
                        $sql="SELECT * from ventastotales WHERE FECHA_CARGA BETWEEN '$from' AND '$to' AND cedula = $CEDULA";
                        $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                              ?>
                              <tr>
                                  <td><?php echo $row['DN']; ?></td>
                                  <td><?php echo $row['NIP']; ?></td>
                                  <td><?php echo $row['ESTADO_CAV']; ?></td>
                                  <td><?php echo $row['CURP']; ?></td>
                                  <td><?php echo $row['VENDEDOR']; ?></td>
                                  <td><?php echo $row['FECHA_CARGA']; ?></td>
                                  <td><?php echo $row['ESTATUS']; ?></td>
                                  <td><?php echo $row['FVC']; ?></td>
                                  <td><?php echo $row['ESTATUS_CM']; ?></td>      
                              </tr>
                              <?php
                              ;}?>
                        </tbody>
                        </table>
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

$(function(){
$("#reservation").on('change', function(){
    var range = encodeURI($(this).val());
    window.location = 'ventas_consulta_fecha.php?range='+range;
  });

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