<!-- AÑADIR -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Ingresar RAC</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="Plantilla_add.php">
              <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Cédula de Identidad</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="id">
                    </div>
                </div>

          		  <div class="form-group">
                  	<label for="edit_firstname" class="col-sm-3 control-label">Nombre</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="rac" name="names" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="datepicker_add" class="col-sm-3 control-label">Fecha de Ingreso</label>

                  	<div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_add" name="ingreso">
                      </div>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Estatus</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="estatus" id="gender" required>
                        <option value="1" selected>- Seleccionar -</option>
                        <option value="0">Inactivo</option>
                        <option value="1">Activo</option>
                        <option value="2">Egreso</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Información de Contacto</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Correo</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="correo" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="address" class="col-sm-3 control-label">Residencia</label>

                  	<div class="col-sm-9">
                    <select class="form-control" name="address" id="residencia" required>
                        <option value="" selected>- Seleccionar -</option>
                        <option>Amazonas</option>
                        <option>Anzoategui</option>
                        <option>Apure</option>
                        <option>Aragua</option>
                        <option>Barinas</option>
                        <option>Bolívar</option>
                        <option>Carabobo</option>
                        <option>Cojedes</option>
                        <option>Delta Amacuro</option>
                        <option>Distrito Capital</option>
                        <option>Falcón</option>
                        <option>Guárico</option>
                        <option>Lara</option>
                        <option>Mérida</option>
                        <option>Miranda</option>
                        <option>Monagas</option>
                        <option>Nueva Esparta</option>
                        <option>Portuguesa</option>
                        <option>Sucre</option>
                        <option>Táchira</option>
                        <option>Trujillo</option>
                        <option>Vargas</option>
                        <option>Yaracuy</option>
                        <option>Zulia</option>
                      </select>
                  	</div>
                </div>               
                <!-- <div class="form-group">
                    <label for="position" class="col-sm-3 control-label">Equipos</label>
                                REALIZAR UN CHECKLIST
                    <div class="col-sm-9">
                      <select class="form-control" name="position" id="position" required>
                        <option value="" selected>- Seleccionar -</option>
                      </select>
                    </div>
                </div>
                            -->
                <div class="form-group">
                    <label for="schedule" class="col-sm-3 control-label">Contraseña</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="lastname" name="pass" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- EDITAR -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="RAC"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="Plantilla_edit.php">     		

              <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Cédula de Identidad</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="id" id="cedid">
                    </div>
                </div>

          		  <div class="form-group">
                  	<label for="edit_firstname" class="col-sm-3 control-label">Nombre</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="RAC" name="names" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="datepicker_add" class="col-sm-3 control-label">Fecha de Ingreso</label>

                  	<div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="ingreso" name="ingreso">
                      </div>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Estatus</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="estatus" id="estatus" required>
                        <option value="" selected>- Seleccionar -</option>
                        <option value="0">Inactivo</option>
                        <option value="1">Activo</option>
                        <option value="2">Egreso</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Información de Contacto</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contacto" name="contact">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Correo</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="correo" name="correo" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="edit_residencia" class="col-sm-3 control-label">Residencia</label>

                  	<div class="col-sm-9">
                    <select class="form-control" name="address" id="edit_residencia" required>
                        <option value="" selected>- Seleccionar -</option>
                        <option>Amazonas</option>
                        <option>Anzoategui</option>
                        <option>Apure</option>
                        <option>Aragua</option>
                        <option>Barinas</option>
                        <option>Bolívar</option>
                        <option>Carabobo</option>
                        <option>Cojedes</option>
                        <option>Delta Amacuro</option>
                        <option>Distrito Capital</option>
                        <option>Falcón</option>
                        <option>Guárico</option>
                        <option>Lara</option>
                        <option>Mérida</option>
                        <option>Miranda</option>
                        <option>Monagas</option>
                        <option>Nueva Esparta</option>
                        <option>Portuguesa</option>
                        <option>Sucre</option>
                        <option>Táchira</option>
                        <option>Trujillo</option>
                        <option>Vargas</option>
                        <option>Yaracuy</option>
                        <option>Zulia</option>
                      </select>
                  	</div>
                </div>               
                <!-- <div class="form-group">
                    <label for="position" class="col-sm-3 control-label">Equipos</label>
                                REALIZAR UN CHECKLIST
                    <div class="col-sm-9">
                      <select class="form-control" name="position" id="position" required>
                        <option value="" selected>- Seleccionar -</option>
                      </select>
                    </div>
                </div>
                            -->
                <div class="form-group">
                    <label for="schedule" class="col-sm-3 control-label">Contraseña</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>
                </div>
          	</div>
          	
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- ELIMINAR -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="RAC"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="Plantilla_delete.php">
            	
              <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Cédula del RAC</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="id">
                    </div>
                </div>

            		<div class="text-center">
	                	<p>ELIMINAR RAC</p>
	                	<h2 class="bold del_employee_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Eliminar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>  