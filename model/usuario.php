<?php 



 class Usuario{


            private $username;
            private $password;
            private $passwordHash;
            private $nombre;
            private $apellido;
            private $email;
            private $via_conocimiento;
            private $pais;
            private $provincia;
            private $localidad;
            private $domicilio;
            private $codigoPostal;
            private $dni;
            private $nro_dni;
            private $monotributo;
            private $caracteristica;
            private $tipo_vehiculo;
            private $horario_disponible;
            private $telefono_celular;
            private $bank;
            private $cbu;
            private $cuit;
            private $tipo;
            private $tipo_usuario;
            private $horarioSolicitud;
            private $imagenCuilRut;
            private $imagenDocFront;
            private $imagenDocPost;
            private $imagenMonotributo;
            private $imagenComprobanteDomicilio;
            private $imagenPersona;
            private $imagenComercio;
            private $imagenFirma;
            private $fechaNacimiento;
            private $venceDocumento;
            private $seguroDesempleo;
            private $seguroDeseVence;
            private $estadoCivil;
            private $hijos;
            private $estudiosFinalizados;
            private $venceLicencia;
            private $vehiculoMarca;
            private $patente;
            private $vehiculoModelo;
            private $ultEmpleoUno;
            private $fechaInicioEmpleoUno;
            private $fechaFinEmpleoUno;
            private $ultEmpleoDos;
            private $fechaInicioEmpleoDos;
            private $fechaFinEmpleoDos;
            private $ultEmpleoTres;
            private $fechaInicioEmpleoTres;
            private $fechaFinEmpleoTres;
            private $antecedentesRestricciones;
            private $observaciones;
            private $idenviado;
            private $motionDate;
            private $status;
            private $descripcion;
        
            private $db;

            public function __construct(){
                $this->db=Database::connect();
            }

            public function getUsername(){
                return $this->username;
            }
            public function getPassword(){

                return $this->db->real_escape_string($this->password);
                
            }

            public function getPasswordHash(){

                return password_hash($this->db->real_escape_string(($this->passwordHash)),PASSWORD_BCRYPT, ['cost' => 4]);
                
            }
        
            public function getNombre(){
                return $this->nombre;
            }
            public function getApellido(){
                return $this->apellido;
            }
            public function getEmail(){
                return $this->email;
            }
            public function getVia_conocimiento(){
                return $this->via_conocimiento;
            }
            public function getPais(){
                return $this->pais;
            }
            public function getProvincia(){
                return $this->provincia;
            }
            public function getLocalidad(){
                return $this->localidad;
            }
            public function getDomicilio(){
                return $this->domicilio;
            }
            public function getCodigoPostal(){
                return $this->codigoPostal;
            }
            public function getDni(){
                return $this->dni;
            }
            public function getNro_dni(){
                return $this->nro_dni;
            }
            public function getMonotributo(){
                return $this->monotributo;
            }
            public function getCaracteristica(){
                return $this->caracteristica;
            }
            public function getTipo_vehiculo(){
                return $this->tipo_vehiculo;
            }
            public function getHorario_disponible(){
                return $this->horario_disponible;
            }
            public function getTelefono_celular(){
                return $this->telefono_celular;
            }
            public function getBank(){
                    return $this->bank;
                }
            public function getCbu(){
                return $this->cbu;
            }
            public function getCuit(){
                return $this->cuit;
            }
            public function getTipo(){
                return $this->tipo;
            }
            public function getTipoUsuario(){
                return $this->tipo_usuario;
            }
            public function getHorarioSolicitud(){
                return $this->horarioSolicitud;
            }
            public function getImagenCuilRut(){
                return $this->imagenCuilRut;
            }
            public function getImagenDocFront(){
                return $this->imagenDocFront;
            }
            public function getImagenDocPost(){
                return $this->imagenDocPost;
            }
            public function getImagenMonotributo(){
                return $this->imagenMonotributo;
            }
            public function getImagenComprobanteDomicilio(){
                return $this->imagenComprobanteDomicilio;
            }
            public function getImagenComercio(){
                return $this->imagenComercio;
            }
            public function getImagenPersona(){
                return $this->imagenPersona;
            }

            public function getImagenFirma(){
                return $this->imagenFirma;
            }

        
            public function getFechaNacimiento(){
                return $this->fechaNacimiento;
            }
            public function getVenceDocumento(){
                return $this->venceDocumento;
            }
            public function getSeguroDesempleo(){
                return $this->seguroDesempleo;
            }
            public function getSeguroDeseVence(){
                return $this->seguroDeseVence;
            }
            public function getEstadoCivil(){
                return $this->estadoCivil;
            }
            public function getHijos(){
                return $this->hijos;
            }
            public function getEstudiosFinalizados(){
                return $this->estudiosFinalizados;
            }
            public function getVenceLicencia(){
                return $this->venceLicencia;
            }
            public function getVehiculoModelo(){
                return $this->vehiculoModelo;
            }
            public function getVehiculoMarca(){
                return $this->vehiculoMarca;
            }
            public function getPatente(){
                 return $this->patente;
            }
            public function getUltEmpleoUno(){
                return $this->ultEmpleoUno;
            }
            public function getFechaInicioEmpleoUno(){
                return $this->fechaInicioEmpleoUno;
            }
            public function getFechaFinEmpleoUno(){
                return $this->fechaFinEmpleoUno;
            }
            public function getUltEmpleoDos(){
                return $this->ultEmpleoDos;
            }
            public function getFechaInicioEmpleoDos(){
                return $this->fechaInicioEmpleoDos;
            }
            public function getFechaFinEmpleoDos(){
                return $this->fechaFinEmpleoDos;
            }
            public function getUltEmpleoTres(){
                return $this->ultEmpleoTres;
            }
            public function getFechaInicioEmpleoTres(){
                return $this->fechaInicioEmpleoTres;
            }
            public function getFechaFinEmpleoTres(){
                return $this->fechaFinEmpleoTres;
            }
            public function getAntecedentesRestricciones(){
                return $this->antecedentesRestricciones;
            }
            public function getObservaciones(){
                return $this->observaciones;
            }
            public function getIdenviado(){
                return $this->idenviado;
            }
            public function getMotionDate(){
                return $this->motionDate;
            }
            public function getStatus(){
                return $this->status;
            }
            public function getDescripcion(){
                return $this->descripcion;
            }
           
        
        
                public function setUsername($username){

                    $this->username =$this->db->real_escape_string($username);
                }
                public function setPassword($password){

                    $this->password = $this->db->real_escape_string($password);
                }

                public function setPasswordHash($passwordHash){

                    $this->passwordHash = $passwordHash;
                }
                public function setNombre($nombre){

                    $this->nombre = $this->db->real_escape_string($nombre);
                }
                public function setApellido($apellido){

                    $this->apellido = $this->db->real_escape_string($apellido);
                }
                public function setEmail($email){

                    $this->email = $this->db->real_escape_string($email);
                }
                public function setVia_conocimiento($via_conocimiento){

                    $this->via_conocimiento = $this->db->real_escape_string($via_conocimiento);
                }
                public function setPais($pais){

                    $this->pais = $this->db->real_escape_string($pais);
                }
                public function setProvincia($provincia){

                    $this->provincia = $this->db->real_escape_string($provincia);
                }
                public function setLocalidad($localidad){

                    $this->localidad = $this->db->real_escape_string($localidad);
                }
                public function setDomicilio($domicilio){

                    $this->domicilio = $this->db->real_escape_string($domicilio);
                }
                public function setCodigoPostal($codigoPostal){

                    $this->codigoPostal = $this->db->real_escape_string($codigoPostal);
                }
                public function setDni($dni){

                    $this->dni = $this->db->real_escape_string($dni);
                }
                public function setNro_dni($nro_dni){

                    $this->nro_dni = $this->db->real_escape_string($nro_dni);
                }
                public function setMonotributo($monotributo){

                    $this->monotributo = $this->db->real_escape_string($monotributo);
                }
                public function setCaracteristica($caracteristica){

                    $this->caracteristica = $this->db->real_escape_string($caracteristica);
                }
                public function setTipo_vehiculo($tipo_vehiculo){

                    $this->tipo_vehiculo = $this->db->real_escape_string($tipo_vehiculo);
                }
                public function setHorario_disponible($horario_disponible){

                    $this->horario_disponible = $this->db->real_escape_string($horario_disponible);
                }
                public function setTelefono_celular($telefono_celular){

                    $this->telefono_celular = $this->db->real_escape_string($telefono_celular);
                }
                public function setBank($bank){
                        $this->bank=$this->db->real_escape_string($bank);
                    }
                public function setCbu($cbu){

                    $this->cbu = $this->db->real_escape_string($cbu);
                }
                public function setCuit($cuit){
                    $this->cuit=$this->db->real_escape_string($cuit);
                }
            
                public function setHorarioSolicitud($horarioSolicitud){

                    $this->horarioSolicitud =$horarioSolicitud;
                }

                public function setTipo($tipo){

                    $this->tipo = $tipo;
                }

                public function setTipoUsuario($tipo_usuario){

                    $this->tipo_usuario = $tipo_usuario;
                }
                public function setImagenCuilRut($imagenCuilRut){

                    $this->imagenCuilRut = $imagenCuilRut;
                }
                public function setImagenDocFront($imagenDocFront){

                    $this->imagenDocFront = $imagenDocFront;
                }
                public function setImagenDocPost($imagenDocPost){

                    $this->imagenDocPost = $imagenDocPost;
                }
                public function setImagenMonotributo($imagenMonotributo){

                    $this->imagenMonotributo = $imagenMonotributo;
                }
                public function setImagenComprobanteDomicilio($imagenComprobanteDomicilio){

                    $this->imagenComprobanteDomicilio = $imagenComprobanteDomicilio;
                }

                public function setImagenPersona($imagenPersona){
                    $this->imagenPersona = $imagenPersona;
                }

                public function setImagenComercio($imagenComercio){
                    $this->imagenComercio = $imagenComercio;
                }

                public function setImagenFirma($imagenFirma){
                    $this->imagenFirma=$imagenFirma;
                }

                public function setFechaNacimiento($fechaNacimiento){

                    $this->fechaNacimiento = $fechaNacimiento;
                }
                public function setVenceDocumento($venceDocumento){

                    $this->venceDocumento = $venceDocumento;
                }
                public function setSeguroDesempleo($seguroDesempleo){

                    $this->seguroDesempleo = $seguroDesempleo;
                }
                public function setSeguroDeseVence($seguroDeseVence){

                    $this->seguroDeseVence = $seguroDeseVence;
                }
                public function setEstadoCivil($estadoCivil){

                    $this->estadoCivil = $estadoCivil;
                }

                public function setHijos($hijos){

                    $this->hijos = $hijos;
                }
                public function setEstudiosFinalizados($estudiosFinalizados){

                    $this->estudiosFinalizados = $estudiosFinalizados;
                }
                public function setVenceLicencia($venceLicencia){

                    $this->venceLicencia = $venceLicencia;
                }
                public function setVehiculoMarca($vehiculoMarca){
                    $this->vehiculoMarca=$this->db->real_escape_string($vehiculoMarca);
                }

                public function setVehiculoModelo($vehiculoModelo){

                    $this->vehiculoModelo = $vehiculoModelo;
                }
                public function setPatente($patente){
                     $this->patente=$this->db->real_escape_string($patente);
                }
                public function setUltEmpleoUno($ultEmpleoUno){

                    $this->ultEmpleoUno = $ultEmpleoUno;
                }

                public function setFechaInicioEmpleoUno($fechaInicioEmpleoUno){

                    $this->fechaInicioEmpleoUno = $fechaInicioEmpleoUno;
                }
                public function setFechaFinEmpleoUno($fechaFinEmpleoUno){

                    $this->fechaFinEmpleoUno = $fechaFinEmpleoUno;
                }
                public function setUltEmpleoDos($ultEmpleoDos){

                    $this->ultEmpleoDos = $ultEmpleoDos;
                }
                public function setFechaInicioEmpleoDos($fechaInicioEmpleoDos){

                    $this->fechaInicioEmpleoDos = $fechaInicioEmpleoDos;
                }
                public function setFechaFinEmpleoDos($fechaFinEmpleoDos){

                    $this->fechaFinEmpleoDos = $fechaFinEmpleoDos;
                }

                public function setUltEmpleoTres($ultEmpleoTres){

                    $this->ultEmpleoTres = $ultEmpleoTres;
                }
                public function setFechaInicioEmpleoTres($fechaInicioEmpleoTres){

                    $this->fechaInicioEmpleoTres = $fechaInicioEmpleoTres;
                }
                public function setFechaFinEmpleoTres($fechaFinEmpleoTres){

                    $this->fechaFinEmpleoTres = $fechaFinEmpleoTres;
                }
                public function setAntecedentesRestricciones($antecedentesRestricciones){

                    $this->antecedentesRestricciones = $antecedentesRestricciones;
                }
                public function setObservaciones($observaciones){

                    $this->observaciones = $observaciones;
                }
                public function setIdenviado($idenviado){

                    $this->idenviado = $idenviado;
                }

                public function setMotionDate($motionDate){

                    $this->motionDate = $motionDate;
                }

                public function setStatus($status){

                    $this->status = $status;
                }

                public function setDescripcion($descripcion){

                    $this->descripcion = $descripcion;
                }
                

                public function setRegisterOneStep(){

                    $nombre = !empty($this->getNombre()) ?$this->getNombre() : false;
                    $email = !empty($this->getEmail()) ?$this->getEmail() : false;
                    $getPassword = !empty($this->getPassword()) ?$this->getPassword() : false;
                    $passwordHash = !empty($this->getPasswordHash()) ?$this->getPasswordHash() : false;
                    $motionDate = !empty($this->getMotionDate()) ?$this->getMotionDate() : false;
                    $tipo = !empty($this->getTipo()) ? $this->getTipo() : false ;

                    if($nombre && $email && $passwordHash && $getPassword && $tipo){
                         $password = md5($getPassword);
                         $mailHash =  md5($email);
                        
                        $result = false;
                        $sql= "INSERT INTO users (first_name,mail,mail_hash,password,password_hash,type_request,rol,status_process,status_notifications,motion_data) values ('$nombre','$email','$mailHash','$password','$passwordHash','$tipo','{$this->getTipoUsuario()}','first','nueva','$motionDate')";

                       
                        $register = $this->db->query($sql);
                        if($register){
                            
                        $result = $this->getRegister($mailHash,$password);

                        }else{
                            $result = 'noinsert';
                        }

                        return $result;

                       }
                }

                public function getRegister($email,$pass){

                    $result = false;
                    $sql ="SELECT id_user,mail,mail_hash,PASSWORD,password_hash, 
                    first_name,type_request,rol,status_process  from users where password='$pass' and mail_hash='$email' and status_process='first'";
                
                
                    $getReclute = $this->db->query($sql);
                    if($getReclute && $getReclute->num_rows>0){

                        $result = $getReclute;

                    }else{
                        $result = false;
                    }

                    return $result;

                }

                public function validateEmail(){
                    
                    

                    
                    $id = !empty($this->getIdenviado()) ?$this->getIdenviado() : false;
                    $email = !empty($this->getEmail()) ?$this->getEmail() : false;
                    $getPassword = !empty($this->getPassword()) ?$this->getPassword() : false;

                        if($id && $email && $getPassword){

                            $result = false;
                            $sql ="UPDATE users SET email_status='verify', status_notifications ='nueva' WHERE PASSWORD='$getPassword' AND id_user
                            ='$id' AND mail_hash='$email'";
                            
                            
                            
                            
                            $modificarStatusEmail = $this->db->query($sql);

                            if($modificarStatusEmail){
                                $result = $this->getRegister($email,$getPassword);
                            }else{
                                $result = false;
                            }
                            return $result;

                        }
                }

                public function getTelefonosAndIdOperator(){

                    $result = false;
                    $sql="SELECT users.id_user,users.first_name, numeros_operators.telefono, 
                    postal_code.postal_code, postal_code.province
                    FROM numeros_operators
                    INNER JOIN users ON users.id_user= numeros_operators.id_user
                    INNER JOIN postal_code ON postal_code.id_user = numeros_operators.id_user
                    WHERE postal_code.postal_code='{$this->getCodigoPostal()}' GROUP BY 
                    numeros_operators.telefono";

                 
                    $telefonosYId = $this->db->query($sql);
                    
                    if($telefonosYId && $telefonosYId->num_rows>0){
                        $result = $telefonosYId;

                    }else{
                        $result = false;
                    }
                    return $result;

                }

                private function validateDocument($documento){

                    $result = true;

                    $dni = $this->getNro_dni();
                    $sql = "SELECT * FROM users where id_number='$dni'";
                    $documento = $this->db->query($sql);

                    if($documento && $documento->num_rows>0){
                        $result = false;
                    }

                    return $result;
                }

                public function getValidateEmail(){
              
                    $email = !empty($this->getEmail()) ? $this->getEmail() : false ;
                    $status = !empty($this->getStatus()) ? $this->getStatus() : false ;
                    $pass = !empty($this->getPassword()) ? $this->getPassword() : false ;
                    $id = !empty($this->getIdenviado()) ? $this->getIdenviado() : false ;
                    $tipo = !empty($this->getTipo()) ? $this->getTipo() : false ;

                    if($email && $status && !$pass && !$id && !$tipo){
                      
                        $result = false;
                        $sql = "SELECT id_user,password,mail_hash,mail,first_name from users where mail ='$email' ";
                       
                        $validar = $this->db->query($sql);
                        if($validar && $validar->num_rows>0){
                            if($this->setStatusPass($email,$status)){
                                $result = $validar;
                               
                            }else{
                                $result = 'noupdate';
                            }
                        }else{
                            $result = 'noresult';
                        }

                        return $result;

                    }

                    if($email && !$status && $pass && $id  && !$tipo){
                       
                        
                        
                        $result = false;
                        $sql = "SELECT id_user,password,mail_hash,mail,first_name from users where mail_hash ='$email' and id_user='$id' and
                        password='$pass' and status_pass='checkEmailToRestore'";
                        $validar = $this->db->query($sql);
                        
                        if($validar && $validar->num_rows>0){
                            
                            if($this->setStatusPass($email,'restorationInProcess')){
                               
                                $result = $validar;
                            }
                           
                        }else{
                            $result = false;
                        }
                     
                    } if($email && $pass && $id && !$status && $tipo){
                        
                        $result = false;
                        $sql = "SELECT id_user,password,mail_hash,mail,first_name from users where mail_hash ='$email' and id_user='$id' and
                        password='$pass' and status_pass='checkEmailToRestore'";
                        
                        
                        $validar = $this->db->query($sql);
                        
                        if($validar && $validar->num_rows>0){

                               $result = $validar;
                                                  
                        }else{
                            $result = false;
                        }
                        return $result;
                      
                    }
                }

                private function setStatusPass($email,$stat){

                    $result = false;
                      if($stat==='checkEmailToRestore'){
                          //esto es cuando es solicitado restablecer la contraseña por vez primera
                        $sql ="UPDATE users set status_pass='$stat' where mail ='$email'";

                      }else if($stat==='restorationInProcess'){
                          //esto es cuando verifica el email para restablecer la contraseña
                        $sql ="UPDATE users set status_pass='$stat' where mail_hash ='$email'";            
                      }

                    $setStatus = $this->db->query($sql);
                    if($setStatus){
                         $result =true;
                    }else{
                        $result =false;
                    }
                    return $result;
                }


                public function restoreVerify(){
                //   empezar proceso para restablecer      
                    $result = false;
                    $id = !empty($this->getIdenviado()) ? $this->getIdenviado() : false ;
                    $pass = !empty($this->getPassword()) ? $this->getPassword() : false ;
                    $email = !empty($this->getEmail()) ? $this->getEmail(): false ;
                    $tipo = !empty($this->getTipo()) ? $this->getTipo() : false ;

                    if($id && $pass && $email && $tipo){

                    
                        if($this->getValidateEmail()){
                           $result = $this->getValidateEmail();
                        }else{
                            $result = false;
                        }

                        return $result;
                    }

                }

                public function updatePassword(){
                    $id = !empty($this->getIdenviado()) ? $this-> getIdenviado(): false ;
                    $newPass = !empty($this->getPasswordHash()) ? $this->getPasswordHash() : false ;
                    $passHash = !empty($this->getPassword()) ? $this->getPassword() : false ;
                    $mailHash = !empty($this->getEmail()) ? $this->getEmail() : false ;

                   if($id &&   $newPass && $passHash && $mailHash ){
                       $result = false;
                       $sql = "UPDATE users set password_hash = '$newPass',status_pass='restoredComplete', date_pass=now() where mail_hash='$mailHash'
                       and id_user='$id' and password ='$passHash' ";
                       
                      
                       $update = $this->db->query($sql);
                       if($update){
                           
                        $result ='update';
                       }
                       else{
                           $result ='noupdate';
                       }
                       return $result;
                   }

                }

                public function login(){

                    $result = false;
                    $password = $this->passwordHash;
                    $sql ="SELECT mail_hash,password,password_hash,id_user,type_request,rol, status_process,first_name,mail,img_person,id_number,country
                    FROM users WHERE mail='{$this->getUsername()}'";
                    $login= $this->db->query($sql);
                    if($login && $login->num_rows == 1){
                        $result = $login;
                    }else{
                        $result = false;
                    }
                    
                    return $result;
                }

                public function registerComplete(){

                        $result = false;
                        $sql ="";
                        $sql.= "update users set country='{$this->getPais()}',province='{$this->getProvincia()}',location='{$this->getLocalidad()}',postal_code='{$this->getCodigoPostal()}',home_address='{$this->getDomicilio()}',monotribute='{$this->getMonotributo()}', type_document='{$this->getDni()}',id_number='{$this->getNro_dni()}',phone_number='{$this->getTelefono_celular()}',knowledge_path='{$this->getVia_conocimiento()}',img_monotribute='{$this->getImagenMonotributo()}',img_document_front='{$this->getImagenDocFront()}',img_document_post='{$this->getImagenDocPost()}',img_cuil_rut='{$this->getImagenCuilRut()}',img_home='{$this->getImagenComprobanteDomicilio()}',img_person='{$this->getImagenPersona()}' ";

                        //si recibo la imagen de comercio
                        if(!empty($this->getImagenComercio())){
                          $sql.=",img_commerce='{$this->getImagenComercio()}',motion_data='{$this->getMotionDate()}',status_process='registered',status_notifications ='nueva' where id_user ='{$this->getIdenviado()}'";
                        }else{
                            $sql.=",motion_data='{$this->getMotionDate()}',status_process='registered',status_notifications ='nueva' where id_user ='{$this->getIdenviado()}'";
                        }

                    
                        $registered = $this->db->query($sql);
                        if($registered){
                           $result = 'registered';
                        }else{
                            $result = 'noregistered';
                        }
                        return $result;
                
              
                }

                public function gettersDocument(){

                    $result= false;
                    $sql = "SELECT id_number FROM users WHERE id_number='{$this->getNro_dni()}';";
                   
                    $validateDocument = $this->db->query($sql);
                    if($validateDocument && $validateDocument->num_rows>0){
                      $result = 'existe';
                    }else{
                        $result = 'noexiste';
                    }

                    return $result;

                }
    
                public function addRequest(){

                    $documento = $this->getNro_dni();

                    if($this->validateDocument($documento)){

                        $sql ="INSERT INTO reclute (first_name,last_name,mail,knowledge_path,country,province,location,home_address,postal_code,dni,id_number,monotributo,characteristic,vehicle_type,available_schedules,phone_number,cbu,type_request,status,fecha,img_document_front,img_document_post,img_cuil_rut,img_mono,img_comprobante) values ('{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getVia_conocimiento()}','{$this->getPais()}','{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDomicilio()}','{$this->getCodigoPostal()}','{$this->getDni()}','{$this->getNro_dni()}','{$this->getMonotributo()}','{$this->getCaracteristica()}','{$this->getTipo_vehiculo()}','{$this->getHorario_disponible()}','{$this->getTelefono_celular()}','{$this->getCbu()}','{$this->getTipo()}','Nueva','{$this->getHorarioSolicitud()}','{$this->getImagenDocFront()}','{$this->getImagenDocPost()}','{$this->getImagenCuilRut()}','{$this->getImagenMonotributo()}','{$this->getImagenComprobanteDomicilio()}');";
                        $usuario = $this->db->query($sql);
                        
                        if($usuario){

                            $objeto[]=array(
                                'result' => 'registered',
                        );
                        }else{

                            $objeto[]=array(
                                'result' => 'registeredFail',
                        );
                        }
        
                    }else {

                        $objeto[]=array(
                            'result' => 'existeDoc',
                    );

                    }

                    $jsonstring = json_encode($objeto);
                        echo $jsonstring;

                }

                public function getDocument(){


                    $query = "SELECT id_number,first_name from reclute where id_number='{$this->getNro_dni()}'";

                    $documento = $this->db->query($query);

                    
                    if($documento && $documento->num_rows>0){
                        $user = $documento->fetch_object();

                        $objeto[]=array(
                        'result' => true,
                        'id_number' => $user->id_number,
                        'first_name' => $user->first_name
                        );

                    }else {

                        $objeto[]=array(
                            'result' => false
                        );

                    }

                    $jsonstring= json_encode($objeto);
                    echo $jsonstring;

                }

                public function setRequestFinish(){

                            if($_POST){

                        
                    $query = "UPDATE reclute set 
                    date_of_birth='{$this->getFechaNacimiento()}',
                    unemployment_insurance='{$this->getSeguroDesempleo()}',
                    insurance_expiration_date='{$this->getSeguroDeseVence()}',
                    civil_status='{$this->getEstadoCivil()}',
                    sons='{$this->getHijos()}',
                    studies_completed='{$this->getEstudiosFinalizados()}',
                    drivers_license_expiration='{$this->getVenceLicencia()}',
                    vehicle_type='{$this->getVehiculoModelo()}',
                    business='{$this->getUltEmpleoUno()}',
                    start_date='{$this->getFechaInicioEmpleoUno()}',
                    finish_date='{$this->getFechaFinEmpleoUno()}',
                    business_two='{$this->getUltEmpleoDos()}',
                    start_date_two='{$this->getFechaInicioEmpleoDos()}',
                    finish_date_two='{$this->getFechaFinEmpleoDos()}',
                    business_three='{$this->getUltEmpleoTres()}',
                    start_date_three='{$this->getFechaInicioEmpleoTres()}',
                    finish_date_three='{$this->getFechaFinEmpleoTres()}',
                    antecedents_or_restrictions='{$this->getAntecedentesRestricciones()}',
                    observations='{$this->getObservaciones()}', type_request='{$this->getTipo()}', fecha ='{$this->getHorarioSolicitud()}', status='Completada' WHERE id_number='{$this->getIdenviado()}';";

                    $result =  $this->db->query($query);

                        if ($result > 0) {
                            echo 1;
                        } else {
                            echo 2;
                        }

                    }
                    

                }

                public function getPaisOperativos(){

                    $query = "SELECT * FROM pais";
                    $result= $this->db->query($query);

                    $json = array();
                        
                        
                        while($row = $result->fetch_object()){

                            $json[]= array(
                                'nomPais' => $row->pais,
                                'idPais' => $row->id_pais,
                            );

                        }

                    $jsonstring =json_encode($json);
                    echo $jsonstring;

                }

                public function getAllProvincias (){

                        $query = "SELECT * FROM provincias_ar where id_pais= '{$this->getProvincia()}'";
                        $result = $this->db->query($query);
                        $json = array();

                        while($row = $result->fetch_object()){

                            $json[] = array(
                                'codProvincia' => $row->id_provincias,
                                'nomProvincia' => $row->provincias,
                            );
                        }

                        $jsonstring = json_encode($json);
                        echo $jsonstring;
                
                }

                public function gelAllCp(){


                        $query = "SELECT cp_oper.id_operador, numeros_oper.telefono FROM cp_oper
                        INNER JOIN numeros_oper ON cp_oper.id_operador=numeros_oper.id_oper WHERE cp_oper.cp ='{$this->getCodigoPostal()}'";
                        $result = $this->db->query($query);
                        
                        $json = array();
                
                        if($result->num_rows > 0){
                            while($row = $result->fetch_object()){
                                $json[] = array(
                                    'codOper' => $row->id_operador,
                                    'telefono' => $row->telefono
                                );
                            }
                
                        } else{
                        $json[] = array (
                            'result' => 0
                        );
                        
                    }
                    
                    $jsonstring = json_encode($json);
                    echo $jsonstring;
                
                }

                public function addNewCustomer(){

                }

                public function countNotifications(){

                    $zone = !empty($this->getPais()) ? $this->getPais() : false ;
                    $result = false;

                    $sql = "SELECT COUNT(status_notifications) AS 'cantidadNotificacion'
                     FROM users where status_process !='first' 
                     AND status_notifications ='nueva'  AND country='$zone' GROUP BY
                     status_notifications ORDER BY motion_data DESC LIMIT 30";

                     $count = $this->db->query($sql);
                     if($count && $count->num_rows>0){

                       $result = $count;
                       
                     }else{
                         $result = false;
                     }

                     return $result;
                }


                public function getAllNotifications(){

                    $zone = !empty($this->getPais()) ? $this->getPais() : false ;
                    
                    $result = false;
                    $sql ="SELECT mail,id_user,first_name,rol,type_request,status_process,
                    status_notifications,province,postal_code,location,motion_data,img_person from 
                    users where status_process !='first' and country = '$zone' ORDER BY motion_data DESC LIMIT 30;";

                    $notificaciones = $this->db->query($sql);

                    if($notificaciones && $notificaciones->num_rows>0){

                        $result  = $notificaciones;

                    }else{
                        $result = false;
                    }

                    return $result;

                    

                }

                public function notificationComplete(){

                
                    $notif_id = !empty($this->getIdenviado()) ? $this->getIdenviado() : false ;
                
                    if($notif_id){
                        $result= false;    
                        $sql ="SELECT * FROM users where id_user='$notif_id'";
                       
                        $notificacion = $this->db->query($sql);

                        if($notificacion && $notificacion->num_rows>0){

                            
                            $result = $notificacion;
                        }else{
                            $result = false;
                        }
                        return $result;
                    }

                }
                public function getUsers(){
                      
                    $id = !empty($this->getIdenviado()) ? $this->getIdenviado() : false ;
                    $mail = !empty($this->getEmail()) ? $this->getEmail() : false ;
                    
                         
                        $result = false;
                        $sql ="";
                        $sql.="SELECT * FROM users ";
                        if($id && !$mail){
                        $sql.= "where id_number='$id' ORDER by motion_data DESC ";
                        }else if($id && $mail){
                            $sql.= "where id_number='$id' and mail_hash='$mail' ORDER by motion_data DESC";
                        }

                       
                        $usuarios = $this->db->query($sql);

                        if($usuarios && $usuarios->num_rows>0){

                            $result = $usuarios;
                        }else{
                            $result = false;
                        }

                        return $result;

                   

                    if(isset($_POST["key"]) && $_POST["key"] === 'all'){

                        $result = false;
                        $sql ="SELECT * FROM users ORDER by motion_data DESC";
                        $usuarios = $this->db->query($sql);

                        if($usuarios && $usuarios->num_rows>0){

                            $result = $usuarios;
                        }else{
                            $result = false;
                        }

                        return $result;

                    }

                    
                }

                public function setStatusUser(){
                    
                    $id = !empty($this->getIdenviado()) ? $this->getIdenviado() : false ;
                    $id_managent = !empty($this->getUsername()) ? $this->getUsername() : false ;
                    $status = !empty($this->getStatus()) ? $this->getStatus() : false ;
                    $motivo = !empty($this->getObservaciones()) ? $this->getObservaciones() : false ;
                    $descripcion = !empty($this->getDescripcion()) ? $this->getDescripcion() : '' ;
                    
                    $result = false;
                    if($id && $status && $id_managent){
                     $sql = "";
                     $sql.="UPDATE users set status_process='$status',user_managent_id='$id_managent',status_notifications='nueva' ";
                     if($motivo){
                     $sql .=",motive='$motivo',description='$descripcion' ";
                     }
                     $sql .="where id_number='$id'";
                   
                     $setStatus = $this->db->query($sql);
                     if($setStatus){
                          
                        $result = 'update';
                     }else{
                         $result= 'noupdate';
                     }

                     return $result;

                    }


                }

                public function setStatusNotifications(){

                    $notif_id = !empty($this->getIdenviado()) ? $this->getIdenviado() : false ;
                  
                    $result = false;
                    $sql ="UPDATE users set status_notifications='leida' where
                    id_user='$notif_id'";
                    $notificacion = $this->db->query($sql);
                   
                    if($notificacion){
                        $result = 'update';

                    }else{
                        $result = 'noupdate';
                    }

                    return $result;

                }

                public function settersSigned(){

                    if($_REQUEST){
            
                        
                          $result = false;
                          $base_to_php = explode(',', $this->getImagenFirma());
                          $data = base64_decode($base_to_php[1]);
                          $filepath = '../resources/firmas/contrato'.$this->getHorarioSolicitud().$this->getnro_dni().'.png';
                          $guardarimagen = file_put_contents($filepath, $data, FILE_APPEND);
                          if(file_exists($filepath)){
            
                             if($this->setContractEnded()){
                                $result= 'actualizado';
                             }else {
                                $result = 'no-actualizado';
                             }
            
                          }else{
            
                              $result= 'no-ingreso-firma';
                          }
            
                          return $result;
                    }
            
                }

                private function setContractEnded(){

                    $nameImg = 'contrato'.$this->getHorarioSolicitud().$this->getNro_dni().'.png'; 
            
                    $result = false;
                    $sql = "";
                    $sql.= "UPDATE users set cbu='{$this->getCbu()}',bank='{$this->getBank()}',status_process='signed_contract',status_notifications='nueva',img_signed='$nameImg',signed_date='{$this->getHorarioSolicitud()}',cuit='{$this->getCuit()}',vehicle_brand='{$this->getVehiculoMarca()}',vehicle_model='{$this->getVehiculoModelo()}',patent='{$this->getPatente()}',name_alternative='{$this->getNombre()}',customer_service_hours='{$this->getHorario_disponible()}',account_type='{$this->getTipo()}' ";

                   
                    if(!empty($this->getTelefono_celular())){
                       $sql.=",phone_number='{$this->getTelefono_celular()}' where id_number='{$this->getNro_dni()}'";
                    }else{
                        $sql.="where id_number='{$this->getNro_dni()}'";
                    }

                    

                    $actualizar = $this->db->query($sql); 
                   
                    if($actualizar){
                        
                        $result = true;
                        
                    }else {
                       
                        $result = false;
            
                    }
                    return $result;
                 
        
                }
    
                public function setcompleteThePhotoRequirements(){
                    $imagenMonotributo = !empty($this->getImagenMonotributo()) ? $this->getImagenMonotributo() : false ;
                    $id_number = !empty($this->getNro_dni()) ? $this->getNro_dni() : false ;

                    if($imagenMonotributo && $id_number){

                       $sql ="UPDATE users set img_monotribute='$imagenMonotributo', monotribute='si' where
                       id_number='$id_number' ";
                       $actualizar = $this->db->query($sql);
                       if($actualizar){
                           $result = 'update';

                       }else{
                           $result= 'noupdate';
                       }

                       return $result;

                    }
                }

 }




