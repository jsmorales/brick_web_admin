<?php 

	include("muestra_pagina.php");

	$muestra_cotizacion = new mostrar();

	//---------------------------------------------------------
	$pagina = "cont_cotizacion.php";
	$scripts = array('cont_cotizacion.js');
	$perfiles_in = array('Administrador');
	//---------------------------------------------------------

	$muestra_cotizacion->mostrar_pagina_scripts($pagina,$scripts,$perfiles_in);

 ?>