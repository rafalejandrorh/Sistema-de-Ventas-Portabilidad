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
  
            <h1>Plantilla</h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="ion-android-phone-portrait"></i>Plantilla</a></li>
            <li class="active">Pago Móvil</li>
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
              <div class="box-header">
                <h1 class="card-title"><b>PAGO MÓVIL</b></h1>
              </div>

              <!-- /.card-header -->
              <div class="table-responsive">
              <div class="box-body">
                <table id="example2" class="table table-bordered">
                  <thead>
                    <th>CEDULA</th>
                    <th>RAC</th>
                    <th>BANCO</th>
                    <th>N° TELEFONO</th>
                    <th>CEDULA TITULAR</th>
                    <th>NOMBRE TITULAR</th>
                    <th>ACCIÓN</th>
                  </thead>
                  <tbody>
                        <?php
                        $sql="SELECT * FROM plantilla  p JOIN plantilla_pagomovil m ON p.CEDULA =m.cedula";
                        $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $row['CEDULA'];?></td>
                            <td><?php echo $row['RAC'];?></td>
                            <td><?php echo $row['BANCO'];?></td>
                            <td><?php echo $row['TELEFONO'];?></td>
                            <td><?php echo $row['CEDULA_TITULAR'];?></td>
                            <td><?php echo $row['NOMBRE_TITULAR'];?></td>
                            <td>
                                <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['cedid']; ?>"><i class="fa fa-edit"></i> Editar</button>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                  </div>
                            </div>
                </div>
              </div>
            </div>
    </section>

</div> 
<?php include 'includes/footer.php'; ?>
<?php include 'includes/Plantilla_modal.php'; ?>
<?php include 'includes/scripts.php'; ?>
</div>

<!-- Page specific script -->            
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
    url: 'Plantilla_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.cedid').val(response.cedid);
      $('.employee_id').html(response.employee_id);
      $('.del_employee_name').html(response.RAC);
      $('#cedid').val(response.cedid);
      $('#ingreso').val(response.FECHA_INGRESO);
      $('#RAC').val(response.RAC);
      $('#contacto').val(response.CONTACTO);
      $('#edit_residencia').val(response.RESIDENCIA);
      $('#estatus').val(response.ESTATUS);
      $('#correo').val(response.CORREO);
      $('#pass').val(response.PASSWORD);
    }
  });
}


</script>
</body>
</html>