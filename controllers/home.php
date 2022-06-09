<?php include 'includes/session.php'; ?>
<?php include '../config/conn.php'; ?>
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
      <h1><b>Dashboard</b></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
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
      <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM plantilla where ESTATUS=1";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
             
              <p>RAC´S Activos</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="Plantilla_activa.php" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <?php

                $sql2="SELECT MES_VENTAS from ventas_config WHERE ID = 1";
                $rquery = $conn->query($sql2);
                $MES = $rquery->fetch_assoc();
                $MES2 = $MES['MES_VENTAS'];

                $sql = "SELECT * FROM ventastotales WHERE MES = '$MES2'";
                $query = $conn->query($sql);
                $total = $query->num_rows;

                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA' and MES = '$MES2'";
                $query = $conn->query($sql);
                $early = $query->num_rows;
                
                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA/POSPAGO' and MES = '$MES2'";
                $query = $conn->query($sql);
                $early2 = $query->num_rows;

                $earlytotal = $early + $early2;

                if($earlytotal < 1){
                
                  $percentage = 0;
                  
                  }else{
                      
                  $percentage = ($earlytotal/$total)*100;
                      
                  }

                echo "<h3>".number_format($percentage, 2)."<sup style='font-size: 20px'>%</sup></h3>";
              ?>
          
              <p>Conversión del Mes</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="Ventasmes.php" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-orange">
            <div class="inner">
              <?php

                $sql = "SELECT * FROM ventastotales WHERE MES = '$MES2'";
                $query = $conn->query($sql);
                $total = $query->num_rows;

                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'SIN ESTATUS' and MES = '$MES2'";
                $query = $conn->query($sql);
                $sinestatus = $query->num_rows;

                if($sinestatus < 1){
                
                  $percentage = 0;
                  
                  }else{
                      
                  $percentage = ($sinestatus/$total)*100;
                      
                  }

                echo "<h3>".number_format($percentage, 2)."<sup style='font-size: 20px'>%</sup></h3>";
              ?>
          
              <p>Porcentaje Sin Estatus</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="Ventasmes.php" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <?php

                $sql = "SELECT * FROM ventastotales WHERE MES = '$MES2'";
                $query = $conn->query($sql);
                $total = $query->num_rows;

                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'BAJA/EXPORTADA' and MES = '$MES2'";
                $query = $conn->query($sql);
                $bajasexp = $query->num_rows;

                if($bajasexp < 1){
                
                  $percentage = 0;
                  
                  }else{
                      
                  $percentage = ($bajasexp/$total)*100;
                      
                  }

                echo "<h3>".number_format($percentage, 2)."<sup style='font-size: 20px'>%</sup></h3>";
              ?>
          
              <p>Porcentaje Bajas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="Ventasmes.php" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <?php

                    

                   $sql = "SELECT * FROM ventastotales WHERE MES = '$MES2' AND ESTATUS = 'LISTA ONIX'";
                   $query = $conn->query($sql);
 
                   echo "<h3>".$query->num_rows."</h3>";
              ?>
              <p>Total Ventas Mes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="Ventasmes.php" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <?php

                $sql = "SELECT * FROM ventastotales WHERE MES_ALTA = '$MES2' AND ESTATUS_CM = 'ALTA'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>"
              ?>

              <p>Ventas Altas</p>
            </div>
            <div class="icon">
              <i class="ion-arrow-graph-up-right"></i>
            </div>
            <a href="Ventasmes.php" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      

      <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-orange">
            <div class="inner">
              <?php

                $sql = "SELECT * FROM ventastotales WHERE MES = '$MES2' AND ESTATUS_CM = 'SIN ESTATUS'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>"
              ?>

              <p>Ventas Sin Estatus</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="Ventasmes.php" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      
      <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <?php

                $sql = "SELECT * FROM ventastotales WHERE MES = '$MES2' AND ESTATUS_CM = 'BAJA/EXPORTADA'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>"
              ?>

              <p>Bajas Exportadas</p>
            </div>
            <div class="icon">
              <i class="ion-arrow-graph-down-right"></i>
            </div>
            <a href="Ventasmes.php" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title"><b>Ventas del día</b></h3>
              <div class="box-tools pull-right">
              <form method="POST" class="form-inline" id="payForm">
                  <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll"><span class=""></span> Descargar en Excel</button>
                </form>
              </div>
            </div>
            <div class="table-responsive">
            <div class="box-body">
            <table id="" class="table table-bordered">
                  <thead>
                    <th class="">ACCIÓN</th>
                    <th class="">DN</th>
                    <th class="">NIP</th>
                    <th class="">ESTADO</th>
                    <th class="">CURP</th>
                    <th class="">CLIENTE</th>
                    <th class="">RAC</th>
                    <th class="">ESTATUS</th>
                    <th class="">FVC</th>
                    <th class="">HORA</th>
                  </thead>
                  <tbody>
                        <?php
                        date_default_timezone_set('America/Caracas');
                        
                        $Date = date('Y-m-d');
                        $sql="SELECT * from ventastotales WHERE FECHA_CARGA = '$Date'";
                        $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                        ?>
                        <tr>
                            <td>
                            <button class='btn btn-secundary btn-sm edit btn-flat' data-id="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></button> 
                            <button class="btn btn-secundary btn-sm delete btn-flat" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button> 
                            </td>  
                            <td><?php echo $row['DN']; ?></td>
                            <td><?php echo $row['NIP']; ?></td>
                            <td><?php echo $row['ESTADO_CAV']; ?></td>
                            <td><?php echo $row['CURP']; ?></td>
                            <td><?php echo $row['NOMBRES_CLIENTE']; ?></td>
                            <td><?php echo $row['VENDEDOR']; ?></td>
                            <td><?php echo $row['ESTATUS']; ?></td>
                            <td><?php echo $row['FVC']; ?></td>
                            <td><?php echo $row['INTERVALO']; ?></td>  
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

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title"><b>Ventas del día por RAC</b></h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                  </div>
                </form>
              </div>
            </div>
            <div class="table-responsive">
            <div class="box-body">
            <table id="example2" class="table table-bordered">
                  <thead>
                    <th class="col-sm-4">RAC</th>
                    <th class="col-sm-3">VENTAS ENVIADAS</th>
                    <th class="col-sm-3">VENTAS CARGADAS</th>
                    <th class="col-sm-2">SPH</th>
                  </thead>
                  <tbody>
                        <?php
                        date_default_timezone_set('America/Caracas');

                        $sql = "SELECT * FROM plantilla where ESTATUS=1";
                        $query = $conn->query($sql);

                        //echo "<h3>".$query->num_rows."</h3>";

                            while($row = $query->fetch_assoc()){

                              $Date = date('Y-m-d');

                              $sql2="SELECT * from ventastotales WHERE FECHA_CARGA = '$Date' AND VENDEDOR = '$row[RAC]'";
                              $query2 = $conn->query($sql2);
                              
                              $sql3="SELECT * from ventastotales WHERE FECHA_CARGA = '$Date' AND VENDEDOR = '$row[RAC]' AND ESTATUS = 'LISTA ONIX'";
                              $query3 = $conn->query($sql3);
                              $sph = $query3->num_rows/7;
                        ?>
                        <tr>
                            <td><?php echo $row['RAC']; ?></td>
                            <td><?php echo $query2->num_rows; ?></td>
                            <td><?php echo $query3->num_rows; ?></td>
                            <td><?php echo number_format($sph,2); ?></td>
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
<!--
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Informe de Meta</b></h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Seleccionar Año: </label>
                    <select class="form-control input-sm" id="select_year">
                      AQUÍ VIENE UN PHP
                        /*for($i=1990; $i<=2100; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }*/
                      AQUÍ FINALIZA EL PHP
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
                      -->
                     
      </section>
    </div>

    <footer>
  	<?php include 'includes/footer.php'; ?>
    </footer>
    <?php include 'includes/scripts.php'; ?>
    
</div>

<?php include 'includes/ventasdia_modal.php'; ?>

<script>
$(function(){

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

  $('#payroll').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'ventasdia_xlsx.php');
    $('#payForm').submit();
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