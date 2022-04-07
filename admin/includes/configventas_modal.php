
<!-- Editar mes de reportes -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="Ventas_config_edit.php">
                
				<input type="hidden" id="ID" name="ID" value="1">	
                <div class="form-group">
                  	<label for="datepicker_edit" class="col-sm-3 control-label">Mes</label>
                  	<div class="col-sm-9">
                  		<div class="bootstrap-timepicker">
							<select class="form-control" name="MES_VENTAS" id="MES_VENTAS"required>
                        <option value=""  selected>--Selected--</option>
                        <option value="January" >Enero</option>
                        <option value="February">Febrero</option>
                        <option value="March">Marzo</option>
                        <option value="April">Abril</option>
                        <option value="May">Mayo</option>
                        <option value="June">Junio</option>
                        <option value="July">Julio</option>
                        <option value="August">Agosto</option>
                        <option value="September">Septiembre</option>
                        <option value="October">Octubre</option>
                        <option value="November">Noviembre</option>
                        <option value="December">Deciembre</option>
                      </select>
                    	</div>
                  	</div>
                </div>
				</div>
          		<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
            	
				</div>
				</form>
           
          	</div>
        </div>
    </div>
</div>



<!-- Editar meta de meses -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="Ventas_meta_edit.php">
                
                <div class="form-group">
					<label for="datepicker_edit" class="col-sm-3 control-label">Mes</label>
					<div class="col-sm-9">
					<div class="bootstrap-timepicker">
							<select class="form-control" name="MES" id="MES"required>
                        <option value=""  selected>--Selected--</option>
                        <option value="January" >Enero</option>
                        <option value="February">Febrero</option>
                        <option value="March">Marzo</option>
                        <option value="April">Abril</option>
                        <option value="May">Mayo</option>
                        <option value="June">Junio</option>
                        <option value="July">Julio</option>
                        <option value="August">Agosto</option>
                        <option value="September">Septiembre</option>
                        <option value="October">Octubre</option>
                        <option value="November">Noviembre</option>
                        <option value="December">Deciembre</option>
                      </select>
					</div>
                    </div>	
					</div>

						<div class="form-group">
                  	<label for="datepicker_edit" class="col-sm-3 control-label">Meta</label>
                  	<div class="col-sm-9">
                  		<div class="bootstrap-timepicker">
						<input type="text" name="META" id="META">
                    	</div>
                  	</div>
				</div>
				</div>
          		<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
            	
				</div>
				</form>
           
          	</div>
        </div>
    </div>
</div>


     