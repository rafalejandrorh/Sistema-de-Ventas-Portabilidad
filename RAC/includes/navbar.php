
<header class="main-header">
    <a href="home.php" class="logo">
      <span class="logo-mini"><b>ECC</b></span>
      <span class="logo-lg"><b>Enlace CC</b></span>
    </a>
    <nav class="navbar navbar-static-top" style="background-color:#222d32;">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
          
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-sm"><?php echo $user['RAC']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <p>
                  <?php echo $user['RAC']; ?>
                  <small>Miembro desde <?php echo date('M. Y', strtotime($user['FECHA_INGRESO'])); ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Actualizar</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php include 'includes/profile_modal.php'; ?>