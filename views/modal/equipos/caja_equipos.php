<!-- Modal -->
<div class="modal fade" id="caja-de-equipos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Equipos Recuperados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center" id="cantRemitCaja">
                    

                </div>
                <div class="caja" id="caja">

                </div>
                <div  style="display:flex;justify-content:center;align-content:center;margin:auto;" id="laoderenbase">
					</div>
            </div>
            <div class="modal-footer">
            
            <button type="button" id="mantenerEnvioDeRemito"  class="btn btn-primary">Enviar Remito
            <i class="fas fa-receipt"></i>
            </button>

            <button type="button" id="siguienteNormal"  class="btn btn-primary">Guardar/Cargar
 
            <i class="far fa-file-alt"></i>
            
            </button>

                <button type="button" id="vaciarCaja" data-dismiss="modal" class="btn btn-danger">Vaciar

                <i class="far fa-trash-alt"></i>
                </button>

                <button type="button" id="seguirRecuperando" class="btn btn-success" data-dismiss="modal">Seguir recuperando
                    <i class="fas fa-sign-out-alt"></i>
                </button>


                <button type="button" id="abrirfirmar" class="btn btn-primary"  data-toggle="modal">
                Guardar/Cargar
                    <i class="fas fa-user-edit"></i>
                </button>

                <!-- MODAL FIRMAR -->

            </div>
        </div>
    </div>
</div>


