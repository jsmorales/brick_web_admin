<?php

	header('Content-type: application/json');
	

	include("php_subida_objt.php");

	$va_para = '/var/www/html/brick_web_admin/vistas/subidas/';

	if( isset($_FILES['imagen_sube']) ){

		$subida = new sube_imagen($_FILES["imagen_sube"],$va_para);

		//$subida->asigna_val();

		//print_r($subida->subir());

		echo json_encode($respuesta = $subida->subir());

		//echo "<img src='".$respuesta["src"]."'>"; 
	}else{

		$mensaje = array('mensaje' => "No existe ninguna imagen para subir.");

		echo json_encode($mensaje);
	}; 

 ?>