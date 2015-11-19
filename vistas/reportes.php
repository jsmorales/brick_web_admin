<?php 

	include("muestra_pagina.php");

	$muestra_reporte = new mostrar();

	//---------------------------------------------------------
	$pagina = "cont_reporte.php";
	$scripts = array('cont_reporte.js');
	$perfiles_in = array('Administrador');
	//---------------------------------------------------------

	$muestra_reporte->mostrar_pagina_scripts($pagina,$scripts,$perfiles_in);

 ?>