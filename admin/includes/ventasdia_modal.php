<!-- EDITAR VENTA -->

<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><B>Datos de Venta</B></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="ventasdia_edit.php">
            		<input type="hidden" id="edit_id" name="id">
               
                    <label for="DN" class="col-sm-3 control-label">*Redes VNZ*</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" value="BPCDMX1V1150 / BPCDMX1V1150H">
                </div>
               
                    <label for="DN" class="col-sm-3 control-label">*DN:*</label>
                    <div class="col-sm-9">   
                        <input type="number" class="form-control" id="DN" name="DN">
                </div>

                    <label for="NIP" class="col-sm-3 control-label">*NIP:*</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="NIP" name="NIP">
                </div>

                    <label for="cedula" class="col-sm-3 control-label">*Vigencia de NIP:*</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="VIGNIP" name="VIGNIP">
                </div>
                    <label for="FVC" class="col-sm-3 control-label">*FVC:*</label>

                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="FVC" name="FVC">
                </div>
                
                    <label for="OFERTA" class="col-sm-3 control-label">*Oferta:*</label>

                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="OFERTA" name="OFERTA">
                </div>

                    <label for="ESTADO_CAV" class="col-sm-3 control-label">*Estado del CAV:*</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="ESTADO_CAV" name="ESTADO_CAV">
                </div>
			
                    <label for="CAV" class="col-sm-3 control-label">*CAV:*</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="CAV" name="CAV">
                </div>
	
                    <label for="NOMBRES_CLIENTE" class="col-sm-3 control-label">*Nombres:*</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="NOMBRES_CLIENTE" name="NOMBRES_CLIENTE">
                </div>
                
                  	<label for="FECHA_NACIMIENTO" class="col-sm-3 control-label">*Fecha Nac:*</label>
                  	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="FECHA_NACIMIENTO" name="FECHA_NACIMIENTO">
                </div>
                
                  	<label for="CURP" class="col-sm-3 control-label">*CURP:*</label>

                  	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="CURP" name="CURP">
                </div>
                
                  	<label for="CONTACTO_1" class="col-sm-3 control-label">*Contacto 1:*</label>
                  	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="CONTACTO_1" name="CONTACTO_1">
                </div>

                  	<label for="CONTACTO_2" class="col-sm-3 control-label">*Contacto 2:*</label>
                  	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="CONTACTO_2" name="CONTACTO_2">
                </div>

                  	<label for="CORREO" class="col-sm-3 control-label">*Correo:*</label>
                  	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="CORREO" name="CORREO">
                 
                </div>
              
                  	<label for="ESTATUS" class="col-sm-3 control-label">*Estatus:*</label>

                  	<div class="col-sm-9">
                    		<select type="text" class="form-control" id="ESTATUS" name="ESTATUS">
                            <option value="" selected>- Asigna un Estatus -</option>
                            <option value="EN ESPERA">En Espera</option>
                            <option value="LISTA ONIX">Lista Onix</option>
                            <option value="GOPC TLMK">Gestionada por otro Call en TLMK</option>
                            <option value="PIN INCORRECTO">PIN Incorrecto</option>
                            <option value="PIN EXPIRADO">PIN Expirado</option>
                            <option value="PIN INEXISTENTE">PIN Inexistente</option>
                            <option value="CURP INVALIDA">CURP Inválida</option>
                            <option value="YA ES MOVISTAR">Ya es Movistar</option>
                            </select>
                  	</div>
          	
          	
          	<div class="modal-footer">
          	    <div class="col-sm-9">
            	<button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
                <button type="button" class="btn btn-success btn-flat" name="send" id="send"><i class="ion-social-whatsapp-outline"> Enviar</i></button>
            	</div>
          	</div>
          	</form>
          	</div>
        </div>
    </div>
    <script src="sendwhatsapp.js"></script>
</div>


<!-- ELIMINAR -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Eliminar Venta</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="ventasdia_delete.php">
            	<input type="hidden" id="delete_id" name="id">
              <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">DN de Venta:</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="" id="delete_DN">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">RAC:</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="" id="delete_RAC">
                    </div>
                </div>

            		<div class="text-center">
	                	<p>¿Seguro que deseas eliminar esta venta?</p>
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
