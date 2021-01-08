<?php

class Equipos
{

    protected $id_recolector;
    protected $id_user_update;
    protected $orden;
    protected $ordenHash;
    protected $cartera;
    protected $identificacionCliente;
    protected $idd;
    protected $guia_equipo;
    protected $terminal;
    protected $serie;
    protected $serie_base;
    protected $chip_alternativo;
    protected $tarjeta;
    protected $estado;
    protected $motivoRetiro;
    protected $accesorioUno;
    protected $accesorioDos;
    protected $accesorioTres;
    protected $accesorioCuatro;
    protected $accesorios;
    protected $empresa;
    protected $modelo;
    protected $fecha_momento;
    protected $aclaracion;
    protected $imagen;
    protected $fechaStart;
    protected $fechaEnd;

    public function __construct()
    {

        $this->db = Database::connect();
    }

    public function getId_recolector()
    {
        return $this->id_recolector;
    }
    public function getId_user_update()
    {
        return $this->id_user_update;
    }
    public function getOrden()
    {
        return $this->orden;
    }

    public function getOrdenHash()
    {
        return $this->ordenHash;
    }

    public function getCartera()
    {
        return $this->cartera;
    }

    public function getIdentificacionCliente()
    {
        return $this->identificacionCliente;
    }
    public function getIdd()
    {
        return $this->idd;
    }

    public function getGuiaEquipo()
    {
        return $this->guia_equipo;
    }

    public function getTerminal()
    {
        return $this->terminal;
    }

    public function getSerie()
    {
        return $this->serie;
    }

    public function getSerie_base()
    {
        return $this->serie_base;
    }

    public function getChip_alternativo()
    {
        return $this->chip_alternativo;
    }

    public function getTarjeta()
    {
        return $this->tarjeta;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getMotivoRetiro()
    {
        return $this->motivoRetiro;
    }

    public function getAccesorioUno()
    {
        return $this->accesorioUno;
    }

    public function getAccesorioDos()
    {
        return $this->accesorioDos;
    }

    public function getAccesorioTres()
    {
        return $this->accesorioTres;
    }

    public function getAccesorioCuatro()
    {
        return $this->accesorioCuatro;
    }

    public function getAccesorios()
    {
        return $this->accesorios;
    }

    public function getEmpresa()
    {
        return $this->empresa;
    }
    public function getModelo()
    {
        return $this->modelo;
    }

    public function getFecha_momento()
    {
        return $this->fecha_momento;
    }

    public function getAclaracion()
    {
        return $this->aclaracion;
    }
    public function getImagen()
    {
        return $this->imagen;
    }

    public function getEmail()
    {
        return $this->email;
    }
   

    public function getfechaStart()
    {
        return $this->fechaStart;
    }
    public function getfechaEnd()
    {
        return $this->fechaEnd;
    }



    public function setId_recolector($id_recolector)
    {
        $this->id_recolector = $this->db->real_escape_string($id_recolector);
    }

    public function setId_user_update($id_user_update)
    {
        $this->id_user_update = $this->db->real_escape_string($id_user_update);
    }


    public function setOrden($orden)
    {
        $this->orden = $this->db->real_escape_string($orden);
    }
    public function setOrdenHash($ordenHash)
    {
        $this->ordenHash = $ordenHash;
    }
    public function setCartera($cartera)
    {
        $this->cartera = $this->db->real_escape_string($cartera);
    }
    public function setIdentificacionCliente($identificacionCliente)
    {
        $this->identificacionCliente = $this->db->real_escape_string($identificacionCliente);
    }
    public function setIdd($idd)
    {
        $this->idd = $this->db->real_escape_string($idd);
    }


    public function setGuiaEquipo($guia_equipo)
    {
        $this->guia_equipo = $guia_equipo;
    }

    public function setTerminal($terminal)
    {
        $this->terminal = $this->db->real_escape_string($terminal);
    }
    public function setSerie($serie)
    {
        $this->serie = $this->db->real_escape_string($serie);
    }
    public function setSerie_base($serie_base)
    {
        $this->serie_base = $this->db->real_escape_string($serie_base);
    }
    public function setChip_alternativo($chip_alternativo)
    {
        $this->chip_alternativo = $this->db->real_escape_string($chip_alternativo);
    }
    public function setTarjeta($tarjeta)
    {
        $this->tarjeta = $this->db->real_escape_string($tarjeta);
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setMotivoRetiro($motivoRetiro)
    {
        $this->motivoRetiro = $motivoRetiro;
    }
    public function setAccesorioUno($accesorioUno)
    {
        $this->accesorioUno = $accesorioUno;
    }
    public function setAccesorioDos($accesorioDos)
    {
        $this->accesorioDos = $accesorioDos;
    }
    public function setAccesorioTres($accesorioTres)
    {
        $this->accesorioTres = $accesorioTres;
    }
    public function setAccesorioCuatro($accesorioCuatro)
    {
        $this->accesorioCuatro = $accesorioCuatro;
    }
    public function setAccesorios($accesorios)
    {
        $this->accesorios = $this->db->real_escape_string($accesorios);
    }
    public function setEmpresa($empresa)
    {
        $this->empresa = $this->db->real_escape_string($empresa);
    }

    public function setModelo($modelo)
    {
        $this->modelo = $this->db->real_escape_string($modelo);
    }
    public function setFecha_momento($fecha_momento)
    {
        $this->fecha_momento = $fecha_momento;
    }
    public function setAclaracion($aclaracion)
    {
        $this->aclaracion = $aclaracion;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }
   

    public function setFechaStart($fechaStart)
    {
        $this->fechaStart = $this->db->real_escape_string($fechaStart);
    }
    public function setFechaEnd($fechaEnd)
    {
        $this->fechaEnd = $this->db->real_escape_string($fechaEnd);
    }



  //Metodos ::::::::::::::::



    public function setTransaccion()
    {


        $sql = "INSERT INTO ordenes (id_user,fecha_orden) VALUES ('{$this->getId_recolector()}','{$this->getFecha_momento()}')";

       
        $result = $this->db->query($sql);

        if ($result) {

            $orden = $this->getOneTransaccion($this->getId_recolector());
        }

        return $orden;
    }


    public function setTransito()
    {


        $sql = "INSERT INTO  transito (id_equipo,id_orden_pass,id_orden,id_user,identificacion,terminal,
            serie,serie_base,tarjeta,chip_alternativo,accesorio_uno,accesorio_dos,accesorio_tres,
            accesorio_cuatro,estado,motivo,fecha,accesorios,status_transito) values ('{$this->getGuiaEquipo()}','{$this->getOrdenHash()}','{$this->getOrden()}','{$this->getId_recolector()}','{$this->getIdentificacionCliente()}','{$this->getTerminal()}','{$this->getSerie()}','{$this->getSerie_base()}','{$this->getTarjeta()}','{$this->getChip_alternativo()}','{$this->getAccesorioUno()}','{$this->getAccesorioDos()}','{$this->getAccesorioTres()}','{$this->getAccesorioCuatro()}','{$this->getEstado()}','{$this->getMotivoRetiro()}','{$this->getFecha_momento()}','{$this->getAccesorios()}','transito');";

            
        $equipos = $this->db->query($sql);

        $result =  false;
        if ($equipos) {

            if ($this->getCurrentId($this->getGuiaEquipo())) {

                $this->updateCurrentClientStatus($this->getEstado(), $this->getFecha_momento(), $this->getGuiaEquipo());
            }

            $result = true;
        }
        return $result;
    }

    private function getCurrentId($string)
    {

        $result = false;
        $sql = "SELECT id_equipo, estado_rec FROM express where id_equipo='{$this->getGuiaEquipo()}'";
        $ejecutar = $this->db->query($sql);

        if ($ejecutar && $ejecutar->num_rows > 0) {

            $result = true;
        } else {

            $result = false;
        }

        return $result;
    }

    private function updateCurrentClientStatus($estado, $fecha, $idGuia)
    {
    if($estado !== 'AUTORIZAR'){

        $sql = "UPDATE express set estado_rec='$estado', horario_rec='$fecha' where id_equipo=$idGuia";
        $ejecutar = $this->db->query($sql);
        }
    }

    public function getAllEquipos()
    {
        if($_POST){

        $sql = "SELECT e.id_equipo as 'id_equipo', e.identificacion as 'eidentificacion', e.terminal AS 'terminal',
                e.tarjeta AS 'etarjeta',e.serie as 'eserie', e.idd as 'idd',
                e.serie_base as 'serie_base', e.nombre_cliente AS 'enombre',e.direccion AS 'edireccion',
                e.localidad AS 'elocalidad', e.provincia AS 'eprovincia', e.codigo_postal AS 'ecodigo_postal' , 
                e.cable_hdmi as 'hdmi', e.cable_av as 'av', e.fuente as 'fuente', e.control_1 as 'control', 
                t.estado AS 'testado',
                e.telefono1 as 'telefono', e.empresa  FROM express e
    
            LEFT JOIN transito t ON t.id_transito = e.id_equipo
            WHERE e.identificacion ='{$this->getIdentificacionCliente()}' OR e.serie ='{$this->getIdentificacionCliente()}' OR e.terminal ='{$this->getIdentificacionCliente()}' GROUP BY e.id_equipo ;";
             
        $result = $this->db->query($sql);
        return $result;
        
        }
    }

    private function getOneTransaccion($string)
    {

        $sql = "SELECT id_orden,fecha_orden,id_user from ordenes where id_user='$string' ORDER BY id_orden DESC LIMIT 1";

       
        $result = $this->db->query($sql);

        if ($result && $result->num_rows === 1) {

            $orden = $result->fetch_object();
        }

        return $orden;
    }


    public function getAllEmpresa()
    {

        $sql = "SELECT empresa,id_empresa FROM empresas";
        $modelos = $this->db->query($sql);
        $result = false;

        if ($modelos->num_rows > 0) {

            $result = $modelos;
        } else {
            $result = false;
        }

        return $result;
    }


    public function getAllModelo()
    {


        $sql = "SELECT modelo,id_empresa,id_empresa from modelos_equipos where id_empresa='{$this->getModelo()}'";
        
        $modelos = $this->db->query($sql);
        $result = false;

        if ($modelos->num_rows > 0) {

            $result = $modelos;
        } else {
            $result = false;
        }

        return $result;
    }

    public function gettersSerieTerminal()
    {

        $terminal = !empty($this->getTerminal()) ? $this->getTerminal() : false ;
        $serie = !empty($this->getSerie()) ? $this->getSerie() : false ;
            
        $equipo = false;
        if($terminal){

            $sql = "SELECT terminal FROM transito where terminal='$terminal'";

        }else if ($serie){

            $sql = "SELECT serie FROM transito where serie='$serie'";
        }     

        $result = $this->db->query($sql);

        if ($result) {

            if ($result->num_rows > 0) {

                $equipo = false;
            } else {
                $equipo = true;
            }
        }

        return $equipo;
    }


    public function gettersValidateID(){

        $id_local =  !empty($this->getGuiaEquipo()) ?$this->getGuiaEquipo() : false;
        if($id_local){
            $result = false;
            $sql = "SELECT id_local from express where id_local='$id_local'";
           
            $validar = $this->db->query($sql);
            if($validar && $validar->num_rows>0){
              $result= 'existe';
            }else{
                $result= 'no-existe';
            }
            return $result;
        }

    }

    public function gettersValidateSerieBase(){
        $serie =  !empty($this->getSerie()) ?$this->getSerie() : false;
        if($serie){
            $result = false;
            $sql = "SELECT serie from express where serie='$serie'";
           
            $validar = $this->db->query($sql);
            if($validar && $validar->num_rows>0){
              $result= 'existe';
            }else{
                $result= 'no-existe';
            }
            return $result;
        }
    }

    public function gettersValidateTerminalBase(){


        $terminal =  !empty($this->getTerminal()) ?$this->getTerminal() : false;
        if($terminal){
            $result = false;
            $sql = "SELECT terminal from express where terminal='$terminal'";
           
           
            $validar = $this->db->query($sql);
            if($validar && $validar->num_rows>0){
              $result= 'existe';
            }else{
                $result= 'no-existe';
            }
            return $result;
        }

    }

    public function settersFirma()
    {

            $sentinelaFirma = false;

            if ($_POST) {
                // Nuestro base64 contiene un esquema Data URI (data:image/png;base64,)
                // que necesitamos remover para poder guardar nuestra imagen
                // Usa explode para dividir la cadena de texto en la , (coma)
                $base_to_php = explode(',', $this->getImagen());

                // El segundo item del array base_to_php contiene la información que necesitamos (base64 plano)
                // y usar base64_decode para obtener la información binaria de la imagen
                $data = base64_decode($base_to_php[1]); // BBBFBfj42Pj4....

                // Proporciona una locación a la nueva imagen (con el nombre y formato especifico)
                $filepath = '../resources/firmas/' . $this->getFecha_momento().$this->getOrden().'.png'; // or image.jpg

                // Finalmente guarda la imágen en el directorio especificado y con la informacion dada
                $guardarimagen = file_put_contents($filepath, $data, FILE_APPEND);


                if ($guardarimagen) {

                    $nombre_fichero = '../resources/firmas/' . $this->getFecha_momento() . $this->getOrden() . '.png';

                    if (file_exists($nombre_fichero)) {

                        $firma = $this->setfirma($this->getOrden(), $this->getFecha_momento(), $this->getAclaracion(), $this->getIdentificacionCliente());


                        if (!$firma) {
                            $sentinelaFirma = false;
                        } else {
                            $sentinelaFirma = true;
                        }
                    }
                }
            }
            return $sentinelaFirma;
    }

    private function setfirma($orden, $fecha, $aclaracion, $documento)
    {

            $result = false;
            $sql = "INSERT INTO firmas VALUES(NULL,'$orden','$fecha','$aclaracion','$documento',null)";
            
            $firma = $this->db->query($sql);

            if ($firma) {
                $result = true;
            } else {
                $result = false;
            }
            return  $result;
    }

    public function obtainCustomerDataToIssueInvoice()
    {
          
        $sql= "SELECT e.emailcliente AS 'email',e.identificacion as 'identificacion', e.nombre_cliente as 'nombre', e.direccion as 'direccion', e.provincia as 'provincia', e.localidad as 'localidad',
        e.codigo_postal as 'codigo_postal',e.telefono1 AS 'telefono1', t.id_orden_pass as 'id_orden_pass', t.id_orden as 'orden', t.estado as 'estado', t.motivo as 'motivo',
         t.fecha as 'horario_rec', t.id_user as 'id_user'
        from transito t 
        left join express e on e.identificacion = t.identificacion 
        where t.estado IN('RECUPERADO','AUTORIZAR') AND t.id_orden_pass = '{$this->getOrden()}'
        GROUP BY t.id_transito ;";
        

    
        $result = $this->db->query($sql);

          return $result;
    }

    public function obtainEquipmentDataToIssueInvoice()
    {
        $sql = "SELECT e.equipo as 'equipo', e.tipo as 'tipo', t.terminal as 'terminal', t.serie as 'serie', t.serie_base as 'serie_base', t.tarjeta as 'tarjeta', t.chip_alternativo
        as 'sim_alternativo',t.accesorio_uno as 'accesorio_uno', t.accesorio_dos as 'accesorio_dos',t.accesorio_tres 
        as 'accesorio_tres', t.accesorio_cuatro as 'accesorio_cuatro', t.estado as 'estado', t.motivo as 'motivo',
        t.fecha as 'fecha',t.accesorios as 'accesorios'
          from transito t
          left join express e on e.identificacion= t.identificacion
          where t.estado IN('RECUPERADO','AUTORIZAR') AND t.id_orden_pass = '{$this->getOrden()}'
          GROUP BY id_transito ;";
          $result = $this->db->query($sql);

          return $result;
    }

    public function getSignatureData()
    {
        $sql ="SELECT f.pass_id AS 'orden_general', f.fecha_firma as 'fecha_general', f.aclaracion,
        f.documento from firmas f 
        left join transito t on t.id_orden_pass = f.pass_id 
        WHERE f.pass_id='{$this->getOrden()}'
        GROUP BY f.pass_id;";
       
         $result = $this->db->query($sql);
        
        return $result;
  
    }

    public function getDataCustomerOnConsignment()
    {

                    $sql = "SELECT documento,numero_documento ,nombre,apellido,direccion,provincia,localidad,
                    codigo_postal,telefono,email,
                    empresa,fecha_solicitud,id_user from clientes_consignacion 
                    where numero_documento = '{$this->getIdentificacionCliente()}'";
                    $result = $this->db->query($sql);
                    return $result;
                    
    }
            
    public function getDataEquipmentOnConsignment(){
                $sql = "SELECT terminal,serie,modelo,motivo_solicitud,fecha_solicitud from clientes_consignacion where numero_documento ='{$this->getIdentificacionCliente()}'";
               
                $result = $this->db->query($sql);
                return $result;
        
    }

    public function getAllCustomers(){

                if($_POST){
                     
                $result = false;
                $sql = "SELECT empresa,identificacion,terminal,serie_base,serie,tarjeta,order_rec,emailcliente,horario_rec,estado_rec,localidad,
                provincia,codigo_postal,direccion,id_orden_pass,nombre_cliente,cable_hdmi,cable_av,fuente,control_1,id_user
                FROM express where identificacion='{$this->getIdentificacionCliente()}' or serie='{$this->getIdentificacionCliente()}' OR tarjeta='{$this->getIdentificacionCliente()}' OR terminal='{$this->getIdentificacionCliente()}' ORDER BY horario_rec DESC";

                 $equipos = $this->db->query($sql);
        
                 if($equipos->num_rows>0){
                    $result = $equipos;
                 }else{
                     $result = false;
                 }
                 return $result;
        
                }
        
    }


    public function getTransit(){

                if($_POST){
                    $result = false;
                    $sql = "SELECT t.id_transito,t.id_orden_pass, t.id_orden, t.id_user, t.terminal, t.serie, t.serie_base,t.tarjeta,
                    t.chip_alternativo,t.accesorio_uno, t.accesorio_dos, t.accesorio_tres,t.accesorio_cuatro,t.estado, 
                    t.motivo,t.fecha,e.identificacion,e.nombre_cliente, e.direccion, e.provincia, e.localidad, e.empresa, 
                    e.codigo_postal,e.telefono2,u.first_name from transito t inner join express e on e.identificacion = t.identificacion
                    LEFT JOIN users u ON u.id_user = t.id_user 
                    WHERE t.status_transito !='OUT' AND  t.identificacion= '{$this->getIdentificacionCliente()}' OR t.terminal= '{$this->getIdentificacionCliente()}' OR t.serie= '{$this->getIdentificacionCliente()}'  GROUP BY t.id_transito;";
                    
       
                    $transito = $this->db->query($sql);
        
        
                    if($transito && $transito->num_rows>0){
                    
                        $result=$transito;
                    }
                    return $result;
        
                    
                }
    } 

    public function getTransitByCollectorAndDate(){

                if($_POST){
                
                $recolector = ($this->getIdentificacionCliente())?$this->getIdentificacionCliente() : false ;
                $fechaStart = ($this->getfechaStart())?$this->getfechaStart() : false ;
                $fechaEnd = ($this->getfechaEnd())?$this->getfechaEnd() : false ;
                    
                    $result = false;
                    $sql ="";
                    $sql.= "SELECT t.id_orden_pass, t.id_orden, t.id_user, t.terminal, t.serie,
                    t.serie_base,t.tarjeta,t.chip_alternativo,t.accesorio_uno,t.accesorio_dos,
                    t.accesorio_tres,t.accesorio_cuatro,t.estado,t.motivo,t.fecha,e.empresa,e.identificacion,e.nombre_cliente,e.direccion, e.provincia, e.localidad, e.codigo_postal ,u.first_name ";
                    $sql.= "from transito t inner join express e on e.identificacion = t.identificacion left join users u ON u.id_user = t.id_user ";  
                    $sql.="WHERE t.estado IN('RECUPERADO','AUTORIZAR','NO-TUVO-EQUIPO','NO-COINCIDE-SERIE','RECHAZADA','EN-USO','N/TEL-EQUIVOCADO','NO-EXISTE-NUMERO','NO-RESPONDE','TIEMPO-ESPERA','SE-MUDO','YA-RETIRADO','ZONA-PELIGROSA','DESHABITADO','EXTRAVIADO','FALLECIO','FALTAN-DATOS','RECONECTADO','ROBADO','ENTREGO-EN-SUCURSAL') and t.status_transito='transito' ";

                    if( $recolector && $fechaStart && $fechaEnd){
                        $sql.="and t.id_user = '{$this->getIdentificacionCliente()}' and t.fecha >= '{$this->getFechaStart()}' AND t.fecha <= '{$this->getFechaEnd()}%' GROUP BY t.id_transito";
                    } if(!$recolector && $fechaStart && $fechaEnd){
                        $sql.="and t.fecha >= '{$this->getFechaStart()}' AND t.fecha <= '{$this->getFechaEnd()}%' GROUP BY t.id_transito";
                    }
                   
               
                    $transito = $this->db->query($sql);
                    
                    if($transito && $transito->num_rows>0){
                      $result = $transito;
                    
                    }else{
                        $result = false;
                    }
                    return $result;
                }
    }

    public function getCountEstadoTransito(){

                if($_POST){

            $recolector = !empty($this->getId_recolector())?$this->getId_recolector() : false;
            $fechaStart = !empty($this->getfechaStart())?$this->getfechaStart() : false;
            $fechaEnd = !empty($this->getfechaEnd())?$this->getfechaEnd() : false;
                    
                $result = false;
                $sql="";
                $sql.="SELECT IFNULL(t.estado,'Total') AS 'estado', COUNT(t.estado) as 'cantidadEstado'
                FROM transito t INNER JOIN express e
                ON e.id_equipo=t.id_equipo
                WHERE t.estado IN('RECUPERADO','AUTORIZAR','NO-TUVO-EQUIPO','NO-COINCIDE-SERIE','RECHAZADA','EN-USO','N/TEL-EQUIVOCADO','NO-EXISTE-NUMERO','NO-RESPONDE','TIEMPO-ESPERA','SE-MUDO','YA-RETIRADO','ZONA-PELIGROSA','DESHABITADO','EXTRAVIADO','FALLECIO','FALTAN-DATOS','RECONECTADO','ROBADO','ENTREGO-EN-SUCURSAL') and status_transito='transito' ";
                if($recolector && $fechaStart && $fechaEnd){
                    $sql.= "and t.id_user='{$this->getId_recolector()}' and t.fecha >= '{$this->getFechaStart()}' AND t.fecha <= '{$this->getFechaEnd()}%' GROUP BY t.estado WITH ROLLUP";
                }if(!$recolector && $fechaStart && $fechaEnd){
                    $sql.= "and t.fecha >= '{$this->getFechaStart()}' AND t.fecha <= '{$this->getFechaEnd()}%' GROUP BY t.estado WITH ROLLUP";
                }

                

                $contador = $this->db->query($sql);

                if($contador && $contador->num_rows>0){

                    $result = $contador;
                }else {
                    $result = false;
                }

                return $result;
            
            }
    }
    
    public function setEquipment(){
        
        if($_POST){

            $id_guia_equipo = !empty($this->getGuiaEquipo()) ?$this->getGuiaEquipo() :false ;
            $id_user_update = !empty($this->getId_user_update()) ?$this->getId_user_update() :false ;
            $fecha_update = !empty($this->getFecha_momento()) ?$this->getFecha_momento() :false ;
            $terminal = !empty($this->getTerminal()) ?$this->getTerminal() :false ;
            $serie = !empty($this->getSerie()) ?$this->getSerie() :false ;
            $accesorioUno = !empty($this->getAccesorioUno()) ?$this->getAccesorioUno() :false ;
            $accesorioDos = !empty($this->getAccesorioDos()) ?$this->getAccesorioDos() :false ;
            $accesorioTres = !empty($this->getAccesorioTres()) ?$this->getAccesorioTres() :false ;
            $accesorioCuatro = !empty($this->getAccesorioCuatro()) ?$this->getAccesorioCuatro() :false ;
            $estado = !empty($this->getEstado()) ?$this->getEstado() :false ;
            

            $result = false;
            if($id_guia_equipo && $id_user_update && $fecha_update && !$terminal && !$accesorioUno && !$accesorioDos && !$accesorioTres && !$accesorioCuatro  && !$estado){
         
            $sql ="UPDATE transito set status_transito='OUT' , fecha_update='{$this->getFecha_momento()}', id_user_update='{$this->getId_user_update()}' where id_transito = '{$this->getGuiaEquipo()}'";
            
              $set = $this->db->query($sql);

                if($set){ 
                $result = true;
                }

           }
             else if($id_guia_equipo &&  $id_user_update && $fecha_update  && $accesorioUno && $accesorioDos && 
             $accesorioTres && $accesorioCuatro && $estado){
               
                $sql ="UPDATE transito set fecha_update='{$this->getFecha_momento()}', id_user_update='{$this->getId_user_update()}', terminal='{$this->getTerminal()}',serie='{$this->getSerie()}',accesorio_uno= '{$this->getAccesorioUno()}', accesorio_dos='{$this->getAccesorioDos()}', accesorio_tres='{$this->getAccesorioTres()}', accesorio_cuatro='{$this->getAccesorioCuatro()}',estado='{$this->getEstado()}' where id_transito = '{$this->getGuiaEquipo()}'";
                
                    $set = $this->db->query($sql);

                    if($set){
                    $result = true;
                    }else{
                        $result = false;
                    }
                        
                    }


            return $result;
        }

    }

    public function getStatusCustomer(){
      
              $result = false;

              
              $sql ="SELECT IFNULL(t.estado,'Total') AS 'estado', 
              COUNT(t.estado) AS 'cantidadEstado' FROM transito t WHERE 
              t.identificacion='{$this->getIdentificacionCliente()}' and status_transito='transito' GROUP BY t.estado WITH ROLLUP";
             
              $count = $this->db->query($sql);
             
              if($count && $count->num_rows>0){
                $result = $count;

              }else{
                  $result = false;
              }
              return $result;
          
    }

    public function getReportTransit(){
        $recolector =  !empty($this->getId_recolector()) ? $this->getId_recolector(): false ;
        $fechaStart =  !empty($this->getFechaStart()) ? $this->getFechaStart(): false ;
        $fechaEnd =  !empty($this->getfechaEnd()) ? $this->getfechaEnd(): false ;

         $result = false;
        if($recolector && $fechaStart && $fechaEnd){


            $sql ="	SELECT IFNULL(e.provincia,'Total por Provincias') AS 'provincia',IFNULL(e.localidad,'Total por localidad') AS 'localidad',IFNULL(e.codigo_postal,' Total por Codigo Postal') AS 'codigo_postal',
            SUM(CASE WHEN t.estado='RECUPERADO'  THEN 1 ELSE 0 END)  AS 'recuperado',
             SUM(CASE WHEN t.estado='AUTORIZAR'   THEN 1 ELSE 0 END)  AS 'autorizar',
             SUM(CASE WHEN t.estado='NO-TUVO-EQUIPO'   THEN 1 ELSE 0 END)  AS 'no-tuvo-equipo',
             SUM(CASE WHEN t.estado='NO-COINCIDE-SERIE'   THEN 1 ELSE 0 END)  AS 'no-coincide-serie',
             SUM(CASE WHEN t.estado='RECHAZADA'   THEN 1 ELSE 0 END)  AS 'rechazada',
             SUM(CASE WHEN t.estado='EN-USO'   THEN 1 ELSE 0 END)  AS 'en-uso',
             SUM(CASE WHEN t.estado='N/TEL-EQUIVOCADO'   THEN 1 ELSE 0 END)  AS 'n/tel-equivocado',
             SUM(CASE WHEN t.estado='NO-EXISTE-NUMERO'   THEN 1 ELSE 0 END)  AS 'no-existe-numero',
             SUM(CASE WHEN t.estado='NO-RESPONDE'   THEN 1 ELSE 0 END)  AS 'no-responde',
             SUM(CASE WHEN t.estado='TIEMPO-ESPERA'   THEN 1 ELSE 0 END)  AS 'tiempo-espera',
             SUM(CASE WHEN t.estado='SE-MUDO'   THEN 1 ELSE 0 END)  AS 'se-mudo',
             SUM(CASE WHEN t.estado='YA-RETIRADO'   THEN 1 ELSE 0 END)  AS 'ya-retirado',
             SUM(CASE WHEN t.estado='ZONA-PELIGROSA'   THEN 1 ELSE 0 END)  AS 'zona-peligrosa',
             SUM(CASE WHEN t.estado='DESHABITADO'   THEN 1 ELSE 0 END)  AS 'deshabitado',
             SUM(CASE WHEN t.estado='EXTRAVIADO'   THEN 1 ELSE 0 END)  AS 'extraviado',
             SUM(CASE WHEN t.estado='FALLECIO'   THEN 1 ELSE 0 END)  AS 'fallecio',
             SUM(CASE WHEN t.estado='FALTAN-DATOS'   THEN 1 ELSE 0 END)  AS 'faltan-datos',
             SUM(CASE WHEN t.estado='RECONECTADO'   THEN 1 ELSE 0 END)  AS 'reconectado',
             SUM(CASE WHEN t.estado='ROBADO'   THEN 1 ELSE 0 END)  AS 'robado',
             SUM(CASE WHEN t.estado='ENTREGO-EN-SUCURSAL'   THEN 1 ELSE 0 END)  AS 'entrego-en-sucursal',
             SUM(CASE WHEN e.empresa='POSNET'   THEN 1 ELSE 0 END)  AS 'posnet',
             SUM(CASE WHEN e.empresa='ANTINA'   THEN 1 ELSE 0 END)  AS 'antina',
             SUM(CASE WHEN e.empresa='INTV'   THEN 1 ELSE 0 END)  AS 'intv',
             SUM(CASE WHEN e.empresa='IPLAN'   THEN 1 ELSE 0 END)  AS 'iplan',
             SUM(CASE WHEN e.empresa='METROTEL'   THEN 1 ELSE 0 END)  AS 'metrotel',
             SUM(CASE WHEN e.empresa='LAPOS'   THEN 1 ELSE 0 END)  AS 'lapos',
             SUM(CASE WHEN e.empresa='CABLEVISION'   THEN 1 ELSE 0 END)  AS 'cablevision',
             SUM(CASE WHEN e.empresa='CABLEVISION URUGUAY'   THEN 1 ELSE 0 END)  AS 'cablevision uruguay',
             SUM(CASE WHEN t.fecha >= '$fechaStart' AND t.fecha <= '$fechaEnd%' and t.id_user='$recolector' THEN 1 ELSE 0 END)  AS 'total'
            
             FROM express AS e
             INNER JOIN transito as t ON e.id_equipo=t.id_equipo
             where t.status_transito ='transito' and t.id_user='$recolector' and t.fecha >= '$fechaStart' AND t.fecha <= '$fechaEnd%'
             GROUP BY e.codigo_postal ORDER BY e.codigo_postal ASC";

            

          
             
             
             $informe = $this->db->query($sql);
             if($informe && $informe->num_rows>0){

                 $result = $informe;
             }else{
                 $result = false;
             }
             return $result;
             
        }
        if(!$recolector && $fechaStart && $fechaEnd ){

            $sql ="	SELECT IFNULL(e.provincia,'Total por Provincias') AS 'provincia',IFNULL(e.localidad,'Total por localidad') AS 'localidad',IFNULL(e.codigo_postal,' Total por Codigo Postal') AS 'codigo_postal',
            SUM(CASE WHEN t.estado='RECUPERADO' THEN 1 ELSE 0 END)  AS 'recuperado',
             SUM(CASE WHEN t.estado='AUTORIZAR'  THEN 1 ELSE 0 END)  AS 'autorizar',
             SUM(CASE WHEN t.estado='NO-TUVO-EQUIPO'  THEN 1 ELSE 0 END)  AS 'no-tuvo-equipo',
             SUM(CASE WHEN t.estado='NO-COINCIDE-SERIE'  THEN 1 ELSE 0 END)  AS 'no-coincide-serie',
             SUM(CASE WHEN t.estado='RECHAZADA'  THEN 1 ELSE 0 END)  AS 'rechazada',
             SUM(CASE WHEN t.estado='EN-USO'  THEN 1 ELSE 0 END)  AS 'en-uso',
             SUM(CASE WHEN t.estado='N/TEL-EQUIVOCADO'  THEN 1 ELSE 0 END)  AS 'n/tel-equivocado',
             SUM(CASE WHEN t.estado='NO-EXISTE-NUMERO'  THEN 1 ELSE 0 END)  AS 'no-existe-numero',
             SUM(CASE WHEN t.estado='NO-RESPONDE'  THEN 1 ELSE 0 END)  AS 'no-responde',
             SUM(CASE WHEN t.estado='TIEMPO-ESPERA'  THEN 1 ELSE 0 END)  AS 'tiempo-espera',
             SUM(CASE WHEN t.estado='SE-MUDO'  THEN 1 ELSE 0 END)  AS 'se-mudo',
             SUM(CASE WHEN t.estado='YA-RETIRADO'  THEN 1 ELSE 0 END)  AS 'ya-retirado',
             SUM(CASE WHEN t.estado='ZONA-PELIGROSA'  THEN 1 ELSE 0 END)  AS 'zona-peligrosa',
             SUM(CASE WHEN t.estado='DESHABITADO'  THEN 1 ELSE 0 END)  AS 'deshabitado',
             SUM(CASE WHEN t.estado='EXTRAVIADO'  THEN 1 ELSE 0 END)  AS 'extraviado',
             SUM(CASE WHEN t.estado='FALLECIO'  THEN 1 ELSE 0 END)  AS 'fallecio',
             SUM(CASE WHEN t.estado='FALTAN-DATOS'  THEN 1 ELSE 0 END)  AS 'faltan-datos',
             SUM(CASE WHEN t.estado='RECONECTADO'  THEN 1 ELSE 0 END)  AS 'reconectado',
             SUM(CASE WHEN t.estado='ROBADO'  THEN 1 ELSE 0 END)  AS 'robado',
             SUM(CASE WHEN t.estado='ENTREGO-EN-SUCURSAL'  THEN 1 ELSE 0 END)  AS 'entrego-en-sucursal',
             SUM(CASE WHEN e.empresa='POSNET'  THEN 1 ELSE 0 END)  AS 'posnet',
             SUM(CASE WHEN e.empresa='ANTINA'  THEN 1 ELSE 0 END)  AS 'antina',
             SUM(CASE WHEN e.empresa='INTV'  THEN 1 ELSE 0 END)  AS 'intv',
             SUM(CASE WHEN e.empresa='IPLAN'  THEN 1 ELSE 0 END)  AS 'iplan',
             SUM(CASE WHEN e.empresa='METROTEL'  THEN 1 ELSE 0 END)  AS 'metrotel',
             SUM(CASE WHEN e.empresa='LAPOS'  THEN 1 ELSE 0 END)  AS 'lapos',
             SUM(CASE WHEN e.empresa='CABLEVISION'  THEN 1 ELSE 0 END)  AS 'cablevision',
             SUM(CASE WHEN e.empresa='CABLEVISION URUGUAY'  THEN 1 ELSE 0 END)  AS 'cablevision uruguay',
             SUM(CASE WHEN  t.fecha >= '$fechaStart' AND t.fecha <= '$fechaEnd%' THEN 1 ELSE 0 END)  AS 'total'
            
             FROM express AS e
             INNER JOIN transito as t ON e.id_equipo=t.id_equipo
             where t.status_transito ='transito' and t.fecha >= '$fechaStart' AND t.fecha <= '$fechaEnd%'
             GROUP BY e.codigo_postal ORDER BY e.codigo_postal ASC";


             
             $informe = $this->db->query($sql);
             if($informe && $informe->num_rows>0){

                 $result = $informe;
             }else{
                 $result = false;
             }
             return $result;


        }
        
      
        
    }

    public function getReportAllCollector(){
        $fechaStart =  !empty($this->getfechaStart()) ? $this->getfechaStart() : false;
        $fechaEnd = !empty($this->getfechaEnd()) ? $this->getfechaEnd() : false;

        if($fechaStart && $fechaEnd){
            $result = false;
            $sql = "SELECT  IFNULL(t.id_user,'Total') AS 'recolector',IFNULL(u.first_name,'recolector') AS 'first_name',
             SUM(CASE WHEN t.estado='RECUPERADO'  THEN 1 ELSE 0 END)  AS 'recuperado',
             SUM(CASE WHEN t.estado='AUTORIZAR'  THEN 1 ELSE 0 END)  AS 'autorizar',
             SUM(CASE WHEN t.estado='NO-TUVO-EQUIPO'  THEN 1 ELSE 0 END)  AS 'no-tuvo-equipo',
             SUM(CASE WHEN t.estado='NO-COINCIDE-SERIE'  THEN 1 ELSE 0 END)  AS 'no-coincide-serie',
             SUM(CASE WHEN t.estado='RECHAZADA'  THEN 1 ELSE 0 END)  AS 'rechazada',
             SUM(CASE WHEN t.estado='EN-USO'  THEN 1 ELSE 0 END)  AS 'en-uso',
             SUM(CASE WHEN t.estado='N/TEL-EQUIVOCADO'  THEN 1 ELSE 0 END)  AS 'n/tel-equivocado',
             SUM(CASE WHEN t.estado='NO-EXISTE-NUMERO'  THEN 1 ELSE 0 END)  AS 'no-existe-numero',
             SUM(CASE WHEN t.estado='NO-RESPONDE'  THEN 1 ELSE 0 END)  AS 'no-responde',
             SUM(CASE WHEN t.estado='TIEMPO-ESPERA'  THEN 1 ELSE 0 END)  AS 'tiempo-espera',
             SUM(CASE WHEN t.estado='SE-MUDO'  THEN 1 ELSE 0 END)  AS 'se-mudo',
             SUM(CASE WHEN t.estado='YA-RETIRADO'  THEN 1 ELSE 0 END)  AS 'ya-retirado',
             SUM(CASE WHEN t.estado='ZONA-PELIGROSA'  THEN 1 ELSE 0 END)  AS 'zona-peligrosa',
             SUM(CASE WHEN t.estado='DESHABITADO'  THEN 1 ELSE 0 END)  AS 'deshabitado',
             SUM(CASE WHEN t.estado='EXTRAVIADO'  THEN 1 ELSE 0 END)  AS 'extraviado',
             SUM(CASE WHEN t.estado='FALLECIO'  THEN 1 ELSE 0 END)  AS 'fallecio',
             SUM(CASE WHEN t.estado='FALTAN-DATOS'  THEN 1 ELSE 0 END)  AS 'faltan-datos',
             SUM(CASE WHEN t.estado='RECONECTADO'  THEN 1 ELSE 0 END)  AS 'reconectado',
             SUM(CASE WHEN t.estado='ROBADO'  THEN 1 ELSE 0 END)  AS 'robado',
             SUM(CASE WHEN t.estado='ENTREGO-EN-SUCURSAL'  THEN 1 ELSE 0 END)  AS 'entrego-en-sucursal',
             SUM(CASE WHEN e.empresa='POSNET'  THEN 1 ELSE 0 END)  AS 'posnet',
             SUM(CASE WHEN e.empresa='ANTINA'  THEN 1 ELSE 0 END)  AS 'antina',
             SUM(CASE WHEN e.empresa='INTV'  THEN 1 ELSE 0 END)  AS 'intv',
             SUM(CASE WHEN e.empresa='IPLAN'  THEN 1 ELSE 0 END)  AS 'iplan',
             SUM(CASE WHEN e.empresa='METROTEL'  THEN 1 ELSE 0 END)  AS 'metrotel',
             SUM(CASE WHEN e.empresa='LAPOS'  THEN 1 ELSE 0 END)  AS 'lapos',
             SUM(CASE WHEN e.empresa='CABLEVISION'  THEN 1 ELSE 0 END)  AS 'cablevision',
             SUM(CASE WHEN e.empresa='CABLEVISION URUGUAY'  THEN 1 ELSE 0 END)  AS 'cablevision_uruguay',
             SUM(CASE WHEN t.estado IN('RECUPERADO','AUTORIZAR')  THEN 1 ELSE 0 END)  AS 'total_recuperados',
             SUM(CASE WHEN t.id_user=t.id_user and t.fecha >= '$fechaStart' AND t.fecha <= '$fechaEnd%' THEN 1 ELSE 0 END) AS 'total_gestionados'
             FROM express AS e 
             INNER JOIN transito as t ON e.id_equipo=t.id_equipo
             left join users u on u.id_user = t.id_user
             where t.status_transito ='transito' and t.fecha >= '$fechaStart' AND t.fecha <= '$fechaEnd%' 
             GROUP BY t.id_user WITH ROLLUP";

        
             $recolectores = $this->db->query($sql);
             if($recolectores && $recolectores->num_rows>0){
                

                $result = $recolectores;
             }else{
                 $result = false;
             }
             return $result;
        }
    }

}


    class EquiposExtra extends Equipos
    {
       
        protected $telefonoNuevo;
        protected $nombre;
        protected $apellido;
        protected $tipoDocNuevo;
        protected $tabla;
        protected $cod;
        protected $email;
        protected $pais;
        protected $provincia;
        protected $localidad;
        protected $direccion;
        protected $codigoPostal;
        protected $elemento;


        //get::::::
        
       

       
        public function getTelefonoNuevo()
        {
            return $this->telefonoNuevo;
        }
    
        public function getNombre()
        {
            return $this->nombre;
        }
        public function getApellido()
        {
            return $this->apellido;
        }
        public function getTipoDocNuevo()
        {
            return $this->tipoDocNuevo;
        }
        public function getTabla()
        {
            return $this->tabla;
        }
        public function getCod()
        {
            return $this->cod;
        }
        public function getElemento()
        {
            return $this->elemento;
        }

        public function getPais()
        {
            return $this->pais;
        }
    
        public function getProvincia()
        {
                return $this->provincia;
        }

        public function getLocalidad()
        {
            return $this->localidad;
        }

        public function getDireccion()
        {
            return $this->direccion;
        }
    

        public function getCodigoPostal()
        {
                return $this->codigoPostal;
        }


        //set::::::

        
        public function setTelefonoNuevo($telefonoNuevo)
        {
            $this->telefonoNuevo = $this->db->real_escape_string($telefonoNuevo);
        }
        
        public function setNombre($nombre)
        {
            $this->nombre = $this->db->real_escape_string($nombre);
        }
        public function setApellido($apellido)
        {
            $this->apellido = $this->db->real_escape_string($apellido);
        }
        public function setTipoDocNuevo($tipoDocNuevo)
        {
            $this->tipoDocNuevo = $this->db->real_escape_string($tipoDocNuevo);
        }
        public function setTabla($tabla)
        {
            $this->tabla = $this->db->real_escape_string($tabla);
        }

        public function setCod($cod)
        {
            $this->cod = $this->db->real_escape_string($cod);
        }

        public function setElemento($elemento)
        {
            $this->elemento = $elemento;
        }

        public function setPais($pais)
        {
            $this->pais = $this->db->real_escape_string($pais);
        } 

        public function setProvincia($provincia)
        {
                $this->provincia = $this->db->real_escape_string($provincia);
        }

        public function setLocalidad($localidad)
        {

            $this->localidad = $this->db->real_escape_string($localidad);
        }

        public function setDireccion($direccion)
        {
            $this->direccion = $this->db->real_escape_string($direccion);
        }
       
        
        public function setCodigoPostal($codigoPostal)
        {
            $this->codigoPostal = $this->db->real_escape_string($codigoPostal);
        }


        //metodos 



        public function addNewCostumer()
        {

            if ($_POST) {

                $result = false;
                if ($this->getTabla() === 'nuevos_clientes') {
                    $status = 'nuevo-cliente';
                }
                if ($this->getTabla() === 'clientes_consignacion') {
                    $status = 'A-consignacion';
                }

                $sql = "INSERT INTO {$this->getTabla()} (documento,numero_documento,nombre,apellido,
                            direccion,provincia,localidad,codigo_postal,telefono,email,
                            empresa,terminal,serie,modelo,motivo_solicitud,fecha_solicitud,motivo_interno,
                            id_user) values ('{$this->getTipoDocNuevo()}','{$this->getIdentificacionCliente()}','{$this->getNombre()}','{$this->getApellido()}','{$this->getDireccion()}','{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getCodigoPostal()}','{$this->getTelefonoNuevo()}','{$this->getEmail()}','{$this->getEmpresa()}','{$this->getTerminal()}','{$this->getSerie()}','{$this->getModelo()}','{$this->getMotivoRetiro()}','{$this->getFecha_momento()}','$status','{$this->getId_recolector()}')";

                $cliente = $this->db->query($sql);

                if ($cliente) {

                    $result = true;
                } else {
                    $result = false;
                }
                return $result;
            }
        }
        public function addNewCustomersInBase(){
            if($_POST){
                $result = false;
                $sql = "INSERT INTO express (id_local,cod_empresa,empresa,identificacion,idd,
                provincia,localidad,direccion,codigo_postal,serie,terminal,tarjeta,nombre_cliente,emailcliente,telefono1,cartera,id_user,fecha_add) values ('{$this->getGuiaEquipo()}','{$this->getCod()}','{$this->getEmpresa()}','{$this->getIdentificacionCliente()}','{$this->getIdd()}','{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}','{$this->getCodigoPostal()}','{$this->getSerie()}','{$this->getTerminal()}','{$this->getTarjeta()}','{$this->getNombre()}','{$this->getEmail()}','{$this->getTelefonoNuevo()}','{$this->getCartera()}','{$this->getId_user_update()}','{$this->getFecha_momento()}')";
            
                $cliente = $this->db->query($sql);

                if($cliente){

                    $result = 'insert';
                }else {
                    $result = 'noinsert';
                }
                return $result;
            }
        }

        public function saveDataCustomer(){
            $id_recolector = !empty($this->getId_recolector()) ? $this->getId_recolector() : false ;
            $orden = !empty($this->getOrden()) ? $this->getOrden() : false ;
            $identificacionCliente = !empty($this->getIdentificacionCliente()) ? $this->getIdentificacionCliente() : false ;
            $telefono = !empty($this->getTelefonoNuevo()) ? $this->getTelefonoNuevo() : '' ;
            $email = !empty($this->getEmail()) ? $this->getEmail() : '' ;
            $fecha = !empty($this->getFecha_momento()) ? $this->getFecha_momento() : '' ;
            $elemento = !empty($this->getElemento()) ? $this->getElemento() : '' ;

            $sql ="";
            $sql.="INSERT INTO datos_digitales (id_user,identificacion,id_orden,telefono,mail,fecha,elemento) values ($id_recolector,'$identificacionCliente','$orden','$telefono','$email','$fecha','$elemento')";
            
            $this->db->query($sql);

        }

        public function getAllPais(){
            $result = false;
            $sql = "SELECT * FROM country";
        
            
            $pais = $this->db->query($sql);
            if($pais && $pais->num_rows>0){
             $result = $pais;
            }else {
                $result = false;
            }
            return $result;
    
        }
    
        public function getSomeProvincia(){
            $result = false;
            
            $sql = "SELECT * FROM province where id_country='{$this->getPais()}' ORDER BY province asc";
            $province = $this->db->query($sql);
            if($province && $province->num_rows>0){
             $result = $province;
            }else {
                $result = false;
            }
            return $result;
    
        }

        public function getSomeLocalidad(){

            $id_provincia = !empty($this->getProvincia()) ?$this->getProvincia() :false ; 
    
            $result = false;
            if($id_provincia){
                
            $sql = "SELECT * from localities where id_province='{$this->getProvincia()}'";
             $localidad = $this->db->query($sql);
              if($localidad && $localidad->num_rows>0){
                  $result = $localidad;
    
              }else{
                  $result = false;
              }
    
              return $result;
    
            }
    
        }
    
       
    

        
    }
