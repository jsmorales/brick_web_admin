<?php 

	include("muestra_pagina.php");

	$muestra_propiedades = new mostrar();

	//---------------------------------------------------------
	$pagina = "cont_propiedades.php";
	$scripts = array('cont_propiedades.js');
	$perfiles_in = array('Administrador');
	//---------------------------------------------------------

	$muestra_propiedades->mostrar_pagina_scripts($pagina,$scripts,$perfiles_in);

 ?>