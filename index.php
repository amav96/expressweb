<?php 
session_start();
require_once 'config/0code.php';
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parametros.php';
require_once 'helpers/utils.php';
require_once 'resources/fpdf/fpdf.php';
function show_error(){
    $error = new errorController();
    $error->index();
}

if(isset($_GET["controller"])){
    $nombre_controlador = $_GET['controller'].'Controller';
}else if(!isset($_GET["controller"]) && !isset($_GET["action"])){
    $nombre_controlador = controller_default;
} 

else {
    show_error();
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();

    if(isset($_GET["action"]) && method_exists($controlador, $_GET["action"])){

        $action = $_GET["action"];
        $controlador->$action();
     
    }
    else if(!isset($_GET["controller"]) && !isset($_GET["action"])){
        $action_default = action_default;
        $controlador->$action_default();
    }     
    else {
        show_error();

    }

}else {
    show_error();

}

?>
 
<script>
 
  const base_url = "https://192.168.8.160/expressweb/";
  


    var registrarInactividad = function () {
    var t;
    window.onload = reiniciarTiempo;
    // Eventos del DOM
    document.onmousemove = reiniciarTiempo;
    document.onkeypress = reiniciarTiempo;
    document.onload = reiniciarTiempo;
    document.onmousemove = reiniciarTiempo;
    document.onmousedown = reiniciarTiempo; // aplica para una pantalla touch
    document.ontouchstart = reiniciarTiempo;
    document.onclick = reiniciarTiempo;     // aplica para un clic del touchpad
    document.onscroll = reiniciarTiempo;    // navegando con flechas del teclado
    document.onkeypress = reiniciarTiempo;

    function tiempoExcedido() {
       
      localStorage.clear();
      window.location.href = base_url+"/usuario/logOut";

    }

    function reiniciarTiempo() {
        clearTimeout(t);
        t = setTimeout(tiempoExcedido, 20000000)
        // 1000 milisegundos = 1 segundo
    }
};

registrarInactividad();

</script>


