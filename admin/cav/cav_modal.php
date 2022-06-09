<!-- EDITAR VENTA -->

<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><B>Información del CAV</B></b></h4>
          	    
          	    <div class="modal-body">
            	<form class="form-horizontal" method="POST" action="">
               
                    <label for="MUNICIPIO" class="col-sm-3 control-label">Municipio:</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="MUNICIPIO">
                    </div>

                    <label for="NOMBRE_CAV" class="col-sm-3 control-label">Nombre del CAV:</label>
                    <div class="col-sm-9">   
                        <input type="text" class="form-control" id="NOMBRE_CAV">
                    </div>

                    <label for="DOMICILIO" class="col-sm-3 control-label">Dirección:</label>
                    <div class="col-sm-9">
                        <textarea name="" id="DOMICILIO" cols="40" rows="4" class="form-control"></textarea>   
                    </div>

                    <label for="PUNTO_REF" class="col-sm-3 control-label">Referencia:</label>
                    <div class="col-sm-9">   
                        <textarea name="" id="PUNTO_REF" cols="40" rows="4" class="form-control"></textarea> 
                     </div>
                
                    <label for="HORARIO" class="col-sm-3 control-label">Horarios:</label>
                    <div class="col-sm-9">   
                        <textarea name="" id="HORARIO" cols="40" rows="4" class="form-control"></textarea>
                     </div>

               
          	</form>
          	</div>
        </div>
    </div>
</div>