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
            	<form class="form-horizontal" action="#">
               
                    <label for="DN" class="col-sm-3 control-label">*DN:*</label>
                    <div class="col-sm-9">   
                        <input type="number" class="form-control" id="DN" name="DN" readonly>
                </div>

                    <label for="NIP" class="col-sm-3 control-label">*NIP:*</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="NIP" name="NIP" readonly>
                </div>

                    <label for="cedula" class="col-sm-3 control-label">*Vigencia de NIP:*</label>
                    <div class="col-sm-9">   
                        <input type="date" class="form-control" id="VIGNIP" name="VIGNIP" readonly>
                </div>
                    <label for="FVC" class="col-sm-3 control-label">*FVC:*</label>

                    <div class="col-sm-9">   
                        <input type="date" class="form-control" id="FVC" name="FVC" readonly>
                </div>
                
                    <label for="OFERTA" class="col-sm-3 control-label">*Oferta:*</label>

                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="OFERTA" name="OFERTA" readonly>
                </div>

                    <label for="ESTADO_CAV" class="col-sm-3 control-label">*Estado del CAV:*</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="ESTADO_CAV" name="ESTADO_CAV" readonly>
                </div>
			
                    <label for="CAV" class="col-sm-3 control-label">*CAV:*</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="CAV" name="CAV" readonly>
                </div>
	
                    <label for="NOMBRES_CLIENTE" class="col-sm-3 control-label">*Nombres:*</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="NOMBRES_CLIENTE" name="NOMBRES_CLIENTE" readonly>
                </div>
                
                  	<label for="FECHA_NACIMIENTO" class="col-sm-3 control-label">*Fecha Nac:*</label>
                  	<div class="col-sm-9">
                    		<input type="date" class="form-control" id="FECHA_NACIMIENTO" name="FECHA_NACIMIENTO" readonly>
                </div>
                
                  	<label for="CURP" class="col-sm-3 control-label">*CURP:*</label>

                  	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="CURP" name="CURP" readonly>
                </div>
                
                  	<label for="CONTACTO_1" class="col-sm-3 control-label">*Contacto 1:*</label>
                  	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="CONTACTO_1" name="CONTACTO_1" readonly>
                </div>

                  	<label for="CONTACTO_2" class="col-sm-3 control-label">*Contacto 2:*</label>
                  	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="CONTACTO_2" name="CONTACTO_2" readonly>
                </div>

                  	<label for="CORREO" class="col-sm-3 control-label">*Correo:*</label>
                  	<div class="col-sm-9">
                    		<input type="text" class="form-control" id="CORREO" name="CORREO" readonly>
                 
                </div>
              
          	
          	
          	<div class="modal-footer">
            <div class="form-group">
              <div class="col-sm-4">
            	</div>

          	    <div class="col-sm-4">
            	<button type="submit" class="btn btn-success btn-flat" id="send" name="send"><i class="ion-social-whatsapp-outline"></i> Enviar</button>
            	</div>

                <div class="col-sm-4">
            	</div>
          	</div>
              </div>
          	</form>
          	</div>
        </div>
    </div>
</div>

<script src="sendwhatsapp.js"></script>