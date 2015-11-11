<?php 

	include("muestra_pagina.php");

	$muestra_cotizacion = new mostrar();

	//---------------------------------------------------------
	$pagina = "cont_cotizacion.php";
	$scripts = array('cont_cotizacion.js', 'cont_cotizacion_bd.js');
	$perfiles_in = array('Administrador','Empleado');
	//---------------------------------------------------------

	$muestra_cotizacion->mostrar_pagina_scripts($pagina,$scripts,$perfiles_in);

 ?>