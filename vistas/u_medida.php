<?php 

	include("muestra_pagina.php");

	$muestra_u_medida = new mostrar();

	//---------------------------------------------------------
	$pagina = "cont_u_medida.php";
	$scripts = array('cont_u_medida.js');
	$perfiles_in = array('Administrador');
	//---------------------------------------------------------

	$muestra_u_medida->mostrar_pagina_scripts($pagina,$scripts,$perfiles_in);

 ?>