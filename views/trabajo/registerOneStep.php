<?php require_once 'views/layout/header.php'; ?>
<link rel="stylesheet" href="<?= base_url ?>estilos/personal/css/reclute/recursos_recolector.css?v=31122020">


<div class="container">
    <div id="tope"></div>
    <div class="cont-titulo-Onestep">
        <h4 class="text-center tituloOneStep">Formá parte de Express</h4>
    </div>
    <div id="cont-message-response">

    </div>

    <div class="d-flex  justify-content-center mt-5 ">


        <form id="form-one-step">
            <div class="box-register d-flex  justify-content-center flex-column onestep">

                <div class="cont-title-complete-first-step d-flex  justify-content-center p-2">
                    <h5>Ingresa tus datos</h5>
                </div>

                
                    <div class="input-group-prepend mx-4 m-2 ">

                        <div class="contenedor-input-onestep">
                            <i class="far fa-user"></i>
                            <input type="text" id="form-name" class="form-control" placeholder="Nombre y apellido">
                        </div>

                    </div>
                    <div class="input-group-prepend mx-4 m-2 ">
                        <div class="contenedor-input-onestep">
                            <i class="far fa-envelope"></i>
                            <input type="email" id="form-email" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="input-group-prepend mx-4 m-2 ">
                        <div class="contenedor-input-onestep">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="form-pass" class="form-control" placeholder="Nueva contraseña" autocomplete="on">
                        </div>
                    </div>
                    <div class="input-group-prepend mx-4 m-2 ">
                        <div class="contenedor-input-onestep">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="cform-pass" class="form-control" placeholder="Repetir Contraseña" autocomplete="on">
                        </div>
                    </div>

                    <div class="input-group-prepend mx-4 m-2 ">
                        <input type="hidden" id="form-tipo" class="form-control" placeholder="tipo">
                    </div>
                    <button type="submit" id="send-data" class="btn btn-primary"> <span class="spinner-border hiddenLoader loaderBtn" role="status"></span><span class="txtFirstRegister"> Registrarme </span> </button>
                
            </div>
        </form>

    </div>
</div>

<br>
<br>

<script src="<?= base_url ?>assets/trabajo/form.js?v=20122020"></script>
<script src="<?= base_url ?>assets/trabajo/reclute.js?"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php require_once 'views/layout/footer.php'; ?>