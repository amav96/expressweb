<?php require_once 'views/layout/headerAdmin.php'; ?>

<div class="container">
    

    <div class="container-datos-solicitante" id="container-datos-solicitante">

        <div class="box-solicitante" id="box-solicitante">

        </div>
    </div>

    <div class="text-center  d-flex justify-content-center">
           <div class="form-group w-40 p-3 ">
           <div  class="text-center m-2" id="loaderUsuarios">
                
                </div>
              
              <button id="mostrar-todos" class="btn btn-info m-2" >Mostrar Todos los usuarios</button>
           </div>
    </div>


    <div id="data">

    </div>

    </div>
    
    <?php require_once 'views/layout/footerAdmin.php'; ?>

    <script>
        $(document).ready(function(){
            showAll();
        })
    </script>
