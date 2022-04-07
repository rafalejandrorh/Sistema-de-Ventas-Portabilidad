<?php include 'includes/conn.php'?>
<?php include 'includes/session.php'; ?>
<?php
include 'includes/timezone.php';
$range_to = date('m/d/Y');
$range_from = date('m/d/Y', strtotime('-1 day', strtotime($range_to)));
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
  
            <h1>Consolidado de Ventas</h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Ventas</a></li>
            <li class="active">Ventas Totales</li>
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
                <h3 class="card-title"><B>Meses Anteriores</B></h3></div>
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
                    <th>CAV</th>
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

                        $sql="SELECT * from ventastotales WHERE FECHA_CARGA BETWEEN '$from' AND '$to'";
                        $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                        echo "
                        <tr>
                            <td>".$row['DN']."</td>
                            <td>".$row['NIP']."</td>
                            <td>".$row['ESTADO_CAV']."</td>
                            <td>".$row['CURP']."</td>
                            <td>".$row['VENDEDOR']."</td>
                            <td>".$row['FECHA_CARGA']."</td>
                            <td>".$row['ESTATUS']."</td>
                            <td>".$row['FVC']."</td>
                            <td>".$row['CAV']."</td>
                        </tr>
                        ";}?>
                        </tbody>
                        </table>
                  </div>
                            </div>
                </div>
              </div>
            </div>

    </section>

    </div>
  
    

  <?php include 'includes/Footer.php'; ?>
  <?php include 'includes/scripts.php'; ?>
  </div>  
<script>

$(function(){
$("#reservation").on('change', function(){
    var range = encodeURI($(this).val());
    window.location = 'Ventasconsolidado.php?range='+range;
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