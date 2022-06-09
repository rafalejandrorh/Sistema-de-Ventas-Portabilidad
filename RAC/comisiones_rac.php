<?php include 'includes/session.php'; ?>
<?php include 'includes/conn.php'; ?>
<?php include 'includes/timezone.php';
$range_to = date('m/d/Y');
$range_from = date('m/d/Y', strtotime('-7 day', strtotime($range_to)));
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1><b>Comisiones RAC</b></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-money"></i> Comisiones</a></li>
        <li class="active">RAC</li>
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
              <?php $sql2 = "SELECT * from fecha_comisiones WHERE ID = 1";
                  $query2 = $conn->query($sql2);
                  $row2 = $query2->fetch_assoc();
              ?>
              <h2><b>Semana del <?php echo $from = $row2['DESDE'];?> al <?php echo $from = $row2['HASTA'];?></b></h2>
              <div class="pull-right">
              <form method="POST" class="form-inline" id="payForm">
                  <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll"><span class=""></span> Descargar en Excel</button>
                </form>
              </div>
            </div>
            <div class="table-responsive">
            <div class="box-body">
            <div>
              <h5><b> Nota: Puedes descargar toda la información en un archivo excel. Al emitirse los pagos correspondientes a la información suministrada en este cuadro, la misma dejará de estar visible.</b></h5>
            </div>
            <table id="example1" class="table table-bordered">
                  <thead>
                    <th class="">RAC</th>
                    <th class="">ALTAS</th>
                    <th class="">MONTO ALTA</th>
                    <th class="">MONTO A COBRAR</th>
                    <th class="">MONTO BS</th>
                    <th class="">TASA DÓLAR BCV</th>
                    <th class="">N° REF</th>
                    <th class="">PAGO</th>
                    <th class="">N° CUENTA</th>
                    <th class="">PAGO MÓVIL</th>
                  </thead>
                  <tbody>
                        <?php
                        
                        $RAC = $_SESSION['user'];

                        $sql="SELECT * from Calculo_Comisiones WHERE id = $RAC";
                        $query = $conn->query($sql);

                            while($row = $query->fetch_assoc()){

                            $sql2="SELECT *, rate_dolar from tasa_dolar";;
                            $query2 = $conn->query($sql2);
                            $dolarbcv = $query2 ->fetch_assoc();

                           /* $string = file_get_contents("https://s3.amazonaws.com/dolartoday/data.json");
                            $json = json_decode($string, TRUE);
                            $dolarbcv = $json["USD"]["promedio_real"];*/

                            $monto_a_cobrar = $row['ALTAS'] * $row['MONTO_ALTA'];  

                            $monto_bs = $monto_a_cobrar * $dolarbcv['rate_dolar'];
                        ?>
                        <tr>
                            <td><?php echo $row['RAC']; ?></td>
                            <td><?php echo $row['ALTAS']; ?></td>
                            <td><?php echo '$ '.$row['MONTO_ALTA']; ?></td>
                            <td><?php echo '$ '.number_format($monto_a_cobrar,2); ?></td>
                            <td><?php echo 'Bs.S '.number_format($monto_bs,2); ?></td>
                            <td><?php echo 'Bs.S '.number_format($dolarbcv['rate_dolar'],2); ?></td>
                            <td><?php echo $row['NRO_REFERENCIA']; ?></td>
                            <td><?php echo $row['PAGO']; ?></td>
                            <td><?php echo $row['NRO_CUENTA']; ?></td>
                            <td><?php echo $row['PAGO_MOVIL']; ?></td>        
                        </tr>
                        <?php
                        }?>
                        </tbody>
                        </table>
                      </div> 
                      </div>

          <div class="box">
            <div class="box-header with-border">
              <h2><b>Altas</b></h2>
              <div class="pull-right">

              </div>
            </div>
            <div class="table-responsive">
            <div class="box-body">
            <table id="example2" class="table table-bordered">
                  <thead>
                    <th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th> 
                    <th>FECHA DE CARGA</th>
                    <th>ESTATUS</th>
                    <th>FVC</th>
                    <th>ESTATUS CM</th>
                    <th>FECHA DE ALTA</th>
                  </thead>
                  <tbody>
                        <?php

                  $sql2 = "SELECT * from fecha_comisiones WHERE ID = 1";
                  $query2 = $conn->query($sql2);
                  $row2 = $query2->fetch_assoc();

                  $from = $row2['DESDE'];
                  $to = $row2['HASTA'];

                  $CEDULA = $_SESSION['user'];
                  $sql="SELECT * from ventastotales WHERE FECHA_ALTA BETWEEN '$from' AND '$to' AND cedula = $CEDULA";
                  $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['DN']; ?></td>
                            <td><?php echo $row['NIP']; ?></td>
                            <td><?php echo $row['ESTADO_CAV']; ?></td>
                            <td><?php echo $row['CURP']; ?></td>
                            <td><?php echo $row['FECHA_CARGA']; ?></td>
                            <td><?php echo $row['ESTATUS']; ?></td>
                            <td><?php echo $row['FVC']; ?></td>
                            <td><?php echo $row['ESTATUS_CM']; ?></td>  
                            <td><?php echo $row['FECHA_ALTA']; ?></td>     
                        </tr>
                        <?php
                        }?>
                        </tbody>
                        </table>
                      </div> 
                      </div>
            </div>
        </div>
      </div>
      
      </div>


<!--<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <?php $sql2 = "SELECT * from fecha_comisiones WHERE ID = 2";
                  $query2 = $conn->query($sql2);
                  $row2 = $query2->fetch_assoc();
              ?>
              <h2><b>Semana del <?php echo $from = $row2['DESDE'];?> al <?php echo $from = $row2['HASTA'];?></b></h2>
              <div class="pull-right">
              <form method="POST" class="form-inline" id="payForm2">
                  <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll2"><span class=""></span> Descargar en Excel</button>
                </form>
              </div>
            </div>
            <div class="table-responsive">
            <div class="box-body">
            <div>
              <h5><b> Nota: Puedes descargar toda la información en un archivo excel. Al emitirse los pagos correspondientes a la información suministrada en este cuadro, la misma dejará de estar visible.</b></h5>
            </div>
            <table id="example3" class="table table-bordered">
                  <thead>
                    <th class="">RAC</th>
                    <th class="">ALTAS</th>
                    <th class="">MONTO ALTA</th>
                    <th class="">MONTO A COBRAR</th>
                    <th class="">MONTO BS</th>
                    <th class="">TASA DÓLAR BCV</th>
                    <th class="">N° REF</th>
                    <th class="">PAGO</th>
                    <th class="">N° CUENTA</th>
                    <th class="">PAGO MÓVIL</th>
                  </thead>
                  <tbody>
                        <?php
                        /*
                        $RAC = $_SESSION['user'];

                        $sql="SELECT * from Calculo_Comisiones_second WHERE id = $RAC";
                        $query = $conn->query($sql);

                            while($row = $query->fetch_assoc()){

                            $sql2="SELECT *, rate_dolar from tasa_dolar";;
                            $query2 = $conn->query($sql2);
                            $dolarbcv = $query2 ->fetch_assoc();

                            /*$string = file_get_contents("https://s3.amazonaws.com/dolartoday/data.json");
                            $json = json_decode($string, TRUE);
                            $dolarbcv = $json["USD"]["promedio_real"];*/

                            /*$monto_a_cobrar = $row['ALTAS'] * $row['MONTO_ALTA'];  

                            $monto_bs = $monto_a_cobrar * $dolarbcv['rate_dolar'];
                        ?>
                        <tr>
                            <td><?php echo $row['RAC']; ?></td>
                            <td><?php echo $row['ALTAS']; ?></td>
                            <td><?php echo '$ '.$row['MONTO_ALTA']; ?></td>
                            <td><?php echo '$ '.number_format($monto_a_cobrar,2); ?></td>
                            <td><?php echo 'Bs.S '.number_format($monto_bs,2); ?></td>
                            <td><?php echo 'Bs.S '.number_format($dolarbcv['rate_dolar'],2); ?></td>
                            <td><?php echo $row['NRO_REFERENCIA']; ?></td>
                            <td><?php echo $row['PAGO']; ?></td>
                            <td><?php echo $row['NRO_CUENTA']; ?></td>
                            <td><?php echo $row['PAGO_MOVIL']; ?></td>        
                        </tr>
                        <?php
                        }*/?>
                        </tbody>
                        </table>
                      </div> 
                      </div>

          <div class="box">
            <div class="box-header with-border">
              <h2><b>Altas</b></h2>
              <div class="pull-right">

              </div>
            </div>
            <div class="table-responsive">
            <div class="box-body">
            <table id="example4" class="table table-bordered">
                  <thead>
                    <th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th> 
                    <th>FECHA DE CARGA</th>
                    <th>ESTATUS</th>
                    <th>FVC</th>
                    <th>ESTATUS CM</th>
                    <th>FECHA DE ALTA</th>
                  </thead>
                  <tbody>
                        <?php

                  $sql2 = "SELECT * from fecha_comisiones WHERE ID = 2";
                  $query2 = $conn->query($sql2);
                  $row2 = $query2->fetch_assoc();

                  $from = $row2['DESDE'];
                  $to = $row2['HASTA'];

                  $CEDULA = $_SESSION['user'];
                  /*$sql="SELECT * from ventastotales WHERE FECHA_ALTA BETWEEN '$from' AND '$to' AND cedula = $CEDULA";
                  $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['DN']; ?></td>
                            <td><?php echo $row['NIP']; ?></td>
                            <td><?php echo $row['ESTADO_CAV']; ?></td>
                            <td><?php echo $row['CURP']; ?></td>
                            <td><?php echo $row['FECHA_CARGA']; ?></td>
                            <td><?php echo $row['ESTATUS']; ?></td>
                            <td><?php echo $row['FVC']; ?></td>
                            <td><?php echo $row['ESTATUS_CM']; ?></td>  
                            <td><?php echo $row['FECHA_ALTA']; ?></td>     
                        </tr>
                        <?php
                        }*/?>
                        </tbody>
                        </table>
                      </div> 
                      </div>

        </div>
      </div>
      
      </div>
        </div> -->









        <div class="row">
        <div class="col-xs-12">

        <div class="box">
            <div class="box-header with-border">
              <h2><b>Bajas Exportadas del Mes</b></h2>
              <div class="pull-right">

              </div>
            </div>
            <div class="table-responsive">
            <div class="box-body">
            <div>
              <h5><b> Nota: Este apartado incluye las bajas exportadas de otros meses pero que llegaron en el mes en curso.</b></h5>
            </div>
            <table id="example5" class="table table-bordered">
                  <thead>
                    <th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th>
                    <th>FECHA DE CARGA</th>
                    <th>ESTATUS</th>
                    <th>FVC</th>
                    <th>ESTATUS CM</th>
                    <th>FECHA DE ALTA</th>
                  </thead>
                  <tbody>
                        <?php

                  $sql2="SELECT MES_VENTAS from ventas_config WHERE ID = 1";
                  $rquery = $conn->query($sql2);
                  $MES = $rquery->fetch_assoc();
                  $MES2 = $MES['MES_VENTAS'];

                  $CEDULA = $_SESSION['user'];
                  $sql="SELECT * from ventastotales WHERE ESTATUS_CM = 'BAJA/EXPORTADA' AND cedula = $CEDULA AND MES_BAJA = '$MES2'";
                  $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['DN']; ?></td>
                            <td><?php echo $row['NIP']; ?></td>
                            <td><?php echo $row['ESTADO_CAV']; ?></td>
                            <td><?php echo $row['CURP']; ?></td>
                            <td><?php echo $row['FECHA_CARGA']; ?></td>
                            <td><?php echo $row['ESTATUS']; ?></td>
                            <td><?php echo $row['FVC']; ?></td>
                            <td><?php echo $row['ESTATUS_CM']; ?></td>  
                            <td><?php echo $row['FECHA_ALTA']; ?></td>     
                        </tr>
                        <?php
                        }?>
                        </tbody>
                        </table>
                      </div> 
            </div>
        

          <div class="box">
            <div class="box-header with-border">
              <h2><b>Sin Estatus del Mes</b></h2>
              <div class="pull-right">

              </div>
            </div>
            <div class="table-responsive">
            <div class="box-body">
            <table id="example6" class="table table-bordered">
                  <thead>
                    <th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th>
                    <th>FECHA DE CARGA</th>
                    <th>ESTATUS</th>
                    <th>FVC</th>
                    <th>ESTATUS CM</th>
                    <th>FECHA DE ALTA</th>
                  </thead>
                  <tbody>
                        <?php

                  $sql2="SELECT MES_VENTAS from ventas_config WHERE ID = 1";
                  $rquery = $conn->query($sql2);
                  $MES = $rquery->fetch_assoc();
                  $MES2 = $MES['MES_VENTAS'];

                  $CEDULA = $_SESSION['user'];
                  $sql="SELECT * from ventastotales WHERE ESTATUS_CM = 'SIN ESTATUS' AND cedula = $CEDULA AND MES = '$MES2'";
                  $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['DN']; ?></td>
                            <td><?php echo $row['NIP']; ?></td>
                            <td><?php echo $row['ESTADO_CAV']; ?></td>
                            <td><?php echo $row['CURP']; ?></td>
                            <td><?php echo $row['FECHA_CARGA']; ?></td>
                            <td><?php echo $row['ESTATUS']; ?></td>
                            <td><?php echo $row['FVC']; ?></td>
                            <td><?php echo $row['ESTATUS_CM']; ?></td>  
                            <td><?php echo $row['FECHA_ALTA']; ?></td>     
                        </tr>
                        <?php
                        }?>
                        </tbody>
                        </table>
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

<?php include 'includes/comisiones_rac_modal.php'; ?>

<script>
$(function(){

  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('#payroll').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'comisiones_rac_xlsx.php');
    $('#payForm').submit();
  });

  $('#payroll2').click(function(e){
    e.preventDefault();
    $('#payForm2').attr('action', 'comisiones_rac_xlsx2.php');
    $('#payForm2').submit();
  });

});

  function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'comisiones_rac_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#RAC').val(response.RAC);
      $('#NRO_REFERENCIA').val(response.NRO_REFERENCIA);
      $('#PAGO').val(response.PAGO);
    }
  });
  }
</script>
</body>
</html>