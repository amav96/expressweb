<?php 
if (isset($_SESSION["username"])) {
  	if( $_SESSION["username"]->rol == 'comercio' || $_SESSION["username"]->rol == 'admin' || $_SESSION["username"]->rol == 'recolector' && $_SESSION["username"]->status_process === 'active'  ){
  	}else{
		header("Location:".base_url."usuario/active");
	  }
  }else { 
     header("Location:".base_url."usuario/active");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url?>estilos/imagenes/logo/logo.png">
	<script src="<?=base_url?>estilos/personal/js/jquery.min.js"></script>
	<script src="<?=base_url?>estilos/personal/js/bootstrap.min.js"></script>
	
	
	
	<link rel="stylesheet" href="<?=base_url?>estilos/personal/fontawesome/css/all.css">

	<link rel="stylesheet" href="<?=base_url?>estilos/personal/css/bootstrap/bootstrap.min.css">

	<link rel="stylesheet" href="<?=base_url?>estilos/personal/css/index/recursos_index.css?v=20122020">

	<link rel="stylesheet" href="<?=base_url?>estilos/personal/css/sidebarper.css">
	

	<link rel="stylesheet" href="<?=base_url?>estilos/personal/css/panel_recolector/panel_recolector.css?v=20122020">
	

	<title>Express | Logistica inversa</title>

</head>

<body>



	<div class="container-artisan">


		<div class="fondoimagen" id="fondoimagen">


			<img class="logo-main" id="logodos" src="<?=base_url?>estilos/imagenes/logo2.png" alt="">

			<img class="logo-main-dos" id="logouno" src="<?=base_url?>estilos/imagenes/logo.png" alt="">

		</div>

	</div>

	<nav>
		<div class="contenedordemenu">
			<ul>
				<li>
					<a href="<?=base_url?>">

						<div class="fondocirculodelicono">
							<i class="iconoadentrodelcirculo fas fa-home"></i>
						</div>

						<p class="textoicono">Inicio</p>

					</a>
				</li>
				
				<li>
					<a href="<?=base_url?>express/contacto">
						<div class="fondocirculodelicono">
							<i class="iconoadentrodelcirculo fas fa-phone"></i>
						</div>
						<p class="textoicono">Contacto</p>
					</a>
				</li>
				
			</ul>
		</div>
	</nav>

	 <input class="input-form" type="checkbox" id="cuadraditocheck">
	  <label class="titulo-label" for="cuadraditocheck">
		<i class="fas fa-bars" id="boton"></i>
		<i class="fas fa-times" id="cancel"></i>
	</label>
	<div class="sidebarper completo">
		<header>Express</header>
		<ul class="completo">
			
		    <li>
				<a href="<?=base_url?>" ><i class="fas fa-home"></i>Inicio</a>
			</li>
			<li>
				<a href="<?=base_url?>usuario/collector" ><i class="fas fa-mobile-alt"></i>Panel Recolector</a>
			</li>
			<li>
				<a href="#" id="modelos"><i class="fas fa-vote-yea"></i>Modelos</a>
			</li>
			
			<!-- <li>
				<a href="#" id="nuevosClientes"><i class="fas fa-user-plus"></i>Nuevos Clientes</a>
			</li> -->
			<li>
				<a href="#" id="abrirEquiposAConsignacion"><i class="fas fa-box-open"></i>Equipos a consignación</a>
			</li>

			<li>
				<a href="<?=base_url?>equipo/credencial" ><i class="far fa-address-card"></i>Mi credencial</a>
			</li>
			
		
			<li>
				<a href="<?=base_url?>usuario/logOut" id="cerrarSesion"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
			</li>

		</ul>

	</div> 
	<!--Datos de uso-->
	<input type="hidden" id="img_person" value="<?= $_SESSION["username"]->img_person ?>">
            <input type="hidden" id="first_name" value="<?= $_SESSION["username"]->first_name ?>">
            <input type="hidden" id="rol" value="<?= $_SESSION["username"]->rol ?>">
            <input type="hidden"  id="id_number" value="<?= $_SESSION["username"]->id_number ?>">