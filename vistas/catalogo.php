<?php 

	include("muestra_pagina.php");

	$muestra_catalogo = new mostrar();

	//---------------------------------------------------------
	$pagina = "cont_catalogo.php";
	$scripts = array('cont_catalogo.js');
	$perfiles_in = array('Administrador','Empleado','Cliente');
	//---------------------------------------------------------

	$muestra_catalogo->mostrar_pagina_scripts($pagina,$scripts,$perfiles_in);

 ?>