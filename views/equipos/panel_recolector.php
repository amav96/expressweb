<?php require_once 'views/layout/headerRecolector.php'; ?>
<body>

  <div class="loader">

  </div>
  <div class="container ">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-4 textcenter caja-titulo bg-primary">

            <div class="box-reco-info ">
              <h6 id="title" class="text-center" >Recolector/a :
                <?php
                if (isset($_SESSION["username"])) {
                  echo $_SESSION["username"]->first_name;
                }
                ?>
              </h6>
            </div>
            <div class="box-reco-info">
              <span style="font-size:16px;" id="clienteActual"></span>
            </div>
            <div class="box-reco-info">
              <span style="font-size:16px;" id="cantRemit"></span>
            </div>

            <input type="hidden" class="form-control" name="id_recoleorden" id="id_recoleorden" value="<?php if (isset($_SESSION["username"])) { echo $_SESSION["username"]->id_user;} ?>">
            <input type="hidden" id="country_recolector" value="<?=$_SESSION["username"]->country?>">



          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Boton iniciar  -->


  <div class="botonera">
    <div class="sub-botonera">

      <button id="iniciar" class="btn btn-primary" name="iniciar">Abrir caja</button>
      <button id="finalizar" class="btn btn-danger" name="finalizar">Cerrar Caja
        <i class="fas fa-archive"></i>
      </button>


      <!-- MODAL REMITO ELECTRONICO -->
      <button type="button" class="btn btn-dark" id="btnAutorizar">
        Autorizar
        <i class="fas fa-user-plus"></i>
      </button>

      
      <!-- MODAL EQUIPOS PARA CONFIRMAR REMITO -->
      <button type="button" class="btn btn-primary"  id="abrir-caja-equipos" >
        ¿Que tengo en la caja?
        <i class="fas fa-box-open"></i>
      </button>
    </div>
  </div>

  <!-- BUSCAR -->
  <form id="form-buscar">
  <div id="cajaBuscador" class="caja-buscador">
    <input type="text" class="form-control" placeholder="Buscar Cliente" id="q">

    <button class="btn btn-danger" type="submit" id="clickBuscar">
      <i class="fas fa-search"></i>
    </button>

  </div>
  </form>


  <div class="car" id="caja-box">
  </div>

  <div class="contspinner" id="contspinner">
    <div class="subspinner" id="subspinner">
      <div class="spinner-border " role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>


  <div class="table-responsive" id="table">
    <table class="table table-striped table-hover" id="cuerpo">

    </table>

  </div>

  <div class='clearfix'></div>
  <hr>

  <div id="resultados"></div><!-- Carga de datos ajax aqui -->
  <div class='outer_div'></div><!-- Carga de datos ajax aqui -->


  <?php require_once 'views/layout/footerRecolector.php'; ?>