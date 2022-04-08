
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
        <li><a href="comisiones_rac.php"><i class="fa fa-circle-o"></i>RAC</a></li>
        <li><a href="comisiones_admin.php"><i class="fa fa-circle-o"></i>Administrativo</a></li>
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
  