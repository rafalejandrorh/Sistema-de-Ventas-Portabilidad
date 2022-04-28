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
      <h1><b>Comisiones Administrativas</b></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-money"></i> Comisiones</a></li>
        <li class="active">Administrativo</li>
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
                    <th class="">ADMINISTRATIVO</th>
                    <th class="">ALTAS</th>
                    <th class="">MONTO TOTAL</th>
                    <th class="">MONTO BS</th>
                    <th class="">TASA DÓLAR BCV</th>
                  </thead>
                  <tbody>
                        <?php
                       
                        $sql="SELECT * from Calculo_Comisiones_Admin";
                        $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){

                            //$sql2="SELECT *, rate_dolar from tasa_dolar";;
                            //$query2 = $conn->query($sql2);
                            //$dolarbcv = $query2 ->fetch_assoc();  

                            $string = file_get_contents("https://s3.amazonaws.com/dolartoday/data.json");
                            $json = json_decode($string, TRUE);
                            $dolarbcv = $json["USD"]["promedio_real"];

                            $monto_bs = $row['MONTO_TOTAL'] * $dolarbcv;//['rate_dolar'];
                        ?>
                        <tr>
                            <td><?php echo $row['ADMINISTRATIVO']; ?></td>
                            <td><?php echo $row['ALTAS']; ?></td>
                            <td><?php echo '$ '.number_format($row['MONTO_TOTAL'],2); ?></td>
                            <td><?php echo 'Bs.S '.number_format($monto_bs,2); ?></td>
                            <td><?php echo 'Bs.S '.number_format($dolarbcv,2); ?></td>       
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
</body>
</html>