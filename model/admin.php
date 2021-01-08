<?php 



class Admin {

    private $userId;
    private $tipo;
    private $name;
    private $email;
    private $password;
    private $buscador;
    private $fechaStart;
    private $fechaEnd;
    private $provincia;
    private $db;

    public function __construct(){
        $this->db=Database::connect();
    }

    public function getName(){
       return $this->name;
    }

    public function getUserId(){
        return $this->userId;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getBuscador(){
        return $this->buscador;
    }
    public function getFechaStart(){
        return $this->fechaStart;
    }
    public function getFechaEnd(){
        return $this->fechaEnd;
    }
    public function getProvincia(){
        return $this->provincia;
    }


    public function setName($name){
        $this->name=$this->db->real_escape_string($name);
    }

    public function setUserId($userId){
        $this->userId =$this->db->real_escape_string($userId);
    }

    public function setTipo($tipo){
        $this->tipo =$this->db->real_escape_string($tipo);
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function setPassword($password){
        $this->password=$password;
    }
    public function setBuscador($buscador){
        $this->buscador=$this->db->real_escape_string($buscador);
    }
    public function setFechaStart($fechaStart){
        $this->fechaStart=$fechaStart;
    }
    public function setFechaEnd($fechaEnd){
        $this->fechaEnd=$fechaEnd;
    }
    public function setProvincia($provincia){
        $this->provincia=$provincia;
    }

  


    
     




    public function getlAllUsers(){

        $sql = "SELECT * FROM usuarios";
        $usuarios = $this->db->query($sql);

        $result = array();
        if($usuarios && $usuarios->num_rows>0){
            $result = $usuarios;

            $_SESSION["usuariosMostrar"] = 'mostrarUsuarios';

        
        }

        return $result;
      
    }

    public function getOne(){

        $sql = "SELECT * FROM usuarios order by idaut desc limit 1";
        $usuarios = $this->db->query($sql);

        $result = array();
        if($usuarios && $usuarios->num_rows>0){
            $result = $usuarios;

            $_SESSION["usuariosMostrar"] = 'mostrarUltimoUsuario';

        
        }

        return $result;
      
    }

    public function addUser(){

        //HACER BUSQUEDA SI NO EXISTE EL USUARIO INGRESADO, SI EXISTE = ERROR, SI NO EXISTE... INSERTAR ....
         
        $sql = "INSERT INTO usuarios (idaut,id,tipo,nombre_recolector,email,PASSWORD,status) values ";

        //SI SE INSERTO CON EXITO, HACER BUSQUEDA DE REGISTRO CREADO WHERE ID AND NOMBRE = , PARA MOSTRARLO EN EL RESPONSE POR PANTALLA

    }


}