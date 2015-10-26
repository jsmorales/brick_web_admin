<?php

	error_reporting(0);

	header('Content-type: application/json');
	

	include("php_subida_objt.php");

	if(isset($_POST["submit"]) && isset($_FILES['file'])) {

	    $va_para = '/var/www/html/sgwbrick_proyecto/pages/subidas/';

		$subida = new sube_imagen($_FILES["imagen_sube"],$va_para);

		json_encode($respuesta = $subida->subir());

	} else {
	    
		//$mensaje_err = array();

	    $mensaje_err = array('estado' => "Archivo no pudo ser movido al server.");

	    json_encode($mensaje_err);
	}

	

	//$respuesta = $subida->subir();
	//echo "<img src='".$respuesta["src"]."'>"; 

 ?>