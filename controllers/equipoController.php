<?php



if (isset($_GET['equipo'])) {


    session_start();
    require_once '../model/equipos.php';
    require_once '../config/db.php';

    $accion = $_GET['equipo'];
    $usuario = new equipoController();
    $usuario->$accion();
} else {
    require_once 'model/equipos.php';
}

class equipoController
{


    public function gestionar()
    {
        require_once 'views/equipos/panel_recolector.php';
    }
    public function credencial(){
        require_once 'views/equipos/credencial.php';
    }

    public function transaccion()
    {
        if ($_POST) {
            $id_recolector = $_POST['id_recolector'];
            $fechaMomento = $_POST['fechaMomento'];

            $transaccion = new Equipos();
            $transaccion->setId_recolector($id_recolector);
            $transaccion->setFecha_momento($fechaMomento);
            $transaccion = $transaccion->setTransaccion();

            if (is_object($transaccion)) {
                $ordenHash = md5($transaccion->id_orden);

                $objeto = array(
                    'result' => '1',
                    'ordenInt' => $transaccion->id_orden,
                    'ordenHash' => $ordenHash,
                    'fecha_orden' => $transaccion->fecha_orden,
                    'id_recolector' => $transaccion->id_user,
                );
            } else {
                $objeto = array(
                    'result' => '2',
                );
            }

            $jsonstring = json_encode($objeto);
            echo  $jsonstring;
        }
    }

    public function ver()
    {
        if ($_POST) {
            if (!empty($_POST["datoIngresadoABuscar"])) {

                if (!preg_match("/^[-a-zA-Z0-9.]+$/", $_POST["datoIngresadoABuscar"])) {
                    $objeto[] = array(
                        'result' => false,
                    );
                } else {

                    $dataSearch = $_POST["datoIngresadoABuscar"];

                    $ver = new Equipos();
                    $ver->setIdentificacionCliente($dataSearch);

                    $ver = $ver->getAllEquipos();

                    if (is_object($ver)) {

                        if ($ver->num_rows > 0) {

                            while ($equipos = $ver->fetch_object()) {

                            
                                $objeto[] = array(
                                    'result' => true,
                                    'id_equipo' => $equipos->id_equipo,
                                    'identificacion' => $equipos->eidentificacion,
                                    'terminal' => $equipos->terminal,
                                    'tarjeta' => $equipos->etarjeta,
                                    'serie' => $equipos->eserie,
                                    'seriebase' => $equipos->serie_base,
                                    'idd' => $equipos->idd,
                                    'nombreCli' => $equipos->enombre,
                                    'direccion' => $equipos->edireccion,
                                    'localidad' => $equipos->elocalidad,
                                    'provincia' => $equipos->eprovincia,
                                    'cp' => $equipos->ecodigo_postal,
                                    'hdmi' => $equipos->hdmi,
                                    'av' => $equipos->av,
                                    'fuente' => $equipos->fuente,
                                    'control' => $equipos->control,
                                    'estadoEquipo' => $equipos->testado,
                                    'telefono' => $equipos->telefono,
                                    'empresa' => $equipos->empresa,
                                );
                            }
                        } else {

                            $objeto[] = array(
                                'result' => false,
                            );
                        }

                        $jsonstring = json_encode($objeto);
                        echo $jsonstring;
                    } else {

                        $objeto[] = array(
                            'result' => false,
                        );
                        $jsonstring = json_encode($objeto);
                        echo $jsonstring;
                    }
                }
            }
        }
    }

    public function recuperar()
    {

        if ($_POST) {

            $data = $_POST["sendData"];


            if (is_array($data)) {

                $count = count($data);
                $resultado =  false;
                for ($i = 0; $i < $count; $i++) {


                    $estado =  $data[$i]["estado"];
                    $motivoRetiro =  $data[$i]["motivoRetiro"];
                    $accesorioUnoLS =  $data[$i]["accesorioUnoLS"];
                    $accesorioDosLS =  $data[$i]["accesorioDosLS"];
                    $accesorioTresLS =  $data[$i]["accesorioTresLS"];
                    $accesorioCuatroLS =  $data[$i]["accesorioCuatroLS"];
                    $accesorios =  $data[$i]["accesorios"];
                    $id =  $data[$i]["id"];
                    $terminal =  $data[$i]["terminal"];
                    $identificacion =  strtoupper($data[$i]["identificacion"]);
                    $serie =  $data[$i]["serie"];
                    $serie_base =  $data[$i]["serie_base"];
                    $chipAlternativo =  $data[$i]["chipAlternativo"];
                    $tarjeta =  $data[$i]["tarjeta"];
                    $codHash =  $data[$i]["codHash"];
                    $codOrden =  $data[$i]["codOrden"];
                    $codUser =  $data[$i]["codUser"];
                    $dateTime =  $data[$i]["dateTime"];

                    $recuperar = new Equipos();

                    $recuperar->setEstado($estado);
                    $recuperar->setMotivoRetiro($motivoRetiro);
                    $recuperar->setAccesorioUno($accesorioUnoLS);
                    $recuperar->setAccesorioDos($accesorioDosLS);
                    $recuperar->setAccesorioTres($accesorioTresLS);
                    $recuperar->setAccesorioCuatro($accesorioCuatroLS);
                    $recuperar->setAccesorios($accesorios);
                    $recuperar->setGuiaEquipo($id);
                    $recuperar->setTerminal($terminal);
                    $recuperar->setIdentificacionCliente($identificacion);
                    $recuperar->setSerie($serie);
                    $recuperar->setSerie_base($serie_base);
                    $recuperar->setChip_alternativo($chipAlternativo);
                    $recuperar->setTarjeta($tarjeta);
                    $recuperar->setOrdenHash($codHash);
                    $recuperar->setOrden($codOrden);
                    $recuperar->setId_recolector($codUser);
                    $recuperar->setFecha_momento($dateTime);
                    $resultado = $recuperar->setTransito();
                }


                if ($resultado) {
                    echo '1';
                } else {
                    echo '2';
                }
            } else {
                echo "3";
            }
        }
    }

    public function validar()
    {

        if ($_POST) {
            
            $campo  = $_POST["campo"];

            if($campo === '1'){
                $buscar = $_POST["EnviarParaValidar"];
                $validar = new Equipos();
                $validar->setSerie($buscar);
                $validar = $validar->gettersSerieTerminal();

            }else if($campo === '2'){

                $buscar = $_POST["EnviarParaValidar"];
                $validar = new Equipos();
                $validar->setTerminal($buscar);
                $validar = $validar->gettersSerieTerminal();

            }

            
            if ($validar) {

                $objeto[] = array(
                    'result' => 1,
                );
            } else {
                $objeto[] = array(
                    'result' => 2,
                );
            }

            $jsonstring = json_encode($objeto);
            echo $jsonstring;
        }
    }

    public function pais(){
       $pais = new EquiposExtra();
       $pais = $pais->getAllPais();
       
       if(is_object($pais)){
           foreach($pais as $element){

                $objeto[]= array(
                    'result' => '1',
                    'id_country' => $element["id_country"],
                    'country' => $element["country"],
                );
                  
           }

       }else{
        $objeto[]= array(
            'result' => '2',
            
        );
       }
       
       $jsonstring = json_encode($objeto);
       echo $jsonstring;

    }

    public function provincias(){

        if($_POST){

            $id_pais = isset($_POST["idPais"]) ?$_POST["idPais"] :false ;

            if($id_pais){
                $provincia = new EquiposExtra();
                $provincia->setPais($id_pais);
                $provincia = $provincia->getSomeProvincia();

            }
       if(is_object($provincia)){
           foreach($provincia as $element){

                $objeto[]= array(
                    'result' => '1',
                    'id_province' => $element["id_province"],
                    'province' => $element["province"],
                );
                  
           }

       }else{
        $objeto[]= array(
            'result' => '2',
            
        );
       }
       
       $jsonstring = json_encode($objeto);
       echo $jsonstring;


        }
        

    }

    public function localidades(){


        if($_POST){

            $id_provincia = isset($_POST["idProvincia"]) ?$_POST["idProvincia"] :false ;

            if($id_provincia){
                $localidad = new EquiposExtra();
                $localidad->setProvincia($id_provincia);
                $localidad = $localidad->getSomeLocalidad();

            }
            
       if(is_object($localidad)){
           foreach($localidad as $element){

                $objeto[]= array(
                    'result' => '1',
                    'id_locate' => $element["id_locate"],
                    'locate' => $element["locate"],
                    'codigo_postal' => $element["postal_code"],
                );
           }
       }else{
        $objeto[]= array(
            'result' => '2',
        );
       }
       
       $jsonstring = json_encode($objeto);
       echo $jsonstring;
        }
    }

    public function empresa()
    {

        if ($_POST) {

            

            $empresa = $_POST["pedirEmpresas"];
            $listar = new Equipos();
            $listar = $listar->getAllEmpresa();

            if (is_object($listar)) {

                while ($empresas = $listar->fetch_object()) {

                 

                    $objeto[] = array(
                        'empresa' => $empresas->empresa,
                        'id_empresa' => $empresas->id_empresa,
                    );
                }
            } else {
                $objeto[] = array(
                    'result' => false,
                );
            }
        } else {

            $objeto[] = array(
                'result' => false,
            );
        }

        $jsonstring = json_encode($objeto);
        echo $jsonstring;
    }

    public function validateExistID(){
        if($_POST){
            
            $objeto = isset($_POST["objeto"]) ?$_POST["objeto"] :false ;

            if($objeto){

                $validar = new Equipos();
                $validar->setGuiaEquipo($objeto);
               $validar = $validar->gettersValidateID();

               if($validar === 'existe'){

                echo "2";

               }if($validar === 'no-existe'){
                   
               echo "1";
               
               }
            }

        }

    }

    public function validateExistSerie(){

        if($_POST){
            
            $objeto = isset($_POST["objeto"]) ?$_POST["objeto"] :false ;

            if($objeto){
                $validar = new Equipos();
                $validar->setSerie($objeto);
               $validar = $validar->gettersValidateSerieBase();

               if($validar === 'existe'){

                echo "2";

               }if($validar === 'no-existe'){
                   
               echo "1";
               
               }
            }

        }

    }


    public function validateExisTerminal(){

        if($_POST){
            
            $objeto = isset($_POST["objeto"]) ?$_POST["objeto"] :false ;

            if($objeto){
                $validar = new Equipos();
                $validar->setTerminal($objeto);
               $validar = $validar->gettersValidateTerminalBase();

               if($validar === 'existe'){

                echo "2";

               }if($validar === 'no-existe'){
                   
               echo "1";
               
               }
            }

        }
    }

    public function addNewCustomers(){
        if($_POST){

            
              $id_local = isset($_POST["id_local_add"]) ?$_POST["id_local_add"] : false;
              $cartera_add = isset($_POST["cartera_add"]) ?$_POST["cartera_add"] : false;
              
              $identificacion_add = isset($_POST["identificacion_add"]) ?$_POST["identificacion_add"] : false;
              $empresa_add = isset($_POST["empresa_add"]) ? strtoupper($_POST["empresa_add"]) : false ;
              $provincia_add = isset($_POST["provincia_add"]) ?$_POST["provincia_add"] :false ;
              $localidad_add = isset($_POST["localidad_add"]) ?$_POST["localidad_add"] :false ;
              $domicilio_add = isset($_POST["domicilio_add"]) ?$_POST["domicilio_add"] : false;
              $codigo_postal_add = isset($_POST["codigo_postal_add"]) ?$_POST["codigo_postal_add"] :false ;
              $serie_add = isset($_POST["serie_add"]) ?$_POST["serie_add"] :true ;
              $terminal_add = isset($_POST["terminal_add"]) ?$_POST["terminal_add"] : true;
              $sim_add = isset($_POST["sim_add"]) ?$_POST["sim_add"] :true ;
              $nombre_add = isset($_POST["nombre_add"]) ?$_POST["nombre_add"] :false ;
              $email_add = isset($_POST["email_add"]) ?$_POST["email_add"] : false;
              $telefono_add = isset($_POST["telefono_add"]) ? $_POST["telefono_add"]: false;
              $id_user_add = isset($_POST["id_user_add"]) ?$_POST["id_user_add"] :false ;
              $fecha = isset($_POST["fecha"]) ?$_POST["fecha"] :false ;

              $cod_empresa = substr($empresa_add,0,2);

              $reemplazar = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','Y','Z','.'];
              $lastIdentificacion = str_replace($reemplazar,'',$identificacion_add);

              if(!empty($terminal_add)){
                $idd = $terminal_add.'@'.$lastIdentificacion;
              }else{
                $idd = $id_local.'@'.$lastIdentificacion;
        }
              
              
              if($id_local && $empresa_add && $cartera_add && $identificacion_add && $idd && $provincia_add && $localidad_add && $domicilio_add && $codigo_postal_add && $nombre_add && $email_add && $telefono_add && $id_user_add && $fecha){

        
                 $add = new EquiposExtra();
                 $add->setGuiaEquipo($id_local);
                 $add->setEmpresa($empresa_add);
                 $add->setCartera($cartera_add); 
                 $add->setCod($cod_empresa);
                 $add->setIdentificacionCliente($identificacion_add); 
                 $add->setIdd($idd); 
                 $add->setProvincia($provincia_add);
                 $add->setLocalidad($localidad_add);
                 $add->setDireccion($domicilio_add);
                 $add->setCodigoPostal($codigo_postal_add);
                 $add->setSerie($serie_add);
                 $add->setTerminal($terminal_add);
                 $add->setTarjeta($sim_add);
                 $add->setNombre($nombre_add);
                 $add->setEmail($email_add);
                 $add->setTelefonoNuevo($telefono_add);
                 $add->setId_user_update($id_user_add);
                 $add->setFecha_momento($fecha);
                 
                 $add = $add->addNewCustomersInBase();


                 if($add === 'insert'){
                      echo '1';
                 }if($add === 'noinsert'){
                     echo '2';
                 }
              }else{
                  echo '3';
              }
              
        }
    }

    public function modelo()
    {


        if ($_POST) {


            $empresa = $_POST["valor"];
            $listar = new Equipos();
            $listar->setModelo($empresa);
            $listar = $listar->getAllModelo();

            if (is_object($listar)) {

                while ($empresas = $listar->fetch_object()) {

                    $objeto[] = array(
                        'modelo' => $empresas->modelo,
                        'id_empresa' => $empresas->id_empresa,
                    );
                }
            } else {
                $objeto[] = array(
                    'result' => false,
                );
            }
        } else {

            $objeto[] = array(
                'result' => false,
            );
        }

        $jsonstring = json_encode($objeto);
        echo $jsonstring;
    }

    public function cliente()
    {

        if ($_POST) {

            $nombreNuevo = $_POST["nombreNuevoINPUT"];
            $apellidoNuevo = $_POST["apellidoNuevoINPUT"];
            $documentoNuevo = $_POST["documentoNuevoINPUT"];
            $direccionNuevo = $_POST["direccionNuevoINPUT"];
            $provinciaNuevo = $_POST["provinciaNuevoINPUT"];
            $localidadNuevo = $_POST["localidadNuevoINPUT"];
            $codigoPostalNuevo = $_POST["codigoPostalNuevoINPUT"];
            $telefonoNuevo = $_POST["telefonoNuevoINPUT"];
            $emailNuevo = $_POST["emailNuevoINPUT"];
            $empresaNuevo = $_POST["empresaNuevoINPUT"];
            $terminalNuevo = $_POST["terminalNuevoINPUT"];
            $serieNuevo = $_POST["serieNuevoINPUT"];
            $modeloNuevo = $_POST["modeloNuevoINPUT"];
            $motivoNuevo = $_POST["motivoNuevoINPUT"];
            $tipoDocNuevo = $_POST["tipoDocNuevo"];
            $momento =  $_POST["fechaMomento"];
            $recolector =  $_POST["idrec"];
            $tabla = $_POST["tabla"];

            $cliente = new EquiposExtra();
            $cliente->setNombre($nombreNuevo);
            $cliente->setApellido($apellidoNuevo);
            $cliente->setIdentificacionCliente($documentoNuevo);
            $cliente->setDireccion($direccionNuevo);
            $cliente->setProvincia($provinciaNuevo);
            $cliente->setLocalidad($localidadNuevo);
            $cliente->setCodigoPostal($codigoPostalNuevo);
            $cliente->setTelefonoNuevo($telefonoNuevo);
            $cliente->setEmail($emailNuevo);
            $cliente->setEmpresa($empresaNuevo);
            $cliente->setTerminal($terminalNuevo);
            $cliente->setSerie($serieNuevo);
            $cliente->setModelo($modeloNuevo);
            $cliente->setMotivoRetiro($motivoNuevo);
            $cliente->setTipoDocNuevo($tipoDocNuevo);
            $cliente->setFecha_momento($momento);
            $cliente->setId_recolector($recolector);
            $cliente->setTabla($tabla);
            $cliente =  $cliente->addNewCostumer();

            if ($cliente) {
                $objeto[] = array(
                    'result' => true,
                );
            } else {
                $objeto[] = array(
                    'result' => false,
                );
            }

            $jsonstring = json_encode($objeto);
            echo $jsonstring;
        }
    }

    public function firma()
    {

        if ($_POST) {


            $fecha = $_POST['fecha'];
            $idOrdenAComprobar = $_POST["idfirmar"];
            $baseFromJavascript = $_POST['dataUrl'];


            $documento = $_POST["documento"];
            $aclaracion = $_POST["aclaracion"];



            $filepath = '../resources/firmas/' . $fecha . $idOrdenAComprobar . '.png';


            if (!file_exists($filepath)) {
                // no existe la firma, puedes seguir

                $firma = new Equipos();
                $firma->setFecha_momento($fecha);
                $firma->setOrden($idOrdenAComprobar);
                $firma->setImagen($baseFromJavascript);
                $firma->setIdentificacionCliente($documento);
                $firma->setAclaracion($aclaracion);
                $firma = $firma->settersFirma();

                if (!$firma) {

                    $objeto[] = array(
                        'result' => 'failInsert',
                    );
                } else {

                    $objeto[] = array(
                        'result' => true,
                    );
                }
            } else {
                // ya existe un remito con esta firma, deberas, cancelar transaccion, e iniciar nuevamente una transaccion. Gracias! 

                $objeto[] = array(
                    'result' => 'existeFirma',
                );
            }

            $jsonString = json_encode($objeto);
            echo $jsonString;
        }
    }
    public function remito()
    {
        if (isset($_GET["cd"]) && isset($_GET["tp"])) {
            if (!preg_match("/^[0-9A-Za-z]+$/", $_GET["cd"])) {
                echo "Error 404: KFKCWWDFDFW(EX-RE-G);";
            } else {
                $caracteres = array('-', '"', '*', '"\","\\"', '?', '¿', '=', '-');
                $cod = $_GET["cd"];
                $codClean = str_replace($caracteres, '', $cod);

                if ($_GET["tp"] === 'rmkcmmownloqwld') {

                   

                    $remito = new Equipos();
                    $remito->setOrden($codClean);
                    $cliente = $remito->obtainCustomerDataToIssueInvoice();
                    $equipo = $remito->obtainEquipmentDataToIssueInvoice();
                    $firma = $remito->getSignatureData();
                    if ($cliente->num_rows > 0) {
                       
                        $getCliente = $cliente->fetch_object();
                        $idEmpresa = $getCliente->identificacion;
                        $antina = 'AN';
                        $lapos = 'LA';
                        $intv = 'IN';
                        $iplan = 'IP';
                        $metrotel = 'MT';
                        $cablevision = 'CV';
                        $posnet = 'PS';
                        $supercanal = 'SC';
                        $movistar = 'MV';
                        $geocom = 'GC';
                        $cadena = substr($idEmpresa, 0, 2);
                        ($cadena == $antina) ? require_once 'views/remitos/antina.php' : null;
                        ($cadena == $lapos) ? require_once 'views/remitos/lapos.php' : null;
                        ($cadena == $intv) ? require_once 'views/remitos/intv.php' : null;
                        ($cadena === $iplan) ? require_once 'views/remitos/iplan.php' : null;
                        ($cadena == $metrotel) ? require_once 'views/remitos/metrotel.php' : null;
                        ($cadena == $cablevision) ? require_once 'views/remitos/cablevision.php' : null;
                        ($cadena == $supercanal) ? require_once 'views/remitos/supercanal.php' : null;
                        ($cadena == $posnet) ? require_once 'views/remitos/posnet.php' : null;
                        ($cadena == $movistar) ? require_once 'views/remitos/movistar.php' : null;
                        ($cadena == $geocom) ? require_once 'views/remitos/geocom.php' : null;
                    } else {
                        echo "Error 505: KFFDSAFFFW(RE-NO-EXIST) REPORTED ;";
                    }
                }
                else if ($_GET["tp"] === 'okghvmnatrqzopo') {

                  
                    $remito = new Equipos();
                    $remito->setIdentificacionCliente($codClean);
                    $datosCliente = $remito->getDataCustomerOnConsignment();
                    $datosEquipo = $remito->getDataEquipmentOnConsignment();

                    if ($datosCliente->num_rows > 0) {
                        $getCliente = $datosCliente->fetch_object();
                        require_once 'views/remitos/consignacion.php';
                    } else {

                        echo "Error 707: FDASDFDSFW(CON-NO-EXIST) REPORTED ;";
                    }
                }else{
                    header("Location:".base_url.'error');
                }
            }
        }else{
            header("Location:".base_url.'error');
        }
    }

    public function clienteEnBase()
    {

        if ($_POST) {

            $search = isset($_POST["BuscarDato"]) ? $_POST["BuscarDato"] : false;

            $equipos = new Equipos();
            $equipos->setIdentificacionCliente($search);
            $equipos = $equipos->getAllCustomers();
            if (is_object($equipos)) {

                foreach ($equipos as $element) {


                    $objeto[] = array(
                        'result' => '1',
                        'identificacion' => $element["identificacion"],
                        'empresa'  => $element["empresa"],
                        'terminal' => $element["terminal"],
                        'serie' => $element["serie"],
                        'serie_base' => $element["serie_base"],
                        'tarjeta' => $element["tarjeta"],
                        'cableHdmi' => $element["cable_hdmi"],
                        'cableAv' => $element["cable_av"],
                        'fuente' => $element["fuente"],
                        'control' => $element["control_1"],
                        'nombreCliente' => $element["nombre_cliente"],
                        'direccion' => $element["direccion"],
                        'provincia' => $element["provincia"],
                        'localidad' => $element["localidad"],
                        'codigoPostal' => $element["codigo_postal"],
                        'estadoRec' => $element["estado_rec"],
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

    public function transitoRecolectoresYFecha()
    {
        if ($_POST) {


            $recolector = isset($_POST["ReciboReco"]) ? $_POST["ReciboReco"] : false;
            $fechaStart = isset($_POST["ReciboFechaUno"]) ? $_POST["ReciboFechaUno"] : false;
            $fechaEnd = isset($_POST["ReciboFechaDos"]) ? $_POST["ReciboFechaDos"] : false;

            $transito = new Equipos();

            if (!$recolector && $fechaStart && $fechaEnd) {

                $transito->setFechaStart($fechaStart);
                $transito->setFechaEnd($fechaEnd);
                $transito = $transito->getTransitByCollectorAndDate();
            }
            if ($recolector && $fechaStart && $fechaEnd) {

                $transito->setIdentificacionCliente($recolector);
                $transito->setFechaStart($fechaStart);
                $transito->setFechaEnd($fechaEnd);
                $transito = $transito->getTransitByCollectorAndDate();
            }

            if (is_object($transito)) {

                foreach ($transito as $element) {

                    $objeto[] = array(

                        'result' => '1',
                        'identificacion' => $element["identificacion"],
                        'estado' => $element["estado"],
                        'empresa' => $element["empresa"],
                        'terminal' => $element["terminal"],
                        'serie' => $element["serie"],
                        'orden' => $element["id_orden"],
                        'recolector' => $element["id_user"],
                        'serie_base' => $element["serie_base"],
                        'tarjeta' => $element["tarjeta"],
                        'chip_alternativo' => $element["chip_alternativo"],
                        'accesorio_uno' => $element["accesorio_uno"],
                        'accesorio_dos' => $element["accesorio_dos"],
                        'accesorio_tres' => $element["accesorio_tres"],
                        'accesorio_cuatro' => $element["accesorio_cuatro"],
                        'motivo' => $element["motivo"],
                        'fecha' => $element["fecha"],
                        'nombre_cliente' => $element["nombre_cliente"],
                        'direccion' => $element["direccion"],
                        'provincia' => $element["provincia"],
                        'localidad' => $element["localidad"],
                        'codigo_postal' => $element["codigo_postal"],
                        'remito' => $element["id_orden_pass"],
                         'name_recolector' => $element["first_name"]
                         

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

    public function transito()
    {

        if ($_POST) {
            $search = isset($_POST["object"]) ? $_POST["object"] : false;
            $transito = new Equipos();
            $transito->setIdentificacionCliente($search);

            $transito = $transito->getTransit();

            if (is_object($transito)) {

                foreach ($transito as $element) {


                    $objeto[] = array(
 
                        'result' => '1',
                        'identificacion' => $element["identificacion"],
                        'estado' => $element["estado"],
                        'empresa' => $element["empresa"],
                        'terminal' => $element["terminal"],
                        'serie' => $element["serie"],
                        'orden' => $element["id_orden"],
                        'recolector' => $element["id_user"],
                        'serie_base' => $element["serie_base"],
                        'tarjeta' => $element["tarjeta"],
                        'chip_alternativo' => $element["chip_alternativo"],
                        'accesorio_uno' => $element["accesorio_uno"],
                        'accesorio_dos' => $element["accesorio_dos"],
                        'accesorio_tres' => $element["accesorio_tres"],
                        'accesorio_cuatro' => $element["accesorio_cuatro"],
                        'motivo' => $element["motivo"],
                        'fecha' => $element["fecha"],
                        'nombre_cliente' => $element["nombre_cliente"],
                        'direccion' => $element["direccion"],
                        'provincia' => $element["provincia"],
                        'localidad' => $element["localidad"],
                        'codigo_postal' => $element["codigo_postal"],
                        'remito' => $element["id_orden_pass"],
                        'id_transito' => $element["id_transito"],
                        'telefono' => $element["telefono2"],
                        'name_recolector' => $element["first_name"]

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

    public function countStatusCustomer()
    {
        if ($_POST) {

            $identificacion = isset($_POST["object"]) ? $_POST["object"] : false;


            if ($identificacion) {

                $status = new Equipos();
                $status->setIdentificacionCliente($identificacion);
                $status = $status->getStatusCustomer();
                if (is_object($status)) {

                    foreach ($status as $element) {
                        $objeto[] = array(
                            'result' => 'count',
                            'estado' => $element["estado"],
                            'cantidadEstado' => $element["cantidadEstado"],
                        );
                    }
                } else {
                    $objeto[] = array(
                        'result' => '2',
                    );
                }

                $jsonstring = json_encode($objeto);
                echo  $jsonstring;
            }
        }
    }

    public function countStatusTransit()
    {

        if ($_POST) {
           

            $recolector = isset($_POST["object"]) ? $_POST["object"] : false;
            $fechaStart = isset($_POST["ReciboFechaUno"]) ? $_POST["ReciboFechaUno"] : false;
            $fechaEnd = isset($_POST["ReciboFechaDos"]) ? $_POST["ReciboFechaDos"] : false;

            $status = new Equipos();
            if (!$recolector && $fechaStart &&  $fechaEnd) {
                $status->setFechaStart($fechaStart);
                $status->setFechaEnd($fechaEnd);
                $status = $status->getCountEstadoTransito();
                 
            }
            if ($recolector && $fechaStart &&  $fechaEnd) {
                $status->setId_recolector($recolector);
                $status->setFechaStart($fechaStart);
                $status->setFechaEnd($fechaEnd);
                $status = $status->getCountEstadoTransito();
                
            }

            if (is_object($status)) {
                foreach ($status as $element) {

                    $objeto[] = array(
                        'result' => 'count',
                        'estado' => $element["estado"],
                        'cantidadEstado' => $element["cantidadEstado"],
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


    public function informeRecolectoresYFecha()
    {

        if ($_POST) {

            $recolector = isset($_POST["recolector"]) ?  $_POST["recolector"] : false;
            $fechaStart = isset($_POST["fechaStart"]) ?  $_POST["fechaStart"] : false;
            $fechaEnd = isset($_POST["fechaEnd"]) ?  $_POST["fechaEnd"] : false;

            $informe = new Equipos();

            if ($recolector && $fechaStart && $fechaEnd) {

                $informe->setId_recolector($recolector);
                $informe->setFechaStart($fechaStart);
                $informe->setFechaEnd($fechaEnd);
                $informe = $informe->getReportTransit();
            }
            if(!$recolector && $fechaStart && $fechaEnd){

                $informe->setFechaStart($fechaStart);
                $informe->setFechaEnd($fechaEnd);
                $informe = $informe->getReportTransit();
                
            }

            if (is_object($informe)) {

                foreach ($informe as $element) {

                    $objeto[] = array(
                        'result' => '1',
                        'provincia' => $element["provincia"],
                        'localidad' => $element["localidad"],
                        'codigo_postal' => $element["codigo_postal"],
                        'recuperado' => $element["recuperado"],
                        'a_confirmar' => $element["autorizar"],
                        'no_tuvo_equipo' => $element["no-tuvo-equipo"],
                        'no_coincide_serie' => $element["no-coincide-serie"],
                        'rechazada' => $element["rechazada"],
                        'en_uso' => $element["en-uso"],
                        'n_tel_equivocado' => $element["n/tel-equivocado"],
                        'no_existe_numero' => $element["no-existe-numero"],
                        'no_responde' => $element["no-responde"],
                        'tiempo_espera' => $element["tiempo-espera"],
                        'se_mudo' => $element["se-mudo"],
                        'ya_retirado' => $element["ya-retirado"],
                        'zona_peligrosa' => $element["zona-peligrosa"],
                        'deshabitado' => $element["deshabitado"],
                        'extraviado' => $element["extraviado"],
                        'fallecio' => $element["fallecio"],
                        'faltan_datos' => $element["faltan-datos"],
                        'reconectado' => $element["reconectado"],
                        'robado' => $element["robado"],
                        'entrego_en_sucursal' => $element["entrego-en-sucursal"],
                        'posnet' => $element["posnet"],
                        'antina' => $element["antina"],
                        'intv' => $element["intv"],
                        'iplan' => $element["iplan"],
                        'metrotel' => $element["metrotel"],
                        'lapos' => $element["lapos"],
                        'cablevision' => $element["cablevision"],
                        'cablevision_uruguay' => $element["cablevision uruguay"],
                        'total' => $element["total"],
                        
                    );
                  }
                }else {
                    $objeto[] = array(
                        'result' => '2',
                    );  
                }

                $jsonstring = json_encode($objeto);
                echo $jsonstring;

        }
    }

    public function modifyTransito()
    {

        if ($_POST) {


            $id_guia_equipo = isset($_POST["id_guia_equipo"]) ? $_POST["id_guia_equipo"] : false;
            $terminal = isset($_POST["terminal"]) ? $_POST["terminal"] : false;
            $serie = isset($_POST["serie"]) ? $_POST["serie"] : false;
            $accesorioUno =  isset($_POST["accesorioUno"]) ? $_POST["accesorioUno"] : false;
            $accesorioDos =  isset($_POST["accesorioDos"]) ? $_POST["accesorioDos"] : false;
            $accesorioTres =  isset($_POST["accesorioTres"]) ? $_POST["accesorioTres"] : false;
            $accesorioCuatro =  isset($_POST["accesorioCuatro"]) ? $_POST["accesorioCuatro"] : false;
            $estado = isset($_POST["estado"]) ? $_POST["estado"] : false;
            $id_user_update = isset($_POST["id_user_update"]) ? $_POST["id_user_update"] : false;
            $fecha_update  = isset($_POST["fecha_update"]) ? $_POST["fecha_update"] : false;

            if (
                $id_guia_equipo &&  $id_user_update && $fecha_update && !$terminal && !$serie && !$accesorioUno && !$accesorioDos &&
                !$accesorioTres && !$accesorioCuatro && !$estado
            ) {


                $modify = new Equipos();
                $modify->setGuiaEquipo($id_guia_equipo);
                $modify->setId_user_update($id_user_update);
                $modify->setFecha_momento($fecha_update);
                $modify = $modify->setEquipment();
                if (!$modify) {
                    $objeto[] = array(
                        'result' => '2',
                    );
                } else {
                    $objeto[] = array(
                        'result' => '1',
                    );
                }
            } else if (
                $id_guia_equipo &&  $id_user_update && $fecha_update && $accesorioUno && $accesorioDos &&
                $accesorioTres && $accesorioCuatro && $estado
            ) {

                $modify = new Equipos();
                $modify->setGuiaEquipo($id_guia_equipo);
                $modify->setId_user_update($id_user_update);
                $modify->setFecha_momento($fecha_update);
                $modify->setTerminal($terminal);
                $modify->setSerie($serie);
                $modify->setAccesorioUno($accesorioUno);
                $modify->setAccesorioDos($accesorioDos);
                $modify->setAccesorioTres($accesorioTres);
                $modify->setAccesorioCuatro($accesorioCuatro);
                $modify->setEstado($estado);
                $modify = $modify->setEquipment();

                if (!$modify) {
                    $objeto[] = array(
                        'result' => '2',
                    );
                } else {
                    $objeto[] = array(
                        'result' => '1',
                    );
                }
            }

            $jsonstring = json_encode($objeto);
            echo $jsonstring;
        }
    }

    public function gestionRecolectores(){
        if($_POST){
            $fechaStart= isset($_POST["fechaStart"]) ? $_POST["fechaStart"]: false ;
            $fechaEnd= isset($_POST["fechaEnd"]) ? $_POST["fechaEnd"]: false ;

            if($fechaStart && $fechaEnd){

                $recolectores = new Equipos();
                $recolectores->setFechaStart($fechaStart);
                $recolectores->setFechaEnd($fechaEnd);
                $recolectores = $recolectores->getReportAllCollector();

                if(is_object($recolectores)){
                
                    foreach($recolectores as $element){

                        $objeto[]=array(
                          'result' => '1',
                          'recolector' => $element["recolector"],
                          'recuperado' => $element["recuperado"],
                          'a_confirmar' => $element["autorizar"],
                          'no_tuvo_equipo' => $element["no-tuvo-equipo"],
                          'no_coincide_serie' => $element["no-coincide-serie"],
                          'rechazada' => $element["rechazada"],
                          'en_uso' => $element["en-uso"],
                          'n_tel_equivocado' => $element["n/tel-equivocado"],
                          'no_existe_numero' => $element["no-existe-numero"],
                          'no_responde' => $element["no-responde"],
                          'tiempo_espera' => $element["tiempo-espera"],
                          'se_mudo' => $element["se-mudo"],
                          'ya_retirado' => $element["ya-retirado"],
                          'zona_peligrosa' => $element["zona-peligrosa"],
                          'deshabitado' => $element["deshabitado"],
                          'extraviado' => $element["extraviado"],
                          'fallecio' => $element["fallecio"],
                          'faltan_datos' => $element["faltan-datos"],
                          'reconectado' => $element["reconectado"],
                          'robado' => $element["robado"],
                          'entrego_en_sucursal' => $element["entrego-en-sucursal"],
                          'posnet' => $element["posnet"],
                          'antina' => $element["antina"],
                          'intv' => $element["intv"],
                          'iplan' => $element["iplan"],
                          'metrotel' => $element["metrotel"],
                          'lapos' => $element["lapos"],
                          'cablevision' => $element["cablevision"],
                          'cablevision_uruguay' => $element["cablevision_uruguay"],
                          'total_recuperados' => $element["total_recuperados"],
                          'total_gestionados' => $element["total_gestionados"],
                          'name_recolector' => $element["first_name"],

                        );
                    }

                }else{
                    $objeto[]=array(
                        'result' => '2',
                    );
                }

                $jsonstring = json_encode($objeto);
                echo $jsonstring;
            }
        }
    }

    public function saveDataCustomer(){
        if($_POST){

            $id_user = isset($_POST['id_user']) ? $_POST['id_user'] : false ;
            $id_orden = isset($_POST['id_orden']) ? $_POST['id_orden'] : false ;
            $identificacion = isset($_POST['identificacion']) ? $_POST['identificacion'] : false ;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false ;
            $mail = isset($_POST['mail']) ? $_POST['mail'] : false ;
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : date('d-m-y');
            $elemento = isset($_POST['elemento']) ? $_POST['elemento'] : false ;

            if($id_user && $id_orden && $identificacion || $telefono || $mail){

                $saveData = new EquiposExtra();
                $saveData->setId_recolector($id_user);
                $saveData->setOrden($id_orden);
                $saveData->setIdentificacionCliente($identificacion);
                $saveData->setTelefonoNuevo($telefono);
                $saveData->setEmail($mail);
                $saveData->setFecha_momento($fecha);
                $saveData->setElemento($elemento);
                $saveData = $saveData->saveDataCustomer();

            }

        }
    }
}
