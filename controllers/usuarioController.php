<?php
if (isset($_GET['usuario'])) {

     require_once '../model/usuario.php';
     require_once '../config/db.php';

     session_start();
     $accion = $_GET['usuario'];
     $usuario = new usuarioController();
     $usuario->$accion();
} else {
     require_once 'model/usuario.php';
}



class usuarioController
{

     public function viewLogin()
     {

          require_once 'views/login/login.php';
     }

     public function admin()
     {

          require_once 'views/adm/panel.php';
     }

     public function collector()
     {
          $info = $this->detect();
          require_once 'views/equipos/panel_recolector.php';
     }
     public function Register()
     {
          $info = $this->detect();
          require_once 'views/trabajo/registerOneStep.php';
     }
     public function registersad()
     {
          $info = $this->detect();
          require_once 'views/trabajo/registerOneStepAdmin.php';
     }

     public function firstRequestCollector()
     {

          $info = $this->detect();
          require_once 'views/trabajo/first-request-collector.php';
     }
     public function processAdmin()
     {
          require_once 'views/trabajo/in_process.php';
     }
     public function firstRequestCall()
     {

          $info = $this->detect();
          require_once 'views/trabajo/first-request-call.php';
     }
     public function firstRequestCommerce()
     {

          $info = $this->detect();
          require_once 'views/trabajo/first-request-commerce.php';
     }
     public function firstDataEmployee()
     {

          $info = $this->detect();
          require_once 'views/trabajo/first-data-employee.php';
     }
     public function finishDataEmployee()
     {

          $info = $this->detect();
          require_once 'views/trabajo/finish-data-employee.php';
     }

     public function waiting()
     {
          $info = $this->detect();
          require_once 'views/trabajo/oneStepSuccess.php';
     }

     public function managentUs()
     {

          require_once 'views/adm/registrados.php';
     }

     public function login()
     {

          if ($_POST) {


               $usernameRecibo = isset($_POST["username"]) ? $_POST["username"] : false;

               $password = isset($_POST["password"]) ? $_POST["password"] : false;

               $username = new Usuario();

               $username->setUsername($usernameRecibo);

               $username->setPasswordHash($password);
               $user = $username->login();

               if (is_object($user)) {

                    $usuario = $user->fetch_object();

                    $verify = password_verify($password, $usuario->password_hash);

                    if ($verify) {

                         $_SESSION["username"] =  $usuario;

                         $objeto[] = array(
                              'result' => '1',
                              'user' => $_SESSION["username"],
                         );
                    } else {
                         $objeto[] = array(
                              'result' => '2',

                         );
                    }
               } else {

                    $objeto[] = array(
                         'result' => '3',

                    );
               }

               $jsonstring = json_encode($objeto);
               echo $jsonstring;
          }
     }
     public function logOut()
     {
          session_destroy();
          header("Location:" . base_url);
     }

     public function restore()
     {

          require_once 'views/login/recuperar.php';
     }

     public function restoreVerify()
     {


          $id = isset($_GET['i']) ? $_GET['i'] : false;
          $passhash = isset($_GET['p']) ? $_GET['p'] : false;
          $mailhash = isset($_GET['mh']) ? $_GET['mh'] : false;

          if ($id && $passhash && $mailhash) {


               $restoreVerify = new Usuario();
               $restoreVerify->setIdenviado($id);
               $restoreVerify->setPassword($passhash);
               $restoreVerify->setEmail($mailhash);
               $restoreVerify->setTipo('getRestoreVerify');
               $restoreVerify = $restoreVerify->restoreVerify();

               if (is_object($restoreVerify)) {

                    require_once  'views/login/updatepass.php';
               } else {
                    header("Location:" . base_url . 'usuario/viewLogin');
               }
          }
     }

     public function restorePas()
     {


          if ($_POST) {

               $mail = isset($_POST['email']) ? $_POST['email'] : false;

               if ($mail) {
                    $recuperar = new Usuario();
               }
          } else {
               $_SESSION["error"] = 'mailvacio';
               header("Location:" . base_url . 'usuario/restore');
          }
     }

     public function updatePassword()
     {

          if ($_POST) {


               $pass = isset($_POST['object']) ? $_POST['object'] : false;
               $id = isset($_POST['i']) ? $_POST['i'] : false;
               $idpass = isset($_POST['p']) ? $_POST['p'] : false;
               $mailhash = isset($_POST['mh']) ? $_POST['mh'] : false;


               if ($pass && $id && $idpass && $mailhash) {

                    $update = new Usuario();
                    $update->setEmail($mailhash);
                    $update->setIdenviado($id);
                    $update->setPassword($idpass);
                    $update->setPasswordHash($pass);
                    $update = $update->updatePassword();

                    if ($update === 'update') {
                         echo "1";
                    } else if ($update === 'noupdate') {
                         echo "2";
                    }
               }
          }
     }

     public function chekYourMail()
     {
          $info = $this->detect();
          require_once 'views/trabajo/checkyouremail.php';
     }


     public function process()
     {
          //despues que valido email, el envio el formulario de registro
          if ($_GET) {


               $id = isset($_GET["i"]) ? $_GET["i"] : false;
               $mailhash = isset($_GET["mh"]) ? $_GET["mh"] : false;
               $passwordHash = isset($_GET["z"]) ? $_GET["z"] : false;
               
            

               $validateEmail = new Usuario();
               $validateEmail->setIdenviado($id);
               $validateEmail->setEmail($mailhash);
               $validateEmail->setPassword($passwordHash);
               $validateEmail = $validateEmail->validateEmail();



               if (is_object($validateEmail)) {


                    $_SESSION["estilo"] = 'register';
                    $_SESSION["username"] = $validateEmail->fetch_object();
                    $info = $this->detect();


                    if ($_SESSION["username"]->type_request === 'empleado') {

                         require_once 'views/trabajo/form-register-employe.php';
                    } else {

                         require_once 'views/trabajo/form-register.php';
                    }
               } else {
                   
                   
                    header("Location:" . base_url);
               }
          }
     }

     public function detect()
     {
          $browser = array("IE", "OPERA", "MOZILLA", "NETSCAPE", "FIREFOX", "SAFARI", "CHROME");
          $os = array("WIN", "MAC", "LINUX");

          # definimos unos valores por defecto para el navegador y el sistema operativo
          $info['browser'] = "OTHER";
          $info['os'] = "OTHER";

          # buscamos el navegador con su sistema operativo
          foreach ($browser as $parent) {
               $s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
               $f = $s + strlen($parent);
               $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
               $version = preg_replace('/[^0-9,.]/', '', $version);
               if ($s) {
                    $info['browser'] = $parent;
                    $info['version'] = $version;
               }
          }

          # obtenemos el sistema operativo
          foreach ($os as $val) {
               if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $val) !== false)
                    $info['os'] = $val;
          }

          # devolvemos el array de valores
          return $info;
     }


     public function registerOneStep()
     {
          //primer paso para registrarse
          if ($_POST) {

               $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : false;
               $email = isset($_POST["email"]) ? $_POST["email"] : false;
               $password = isset($_POST["pass"]) ? $_POST["pass"] : false;
               $passwordHash = isset($_POST["pass"]) ? $_POST["pass"] : false;
               $motionDate = isset($_POST["fecha"]) ? $_POST["fecha"] : false;
               $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;


               if ($nombre && $email && $passwordHash && $tipo) {
                    $register = new Usuario();

                    if ($tipo === 'auto' || $tipo === 'bicicleta' || $tipo === 'moto') {

                         $tipoUser = 'recolector';
                         $register->setTipoUsuario($tipoUser);
                    } else if ($tipo === 'computadora' || $tipo === 'celular') {

                         $tipoUser = 'call';
                         $register->setTipoUsuario($tipoUser);
                    } else if ($tipo === 'admin') {
                         $tipoUser = 'admin';
                         $register->setTipoUsuario($tipoUser);
                    } else if ($tipo === 'comercio') {
                         $tipoUser = 'comercio';
                         $register->setTipoUsuario($tipoUser);
                    } else if ($tipo === 'empleado') {
                         $tipoUser = 'empleado';
                         $register->setTipoUsuario($tipoUser);
                    } else {
                         true;
                    }


                    $register->setNombre($nombre);
                    $register->setEmail($email);
                    $register->setPassword($password);
                    $register->setPasswordHash($passwordHash);

                    $register->setTipo($tipo);
                    $register->setMotionDate($motionDate);
                    $register = $register->setRegisterOneStep();


                    if (is_object($register)) {

                         foreach ($register as $element) {

                              $objeto[] = array(
                                   'result' => '1',
                                   'm' => $element["mail"],
                                   'mh' => $element["mail_hash"],
                                   'z' => $element["PASSWORD"],
                                   'i' => $element["id_user"]
                              );
                         }
                    } else if ($register === 'noinsert') {

                         $objeto[] = array(
                              'result' => '2',
                         );
                    }



                    $jsonstring = json_encode($objeto);
                    echo $jsonstring;
               }
          }
     }

     public function validateDocumento()
     {

          $documento = isset($_POST['object']) ? $_POST['object'] : false;
          if ($documento) {
               $validate = new Usuario();
               $validate->setNro_Dni($documento);
               $validate = $validate->gettersDocument();

               if ($validate === 'existe') {
                    echo '2';
               } else if ($validate === 'noexiste') {
                    echo '1';
               }
          }
     }

     public function validateEmail()
     {
          if ($_POST) {
               $email = isset($_POST['email']) ? $_POST['email'] : false;
               $status = isset($_POST['stat']) ? $_POST['stat'] : false;

               if ($email && $status) {

                    $validar = new Usuario();
                    $validar->setEmail($email);
                    $validar->setStatus($status);
                    $validar = $validar->getValidateEmail();

                    if (is_object($validar)) {
                         foreach ($validar as $element) {


                              $objeto[] = array(
                                   'result' => '1',
                                   'i' => $element["id_user"],
                                   'p' => $element["password"],
                                   'mh' => $element["mail_hash"],
                                   'm' => $element["mail"],
                                   'nombre' => $element["first_name"],
                              );
                         }
                    } else if ($validar === 'noupdate') {
                         $objeto[] = array(
                              'result' => '2',
                         );
                    } else if ($validar === 'noresult') {
                         $objeto[] = array(
                              'result' => '3',
                         );
                    }
                    $jsonstring = json_encode($objeto);
                    echo $jsonstring;
               }
          }
     }

     public function registerComplete()
     {

     
          $imgMonotributo = isset($_FILES['imgMonotributo']) ? $_FILES['imgMonotributo'] : false;
          $imgDocumentoFrontal = isset($_FILES['imgDocumentoFrontal']) ? $_FILES['imgDocumentoFrontal'] : false;
          $imgDocumentoDorsal = isset($_FILES['imgDocumentoDorsal']) ? $_FILES['imgDocumentoDorsal'] : false;
          $imgCuilRut = isset($_FILES['imgCuilRut']) ? $_FILES['imgCuilRut'] : false;
          $imgComprobanteDomicilio = isset($_FILES['imgComprobanteDomicilio']) ? $_FILES['imgComprobanteDomicilio'] : false;
          $imgFrontalPersona = isset($_FILES['imgFrontalPersona']) ? $_FILES['imgFrontalPersona'] : false;
          $imgFrontalCommerce = isset($_FILES['imgFrontalCommerce']) ? $_FILES['imgFrontalCommerce'] : false;
          $pais = isset($_POST['pais']) ? $_POST['pais'] : false;
          $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
          $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
          $codigoPostal = isset($_POST['codigoPostal']) ? $_POST['codigoPostal'] : false;
          $domicilio = isset($_POST['domicilio']) ? $_POST['domicilio'] : false;
          $monotributo = isset($_POST['monotributo']) ? $_POST['monotributo'] : false;
          $tipoDocumento = isset($_POST['tipo-documento']) ? $_POST['tipo-documento'] : false;
          $numeroDocumento = isset($_POST['numero-documento']) ? $_POST['numero-documento'] : false;
          $telefono_celular = isset($_POST['telefono_celular']) ? $_POST['telefono_celular'] : false;
          $via_conocimiento = isset($_POST['via_conocimiento']) ? $_POST['via_conocimiento'] : false;
          $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
          $id_reclute_guia = isset($_POST['id_reclute_guia']) ? $_POST['id_reclute_guia'] : false;


          if (
               $imgDocumentoFrontal && $imgDocumentoDorsal && $imgCuilRut && $imgComprobanteDomicilio && $imgFrontalPersona && $pais && $provincia && $localidad && $codigoPostal && $domicilio && $monotributo && $tipoDocumento && $numeroDocumento && $telefono_celular  && $via_conocimiento
               && $id_reclute_guia
          ) {

               $register = new Usuario();
               $register->setPais($pais);
               $register->setProvincia($provincia);
               $register->setLocalidad($localidad);
               $register->setCodigoPostal($codigoPostal);
               $register->setDomicilio($domicilio);
               $register->setMonotributo($monotributo);
               $register->setDni($tipoDocumento);
               $register->setNro_dni($numeroDocumento);
               $register->setTelefono_celular($telefono_celular);
               $register->setVia_conocimiento($via_conocimiento);
               $register->setMotionDate($fecha);
               $register->setIdenviado($id_reclute_guia);

               $documentoFront = false;
               $documentoPost = false;
               $cuilRut = false;
               $comprobanteDomicilio = false;
               $imagenPersona = false;

               // importante
               // ../ si es de ajax
               //si es de php. sin ../

               if ($imgMonotributo) {

                    $file = $_FILES['imgMonotributo'];
                    $filenameOri = $_FILES['imgMonotributo']['name'];
                    $separoTipo = explode('.', $filenameOri);
                    $obtengoTipo = end($separoTipo);
                    $filename = $numeroDocumento . 'monotributo';
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpeg' || $mimetype == 'imagen/jpg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                         $max_ancho = 1280;
                         $max_alto = 900;

                         $medidasimagen = getimagesize($_FILES['imgMonotributo']['tmp_name']);


                         //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                         if ($medidasimagen[0] < 1280 && $_FILES['imgMonotributo']['size'] < 100000) {
                              move_uploaded_file($file["tmp_name"], 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                         } else {

                              $nombrearchivo = $_FILES['imgMonotributo']['name'];

                              //Redimensionar
                              $rtOriginal = $_FILES['imgMonotributo']['tmp_name'];

                              if ($_FILES['imgMonotributo']['type'] == 'image/jpeg') {
                                   $original = imagecreatefromjpeg($rtOriginal);
                              } else if ($_FILES['imgMonotributo']['type'] == 'image/png') {
                                   $original = imagecreatefrompng($rtOriginal);
                              } else if ($_FILES['imgMonotributo']['type'] == 'image/gif') {
                                   $original = imagecreatefromgif($rtOriginal);
                              }


                              list($ancho, $alto) = getimagesize($rtOriginal);

                              $x_ratio = $max_ancho / $ancho;
                              $y_ratio = $max_alto / $alto;


                              if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                                   $ancho_final = $ancho;
                                   $alto_final = $alto;
                              } elseif (($x_ratio * $alto) < $max_alto) {
                                   $alto_final = ceil($x_ratio * $alto);
                                   $ancho_final = $max_ancho;
                              } else {
                                   $ancho_final = ceil($y_ratio * $ancho);
                                   $alto_final = $max_alto;
                              }

                              $lienzo = imagecreatetruecolor($ancho_final, $alto_final);

                              imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);

                              //imagedestroy($original);

                              $cal = 8;

                              if ($_FILES['imgMonotributo']['type'] == 'image/jpeg') {
                                   imagejpeg($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgMonotributo']['type'] == 'image/png') {
                                   imagepng($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgMonotributo']['type'] == 'image/gif') {
                                   imagegif($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              }
                         }

                         $register->setImagenMonotributo($filename . '.' . $obtengoTipo);
                    }
               }

               if ($imgDocumentoFrontal) {

                    $file = $_FILES['imgDocumentoFrontal'];
                    $filenameOri = $_FILES['imgDocumentoFrontal']['name'];
                    $separoTipo = explode('.', $filenameOri);
                    $obtengoTipo = end($separoTipo);
                    $filename = $numeroDocumento . 'documentoFront';
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpeg' || $mimetype == 'imagen/jpg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {


                         //Parámetros optimización, resolución máxima permitida
                         $max_ancho = 1280;
                         $max_alto = 900;

                         $medidasimagen = getimagesize($_FILES['imgDocumentoFrontal']['tmp_name']);


                         //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                         if ($medidasimagen[0] < 1280 && $_FILES['imgDocumentoFrontal']['size'] < 100000) {
                              move_uploaded_file($file["tmp_name"], 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                         } else {

                              $nombrearchivo = $_FILES['imgDocumentoFrontal']['name'];

                              //Redimensionar
                              $rtOriginal = $_FILES['imgDocumentoFrontal']['tmp_name'];

                              if ($_FILES['imgDocumentoFrontal']['type'] == 'image/jpeg') {
                                   $original = imagecreatefromjpeg($rtOriginal);
                              } else if ($_FILES['imgDocumentoFrontal']['type'] == 'image/png') {
                                   $original = imagecreatefrompng($rtOriginal);
                              } else if ($_FILES['imgDocumentoFrontal']['type'] == 'image/gif') {
                                   $original = imagecreatefromgif($rtOriginal);
                              }


                              list($ancho, $alto) = getimagesize($rtOriginal);

                              $x_ratio = $max_ancho / $ancho;
                              $y_ratio = $max_alto / $alto;


                              if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                                   $ancho_final = $ancho;
                                   $alto_final = $alto;
                              } elseif (($x_ratio * $alto) < $max_alto) {
                                   $alto_final = ceil($x_ratio * $alto);
                                   $ancho_final = $max_ancho;
                              } else {
                                   $ancho_final = ceil($y_ratio * $ancho);
                                   $alto_final = $max_alto;
                              }

                              $lienzo = imagecreatetruecolor($ancho_final, $alto_final);

                              imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);

                              //imagedestroy($original);

                              $cal = 8;

                              if ($_FILES['imgDocumentoFrontal']['type'] == 'image/jpeg') {
                                   imagejpeg($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgDocumentoFrontal']['type'] == 'image/png') {
                                   imagepng($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgDocumentoFrontal']['type'] == 'image/gif') {
                                   imagegif($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              }
                         }
                         $register->setImagenDocFront($filename . '.' . $obtengoTipo);

                         $documentoFront = true;
                    }
               }

               if ($imgDocumentoDorsal) {

                    $file = $_FILES['imgDocumentoDorsal'];
                    $filenameOri = $_FILES['imgDocumentoDorsal']['name'];
                    $separoTipo = explode('.', $filenameOri);
                    $obtengoTipo = end($separoTipo);
                    $filename = $numeroDocumento . 'documentoPost';
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpeg' || $mimetype == 'imagen/jpg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                         //Parámetros optimización, resolución máxima permitida
                         $max_ancho = 1280;
                         $max_alto = 900;

                         $medidasimagen = getimagesize($_FILES['imgDocumentoDorsal']['tmp_name']);


                         //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                         if ($medidasimagen[0] < 1280 && $_FILES['imgDocumentoDorsal']['size'] < 100000) {
                              move_uploaded_file($file["tmp_name"], 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                         } else {

                              $nombrearchivo = $_FILES['imgDocumentoDorsal']['name'];

                              //Redimensionar
                              $rtOriginal = $_FILES['imgDocumentoDorsal']['tmp_name'];

                              if ($_FILES['imgDocumentoDorsal']['type'] == 'image/jpeg') {
                                   $original = imagecreatefromjpeg($rtOriginal);
                              } else if ($_FILES['imgDocumentoDorsal']['type'] == 'image/png') {
                                   $original = imagecreatefrompng($rtOriginal);
                              } else if ($_FILES['imgDocumentoDorsal']['type'] == 'image/gif') {
                                   $original = imagecreatefromgif($rtOriginal);
                              }


                              list($ancho, $alto) = getimagesize($rtOriginal);

                              $x_ratio = $max_ancho / $ancho;
                              $y_ratio = $max_alto / $alto;


                              if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                                   $ancho_final = $ancho;
                                   $alto_final = $alto;
                              } elseif (($x_ratio * $alto) < $max_alto) {
                                   $alto_final = ceil($x_ratio * $alto);
                                   $ancho_final = $max_ancho;
                              } else {
                                   $ancho_final = ceil($y_ratio * $ancho);
                                   $alto_final = $max_alto;
                              }

                              $lienzo = imagecreatetruecolor($ancho_final, $alto_final);

                              imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);

                              //imagedestroy($original);

                              $cal = 8;

                              if ($_FILES['imgDocumentoDorsal']['type'] == 'image/jpeg') {
                                   imagejpeg($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgDocumentoDorsal']['type'] == 'image/png') {
                                   imagepng($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgDocumentoDorsal']['type'] == 'image/gif') {
                                   imagegif($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              }
                         }

                         $register->setImagenDocPost($filename . '.' . $obtengoTipo);

                         $documentoPost = true;
                    }
               }
               if ($imgCuilRut) {

                    $file = $_FILES['imgCuilRut'];
                    $filenameOri = $_FILES['imgCuilRut']['name'];
                    $separoTipo = explode('.', $filenameOri);
                    $obtengoTipo = end($separoTipo);
                    $filename = $numeroDocumento . 'cuilrut';
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpeg' || $mimetype == 'imagen/jpg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                         //Parámetros optimización, resolución máxima permitida
                         $max_ancho = 1280;
                         $max_alto = 900;

                         $medidasimagen = getimagesize($_FILES['imgCuilRut']['tmp_name']);


                         //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                         if ($medidasimagen[0] < 1280 && $_FILES['imgCuilRut']['size'] < 100000) {
                              move_uploaded_file($file["tmp_name"], 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                         } else {

                              $nombrearchivo = $_FILES['imgCuilRut']['name'];

                              //Redimensionar
                              $rtOriginal = $_FILES['imgCuilRut']['tmp_name'];

                              if ($_FILES['imgCuilRut']['type'] == 'image/jpeg') {
                                   $original = imagecreatefromjpeg($rtOriginal);
                              } else if ($_FILES['imgCuilRut']['type'] == 'image/png') {
                                   $original = imagecreatefrompng($rtOriginal);
                              } else if ($_FILES['imgCuilRut']['type'] == 'image/gif') {
                                   $original = imagecreatefromgif($rtOriginal);
                              }


                              list($ancho, $alto) = getimagesize($rtOriginal);

                              $x_ratio = $max_ancho / $ancho;
                              $y_ratio = $max_alto / $alto;


                              if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                                   $ancho_final = $ancho;
                                   $alto_final = $alto;
                              } elseif (($x_ratio * $alto) < $max_alto) {
                                   $alto_final = ceil($x_ratio * $alto);
                                   $ancho_final = $max_ancho;
                              } else {
                                   $ancho_final = ceil($y_ratio * $ancho);
                                   $alto_final = $max_alto;
                              }

                              $lienzo = imagecreatetruecolor($ancho_final, $alto_final);

                              imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);

                              //imagedestroy($original);

                              $cal = 8;

                              if ($_FILES['imgCuilRut']['type'] == 'image/jpeg') {
                                   imagejpeg($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgCuilRut']['type'] == 'image/png') {
                                   imagepng($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgCuilRut']['type'] == 'image/gif') {
                                   imagegif($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              }
                         }

                         $register->setImagenCuilRut($filename . '.' . $obtengoTipo);

                         $cuilRut = true;
                    }
               }

               if ($imgComprobanteDomicilio) {

                    $file = $_FILES['imgComprobanteDomicilio'];
                    $filenameOri = $_FILES['imgComprobanteDomicilio']['name'];
                    $separoTipo = explode('.', $filenameOri);
                    $obtengoTipo = end($separoTipo);
                    $filename = $numeroDocumento . 'domicilio';
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpeg' || $mimetype == 'imagen/jpg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                         //Parámetros optimización, resolución máxima permitida
                         $max_ancho = 1280;
                         $max_alto = 900;

                         $medidasimagen = getimagesize($_FILES['imgComprobanteDomicilio']['tmp_name']);


                         //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                         if ($medidasimagen[0] < 1280 && $_FILES['imgComprobanteDomicilio']['size'] < 100000) {
                              move_uploaded_file($file["tmp_name"], 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                         } else {

                              $nombrearchivo = $_FILES['imgComprobanteDomicilio']['name'];

                              //Redimensionar
                              $rtOriginal = $_FILES['imgComprobanteDomicilio']['tmp_name'];

                              if ($_FILES['imgComprobanteDomicilio']['type'] == 'image/jpeg') {
                                   $original = imagecreatefromjpeg($rtOriginal);
                              } else if ($_FILES['imgComprobanteDomicilio']['type'] == 'image/png') {
                                   $original = imagecreatefrompng($rtOriginal);
                              } else if ($_FILES['imgComprobanteDomicilio']['type'] == 'image/gif') {
                                   $original = imagecreatefromgif($rtOriginal);
                              }


                              list($ancho, $alto) = getimagesize($rtOriginal);

                              $x_ratio = $max_ancho / $ancho;
                              $y_ratio = $max_alto / $alto;


                              if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                                   $ancho_final = $ancho;
                                   $alto_final = $alto;
                              } elseif (($x_ratio * $alto) < $max_alto) {
                                   $alto_final = ceil($x_ratio * $alto);
                                   $ancho_final = $max_ancho;
                              } else {
                                   $ancho_final = ceil($y_ratio * $ancho);
                                   $alto_final = $max_alto;
                              }

                              $lienzo = imagecreatetruecolor($ancho_final, $alto_final);

                              imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);

                              //imagedestroy($original);

                              $cal = 8;

                              if ($_FILES['imgComprobanteDomicilio']['type'] == 'image/jpeg') {
                                   imagejpeg($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgComprobanteDomicilio']['type'] == 'image/png') {
                                   imagepng($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgComprobanteDomicilio']['type'] == 'image/gif') {
                                   imagegif($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              }
                         }

                         $register->setImagenComprobanteDomicilio($filename . '.' . $obtengoTipo);

                         $comprobanteDomicilio = true;
                    }
               }

               if ($imgFrontalPersona) {

                    $file = $_FILES['imgFrontalPersona'];
                    $filenameOri = $_FILES['imgFrontalPersona']['name'];
                    $separoTipo = explode('.', $filenameOri);
                    $obtengoTipo = end($separoTipo);
                    $filename = $numeroDocumento . 'persona';
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpeg' || $mimetype == 'imagen/jpg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                         //Parámetros optimización, resolución máxima permitida
                         $max_ancho = 1280;
                         $max_alto = 900;

                         $medidasimagen = getimagesize($_FILES['imgFrontalPersona']['tmp_name']);


                         //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                         if ($medidasimagen[0] < 1280 && $_FILES['imgFrontalPersona']['size'] < 100000) {
                              move_uploaded_file($file["tmp_name"], 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                         } else {

                              $nombrearchivo = $_FILES['imgFrontalPersona']['name'];

                              //Redimensionar
                              $rtOriginal = $_FILES['imgFrontalPersona']['tmp_name'];

                              if ($_FILES['imgFrontalPersona']['type'] == 'image/jpeg') {
                                   $original = imagecreatefromjpeg($rtOriginal);
                              } else if ($_FILES['imgFrontalPersona']['type'] == 'image/png') {
                                   $original = imagecreatefrompng($rtOriginal);
                              } else if ($_FILES['imgFrontalPersona']['type'] == 'image/gif') {
                                   $original = imagecreatefromgif($rtOriginal);
                              }


                              list($ancho, $alto) = getimagesize($rtOriginal);

                              $x_ratio = $max_ancho / $ancho;
                              $y_ratio = $max_alto / $alto;


                              if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                                   $ancho_final = $ancho;
                                   $alto_final = $alto;
                              } elseif (($x_ratio * $alto) < $max_alto) {
                                   $alto_final = ceil($x_ratio * $alto);
                                   $ancho_final = $max_ancho;
                              } else {
                                   $ancho_final = ceil($y_ratio * $ancho);
                                   $alto_final = $max_alto;
                              }

                              $lienzo = imagecreatetruecolor($ancho_final, $alto_final);

                              imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);

                              //imagedestroy($original);

                              $cal = 8;

                              if ($_FILES['imgFrontalPersona']['type'] == 'image/jpeg') {
                                   imagejpeg($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgFrontalPersona']['type'] == 'image/png') {
                                   imagepng($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgFrontalPersona']['type'] == 'image/gif') {
                                   imagegif($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              }
                         }

                         $register->setImagenPersona($filename . '.' . $obtengoTipo);

                         $imagenPersona = true;
                    }
               }

               if ($imgFrontalCommerce) {

                    $file = $_FILES['imgFrontalCommerce'];
                    $filenameOri = $_FILES['imgFrontalCommerce']['name'];
                    $separoTipo = explode('.', $filenameOri);
                    $obtengoTipo = end($separoTipo);
                    $filename = $numeroDocumento . 'comercio';
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpeg' || $mimetype == 'imagen/jpg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                         //Parámetros optimización, resolución máxima permitida
                         $max_ancho = 1280;
                         $max_alto = 900;

                         $medidasimagen = getimagesize($_FILES['imgFrontalCommerce']['tmp_name']);


                         //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                         if ($medidasimagen[0] < 1280 && $_FILES['imgFrontalCommerce']['size'] < 100000) {
                              move_uploaded_file($file["tmp_name"], 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                         } else {

                              $nombrearchivo = $_FILES['imgFrontalCommerce']['name'];

                              //Redimensionar
                              $rtOriginal = $_FILES['imgFrontalCommerce']['tmp_name'];

                              if ($_FILES['imgFrontalCommerce']['type'] == 'image/jpeg') {
                                   $original = imagecreatefromjpeg($rtOriginal);
                              } else if ($_FILES['imgFrontalCommerce']['type'] == 'image/png') {
                                   $original = imagecreatefrompng($rtOriginal);
                              } else if ($_FILES['imgFrontalCommerce']['type'] == 'image/gif') {
                                   $original = imagecreatefromgif($rtOriginal);
                              }


                              list($ancho, $alto) = getimagesize($rtOriginal);

                              $x_ratio = $max_ancho / $ancho;
                              $y_ratio = $max_alto / $alto;


                              if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                                   $ancho_final = $ancho;
                                   $alto_final = $alto;
                              } elseif (($x_ratio * $alto) < $max_alto) {
                                   $alto_final = ceil($x_ratio * $alto);
                                   $ancho_final = $max_ancho;
                              } else {
                                   $ancho_final = ceil($y_ratio * $ancho);
                                   $alto_final = $max_alto;
                              }

                              $lienzo = imagecreatetruecolor($ancho_final, $alto_final);

                              imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);

                              //imagedestroy($original);

                              $cal = 8;

                              if ($_FILES['imgFrontalCommerce']['type'] == 'image/jpeg') {
                                   imagejpeg($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgFrontalCommerce']['type'] == 'image/png') {
                                   imagepng($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['imgFrontalCommerce']['type'] == 'image/gif') {
                                   imagegif($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              }
                         }

                         $register->setImagenComercio($filename . '.' . $obtengoTipo);

                         $imagenCommerce = true;
                    }
               }

               //aca compruebo las fotos que me tienen que llegar si o si - descartando el comercio

               if ($documentoFront && $documentoPost && $cuilRut && $comprobanteDomicilio && $imagenPersona && !$imgFrontalCommerce) {
                    $register = $register->registerComplete();

                    if ($register === 'registered') {

                         //    unset($_SESSION["estilo"]);
                         $_SESSION["register"] = 'exit';
                          header("Location:" . base_url . 'usuario/waiting');
                         
                    }
                    if ($register === 'noregistered') {
                         $_SESSION["register"] = 'failed';
                         
                          require_once 'views/trabajo/form-register.php';
                    }
               }

               //aca compruebo cuando me llegan datos de un comercio

               if($documentoFront && $documentoPost && $cuilRut && $comprobanteDomicilio && $imagenPersona && $imgFrontalCommerce ){

                    $register = $register->registerComplete();

                    if ($register === 'registered') {
                        
                         //    unset($_SESSION["estilo"]);
                         $_SESSION["register"] = 'exit';
                          header("Location:" . base_url . 'usuario/waiting');
                    }
                    if ($register === 'noregistered') {
                         $_SESSION["register"] = 'failed';
                         
                          require_once 'views/trabajo/form-register.php';
                    }
                    
               }


          } else {

               $_SESSION["register"] = 'incomplete';
               require_once 'views/trabajo/form-register.php';
          }
     }

     public function telefonoAndIdOperator()
     {
          if ($_POST) {
               $codigoPostal = isset($_POST['object']) ? $_POST['object'] : false;

               if ($codigoPostal) {
                    $infOperators = new Usuario();
                    $infOperators->setCodigoPostal($codigoPostal);
                    $infOperators = $infOperators->getTelefonosAndIdOperator();


                    if (is_object($infOperators)) {

                         foreach ($infOperators as $element) {
                              $objeto[] = array(
                                   'result' => '1',
                                   'telefono' => $element["telefono"],
                                   'id_user' => $element["id_user"]
                              );
                         }
                    } else {

                         $objeto[] = array(
                              'result' => '2',

                         );
                    }

                    $jsonstring = json_encode($objeto);
                    echo $jsonstring;
               }
          }
     }
     // este es el que rgsitra

     public function registerFinish()
     {
          if ($_POST) {

               $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? $_POST["fechaNacimiento"] : 'No data';
               $seguroDesempleo = isset($_POST["seguroDesempleo"]) ? $_POST["seguroDesempleo"] : 'No data';
               $seguroDeseVence = isset($_POST["seguroDeseVence"]) ? $_POST["seguroDeseVence"] : 'No data';
               $estadoCivil = isset($_POST["estadoCivil"]) ? $_POST["estadoCivil"] : 'No data';
               $hijos = isset($_POST["hijos"]) ? $_POST["hijos"] : 'No data';
               $estudiosFinalizados =  isset($_POST["estudiosFinalizados"]) ? $_POST["estudiosFinalizados"] : 'No data';
               $venceLicencia =  isset($_POST["venceLicencia"]) ? $_POST["venceLicencia"] : 'No data';
               $vehiculoModelo =  isset($_POST["vehiculoModelo"]) ? $_POST["vehiculoModelo"] : 'No data';
               $ultEmpleoUno =  isset($_POST["ultEmpleoUno"]) ? $_POST["ultEmpleoUno"] : 'No data';
               $fechaInicioEmpleoUno =  isset($_POST["fechaInicioEmpleoUno"]) ? $_POST["fechaInicioEmpleoUno"] : 'No data';
               $fechaFinEmpleoUno =  isset($_POST["fechaFinEmpleoUno"]) ? $_POST["fechaFinEmpleoUno"] : 'No data';
               $ultEmpleoDos =  isset($_POST["ultEmpleoDos"]) ? $_POST["ultEmpleoDos"] : 'No data';
               $fechaInicioEmpleoDos =  isset($_POST["fechaInicioEmpleoDos"]) ? $_POST["fechaInicioEmpleoDos"] : 'No data';
               $fechaFinEmpleoDos =  isset($_POST["fechaFinEmpleoDos"]) ? $_POST["fechaFinEmpleoDos"] : 'No data';
               $ultEmpleoTres =  isset($_POST["ultEmpleoTres"]) ? $_POST["ultEmpleoTres"] : 'No data';
               $fechaInicioEmpleoTres =  isset($_POST["fechaInicioEmpleoTres"]) ? $_POST["fechaInicioEmpleoTres"] : 'No data';
               $fechaFinEmpleoTres =  isset($_POST["fechaFinEmpleoTres"]) ? $_POST["fechaFinEmpleoTres"] : 'No data';
               $antecedentesRestricciones =  isset($_POST["antecedentesRestricciones"]) ? $_POST["antecedentesRestricciones"] : 'No data';
               $observaciones =  isset($_POST["observaciones"]) ? $_POST["observaciones"] : 'No data';
               $tipo =  isset($_POST["tipo"]) ? $_POST["tipo"] : 'No data';
               $hora_solicitud =  isset($_POST["hora_solicitud"]) ? $_POST["hora_solicitud"] : 'No data';
               $idenviado =  isset($_POST["idenviado"]) ? $_POST["idenviado"] : 'No data';

               $user = new Usuario();
               $user->setFechaNacimiento($fechaNacimiento);
               $user->setSeguroDesempleo($seguroDesempleo);
               $user->setSeguroDeseVence($seguroDeseVence);
               $user->setEstadoCivil($estadoCivil);
               $user->setHijos($hijos);
               $user->setEstudiosFinalizados($estudiosFinalizados);
               $user->setVenceLicencia($venceLicencia);
               $user->setVehiculoModelo($vehiculoModelo);
               $user->setUltEmpleoUno($ultEmpleoUno);
               $user->setFechaInicioEmpleoUno($fechaInicioEmpleoUno);
               $user->setFechaFinEmpleoUno($fechaFinEmpleoUno);
               $user->setUltEmpleoDos($ultEmpleoDos);
               $user->setFechaInicioEmpleoDos($fechaInicioEmpleoDos);
               $user->setFechaFinEmpleoDos($fechaFinEmpleoDos);
               $user->setUltEmpleoTres($ultEmpleoTres);
               $user->setFechaInicioEmpleoTres($fechaInicioEmpleoTres);
               $user->setFechaFinEmpleoTres($fechaFinEmpleoTres);
               $user->setAntecedentesRestricciones($antecedentesRestricciones);
               $user->setObservaciones($observaciones);
               $user->setTipo($tipo);
               $user->setHorarioSolicitud($hora_solicitud);
               $user->setIdenviado($idenviado);
               $user->setRequestFinish();
          }
     }

     public function ubication()
     {
          if (isset($_POST['codigoPais'])) {

               $codPais = $_POST['codigoPais'];

               $user = new Usuario();
               $user->setPais($codPais);
               //  $user->obtenerProvincias();

          }
          //   else if (isset($_POST['TipeoInputCp'])){
          //      $cP = $_POST['TipeoInputCp'];
          //      capturarCP($cP,$connection);

          //  } else {
          //      obtenerPais($connection);
          //  }

     }

     public function pais()
     {

          $user = new Usuario();
          $user->getPaisOperativos();
     }

     public function provincia()
     {

          if ($_POST) {

               $codigoPais = $_POST["codigoPais"];
               $user = new Usuario();
               $user->setProvincia($codigoPais);
               $user->getAllProvincias();
          }
     }


     public function cp()
     {

          if ($_POST) {

               $cp = $_POST["TipeoInputCp"];
               $user = new Usuario();
               $user->setCodigoPostal($cp);
               $user->gelAllCp();
          }
     }


     public function validateDocument()
     {
          if ($_POST) {

               if (isset($_POST['identificacion'])) {

                    $identificacionAComprobar = $_POST['identificacion'];
                    $user = new Usuario();
                    $user->setNro_dni($identificacionAComprobar);
                    $user->getDocument();
               }
          }
     }

     public function cantidadNotificaciones()
     {
          if ($_POST) {
               
               $zone = isset($_POST['object']) ? $_POST['object'] : false;
               if ($zone) {
                    $notificaciones = new Usuario();
                    $notificaciones->setPais($zone);
                    
                    $notificaciones = $notificaciones->countNotifications();

                    if (is_object($notificaciones)) {

                         foreach ($notificaciones as $element) {

                              $objeto[] = array(
                                   'result' => '1',
                                   'cantidadNotificacion' => $element["cantidadNotificacion"],
                              );
                         }
                    } else {


                         $objeto[] = array(
                              'result' => '2',
                         );
                    }
                    $jsonstring = json_encode($objeto);
                    echo $jsonstring;
               }
          }
     }

     public function notificaciones()
     {
          $zone = isset($_POST['object']) ? $_POST['object'] : false;
          if ($zone) {

               $notificaciones = new Usuario();
               $notificaciones->setPais($zone);
               $notificaciones = $notificaciones->getAllNotifications();

               if (is_object($notificaciones)) {

                    foreach ($notificaciones as $element) {
                         $objeto[] = array(

                              'result' => '1',
                              'mail' => $element["mail"],
                              'id_user' => $element["id_user"],
                              'name' => $element["first_name"],
                              'rol' => $element["rol"],
                              'tools' => $element["type_request"],
                              'status_process' => $element["status_process"],
                              'province' => $element["province"],
                              'location' => $element["location"],
                              'postal_code' => $element["postal_code"],
                              'status_notifications' => $element["status_notifications"],
                              'date' => $element["motion_data"],
                              'imgPerson' => $element["img_person"]
                         );
                    }
               } else {
                    $objeto[] = array(

                         'result' => '2',
                    );
               }

               $jsonstring = json_encode($objeto);
               echo $jsonstring;
          }
     }

     public function post()
     {

          if ($_GET) {

               $notif_id = isset($_GET['notif_id']) ? $_GET['notif_id'] : false;
               $status  = isset($_GET['sta']) ? $_GET['sta'] : false;

               if ($status === 'nueva') {

                    $notificacion = new Usuario();
                    $notificacion->setIdenviado($notif_id);
                    $notificacion = $notificacion->setStatusNotifications();
               }

               if ($notif_id) {

                    $notificacion = new Usuario();
                    $notificacion->setIdenviado($notif_id);
                    $notificacion->setStatus($status);
                    $notificacion = $notificacion->notificationComplete();

                    require_once 'views/adm/show-notifications.php';
               }
          }
     }

     public function dataUsers()
     {
          if ($_POST) {

               $id = isset($_POST['object']['idnumber']) ? $_POST['object']['idnumber'] : false;
               $key = isset($_POST["key"]) ? $_POST["key"] :  false;


               if ($id || $key) {


                    $getUsers = new Usuario();
                    $getUsers->setIdenviado($id);
                    $getUsers = $getUsers->getUsers();

                    if (is_object($getUsers)) {
                         foreach ($getUsers as $element) {

                              $objeto[] = array(
                                   'result' => '1',

                                   'result' => '1',
                                   'nombre'     => $element['first_name'],
                                   'fechaNac'    => $element['date_of_birth'],
                                   'documento'   => $element['type_document'],
                                   'nroDoc'      => $element['id_number'],
                                   'id_user'      => $element['id_user'],
                                   'id_managent'      => $element['user_managent_id'],
                                   'mailh'      => $element['mail_hash'],
                                   'comoConocio' => $element['knowledge_path'],
                                   'seguroDese' => $element['unemployment_insurance'],
                                   'seguroVence' => $element['insurance_expiration_date'],
                                   'domicilio' => $element['home_address'],
                                   'localidad' => $element['location'],
                                   'telMovil' => $element['phone_number'],
                                   'correo' => $element['mail'],
                                   'tipoVehiculo' => $element['vehicle_type'],
                                   'licencia' => $element['drivers_license'],
                                   'licenciaVence' => $element['drivers_license_expiration'],
                                   'antecedentesRestricciones' => $element['antecedents_or_restrictions'],
                                   'pais' => $element['country'],
                                   'provincia' => $element['province'],
                                   'cp' => $element['postal_code'],
                                   'monotributo' => $element['monotribute'],
                                   'tipoDeSolicitud' => $element['type_request'],
                                   'estado' => $element['status_process'],
                                   'emailStatus' => $element['email_status'],
                                   'status_notifications' => $element['status_notifications'],
                                   'estadoFirma' => $element['status_signed'],
                                   'cbu' => $element['cbu'],
                                   'cuit' => $element['cuit'],
                                   'banco' => $element['bank'],
                                   'signed_date' => $element['signed_date'],
                                   'momento' => $element['motion_data'],
                                   'vehicle_brand' => $element['vehicle_brand'],
                                   'vehicle_model' => $element['vehicle_model'],
                                   'patent' => $element['patent'],
                                   'motivo' => $element['motive'],
                                   'descripcion' => $element['description'],
                                   'tipoUsuario' => $element['rol'],

                              );
                         }
                    } else {
                         $objeto[] = array(
                              'result' => '2',
                         );
                    }
                    $jsonstring = json_encode($objeto);
                    echo $jsonstring;
               }
          }
     }

     public function statusUser()
     {
          if ($_POST) {


               $id = isset($_POST['object']['idnumber']) ? $_POST['object']['idnumber'] : false;
               $receiveEstatus = isset($_POST['object']['stat']) ? $_POST['object']['stat'] : false;
               $id_managent = isset($_POST['object']["id_managent"]) ? $_POST['object']["id_managent"] : false;
               $motivo = isset($_POST['object']["motivo"]) && $_POST['object']["motivo"] !== 'Contrato Express' ? $_POST['object']["motivo"] : '';
               $descripcion = isset($_POST['object']["descripcion"]) ? $_POST['object']["descripcion"] : false;


               if ($id && $receiveEstatus && $id_managent || $motivo) {

                    $status = new Usuario();
                    $status->setIdenviado($id);
                    $status->setUsername($id_managent);
                    $status->setStatus($receiveEstatus);
                    $status->setObservaciones($motivo);
                    $status->setDescripcion($descripcion);
                    $status = $status->setStatusUser();

                    if ($status === 'update') {
                         echo '1';
                    } else if ($status === 'noupdate') {
                         echo '2';
                    } else {
                         echo '3';
                    }
               }
          }
     }

     public function showContract()
     {

          $mailHash = isset($_REQUEST['mh']) ? $_REQUEST['mh'] : false;
          $id_number = isset($_REQUEST['idc']) ? $_REQUEST['idc'] : false;

          if ($mailHash && $id_number) {

             
               $contrato = new Usuario();
               $contrato->setIdenviado($id_number);
               $contrato->setEmail($mailHash);
               $contrato = $contrato->getUsers();

               if (is_object($contrato)) {
                    $contrato = $contrato->fetch_object();
                    // $_SESSION["username"] = $contrato;
                    require_once 'views/trabajo/contract.php';
               } else {


                    header("Location:" . base_url);
               }
          }
     }

     public function signedContract()
     {

          if ($_POST) {

               $identificacion = !empty($_POST['documento']) ? $_POST["documento"] : false;
               $fecha = !empty($_POST["fecha"]) ? $_POST["fecha"] : false;
               $key = !empty($_POST["key"]) ? $_POST["key"] : false;
               $img = !empty($_POST['dataUrl']) ? $_POST["dataUrl"] : false;
               $cuit = !empty($_POST["cuit"]) ? $_POST["cuit"] : false;
               $domicilio = !empty($_POST["domicilio"]) ? $_POST["domicilio"] : false;
               $marca = !empty($_POST["marca"]) ? $_POST["marca"] : false;
               $modelo = !empty($_POST["modelo"]) ? $_POST["modelo"] : false;
               $patente = !empty($_POST["patente"]) ? $_POST["patente"] : false;
               $email = !empty($_POST["email"]) ? $_POST["email"] : false;
               $telefono = !empty($_POST["telefono"]) ? $_POST["telefono"] : false;
               $cbu = !empty($_POST["cbu"]) ? $_POST["cbu"] : false;
               $banco = !empty($_POST["banco"]) ? $_POST["banco"] : false;
               $horarios = isset($_POST["horarios"]) ? $_POST["horarios"] : false;
               $nombre_comercio = isset($_POST["nombre_comercio"]) ? $_POST["nombre_comercio"] : false;
               $cuenta = isset($_POST["cuenta"]) ? $_POST["cuenta"] : false;



               if (
                    $identificacion && $fecha && $img && $cuit && $domicilio || $marca || $modelo || $patente
                    || $email ||  $telefono && $cbu && $banco && $cuenta
               ) {


                    $contrato = new Usuario();
                    $contrato->setNro_dni($identificacion);
                    $contrato->setHorarioSolicitud($fecha);
                    $contrato->setImagenFirma($img);
                    $contrato->setCuit($cuit);
                    $contrato->setDomicilio($domicilio);
                    $contrato->setVehiculoMarca($marca);
                    $contrato->setVehiculoModelo($modelo);
                    $contrato->setPatente($patente);
                    $contrato->setEmail($email);
                    $contrato->setTelefono_celular($telefono);
                    $contrato->setCbu($cbu);
                    $contrato->setBank($banco);
                    isset($_POST["horarios"]) ? $contrato->setHorario_disponible($horarios)  : true;
                    isset($_POST["nombre_comercio"]) ? $contrato->setNombre($nombre_comercio)  : true;
                    $contrato->setTipo($cuenta);
                    $contrato = $contrato->settersSigned();


                    if ($contrato  === 'actualizado') {

                         $_SESSION["signed"] = 'firmado';
                         $objeto[] = array(
                              'result' => '1',
                         );
                    } else if ($contrato  === 'no-actualizado') {

                         $objeto[] = array(
                              'result' => '2',
                         );
                    } else if ($contrato  === 'no-ingreso-firma') {

                         $objeto[] = array(
                              'result' => '3',
                         );
                    }
               } else {

                    $objeto[] = array(
                         'result' => '4',
                    );
               }

               $jsonstring = json_encode($objeto);
               echo $jsonstring;
          }
     }

     public function completeThePhotoRequirements()
     {

          if ($_FILES) {

               $fotoMonotribute = isset($_FILES['fotoMonotribute']) ? $_FILES['fotoMonotribute'] : false;
               $id_user = isset($_POST['id_user']) ? $_POST['id_user'] : false;
               $status = isset($_POST['status_notifications']) ? $_POST['status_notifications'] : false;
               $id_number = isset($_POST['id_number']) ? $_POST['id_number'] : false;

               if ($fotoMonotribute && $id_user && $status && $id_number) {

                    $completeThePhotoRequirements = new Usuario();


                    $file = $_FILES['fotoMonotribute'];
                    $filenameOri = $_FILES['fotoMonotribute']['name'];
                    $separoTipo = explode('.', $filenameOri);
                    $obtengoTipo = end($separoTipo);
                    $filename = $id_number . 'monotributo';
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpeg' || $mimetype == 'imagen/jpg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                         $max_ancho = 1280;
                         $max_alto = 900;

                         $medidasimagen = getimagesize($_FILES['fotoMonotribute']['tmp_name']);


                         //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                         if ($medidasimagen[0] < 1280 && $_FILES['fotoMonotribute']['size'] < 100000) {
                              move_uploaded_file($file["tmp_name"], 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                         } else {

                              $nombrearchivo = $_FILES['fotoMonotribute']['name'];

                              //Redimensionar
                              $rtOriginal = $_FILES['fotoMonotribute']['tmp_name'];

                              if ($_FILES['fotoMonotribute']['type'] == 'image/jpeg') {
                                   $original = imagecreatefromjpeg($rtOriginal);
                              } else if ($_FILES['fotoMonotribute']['type'] == 'image/png') {
                                   $original = imagecreatefrompng($rtOriginal);
                              } else if ($_FILES['fotoMonotribute']['type'] == 'image/gif') {
                                   $original = imagecreatefromgif($rtOriginal);
                              }


                              list($ancho, $alto) = getimagesize($rtOriginal);

                              $x_ratio = $max_ancho / $ancho;
                              $y_ratio = $max_alto / $alto;


                              if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                                   $ancho_final = $ancho;
                                   $alto_final = $alto;
                              } elseif (($x_ratio * $alto) < $max_alto) {
                                   $alto_final = ceil($x_ratio * $alto);
                                   $ancho_final = $max_ancho;
                              } else {
                                   $ancho_final = ceil($y_ratio * $ancho);
                                   $alto_final = $max_alto;
                              }

                              $lienzo = imagecreatetruecolor($ancho_final, $alto_final);

                              imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);

                              //imagedestroy($original);

                              $cal = 8;

                              if ($_FILES['fotoMonotribute']['type'] == 'image/jpeg') {
                                   imagejpeg($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['fotoMonotribute']['type'] == 'image/png') {
                                   imagepng($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              } else if ($_FILES['fotoMonotribute']['type'] == 'image/gif') {
                                   imagegif($lienzo, 'resources/imgRegister/' . $filename . '.' . $obtengoTipo);
                              }
                         }
                         
                         // como viene de php, esta desde el index, por eso es diferente a la ruta que ingreso con las otras(ajax).
                    
                         $ruta = 'resources/imgRegister/' . $filename . '.' . $obtengoTipo;
                         if (file_exists($ruta)) {
                              $completeThePhotoRequirements->setImagenMonotributo($filename . '.' . $obtengoTipo);
                              $completeThePhotoRequirements->setNro_dni($id_number);
                              $completeThePhotoRequirements = $completeThePhotoRequirements->setcompleteThePhotoRequirements();

                              if ($completeThePhotoRequirements === 'update') {
                                   $_SESSION["Img"] = 'success';
                                   header("Location:" . base_url . 'usuario/post&notif_id=' . $id_user . '&sta=' . $status . '');
                              } else if ($completeThePhotoRequirements === 'noupdate') {
                                   $_SESSION["Img"] = 'errorUpdate';
                                   header("Location:" . base_url . 'usuario/post&notif_id=' . $id_user . '&sta=' . $status . '');
                              }
                         } else {
                              $_SESSION["Img"] = 'noExiste';
                              header("Location:" . base_url . 'usuario/post&notif_id=' . $id_user . '&sta=' . $status . '');
                         }
                    } else {
                         $_SESSION["Img"] = 'errorFormato';
                         header("Location:" . base_url . 'usuario/post&notif_id=' . $id_user . '&sta=' . $status . '');
                    }
               } else {
                    header("Location:" . base_url . 'usuario/post&notif_id=' . $id_user . '&sta=' . $status . '');
               }
          }
     }

     public function active()
     {
          unset($_SESSION["username"]);
          header("Location:" . base_url . 'usuario/viewLogin');
     }
}
