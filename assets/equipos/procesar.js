const listaEquipos = document.querySelector('#caja')
const abrirListaDeEquipos = document.getElementById('id')
var contadorGuiaEquipoLs = 0



$(document).on("click","#finalizar", function(){
    Swal.fire({
        title: 'Estas seguro de cerrar la caja',
        text: "Se eliminaran todos los datos de la caja actual",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, cerrar!'
      }).then((result) => {
        if (result.isConfirmed) {
            finalizarTransaccion()
        }
      })

   
})
 
var equiposCount;



 function leerDatosEquipos(){
    

    $(document).on("click","#confirmar",function(e){
        e.preventDefault();
        
    var estado = document.getElementById('estado-rec-en-base').value  
    var motivoRetiro = document.getElementById('motivo-retiro-en-base').value
    var accesorioUnoLS = $('input[name=accesorio-uno]:checked').val() 
    var accesorioDosLS = $('input[name=accesorio-dos]:checked').val() 
    var accesorioTresLS = $('input[name=accesorio-tres]:checked').val()
    var accesorioCuatroLS = $('input[name=accesorio-cuatro]:checked').val()
    var accesorios = document.getElementById('input-otrosaccesorios-en-base').value 
    var id = document.getElementById('id_cli').value 
    var terminal = document.getElementById('input-terminal-en-base').value 
    var identificacion = document.getElementById('edit_identificacion').value
    var serie = document.getElementById('input-serie-en-base').value
    var serie_base = document.getElementById('input-base-serie').value
    var chipAlternativo = document.getElementById('input-chip-alt').value
    var idd = document.getElementById('idd').value
            
          var verificoTarjeta = document.getElementById('input-chip-base').value

    var tarjeta = (verificoTarjeta !== '') ? verificoTarjeta : 'no' ; 

    
    var hoy = new Date();
       var dateTime =hoy.getFullYear() + '-' + ("0" +(hoy.getMonth() + 1)).slice(-2) + '-' + ("0" + hoy.getDate()).slice(-2)+ ' ' + hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
// falta tarjeta /chip ---------------- 

    var codHash = JSON.parse(localStorage.getItem('odh')) 
    var codOrden = JSON.parse(localStorage.getItem('odi')) 
    var codUser = JSON.parse(localStorage.getItem('rec'))  
   ++contadorGuiaEquipoLs
   const infoEquipo = {
       estado,
       motivoRetiro,
       accesorioUnoLS,
       accesorioDosLS,
       accesorioTresLS,
       accesorioCuatroLS,
       accesorios,
       id,
       terminal,
       identificacion,
       serie,
       serie_base,
       chipAlternativo,
       tarjeta,
       codHash,
       codOrden,
       codUser,
       dateTime,
       idd,
       contadorGuiaEquipoLs
   }


   var getIdentificacionEnBase = $("#edit_identificacion").val()
   var identificacionEnBaseForm = getIdentificacionEnBase.substr(0,2)
   let equiposLS;
 
  
   equiposLS = obtenerEquiposLocalStorage();
   equiposLS.forEach(function(equipoLS){
       if(equipoLS.idd === infoEquipo.idd){
           equiposLS = equipoLS.idd;
           
       }
    });

     let empresasLS;
     empresasLS = obtenerEquiposLocalStorage();
     empresasLS.forEach(function(empresaLS){
        if(empresaLS.identificacion === infoEquipo.identificacion){
            empresasLS = empresaLS.identificacion
        }
     
    })
       
  //si la terminal que entra existe en el localstorage ya cargado, 
        if(equiposLS === infoEquipo.idd){
            setearDomFormBase()
            var getCargaABaseLs = localStorage.getItem('en');
            if(getCargaABaseLs === 's'){
                alertNegative('Debes cerrar la caja actual para gestionar mas equipos')
                return false;
            }else{
                alertNegative('El equipo ya ha sido agregado anteriormente')
                return false;
            }
        }
            if(empresasLS.length !== 0){
                if(empresasLS !== infoEquipo.identificacion){
                    
                    $("#abrirfirmar").hide()
                    
                    alertNegative('Si queres cargar equipos de otro cliente: Hace clic en "Cerrar caja"')
                    return false;

             } else if (localStorage.getItem('en') === 's'){
              
                 $("#mantenerEnvioDeRemito").show()
                 $("#abrirfirmar").hide()
                 alertNegative('Debes cerrar la caja para poder agregar mas equipos'); return false;
                
             }
            else {

                alertPositive('Equipo agregado exitosamente!')
                //   localStorage.setItem('eq',++equiposCount)
                //   console.log(localStorage.getItem('eq'))
                  
                  $("#seguirRecuperando").show()
                  $("#codEmail").val(codHash)
                  $("#idFirmar").val(codHash);
                  $("#abrir-caja-equipos").show();
                  
                  setearDomFormBase()
                  var datoIngresadoABuscar = $("#q").val();
                  pasarClienteAMayuscula = datoIngresadoABuscar.toUpperCase();
  
                  inicialesEmpresa = pasarClienteAMayuscula.substr(0, 2);
  
                  if (inicialesEmpresa === "PS") {
                     $("#abrirfirmar").show()
                      $("#crear-imagen").show()
                     $("#borrar-imagen").show()
                    
                     $("#siguienteNormal").hide()
                  }

                  if (inicialesEmpresa !== "PS") {
                     
                      $("#abrirfirmar").hide()
                      $("#siguienteNormal").show()
                  }
                    insertarEquipos(infoEquipo)
                    ContarEquiposEnLS()
                    return true
            }
        }
         else if (localStorage.getItem('en') === 's'){
             $("#mantenerEnvioDeRemito").show()
             $("#abrirfirmar").hide()
             alertNegative('Debes cerrar la caja para poder agregar mas equipos'); return false;     
         }

        else {

            alertPositive('Equipo agregado exitosamente!')
            // localStorage.setItem('eq',++equiposCount)
            // console.log(localStorage.getItem('eq'))
              $("#seguirRecuperando").show()
              $("#codEmail").val(codHash)
              $("#idFirmar").val(codHash);
              $("#abrir-caja-equipos").show();
              setearDomFormBase()
              
              var datoIngresadoABuscar = $("#q").val();
                pasarClienteAMayuscula = datoIngresadoABuscar.toUpperCase();

                inicialesEmpresa = pasarClienteAMayuscula.substr(0, 2);

                if (inicialesEmpresa === "PS") {
                    $("#abrirfirmar").show()
                    $("#crear-imagen").show()
                    $("#borrar-imagen").show()
                  
                }
                if (inicialesEmpresa !== "PS") {
                    $("#abrirfirmar").hide()
                    $("#siguienteNormal").show()
                }

                insertarEquipos(infoEquipo)
                ContarEquiposEnLS()
                return true    
        }

})
 }

function insertarEquipos(infoEquipo){

       mayusEmpresaCaja = infoEquipo.identificacion.toUpperCase()
       nombreEmpresaCaja = mayusEmpresaCaja.substr(0,2)
       const row = document.createElement('div');
       if(nombreEmpresaCaja=== 'PS'){
        row.innerHTML = `
<div class="lista">
<span><strong>Terminal:</strong>  ${infoEquipo.terminal} </span>
<span><strong>Serie:</strong>  ${infoEquipo.serie} </span>
<span><strong>Identificacion:</strong>  ${infoEquipo.identificacion} </span>
<span><strong>Sim Card:</strong>  ${infoEquipo.tarjeta} </span>
<span><strong>Estado:</strong>  ${infoEquipo.estado} </span>
<span><strong>Motivo:</strong>  ${infoEquipo.motivoRetiro} </span>
<span><strong>C.Telefonico:</strong>  ${infoEquipo.accesorioUnoLS} </span>
<span><strong>Sim Card:</strong>  ${infoEquipo.accesorioDosLS} </span>
<span><strong>Cargador:</strong>  ${infoEquipo.accesorioTresLS} </span>
<span><strong>Base:</strong>  ${infoEquipo.accesorioCuatroLS} </span>
<span><strong>Otros accesorios:</strong>  ${infoEquipo.accesorios} </span>
<span><strong>Base serie:</strong>  ${infoEquipo.serie_base} </span>
<span><strong>Horario:</strong>  ${infoEquipo.dateTime} </span>
<span>
<a href="#" style="transform:scale(1.5);margin:0.5rem;" id="borrar-equipo" class="borrar-equipo fas fa-times-circle" data-contadorGuiaEquipoLs="${infoEquipo.contadorGuiaEquipoLs}"></a> 
</span>
 </div>
`;

       }
        else if(nombreEmpresaCaja=== 'LA' || nombreEmpresaCaja=== 'GC'){
        row.innerHTML = `
<div class="lista">
<span><strong>Terminal:</strong>  ${infoEquipo.terminal} </span>
<span><strong>Serie:</strong>  ${infoEquipo.serie} </span>
<span><strong>Identificacion:</strong>  ${infoEquipo.identificacion} </span>
<span><strong>Estado:</strong>  ${infoEquipo.estado} </span>
<span><strong>C.Telefonico:</strong>  ${infoEquipo.accesorioUnoLS} </span>
<span><strong>Sim Card:</strong>  ${infoEquipo.accesorioDosLS} </span>
<span><strong>Cargador:</strong>  ${infoEquipo.accesorioTresLS} </span>
<span><strong>Base:</strong>  ${infoEquipo.accesorioCuatroLS} </span>
<span><strong>Otros accesorios:</strong>  ${infoEquipo.accesorios} </span>
<span><strong>Horario:</strong>  ${infoEquipo.dateTime} </span>
<span>
<a href="#" style="transform:scale(1.5);margin:0.5rem;" id="borrar-equipo" class="borrar-equipo fas fa-times-circle" data-contadorGuiaEquipoLs="${infoEquipo.contadorGuiaEquipoLs}"></a> 
</span>
 </div>
`;
}
  
else if(nombreEmpresaCaja !== 'LA' && nombreEmpresaCaja !== 'PS' && nombreEmpresaCaja !== 'GC'){

        row.innerHTML = `
<div class="lista">
<span><strong>Serie:</strong>  ${infoEquipo.serie} </span>
<span><strong>Identificacion:</strong>  ${infoEquipo.identificacion} </span>
<span><strong>Estado:</strong>  ${infoEquipo.estado} </span>
<span><strong>C.HDMI:</strong>  ${infoEquipo.accesorioUnoLS} </span>
<span><strong>C.AV :</strong>  ${infoEquipo.accesorioDosLS} </span>
<span><strong>Fuente:</strong>  ${infoEquipo.accesorioTresLS} </span>
<span><strong>Control:</strong>  ${infoEquipo.accesorioCuatroLS} </span>
<span><strong>Otros accesorios:</strong>  ${infoEquipo.accesorios} </span>
<span><strong>Horario:</strong>  ${infoEquipo.dateTime} </span>
<span>
<a href="#" style="transform:scale(1.5);margin:0.5rem;" id="borrar-equipo" class="borrar-equipo fas fa-times-circle" data-contadorGuiaEquipoLs="${infoEquipo.contadorGuiaEquipoLs}"></a> 
</span>
 </div>
`;

       }
listaEquipos.appendChild(row);

obtenerEquiposLocalStorage()

guardarEquiposLocalStorage(infoEquipo)

}


        eliminarEquipo()
    function eliminarEquipo(){
        
        $(document).on("click","#borrar-equipo",function(e){
        e.preventDefault()


        var getTransitoLS = JSON.parse(localStorage.getItem('transito')); 
        var getCargaABaseLs = localStorage.getItem('en');


    if(getCargaABaseLs === 's'){

        Swal.fire({
            title: 'Esta acción cerrara la caja actual',
            text: "Si la cerras, la opción de enviar remito no estara disponible para el cliente actual",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cerrar caja',
            cancelButtonText: 'Mantener caja'
          }).then((result) => {
            if (result.isConfirmed) {
                finalizarTransaccion();
                $("#caja-de-equipos").modal("hide");
            }
          })

          return false;
    }
 
    
     if(getTransitoLS=== null){
         $("#clienteActual").html('');
         return false;
     } 
     if(getTransitoLS !== null){
         if(getTransitoLS.length === 0){
            $("#clienteActual").html('');
            return false;
         }
     }



        let equipo, equipoID;
        if(e.target.classList.contains('borrar-equipo')){
            e.target.parentElement.parentElement.remove();
            equipo = e.target.parentElement.parentElement;
            equipoID = equipo.querySelector('a').getAttribute('data-contadorGuiaEquipoLs');
            
            eliminarEquiposLocalStorage(equipoID)
            ContarEquiposEnLS()
        }
        
    })


    }

        vaciarCaja()
    function vaciarCaja(){

    $(document).on("click","#vaciarCaja",function(e){
    e.preventDefault();


        var getTransitoLS = JSON.parse(localStorage.getItem('transito')); 
        var getCargaABaseLs = localStorage.getItem('en');


    if(getCargaABaseLs === 's'){

        Swal.fire({
            title: 'Esta acción cerrara la caja actual',
            text: "Si la cerras, la opción de enviar remito no estara disponible para el cliente actual",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cerrar caja',
            cancelButtonText: 'Mantener caja'
          }).then((result) => {
            if (result.isConfirmed) {
                finalizarTransaccion();
                $("#caja-de-equipos").modal("hide");

            }
          })

          return false;
    }
 
    
     if(getTransitoLS=== null){
         $("#clienteActual").html('');
         return false;
     } 
     if(getTransitoLS !== null){
         if(getTransitoLS.length === 0){
            $("#clienteActual").html('');
            return false;
         }
     }



    while(listaEquipos.firstChild){
        listaEquipos.removeChild(listaEquipos.firstChild);
        }
    $("#siguienteNormal").hide()
    $("#abrir-caja-equipos").hide()
    vaciarEquiposLocalStorage();
    ContarEquiposEnLS()
    return false;

    })

    }

    function guardarEquiposLocalStorage(infoEquipo){

        let equipos;
        equipos = this.obtenerEquiposLocalStorage();
        equipos.push(infoEquipo);
        localStorage.setItem('transito',JSON.stringify(equipos));
    }    

    function obtenerEquiposLocalStorage(){

        let equipoLS;

        if(localStorage.getItem('transito')=== null){
            equipoLS = [];
            

        } else {
            equipoLS = JSON.parse(localStorage.getItem('transito'));
           
        }
        return  equipoLS;
    }



    function finalizarTransaccion(){
       
           localStorage.clear();
           localStorage.removeItem("transito");
           $("#clienteActual").html('')

           $("#nombreaclaracion").val("")
           $("#documentoFirmar").val("")

           $("#abrir-caja-equipos").hide()
           $("#cajaBuscador").hide()
           $("#table").hide()
           $("#finalizar").hide()

           $("#btnAutorizar").hide()

           $("#iniciar").show()
           
           $("#caja-box").html('<img  src="'+base_url+'estilos/imagenes/front/box1.png" alt="">')
           $("#caja-box").fadeIn()
  
           $("#nombreaclaracion").val("") 
           $("#documentoFirmar").val("") 
           $("#idFirmar").val("") 

           $("#email-remito").val("")
           $("#idServ").val("")

           // resetear input numero de whatsapp
           // resetear input email
            $("#numeroWats").val("")
            $("#codEmail").val("")
            $("#modoEmail").val("")
           
            siHayUnEquipoAgregadoALacaja()

           while(listaEquipos.firstChild){
            listaEquipos.removeChild(listaEquipos.firstChild);
            }
      

        ContarEquiposEnLS()
        return false;
           
       
    }

   function eliminarEquiposLocalStorage(equipoID){

          var valorNumericoId =   Number(equipoID)
    
         let equiposLS;
        
         equiposLS =this.obtenerEquiposLocalStorage();
         
         equiposLS.forEach(function(equipoLS, index){
            
            
            
             if(equipoLS.contadorGuiaEquipoLs === valorNumericoId){
                
                 equiposLS.splice(index, 1);
             }
         });

         localStorage.setItem('transito', JSON.stringify(equiposLS));

         if(localStorage.getItem('transito')){
            var trans = localStorage.getItem('transito')
           if(trans.length > 2){
            $("#abrir-caja-equipos").show()
           }
           if(trans.length <=2){
            
            $("#abrir-caja-equipos").hide()
            $("#caja-de-equipos").modal("hide");
            
           }
          }else {
         
             $("#abrir-caja-equipos").hide()
          }

          ContarEquiposEnLS()
     }

     function leerLocalStorageAlRecargarPagina(){

       let equiposLS = this.obtenerEquiposLocalStorage();

       equiposLS.forEach(function(infoEquipo){
           
        const row = document.createElement('div');
        
       mayusEmpresaCajaRC = infoEquipo.identificacion.toUpperCase()
       nombreEmpresaCajaRC = mayusEmpresaCajaRC.substr(0,2)

      
       if(nombreEmpresaCajaRC === 'PS'){
        row.innerHTML = `
        <div class="lista">
        <span><strong>Terminal:</strong>  ${infoEquipo.terminal} </span>
        <span><strong>Serie:</strong>  ${infoEquipo.serie} </span>
        <span><strong>Identificacion:</strong>  ${infoEquipo.identificacion} </span>
        <span><strong>Sim Card:</strong>  ${infoEquipo.tarjeta} </span>
        <span><strong>Motivo:</strong>  ${infoEquipo.motivoRetiro} </span>
        <span><strong>Estado:</strong>  ${infoEquipo.estado} </span>
        <span><strong>Motivo:</strong>  ${infoEquipo.motivoRetiro} </span>
        <span><strong>C.Telefonico:</strong>  ${infoEquipo.accesorioUnoLS} </span>
        <span><strong>Sim Card:</strong>  ${infoEquipo.accesorioDosLS} </span>
        <span><strong>Cargador:</strong>  ${infoEquipo.accesorioTresLS} </span>
        <span><strong>Base:</strong>  ${infoEquipo.accesorioCuatroLS} </span>
        <span><strong>Otros Accesorios:</strong>  ${infoEquipo.accesorios} </span>
        <span><strong>Base serie:</strong>  ${infoEquipo.serie_base} </span>
        <span><strong>Horario:</strong>  ${infoEquipo.dateTime} </span>
       
        <span>
        <a style="transform:scale(1.5);margin:0.5rem;" href="#" id="borrar-equipo" class="borrar-equipo fas fa-times-circle" data-contadorGuiaEquipoLs="${infoEquipo.contadorGuiaEquipoLs}"></a> 
        </span>
        </div>
        `;

       }
       if(nombreEmpresaCajaRC === 'LA' || nombreEmpresaCajaRC === 'GC'){
        row.innerHTML = `
            <div class="lista">
        <span><strong>Terminal:</strong>  ${infoEquipo.terminal} </span>
        <span><strong>Serie:</strong>  ${infoEquipo.serie} </span>
        <span><strong>Identificacion:</strong>  ${infoEquipo.identificacion} </span>
        <span><strong>Estado:</strong>  ${infoEquipo.estado} </span>
        <span><strong>C.Telefonico:</strong>  ${infoEquipo.accesorioUnoLS} </span>
        <span><strong>Sim Card:</strong>  ${infoEquipo.accesorioDosLS} </span>
        <span><strong>Cargador:</strong>  ${infoEquipo.accesorioTresLS} </span>
        <span><strong>Base:</strong>  ${infoEquipo.accesorioCuatroLS} </span>
        <span><strong>Otros Accesorios:</strong>  ${infoEquipo.accesorios} </span>
        <span><strong>Horario:</strong>  ${infoEquipo.dateTime} </span>
        <span>
        <a style="transform:scale(1.5);margin:0.5rem;" href="#" id="borrar-equipo" class="borrar-equipo fas fa-times-circle" data-contadorGuiaEquipoLs="${infoEquipo.contadorGuiaEquipoLs}"></a> 
        </span>
        </div>
        `;
       }
       
       if(nombreEmpresaCajaRC !== 'PS' && nombreEmpresaCajaRC !== 'LA' && nombreEmpresaCajaRC !== 'GC') {
        row.innerHTML = `
            <div class="lista">
        <span><strong>Serie:</strong>  ${infoEquipo.serie} </span>
        <span><strong>Identificacion:</strong>  ${infoEquipo.identificacion} </span>
        <span><strong>Estado:</strong>  ${infoEquipo.estado} </span>
        <span><strong>HDMI:</strong>  ${infoEquipo.accesorioUnoLS} </span>
        <span><strong>AV:</strong>  ${infoEquipo.accesorioDosLS} </span>
        <span><strong>Fuente:</strong>  ${infoEquipo.accesorioTresLS} </span>
        <span><strong>Control:</strong>  ${infoEquipo.accesorioCuatroLS} </span>
        <span><strong>Otros accesorios:</strong>  ${infoEquipo.accesorios} </span>
        <span><strong>Horario:</strong>  ${infoEquipo.dateTime} </span>
        <span>
        <a style="transform:scale(1.5);margin:0.5rem;" href="#" id="borrar-equipo" class="borrar-equipo fas fa-times-circle" data-contadorGuiaEquipoLs="${infoEquipo.contadorGuiaEquipoLs}"></a> 
        </span>
        </div>
        `;
       }
       listaEquipos.appendChild(row);
       
    })
     }
    
     function vaciarEquiposLocalStorage(){
        localStorage.removeItem("transito");
        ContarEquiposEnLS()

     }

     function procesarEquipos(){

        $(document).on("click","#vaciarCaja",function(){

          if(obtenerEquiposLocalStorage().length===0){
            $("#abrirfirmar").hide();

          }

          })


          $(document).on("click","#borrar-equipo",function(){

            if(obtenerEquiposLocalStorage().length===0){
                $("#abrirfirmar").hide();
              }
        })
    }

    function ContarEquiposEnLS(){

        var transito = JSON.parse(localStorage.getItem('transito'));
       
        
        if(transito !== null){

      
      if(transito.length > 0 ){
        
          $("#clienteActual").html('Cliente en caja: <span class="count-equipos-panel">'+transito[0].identificacion+'</span>')

        $("#cantRemit").html('Equipos en caja :  ' + '<span class="count-equipos-panel">' + transito.length +'</span>');
        $("#cantRemitCaja").html('<span style="margin:2rem;font-weight:500;"> Equipos en caja : '  + '<span class="count-equipos-modal">'+ transito.length  + '</span></span>');
        
      } if(transito.length === 0 ){

        $("#cantRemit").html(''); 
      } 
    }else {
        $("#cantRemit").html('');
    }

    }
    function siHayUnEquipoAgregadoALacaja(){

        if(obtenerEquiposLocalStorage().length===0 || obtenerEquiposLocalStorage().length== [] || obtenerEquiposLocalStorage() === null){
            $("#abrirfirmar").hide();   
          } 
          else {
              
            let empresaInicialesLs;
            let codigoOrdenHashRC;
            empresaInicialesLs =this.obtenerEquiposLocalStorage();
            empresaInicialesLs.forEach(function(empresaInicial){
                empresaInicialesLs= empresaInicial.identificacion
                codigoOrdenHashRC = empresaInicial.codHash
                
            });
        
            empresaInicialesLsMayus = empresaInicialesLs.toUpperCase();
       
            iniEmp = empresaInicialesLsMayus.substr(0,2);
            
     
            if(localStorage.getItem('en') === 'n'){

                

                if(iniEmp === 'PS'){
                 

                    $("#btnAutorizar").show()
                    $("#abrirfirmar").show();
                    $("#siguienteNormal").hide()
                    $("#idFirmar").val(codigoOrdenHashRC)
                    $("#codEmail").val(codigoOrdenHashRC)
                    $("#q").val(empresaInicialesLs)
                    setTimeout(function () {
                        setearDomFormBase() 
                      }, 1500);

                    $("#mantenerEnvioDeRemito").hide()
                    $("#seguirRecuperando").show()
        
                        }

                        if(iniEmp !== 'PS'){
 
                            $("#btnAutorizar").show()
                            $("#siguienteNormal").show()
                            $("#abrirfirmar").hide();
                            $("#idFirmar").val(codigoOrdenHashRC)
                            $("#codEmail").val(codigoOrdenHashRC)
                            $("#q").val(empresaInicialesLs)
            
                            setTimeout(function () {
                                setearDomFormBase() 
                              }, 1500);

                        $("#mantenerEnvioDeRemito").hide()
                        $("#seguirRecuperando").show()
                        }    
                        
                       
                }

                if(localStorage.getItem('te') === 're'){
                    $("#modoEmail").val('remitoRecupero')
                    $("#codEmail").val(JSON.parse(localStorage.getItem('odh')))
                }
                if(localStorage.getItem('te') === 'cs'){
                    $("#modoEmail").val('remitoConsignacion')
                }
                if(localStorage.getItem('te') !== 'cs'  && localStorage.getItem('te') !== 're'){

                    $("#modoEmail").val('noMotivo')
                }
                              
            }

            if(localStorage.getItem('en') === 's'){


                $("#mantenerEnvioDeRemito").show()
                $("#siguienteNormal").hide()
                $("#abrirfirmar").hide();
                $("#seguirRecuperando").hide()
                $("#btnAutorizar").hide()

            
            if(localStorage.getItem('en') !== 's' && localStorage.getItem('en') !== 'n'){

                if(iniEmp === 'PS'){
                   
                    
                    // boton
                    $("#mantenerEnvioDeRemito").show()
                    $("#siguienteNormal").hide()
                    $("#abrirfirmar").hide();
                    $("#seguirRecuperando").hide()
    
                    }
                    if(iniEmp !== 'PS'){
                        
                        
                        $("#mantenerEnvioDeRemito").show()
                        $("#siguienteNormal").hide()
                        $("#abrirfirmar").hide();
                        $("#seguirRecuperando").hide()
                    }   
            }

          }
    }
       // CERRAR SESION

$("#cerrarSesion").click(function(){
    
    finalizarTransaccion()

})
//borrar equipos | eliminar equipos | vacia caja 

// $(document).on('click','#vaciarCaja,#borrar-equipo',function(){
//     var getTransitoLS = JSON.parse(localStorage.getItem('transito')); 
//     var getCargaABaseLs = localStorage.getItem('en');


//     if(getCargaABaseLs === 's'){

//         Swal.fire({
//             title: 'Esta acción cerrara la caja actual',
//             text: "Si la cerras, la opción de enviar remito no estara disponible para el cliente actual",
//             icon: 'info',
//             showCancelButton: true,
//             confirmButtonColor: '#3085d6',
//             cancelButtonColor: '#d33',
//             confirmButtonText: 'cerrar caja',
//             cancelButtonText: 'mantener caja'
//           }).then((result) => {
//             if (result.isConfirmed) {
//                 finalizarTransaccion();
//                 $("#caja-de-equipos").modal("hide");

//             }
//           })

        
//     }
 
    
//      if(getTransitoLS=== null){
//          $("#clienteActual").html('')
//      } 
//      if(getTransitoLS !== null){
//          if(getTransitoLS.length === 0){
//             $("#clienteActual").html('')
//          }
//      }
   
// })

var registrarInactividad = function () {
    var t;
    window.onload = reiniciarTiempo;
    // Eventos del DOM
    document.onmousemove = reiniciarTiempo;
    document.onkeypress = reiniciarTiempo;
    document.onload = reiniciarTiempo;
    document.onmousemove = reiniciarTiempo;
    document.onmousedown = reiniciarTiempo; // aplica para una pantalla touch
    document.ontouchstart = reiniciarTiempo;
    document.onclick = reiniciarTiempo;     // aplica para un clic del touchpad
    document.onscroll = reiniciarTiempo;    // navegando con flechas del teclado
    document.onkeypress = reiniciarTiempo;

    function tiempoExcedido() {
        var ordenLS = localStorage.getItem("odi")
        var ordenhsLS = localStorage.getItem("odh")
        var recLs = localStorage.getItem("rec")
        var envioLs = localStorage.getItem("en")

            if (ordenLS !== null && ordenhsLS !== null && recLs !== null  && envioLs === 's'){
                finalizarTransaccion()
            }

    }

    function reiniciarTiempo() {
        clearTimeout(t);
        t = setTimeout(tiempoExcedido, 900000)
        // 1000 milisegundos = 1 segundo
    }
};

registrarInactividad();


  