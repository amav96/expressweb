<?php 

function controller_autoload($clasename){
 
        include 'controllers/' . $clasename . '.php';
  
}
spl_autoload_register('controller_autoload');