<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Ventas</title>
</head>
<body>
    
    <nav style="background-color:blue;"></nav>
        <center>
                <h1>Consulta de Ventas</h1>
    <table>
                <form action="ConsultaVentasDN.php" method="POST">
                <tr><td><label>DN📱</label></td></tr>
                <tr><td><input type="text" name="consulta" placeholder="Ingresa el DN de tu venta" id="consulta"></td></tr>
                <tr><td><input type="submit" value="Buscar" name="Buscar">
                </form>
<br>
                <form action="ConsultaVentasCI.php" method="POST">
                <tr><td><label>C.I🧑🏻‍💻</label></td></tr>
                <tr><td><input type="text" name="consultarci" placeholder="Ingresa la Cédula de Identidad" id="consultarci"></td></tr>
                <tr><td><input type="submit" value="Buscar" name="Buscar">
                </form>
<br>
      </table>
        </center>    
<br>

</body>
</html>