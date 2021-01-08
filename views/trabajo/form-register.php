<?php require_once 'views/layout/headerReclute.php';?>
<?php
if (isset($_SESSION["username"])) {


    if ($_SESSION["username"]->status_process === 'first') { ?>
        <div class="requisitos" id="requisitos" style="text-align:center;"><strong>A continuacion te solicitaremos lo siguiente:</strong>
            
            <p class="prequisito">
                -Constancia de monostributo (Si no lo tenés, podes darle de alta en plena gestión).
            </p>
            <p class="prequisito">
                -Foto frontal y dorsal del documento de identidad.
            </p>
            <p class="prequisito">
                -Foto de una constancia de domicilio.
            </p>
            <p class="prequisito">
                -Foto de tu cuit/rut.
            </p>
            <p class="prequisito">
                -Foto frontal de tu cara.
            </p>
            <?php if($_SESSION["username"]->rol === 'comercio'){ ?>
                <p class="prequisito">
                -Foto frontal del comercio.
               </p>
            <?php } ?>
            <p style="color:red;" class="prequisito">
               <strong class="nota" >Nota : Recomendamos realizar el registro conectad@ a una red Wi fi. </strong>  
            </p>
            <p style="margin:auto;text-align:center;">
                <img style="width:150px;height:90px;margin:auto;" src="../estilos/imagenes/front/car2.png" alt="">
            </p>

            <button id="empezar">Registrarme</button>
           
        </div>

    
        <div class="container form-first" id="container-form">

                <?php 
        if(isset($_SESSION["register"])){
            if($_SESSION["register"]==='failed'){ ?>
            <h5 class="alerta alerta-red" >No te has podido registrar exitosamente. Comunicate con nosotros <a href="<?=base_url?>express/contacto" target="_blank" > Contactar</a>  </h5>
        <?php  }else if($_SESSION["register"]==='incomplete'){ ?>
            <h5 class="alerta alerta-red" >No hemos recibido los requisitos necesarios para el registro. Vuelve a intentarlo</h5>
       <?php }
        }
        ?>


        
            <header>Registrate para empezar!</header>
            <div class="progress-bar">
                <div class="step">
                    <p>
                    </p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check fas fa-check">
                    </div>
                </div>
                <div class="step">
                    <p>
                    </p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check fas fa-check">
                    </div>
                </div>
                <div class="step">
                    <p>
                    </p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check fas fa-check">
                    </div>
                </div>
                <div class="step">
                    <p>
                    </p>
                    <div class="bullet">
                        <span>4</span>
                    </div>
                    <div class="check fas fa-check">
                    </div>
                </div>
            </div>
            <div class="form-outer">
                <form action="<?=base_url?>usuario/registerComplete" id="datosPost" method="POST" enctype="multipart/form-data">
                    <div class="page slide-page">

                        <div class="field">
                            <div class="label">
                                Pais</div>
                            <select name="getPais" id="getPais">

                            </select>
                        </div>
                        <div class="field">
                            
                            <div class="label">
                                Provincia <span id="loaderProvincia" ></span>  </div>
                            <select name="getProvincia" id="getProvincia">

                            </select>
                            <input type="hidden" name="pais" id="pais">
                        <input type="hidden" name="provincia" id="provincia">
                        </div>
                        
                        <div class="field">
                            <div class="label">
                                Localidad</div>
                            <input name="localidad" type="text" id="localidad">
                        </div>

                        <div class="field">
                            <div class="label">
                                Codigo Postal</div>
                            <input name="codigoPostal" type="text" id="codigoPostal">
                        </div>
                        <div class="box-cp" id="box-cp">
                          
                        </div>

                        <div class="field">
                            <button class="firstNext next" id="primer-siguiente">Siguiente</button>
                        </div>
                    </div>


                    <div class="page">
                        <div class="field">
                            <div class="label">
                                Domicilio</div>
                            <input type="text" name="domicilio" id="domicilio">
                        </div>
                        <div class="field">
                            <div class="label">Documento <span style="color:red;font-size:11px;" id="errorDoc"> </span> </div> 
                            <select id="tipo-documento" name="tipo-documento" class="caracteristica">
                                <option value="dni">DNI</option>
                                <option value="enrolamiento">Cedula</option>
                                <option value="pasaporte">Pasaporte</option>
                                <option value="civ">L.Civica</option>
                                <option value="enrolamiento">L. Enrolamiento</option>
                            </select>

                            <input type="text" name="numero-documento" id="numero-documento" placeholder="Documento">
                        </div>



                        <div class="field">
                            <div class="label" style="font-size:13px;">
                                Monotributo / AFIP / o Mides  </div>
                                <span style="margin:0.5rem auto;" id="loaderMonotribute" ></span>
                            <select name="monotributo" id="monotributo">
                                <option value="0">Indique si posee</option>
                                <option value="si">si</option>
                                <option value="no">no</option>

                            </select>
                        </div>
                        <div class="field">
                            <div class="label">
                                Constancia de inscripción</div>
                            <input type="file" name="imgMonotributo" id="imgMonotributo">
                            <!-- <input type="text" placeholder="id usuario zona" id="id_user_zona_corresponde"> -->
                        </div>
                        <!-- MENSAJE -->
                        <div class="container-monotributo" id="container-monotributo">
                            <div class="box-monitributo" id="box-monitributo">
                            </div>
                        </div>



                        <div class="field btns">
                            <button class="prev-1 prev" id="secondPrev">Atras</button>
                            <button class="next-1 next" id="secondNext">Siguiente</button>
                        </div>
                    </div>


                    <div class="page">
                        <!-- <div class="title">
                Contact Info:</div> -->

                        <div class="field">
                            <div class="label">
                                Foto frontal documento</div>
                            <input type="file" name="imgDocumentoFrontal" id="imgDocumentoFrontal">
                        </div>
                        <div class="field">
                            <div class="label">
                                Foto dorsal documento</div>
                            <input type="file" name="imgDocumentoDorsal" id="imgDocumentoDorsal">
                        </div>
                        <div class="field">
                            <div class="label">
                                Foto CUIL o RUT</div>
                            <input type="file" name="imgCuilRut" id="imgCuilRut">
                        </div>
                        <div class="field">
                            <div class="label" style="font-size: 0.7rem;">
                                Comprobante de domicilio / Servicio</div>
                            <input type="file" name="imgComprobanteDomicilio" id="imgComprobanteDomicilio">
                        </div>


                        <!-- FIN DEL MENSAJE -->

                        <div class="field btns">
                            <button class="prev-2 prev">Atras</button>
                            <button class="next-2 next" id="thridNext">Siguiente</button>
                        </div>
                    </div>

                    <div class="page">

                        <div class="field" id="cont-selfie">
                            <div class="label">
                                Foto frontal "Selfie"</div>
                            <input type="file" name="imgFrontalPersona" id="imgFrontalPersona">
                        </div>
                        <?php if($_SESSION["username"]->rol === 'comercio'){ ?>

                            <div class="field" id="cont-commerce">
                            <div class="label">
                                Foto frontal del comercio</div>
                            <input type="file" name="imgFrontalCommerce" id="imgFrontalCommerce">
                        </div>
                            

                        <?php } ?>

                        


                        <div class="field" id="cont-telefono">
                            <div class="label">Telefono</div>
                            <input type="text" name="telefono_celular" id="telefono_celular">
                        </div>


                        <div class="field" id="cont-conocimiento">
                            <div class="label">¿Como nos conociste?</div>
                            <select name="via_conocimiento" id="via_conocimiento">
                            <option value="0">Seleccion opción</option>
                                <option value="facebook">Facebook</option>
                                <option value="instagram">Instagram</option>
                                <option value="google">Google</option>
                                <option value="gallito-luis">Gallito Luis</option>
                                <option value="empleo-clarin">Empleos clarin</option>
                                <option value="recomendacion-de-ex-contratista">Recomendación de alguien que presto servicio para Express</option>
                                <option value="recomendacion-terceros">Recomendación de un tercero</option>
                                <option value="otros">Otros</option>
                            </select>
                        </div>

                        <input type="hidden" name="id_reclute_guia" id="id_reclute_guia" value="<?= $_SESSION["username"]->id_user ?>">
                        <input type="hidden" name="fecha" id="fecha">
                        

                        <div class="field btns" id="footer-btn">
                            <button class="prev-3 prev">Atras</button>
                            <button  class="submit" id="preparar">Listo</button>
                        </div>
                        <div id="last-page">
                                </div>
                                <div id="loaderSend" ></div>
                        
                    </div>
                    
                </form>
            </div>
        </div>

       
    <?php }
} else if ($_SESSION["username"]->status_process === 'first' || $_SESSION["username"]->status_process === 'sign_contract' || $_SESSION["username"]->status_process === 'signed_contract' || $_SESSION["username"]->status_process === 'active') { ?>

    <style>
        .stand-user {
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            flex-direction: column;
            margin: 6rem auto;
        }
    </style>


    <div class="stand-user">
        <h4 class="text-center"> ¡Hola! <?= $_SESSION["username"]->first_name ?> </h4>
        <h5 class="text-center">Gracias por querer ser parte de Express! <div class="spinner-border text-primary" role="status"></div>
        </h5>

        <img style="width:10rem; height:10rem;" src="<?= base_url ?>estilos/imagenes/logo.png" alt="">
    </div>


<?php }
 Utils::deleteSession('register');
?>


<?php require_once 'views/layout/footerReclute.php'; ?>