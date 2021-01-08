<?php require_once 'views/layout/header.php'; ?>
<link rel="stylesheet" href="<?= base_url ?>estilos/personal/css/reclute/recursos_recolector.css?v=31122020">
 

<div class="container">
     <div id="tope" ></div>
    <h4  class="text-center tituloOneStep">Formá parte de Express</h4>
    <div id="cont-message-response"> 
         
        </div>
    
    <div class="d-flex  justify-content-center mt-5 ">
    
        <form action="" id="form-one-step">
            <div class="box-register d-flex  justify-content-center flex-column onestep">

                <div class="text-center m-2" id="loaderStepOne">

                </div>
                <div class="input-group-prepend m-2">
                    <input type="text" id="form-name" class="form-control" placeholder="ingrese nombre y apellido">
                </div>
                <div class="input-group-prepend m-2">
                    <input type="email" id="form-email" class="form-control" placeholder="ingrese email">
                </div>
                <div class="input-group-prepend m-2">
                    <input type="password" id="form-pass" class="form-control" placeholder="contraseña" autocomplete="on">
                </div>
                <div class="input-group-prepend m-2">
                    <input type="text" id="form-tipo" class="form-control" value="admin" placeholder="tipo" readonly>
                </div>
                <button type="submit" id="send-data" class="btn btn-primary"> Enviar </button>


            </div>
        </form>

    </div>
</div>


<script src="<?= base_url ?>assets/trabajo/form.js?v=20122020"></script>
<script src="<?= base_url ?>assets/trabajo/reclute.js?v=20122020"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php require_once 'views/layout/footer.php'; ?>