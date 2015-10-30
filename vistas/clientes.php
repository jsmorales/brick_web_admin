<?php 

	include("muestra_pagina.php");

	$muestra_clientes = new mostrar();

	//---------------------------------------------------------
	$pagina = "cont_clientes.php";
	$scripts = array('cont_clientes.js');
	//---------------------------------------------------------

	$muestra_clientes->mostrar_pagina_scripts($pagina,$scripts);
 ?>