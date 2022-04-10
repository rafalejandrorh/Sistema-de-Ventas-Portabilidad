<?php include 'includes/conn.php'?>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
  
            <h1>Ventas del Mes</h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="ion ion-pie-graph"></i>Ventas</a></li>
            <li class="active">Ventas del Mes</li>
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
                <h3><?php $sql2="SELECT MES_VENTAS from ventas_config WHERE ID = 1";
                        $rquery = $conn->query($sql2);
                        $MES = $rquery->fetch_assoc();
                        $MES2 = $MES['MES_VENTAS']; 
                        echo $MES2;?></h3>
              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th>
                    <th>CÉDULA</th>
                    <th>VENDEDOR</th>
                    <th>FECHA DE CARGA</th>
                    <th>FVC</th>
                    <th>ESTATUS</th>
                    <th>ESTATUS_CM</th>
                  </thead>
                  <tbody>
                        <?php
                        
                        $sql="SELECT * from ventastotales WHERE MES = '$MES2' AND cedula ='".$_SESSION['user']."'";
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
                            <td>".$row['FVC']."</td>
                            <td>".$row['ESTATUS']."</td>
                            <td>".$row['ESTATUS_CM']."</td>
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

<script type="text/javascript">

$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('MMMM'));  
  }, 100);

});

</script>
</body>
</html>