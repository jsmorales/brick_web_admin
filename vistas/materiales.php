<?php 

	include("muestra_pagina.php");

	$muestra_materiales = new mostrar();

	//---------------------------------------------------------
	$pagina = "cont_materiales.php";
	$scripts = array('cont_materiales.js','cont_materiales_prueba.js');
	$perfiles_in = array('Administrador','Empleado');
	//---------------------------------------------------------

	$muestra_materiales->mostrar_pagina_scripts($pagina,$scripts,$perfiles_in);

 ?>