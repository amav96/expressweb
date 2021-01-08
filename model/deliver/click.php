<?php 

if(isset($_POST["identificacionFormReco"])){
    $identificacionAIngresarFormReco=$_POST["identificacionFormReco"];
    
    IngresarClickAreaFormRecolector($identificacionAIngresarFormReco);
}

function IngresarClickAreaFormRecolector($identificacionAIngresarFormReco){

    $fechaYHora=$_POST["fechaYHora"];

    include('../../control/parcel/db.php');
    $query = "INSERT INTO click (cliente,area,momento) values ('$identificacionAIngresarFormReco','entrega-recolector','$fechaYHora')";

    
       $result = mysqli_query($connection,$query);

       if(!$result){
           die ('Query Failed :' . mysqli_error($connection));
       }
       echo "exito";
}