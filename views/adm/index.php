
<?php

require_once '../../helpers/utils.php';
require_once '../../control/adminController.php';
require_once '../../resources/parametros.php';
require_once '../../config/db.php';
require_once('../../views/include/adm/superior.php'); 



if(isset($_GET["admin"])){

    $accion = $_GET["admin"];

        $admin = new adminController();
        $admin->$accion();
   
}else {
    echo "no existe peticion";
}

  require_once('../../views/include/adm/inferior.php'); ?>