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
      <!--<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="pull-right">
              <form method="POST" class="form-inline" id="payForm">
                  <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll"><span class=""></span> Descargar en Excel</button>
                </form>
              </div>
            </div>
            <div class="table-responsive">
            <div class="box-body">
            <table id="example2" class="table table-bordered">
                  <thead>
                    <th class="">RAC</th>
                    <th class="">ALTAS</th>
                    <th class="">MONTO ALTA</th>
                    <th class="">MONTO A COBRAR</th>
                    <th class="">MONTO BS</th>
                    <th class="">TASA BS</th>
                    <th class="">N° REF</th>
                    <th class="">PAGO</th>
                    <th class="">N° CUENTA</th>
                    <th class="">PAGO MÓVIL</th>
                    <th class="">EDITAR</th>
                  </thead>
                  <tbody>
                        <?php
                        
                        //$sql="SELECT * from Calculo_Comisiones";;
                        //$query = $conn->query($sql);
                            //while($row = $query->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php //echo $row['RAC']; ?></td>
                            <td><?php //echo $row['ALTAS']; ?></td>
                            <td><?php //echo '$'.$row['MONTO_ALTA']; ?></td>
                            <td><?php //echo '$'.$row['MONTO_A_COBRAR']; ?></td>
                            <td><?php //echo 'Bs'.$row['MONTO_BS']; ?></td>
                            <td><?php //echo 'Bs'.$row['TASA_BS']; ?></td>
                            <td><?php //echo $row['NRO_REFERENCIA']; ?></td>
                            <td><?php //echo $row['PAGO']; ?></td>
                            <td><?php //echo $row['NRO_CUENTA']; ?></td>
                            <td><?php //echo $row['PAGO_MOVIL']; ?></td>
                            <td>
                            <button class='btn btn-secundary btn-sm edit btn-flat' data-id="<?php //echo $row['RAC']; ?>"><i class="fa fa-edit"></i></button>
                            </td>         
                        </tr>
                        <?php
                        //}?>
                        </tbody>
                        </table>
                      </div> 
            </div>
          </div>
        </div>
      </div>-->

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="pull-right">
              <form method="POST" class="form-inline" id="payForm">
                  <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll"><span class=""></span> Descargar en Excel</button>
                </form>
              </div>
            </div>
            <div class="table-responsive">
            <div class="box-body">
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
                    <th class="">EDITAR</th>
                  </thead>
                  <tbody>
                        <?php
                        
                            $sql="SELECT * from Calculo_Comisiones";;
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){

                            //$sql2="SELECT *, rate_dolar from tasa_dolar";;
                            //$query2 = $conn->query($sql2);
                            //$dolarbcv = $query2 ->fetch_assoc();

                            $string = file_get_contents("https://s3.amazonaws.com/dolartoday/data.json");
                            $json = json_decode($string, TRUE);
                            $dolarbcv = $json["USD"]["promedio_real"];

                            $monto_a_cobrar = $row['ALTAS'] * $row['MONTO_ALTA'];  

                            $monto_bs = $monto_a_cobrar * $dolarbcv;//['rate_dolar'];
                        ?>
                        <tr>
                            <td><?php echo $row['RAC']; ?></td>
                            <td><?php echo $row['ALTAS']; ?></td>
                            <td><?php echo '$ '.$row['MONTO_ALTA']; ?></td>
                            <td><?php echo '$ '.number_format($monto_a_cobrar,2); ?></td>
                            <td><?php echo 'Bs.S '.number_format($monto_bs,2); ?></td>
                            <td><?php echo 'Bs.S '.number_format($dolarbcv,2); ?></td>
                            <td><?php echo $row['NRO_REFERENCIA']; ?></td>
                            <td><?php echo $row['PAGO']; ?></td>
                            <td><?php echo $row['NRO_CUENTA']; ?></td>
                            <td><?php echo $row['PAGO_MOVIL']; ?></td>
                            <td>
                            <button class='btn btn-secundary btn-sm edit btn-flat' data-id="<?php echo $row['RAC']; ?>"><i class="fa fa-edit"></i></button>
                            </td>         
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