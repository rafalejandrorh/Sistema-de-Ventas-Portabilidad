<!-- EDITAR VENTA -->

<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><B>Actualización de Pago</B></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="comisiones_rac_edit.php">
            		<input type="hidden" id="RAC" name="rac">
                    <div class="text-center">
	                	<h4 id="RAC" class="bold"></h4>
	            	</div>
               
                    <label for="DN" class="col-sm-3 control-label">N° de Referencia</label>
                    <div class="col-sm-9">   
                        <input type="number" class="form-control" id="NRO_REFERENCIA" name="referencia">
                    </div>

                    <label for="pago" class="col-sm-3 control-label">Pago</label>
                    <div class="col-sm-9">   
                    <select name="pago" id="PAGO" type="number" class="form-control">
                        <option value="" selected>- Asigna estatus de Pago -</option>
                        <option value="PENDIENTE">Pendiente</option>
                        <option value="PAGO REALIZADO">Pago Realizado</option>
                    </select>
                </div>
          	<div class="modal-footer">
          	    <div class="col-sm-9">
            	<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
            	</div>
          	</div>
          	</form>
          	</div>
        </div>
    </div>
</div>
