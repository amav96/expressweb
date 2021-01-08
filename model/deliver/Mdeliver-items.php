<?php

if(isset($_GET["pro"]))
 {
     $identificacion = $_GET["pro"];
     MostrarDatosCliente($identificacion);
 } 
if(isset($_POST["codigoPostalBusco"]))
 {
     $codigoPostal = $_POST["codigoPostalBusco"];
     BuscarCp($codigoPostal);
 }
if(isset($_POST["identificacionBusco"]))
 {

   
    $identificacion=($_POST["identificacionBusco"]);

     InsertarAutoGestionRecolector($identificacion);
 }



  function BuscarCp($codigoPostal){
     
     include("../../control/parcel/db.php");
     mysqli_set_charset($connection, 'utf8');
     $query="SELECT * FROM recolectores_comercios where codigo_postal='$codigoPostal'";

     $result= mysqli_query($connection,$query);

     if(!$result){
         die("Query failed." . mysqli_error($connection));
     }else{

        if($result->num_rows>0)
        {

            //    Si hay solo una opcion para recuperar
            if(($result->num_rows>0) && ($result->num_rows<2))
            {
         
                $row= $result->fetch_array();
        
                          array(
                              'tipo'  => $row["tipo"],
                              'provincia'  => $row["provincia"],
                              'localidad'  => $row["localidad"],
                              'direccion'  => $row["direccion"],
                          );

                          $tipo=$row["tipo"];
                          $provincia=$row["provincia"];
                          $localidad=$row["localidad"];
                          $direccion=$row["direccion"];
                        
                             
           
                if($tipo==='RECOLECTOR'){$jsonOpcionesRecolector[] = array('result' => 1, );
                    $jsonEncodeReco=json_encode($jsonOpcionesRecolector); echo $jsonEncodeReco;}

                if ($tipo==='COMERCIO'){$jsonOpcionesComercio[] = array(
                    'result' => 2,
                    'tipoComercio' => $tipo,
                    'provinciaComercio' => $provincia,
                    'localidadComercio' => $localidad,
                    'direccionComercio' => $direccion,
                );
                     $jsonEncodeComer=json_encode($jsonOpcionesComercio); echo $jsonEncodeComer;}
            
                if($tipo==='PM'){ 
                        $jsonOpcionesSoloPM[] = array('result' => 3,);
                        $jsonEncodeSoloPM=json_encode($jsonOpcionesSoloPM); 
                        echo $jsonEncodeSoloPM;}

                if(($tipo !=='PM') && ($tipo !=='RECOLECTOR') && ($tipo !== 'COMERCIO')){ 
                    $jsonOpcionesNada[] = array('result' => 4,);
                    $jsonEncodeNada=json_encode($jsonOpcionesNada); echo $jsonEncodeNada;}
    
            } 

                        //    Si hay mas de una opcion para recuperar
                         if($result->num_rows>1)
                         {
                          
                           
                            while($fila = $result->fetch_array())
                            {
                                if($fila["tipo"] !== "RECOLECTOR"){
                                    
                               
                                
                                $objeto[] = array(
                                    'tipo' => $fila["tipo"],
                                    'provincia' => $fila["provincia"],
                                    'localidad' => $fila["localidad"],
                                    'direccion' => $fila["direccion"],
                                );    
                              }
                            }
                                    //   echo "<pre>";
                                    //   print_r($objeto);
                                    //   echo "</pre>";


                                  $jsonDeDatos=json_encode($objeto);
                                  echo $jsonDeDatos;
                                  
                         }
        }  
            else 
                 {
                   $return = new stdClass();
                   $return->fail = false;
                   echo json_encode($return);
                 }
            
            
           

        
     }

     $result->close();
     /* close connection */
     $connection->close();

  }

 function MostrarDatosCliente($identificacion){

    include("../../control/parcel/db.php");
    mysqli_set_charset($connection, 'utf8');
    $query = "SELECT identificacion,empresa,nombre_cliente,provincia,direccion,localidad,codigo_postal,equipo,serie,tarjeta,emailcliente FROM express WHERE
    identificacion = '$identificacion'";
    $result = mysqli_query($connection,$query);

    if(!$result){
        die("Query Failed ." . mysqli_error($connection));
    }else {

      if($result->num_rows > 0){

           while($row = $result->fetch_array()){
               $array[] = $row;
           }

           foreach ($array as $row){
               $row["identificacion"];
               $row["empresa"];
               
           }
           
        
           
           $jsonstring=json_encode($array);
           echo $jsonstring;
           
       

      } else {
        $return = new stdClass();
            $return->fail = false;
            echo json_encode($return);
      }

    }
    $result->close();
    /* close connection */
    $connection->close();
   
   
   

 }

//  function clean($str) {
//     $unwanted_array = array(
//         "/"=>'', '\\'=>''
//       );
      
//       return strtr($str, $unwanted_array );
// }

 function InsertarAutoGestionRecolector($identificacion){

    include("../../control/parcel/db.php");

$identificacionClean = mysqli_escape_string($connection,$identificacion);
$horaRecogida = mysqli_escape_string($connection,$_POST["horaRecogida"]);
$diaRecogida = mysqli_escape_string($connection,$_POST["diaRecogida"]);
$cantidadRecogida = mysqli_escape_string($connection, $_POST["cantidadRecogida"]);
$caracteristicaRecogida = mysqli_escape_string($connection, $_POST["caracteristicaRecogida"]);
$numeroRecogidaContacto = mysqli_escape_string($connection,$_POST["numeroRecogida"]);
$domicilioAltRecogida = mysqli_escape_string($connection,$_POST["domicilioAltRecogida"]);
$emailAltRecogida= mysqli_escape_string($connection,$_POST["emailAltRecogida"]);
$momentoDelEnvio= mysqli_escape_string($connection,$_POST["fechaYHoraE"]);


$query = "INSERT INTO autogestion (identificacion,numero_de_equipos,telefonocontacto,horario_elegido,dia_elegido,domicilio_alternativo,emailalternativo,estado_operacion,momento_envio_data) value ('$identificacionClean','$cantidadRecogida','$caracteristicaRecogida $numeroRecogidaContacto','$horaRecogida','$diaRecogida','$domicilioAltRecogida','$emailAltRecogida','auto-pactado','$momentoDelEnvio')";

$result=mysqli_query($connection,$query);

if(!$result){
    // die ('Query Failed: '. mysqli_error($connection));
    $objeto[] = array(); $objeto = array('result' => 2,);
}

if($result){
    $objeto[] = array(); $objeto = array('result' => 1,);
           $jsonstringAutoGestion=json_encode($objeto); echo $jsonstringAutoGestion;

}
    
 

  
 }