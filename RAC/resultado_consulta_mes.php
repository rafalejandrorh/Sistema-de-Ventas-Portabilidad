<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>
<div class="content-wrapper">

    <section class="content-header">
    <h1 class="box-title"><b>Consulta de Ventas</b></h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i>Ventas</a></li>
            <li class="active">Consulta de Ventas</li>
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
              
            </div>
            <div class="box-body">
    	          <h2 class="login-box-msg"><b>Resultado de Consulta</b></h2>

                <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="table-responsive">
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>DN</th>
                    <th>NIP</th>
                    <th>ESTADO CAV</th>
                    <th>CURP</th>
                    <th>VENDEDOR</th>
                    <th>FECHA DE CARGA</th>
                    <th>FVC</th>
                    <th>ESTATUS</th>
                    <th>ESTATUS_CM</th>
                  </thead>
                  <tbody>
                        <?php
                        if(isset($_POST['enviarmes']))
                        {
                            include("includes/conn.php");
                            $CEDULA = $_POST['cedula'];
                            $MES = $_POST['mes'];
                            if($MES=="") //VERIFICO QUE AGREGEN UN DOCUMENTO OBLIGATORIAMENTE.
                              {echo "No encontramos tus ventas en nuestra Base de Datos, verifica y vuelve a intentarlo.";}
                            else
                            {  
                              $CEDULA2 = $_SESSION['user'];
                              $query = mysqli_query($conn,"SELECT * FROM ventastotales WHERE (MES = $MES) AND cedula = $CEDULA2");
                              while($row = mysqli_fetch_array($query))
                              {

                        echo "
                        <tr>
                            <td>".$row['DN']."</td>
                            <td>".$row['NIP']."</td>
                            <td>".$row['ESTADO_CAV']."</td>
                            <td>".$row['CURP']."</td>
                            <td>".$row['VENDEDOR']."</td>
                            <td>".$row['FECHA_CARGA']."</td>
                            <td>".$row['FVC']."</td>
                            <td>".$row['ESTATUS']."</td>
                            <td>".$row['ESTATUS_CM']."</td>
                        </tr>
                        ";}}}?>
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
      </div>

      </section>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>
?>

<script type="text/javascript">

$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'asistencia.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
          
        }
      }
    });
  });
    
});
</script>