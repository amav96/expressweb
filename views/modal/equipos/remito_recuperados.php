<!-- Modal -->
<div class="modal fade" id="enviarRemito" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enviar Remito </h5>
                <button style="color:#c44a4a;" type="button" class="close" id="equisSalirEnvioRemito" >&times;</button>

            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Email / Correo </strong></label>
                    <input style="background-color:#D6EAF8 ;border:0;" type="email" id="email-remito" class="form-control" placeholder="Ingrese el email ">
                    
                </div>

                
                <div class="form-group">
                    <button class="btn btn-warning" id="btnEnviarRemito" type="button">
                        Enviar Remito por email
                        <i class="fas fa-envelope-open-text"></i>
                    </button>
                </div>

                <div class="form-group">
                <label for=""><strong>Envialo por whatsapp</strong></label>
                <input type="text" id="numeroWats" class="form-control">
                </div>
                <div class="form-group">
                <button class="btn btn-success" id="sendWhats">Enviar Remito por Whatsapp
                <img  class="imgRemito img-fluid" src="../estilos/imagenes/whatsapp.png" alt="">
                </button>
                 </div>

                    <div class="contspinner-remito" id="contspinner-remito">
                        <div class="subspinner-remito" id="subspinner-remito">
                            <div class="spinner-border " role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="modoEmail">
                    <input type="hidden" id="codEmail">
                    
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger" id="closeEnvioRemito" aria-label="Close">
                    Cerrar caja
                    <i class="fas fa-archive"></i>
                </button>

            </div>
        </div>
    </div>
</div>