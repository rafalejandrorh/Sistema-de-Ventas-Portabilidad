<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Ventas</title>
</head>
<body>
<table width=100% border="2" align="center">
<tr>
                  <th><b>DN</b></th>
                  <th><b>NIP</b></th>
                  <th><b>FVC</b></th>
                  <th><b>ESTADO CAV</b></th>
                  <th><b>NOMBRE COMPLETO</b></th>
                  <th><b>CURP</b></th>
                  <th><b>CEDULA</b></th>
                  <th><b>VENDEDOR</b></th>
                  <th><b>FECHA DE CARGA</b></th>
                  <th><b>ESTATUS</b></th>
                  <th><b>MES</b></th>
</tr>
</table>
<?php    
if(isset($_POST['Buscar']))
    {
        include("includes/conn.php");

        $CEDULA = $_POST['consultarci'];
        if($CEDULA=="") //VERIFICO QUE AGREGEN UN DOCUMENTO OBLIGATORIAMENTE.
          {echo "No encontramos tus ventas en nuestra Base de Datos, verifica y vuelve a intentarlo.";}
        else
        {  
          $query = mysqli_query($conn,"SELECT * FROM ventastotales WHERE cedula = $CEDULA");
          while($row = mysqli_fetch_array($query))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td>".$row['DN']."</td>
                  <td>".$row['NIP']."</td>
                  <td>".$row['FVC']."</td>
                  <td>".$row['ESTADO_CAV']."</td>
                  <td>".$row['NOMBRES_CLIENTE']."</td>
                  <td>".$row['CURP']."</td>
                  <td>".$row['cedula']."</td>
                  <td>".$row['VENDEDOR']."</td>
                  <td>".$row['FECHA_CARGA']."</td>
                  <td>".$row['ESTATUS']."</td>
                  <td>".$row['MES']."</td>
                </tr>
              </table>
            ";
          }
        }
    }
?> 
</body>
</html>