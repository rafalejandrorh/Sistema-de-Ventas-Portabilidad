<!-- Actualizar perfil -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Perfil Usuario</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">Usuario</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="username" name="username" value="<?php echo $user['RAC']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Contraseña</label>

                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['PASSWORD']; ?>">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Número de Contacto</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="contacto" name="contacto" value="<?php echo $user['CONTACTO']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Correo</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="correo" name="correo" value="<?php echo $user['CORREO']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Residencia</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="residencia" name="residencia" value="<?php echo $user['RESIDENCIA']; ?>">
                  	</div>
                </div>

                <hr>
                <h4 class=""><b>Información de Cuenta Bancaria</b></h4>
				<hr>

				<div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Banco</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="banco" name="banco" value="<?php echo $banks['BANCO']; ?>">
                  	</div>
                </div>

				<div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Tipo de Cuenta</label>

                  	<div class="col-sm-9">
					  <select class="form-control" name="tipo_cuenta" id="tipo_cuenta">
					  	<option value="<?php echo $banks['TIPO_CUENTA']; ?>"><?php echo $banks['TIPO_CUENTA']; ?></option>
					  	<option value="CORRIENTE">Corriente</option>
 	                   	<option value="AHORRO">Ahorro</option>
							<option value="N/A">No Aplica</option>
					  </select>
                  	</div>
                </div>

				<div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">N° de Cuenta</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="nro_cuenta" name="nro_cuenta" value="<?php echo $banks['NRO_CUENTA']; ?>">
                  	</div>
                </div>

				<hr>
                <h4 class=""><b>Información de Pago Móvil</b></h4>
				<hr>

				<div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Banco</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="banco" name="banco_pagomovil" value="<?php echo $payment['BANCO']; ?>">
                  	</div>
                </div>

				<div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Teléfono</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $payment['TELEFONO']; ?>">
                  	</div>
                </div>

				<div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Cédula del Titular</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="cititular" name="cititular" value="<?php echo $payment['CEDULA_TITULAR']; ?>">
                  	</div>
                </div>

				<div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Nombre del Titular</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="nombre_titular" name="nombre_titular" value="<?php echo $payment['NOMBRE_TITULAR']; ?>">
                  	</div>
                </div>

				<hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Contraseña Actual:</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Ingrese su contraseña actual para guardar los cambios" required>
                    </div>
                </div>
          	</div>
			  
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Guardar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>