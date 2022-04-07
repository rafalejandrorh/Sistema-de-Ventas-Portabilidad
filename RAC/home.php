<?php include 'includes/session.php'; ?>
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
      <div class="col-lg-3 col-xs-5">
          <div class="small-box bg-purple">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM ventastotales where cedula= '".$_SESSION['user']."'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
             
              <p>Total de Ventas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
        
        
        <div class="col-lg-2 col-xs-10">
          <div class="small-box bg-blue">
            <div class="inner">
              <?php
                  $sql2="SELECT MES_VENTAS from ventas_config WHERE ID = 1";
                  $rquery = $conn->query($sql2);
                  $MES = $rquery->fetch_assoc();
                  $MES2 = $MES['MES_VENTAS'];
                  
                   $sql = "SELECT * FROM ventastotales WHERE MES = '$MES2' AND cedula='".$_SESSION['user']."'";
                   $query = $conn->query($sql);
 
                   echo "<h3>".$query->num_rows."</h3>";
              ?>
              <p>Ventas Mes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div> 
          </div>
        </div>

        <div class="col-lg-2 col-xs-5">
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA'and cedula = ".$_SESSION['user']." AND MES = '$MES2'";
                $query = $conn->query($sql);
                $early = $query->num_rows;

                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA/POSPAGO'and cedula = ".$_SESSION['user']." AND MES = '$MES2'";
                $query = $conn->query($sql);
                $early2 = $query->num_rows;

                $earlytotal = $early + $early2;

                echo "<h3>".$earlytotal."</h3>"
              ?>

              <p>Altas Mes</p>
            </div>
            <div class="icon">
              <i class="fa fa-suitcase"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-xs-5">
          <div class="small-box bg-red">
            <div class="inner">
              <?php
                

                $sql = "SELECT * FROM ventastotales WHERE MES = '$MES2' AND ESTATUS_CM = 'SIN ESTATUS' and cedula ='".$_SESSION['user']."'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>"
              ?>

              <p>Sin Estatus Mes</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-orange">
            <div class="inner">
              <?php
                $sql2="SELECT MES_VENTAS from ventas_config WHERE ID = 1";
                $rquery = $conn->query($sql2);
                $MES = $rquery->fetch_assoc();
                $MES2 = $MES['MES_VENTAS'];
              
                $sql = "SELECT * FROM ventastotales WHERE MES = '$MES2' AND cedula = '".$_SESSION['user']."'";
                $query = $conn->query($sql);
                $total = $query->num_rows;

                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA'and cedula = ".$_SESSION['user']." AND MES = '$MES2'";
                $query = $conn->query($sql);
                $early = $query->num_rows;

                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA/POSPAGO'and cedula = ".$_SESSION['user']." AND MES = '$MES2'";
                $query = $conn->query($sql);
                $early2 = $query->num_rows;

                $earlytotal = $early + $early2;
                
                if($earlytotal < 1){
                
                $percentage = 0;
                
                }else{
                    
                $percentage = ($earlytotal/$total)*100;
                    
                }

                echo "<h3>".number_format($percentage,2)."<sup style='font-size: 20px'>%</sup></h3>";
              ?>
          
              <p>Conversión del Mes</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Tus Ventas del día</b></h3>
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
                    <th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th>
                    <th>CÉDULA</th>
                    <th>VENDEDOR</th>
                    <th>FECHA DE CARGA</th>
                    <th>ESTATUS</th>
                    <th>FVC</th>
                    <th>CAV</th>
                  </thead>
                  <tbody>
                        <?php
                        date_default_timezone_set('America/Caracas'); 
                        $Date = date('Y-m-d');
                        $sql="SELECT * from ventastotales WHERE FECHA_CARGA = '$Date' AND cedula = '".$_SESSION['user']."'";
                        $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                        echo "
                        <tr>
                            <td>".$row['DN']."</td>
                            <td>".$row['NIP']."</td>
                            <td>".$row['ESTADO_CAV']."</td>
                            <td>".$row['CURP']."</td>
                            <td>".$row['cedula']."</td>
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
      </div>

      </section>
    </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</div>

<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>
