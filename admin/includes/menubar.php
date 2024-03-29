
<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> En Línea</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">ADMINISTRACIÓN</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-suitcase"></i>
            <span>Ventas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
        <li><a href="Ventasconsolidado.php"><i class="fa fa-circle-o"></i> <span>Consolidado de Ventas</span></a></li>
        <li><a href="Ventasmes.php"><i class="fa fa-circle-o"></i> <span>Ventas del Mes</span></a></li>
        <li><a href="Ventasdia.php"><i class="fa fa-circle-o"></i> <span>Ventas del día</span></a></li>
        <li><a href="enespera.php"><i class="fa fa-circle-o"></i> <span>Ventas Pendientes por Estatus</span></a></li>
        <li><a href="rechazos.php"><i class="fa fa-circle-o"></i> <span>Rechazos</span></a></li>
        </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Plantilla</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="Plantilla_activa.php"><i class="fa fa-circle-o"></i>Activos</a></li>
        <li><a href="Plantilla_inactiva.php"><i class="fa fa-circle-o"></i>Inactivos</a></li>
        <li><a href="Plantilla_egreso.php"><i class="fa fa-circle-o"></i>Egresos</a></li>
        <li><a href="Plantilla_account_banks.php"><i class="fa fa-circle-o"></i>Cuentas Bancarias</a></li>
        <li><a href="Plantilla_mobile_payment.php"><i class="fa fa-circle-o"></i>Pago Móvil</a></li>
        </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Comisiones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="comisiones_rac.php"><i class="fa fa-circle-o"></i>RAC 26 - 04 al 15 - 05</a></li>
        <!--<li><a href="comisiones_rac2.php"><i class="fa fa-circle-o"></i>RAC 05 al 08 - 05</a></li>-->
        <li><a href="comisiones_admin.php"><i class="fa fa-circle-o"></i>Administrativo</a></li>
        </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-compass"></i>
            <span>Herramientas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="ladasmx.php"><i class="fa fa-circle-o"></i>Claves LADA MX</a></li>
        <li><a href="ofertas.php"><i class="fa fa-circle-o"></i>Ofertas Vigentes</a></li>
        <li><a href="cav.php"><i class="fa fa-circle-o"></i>CAV´S Movistar</a></li>
        <li><a href="curp.php"><i class="fa fa-circle-o"></i>Cálculo de CURP</a></li>
        <li><a href="sns.php"><i class="fa fa-circle-o"></i>Consulta SNS</a></li>
        </ul>
        </li>
<!--
        <li class="header">IMPRESIÓN</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>PDF</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="nomina.php"><i class="fa fa-files-o"></i> <span>Nómina</span></a></li>
        <li><a href="horarios_employee.php"><i class="fa fa-files-o"></i> <span>Empleados</span></a></li>
        <li><a href="asistencia_employee.php"><i class="fa fa-files-o"></i> <span>Asistencia</span></a></li>
      </ul>
        </li>
-->
        <li class="header">CONFIGURACIÓN</li>
        <li class=""><a href="ventas_config.php"><i class=""></i> <span>Ventas</span></a></li>
</ul>
    </section>
  </aside>
  