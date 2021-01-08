<?php
class Utils{
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function isRecolector(){
        if(isset($_SESSION["tipo"])){

             if($_SESSION["tipo"] === 'ADMIN' || $_SESSION["tipo"] === 'USUARIO'){
                 return true;
             }else {
                 header("Location:".base_url."usuario/reLogin");
             }
        }else {
            header("Location:".base_url."usuario/reLogin");
        }
    }

    public static function isADMIN(){
        if(isset($_SESSION["tipo"])){

             if($_SESSION["tipo"] === 'ADMIN'){
                 return true;
             }else {
                 header("Location:".base_url."admin/login");
             }
        }else {
            header("Location:".base_url."admin/login");
        }
    }
    
}