<?php 

	include("muestra_pagina.php");

	$muestra_clase = new mostrar();

	//---------------------------------------------------------
	$pagina = "cont_clase.php";
	$scripts = array('cont_clase.js');
	$perfiles_in = array('Administrador');
	//---------------------------------------------------------

	$muestra_clase->mostrar_pagina_scripts($pagina,$scripts,$perfiles_in);

 ?>