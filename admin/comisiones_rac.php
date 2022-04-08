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
                  </thead>
                  <tbody>
                        <?php
                        date_default_timezone_set('America/Caracas');
                        
                        $Date = date('Y-m-d');
                        $sql="SELECT * from Calculo Comisiones";
                        $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['RAC']; ?></td>
                            <td><?php echo $row['ALTAS']; ?></td>
                            <td><?php echo $row['MONTO_ALTA']; ?></td>
                            <td><?php echo $row['MONTO_A_COBRAR']; ?></td>
                            <td><?php echo $row['MONTO_BS']; ?></td>
                            <td><?php echo $row['TASA_BS']; ?></td>
                            <td><?php echo $row['NRO_REFERENCIA']; ?></td>
                            <td><?php echo $row['PAGO']; ?></td>
                            <td><?php echo $row['NRO_CUENTA']; ?></td>
                            <td><?php echo $row['PAGO_MOVIL']; ?></td>
                            <td>
                            <button class='btn btn-secundary btn-sm edit btn-flat' data-id="<?php echo $row['RAC']; ?>"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-secundary btn-sm delete btn-flat" data-id="<?php echo $row['RAC']; ?>"><i class="fa fa-trash"></i></button>
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