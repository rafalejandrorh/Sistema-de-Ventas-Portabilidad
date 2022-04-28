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
  
            <h1>Ventas pendientes por Estatus</h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i>Ventas</a></li>
            <li class="active">Ventas pendientes por Estatus</li>
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
                <h3 class="card-title"><B>En Espera</B></h3></div>
                <div class="pull-right">
                <form method="POST" class="form-inline" id="payForm">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from.' - '.$range_to; ?>">
                  </div>
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
                    <th>ACCIÓN</th>
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

                        $sql="SELECT * from ventastotales WHERE ESTATUS = 'EN ESPERA' AND FECHA_CARGA BETWEEN '$from' AND '$to'";
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
                                  <td>
                                    <button class='btn btn-secundary btn-sm edit btn-flat' data-id="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-secundary btn-sm delete btn-flat" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button>
                                  </td> 
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

    </div>
  
    

  <?php include 'includes/Footer.php'; ?>
  <?php include 'includes/scripts.php'; ?>
  </div>  

  <?php include 'includes/ventasdia_modal.php'; ?>

<script>

$(function(){
$("#reservation").on('change', function(){
    var range = encodeURI($(this).val());
    window.location = 'enespera.php?range='+range;
  });

  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'ventasdia_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#delete_id').val(response.id);
      $('#delete_DN').val(response.DN);
      $('#delete_RAC').val(response.VENDEDOR);
      $('#edit_id').val(response.id);
      $('#DN').val(response.DN);
      $('#NIP').val(response.NIP);
      $('#VIGNIP').val(response.VIGENCIA_NIP);
      $('#FVC').val(response.FVC);
      $('#OFERTA').val(response.OFERTA);
      $('#ESTADO_CAV').val(response.ESTADO_CAV);
      $('#CAV').val(response.CAV);
      $('#NOMBRES_CLIENTE').val(response.NOMBRES_CLIENTE);
      $('#FECHA_NACIMIENTO').val(response.FECHA_NACIMIENTO);
      $('#CURP').val(response.CURP);
      $('#CONTACTO_1').val(response.CONTACTO_1);
      $('#CONTACTO_2').val(response.CONTACTO_2);
      $('#CORREO').val(response.CORREO);
      $('#ESTATUS').val(response.ESTATUS);
      $('#VENDEDOR').val(response.VENDEDOR);
    }
  });
  }
</script>
</body>
</html>