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
                $sql = "SELECT * FROM ventastotales where cedula ='".$_SESSION['user']."'";
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
                  
                   $sql = "SELECT * FROM ventastotales WHERE MES = '$MES2' AND ESTATUS = 'LISTA ONIX' AND cedula='".$_SESSION['user']."'";
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
                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA'and cedula = ".$_SESSION['user']." AND MES_ALTA = '$MES2'";
                $query = $conn->query($sql);
                $early = $query->num_rows;

                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA/POSPAGO'and cedula = ".$_SESSION['user']." AND MES_ALTA = '$MES2'";
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

                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA' AND cedula = ".$_SESSION['user']." AND MES_ALTA = '$MES2'";
                $query = $conn->query($sql);
                $early = $query->num_rows;

                $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA/POSPAGO' AND cedula = ".$_SESSION['user']." AND MES_ALTA = '$MES2'";
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
              <!--<h2 class="box-title"><b>IMPORTANTE:</b></h2>-->
            </div>
            <div class="table-responsive">
            <div class="box-body">
            <div align="center">
                  <h3><b>ATENCIÓN! A partir del 1ro de Junio se aplicará una modificación a las Ofertas Comerciales de 100 y 50$; para descargar el PDF ve al apartado Herramientas/Ofertas Vigentes del Menú. Cualquier duda, comunícate con tu Supervisor.</b></h3>
                  <img src="../Resources/Oferta_junio.jpg" alt="" style="width:80%">
                  </div>
             </div>
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
                  <th>ACCIÓN</th>
                    <th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th>
                    <th>VENDEDOR</th>
                    <th>ESTATUS</th>
                    <th>FVC</th>
                    <th>INTERVALO</th>
                  </thead>
                  <tbody>
                        <?php
                        date_default_timezone_set('America/Caracas'); 
                        $Date = date('Y-m-d');
                        $sql="SELECT * from ventastotales WHERE FECHA_CARGA = '$Date' AND cedula = '".$_SESSION['user']."'";
                        $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                              ?>
                              <tr>
                                  <td>
                                  <button class='btn btn-secundary btn-sm edit btn-flat' data-id="<?php echo $row['id']; ?>"><i class="ion-social-whatsapp">  Enviar por WhatsApp</i></button>
                                  </td> 
                                  <td><?php echo $row['DN']; ?></td>
                                  <td><?php echo $row['NIP']; ?></td>
                                  <td><?php echo $row['ESTADO_CAV']; ?></td>
                                  <td><?php echo $row['CURP']; ?></td>
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

      </section>
    </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
    <?php include 'includes/ventasdia_modal.php'; ?>
</div>

<script>

$(function(){

$('.edit').click(function(e){
  e.preventDefault();
  $('#edit').modal('show');
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
