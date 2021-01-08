<?php 
 


if(isset($_POST["identificacionBusco"])){
  $identificacion=$_POST["identificacionBusco"];
  DatosParaCorreo($identificacion);
}

function DatosParaCorreo($identificacion){
    
    $codigoPostalBusco=$_POST["codigoPostalBusco"];
    $nombreCliente=$_POST["nombreCliente"];
    $provinciaCliente=$_POST["provinciaCliente"];
    $direccionCliente=$_POST["direccionCliente"];
    $localidadCliente=$_POST["localidadCliente"];
    $emailCliente=$_POST["emailCliente"];
    $horaRecogida=$_POST["horaRecogida"];
    $diaRecogida=$_POST["diaRecogida"];
    $cantidadRecogida=$_POST["cantidadRecogida"];
    $caracteristicaRecogida=$_POST["caracteristicaRecogida"];
    $numeroRecogida=$_POST["numeroRecogida"];
    $domicilioAltRecogida=$_POST["domicilioAltRecogida"];
    $emailAltRecogida=$_POST["emailAltRecogida"];
    $identificacionBusco=$_POST["identificacionBusco"];
    $fechaYHoraE=$_POST["fechaYHoraE"]; 
    
    
}