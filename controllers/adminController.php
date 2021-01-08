<?php 

if (isset($_GET['admin'])) {
    

   session_start();
   require_once '../model/admin.php';
   require_once '../config/db.php';

   $accion = $_GET['admin'];
   $usuario = new adminController();
   $usuario->$accion();
} else {
   require_once 'model/admin.php';
}



class adminController{

       

  
     public function transitoFecha(){

     }
    
     public function users(){

        require_once '../../views/adm/usuarios.php';
     }

     public function showAll(){

        $usuarios = new Admin;
        $usuarios = $usuarios-> getlAllUsers();

        require_once '../../views/adm/usuarios.php';
     }

   public function  showOne(){
      $usuarios = new Admin;
      $usuarios = $usuarios-> getOne();

      require_once '../../views/adm/usuarios.php';
   }

   public function save(){

      if($_POST){

         $name = $_POST["name"];
         $userId= $_POST["usuario"];
         $tipo = $_POST["tipo"];
         $email = $_POST["email"];

       $usuarios = new Admin;
       $usuarios->setName($name);
       $usuarios->setUserId($userId);
       $usuarios->setTipo($tipo);
       $usuarios->setEmail($email);
       $usuarios->addUser();
         
      }

      
   }



}