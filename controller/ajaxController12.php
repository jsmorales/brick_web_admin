<?php 
	
	header('content-type: aplication/json; charset=utf-8');//header para json	
	
	include('../DAO/GenericoDAO.php');

	include('crea_sql.php');

 	$accion= isset($_GET['tipo'])?$_GET['tipo']:"x";

 	$r = array();

 	switch ($accion) { 		
 		
		//----------------------------------------------------------------------------------------------------
	 	case 'inserta':

	 		$generico = new GenericoDAO();
	 		$crea_sql = new crea_sql();

	 		$q_inserta = $crea_sql->crea_insert($_GET);	 		

	 		$resultado = $generico->EjecutaInsertar($q_inserta);
	 		/**/
	 		if($resultado){
	 			
	 			$r[] = $resultado;

	 		}else{

	 			$r["estado"] = "Error";
	 			$r["mensaje"] = "No se inserto.";
	 		}

	 	break;
		//----------------------------------------------------------------------------------------------------

		//----------------------------------------------------------------------------------------------------
	 	case 'consultar':

	 		$generico = new GenericoDAO();
	 		$crea_sql = new crea_sql();

	 		$q_carga = $crea_sql->crea_select($_GET);	 		

	 		$resultado = $generico->EjecutarConsulta($q_carga);
	 		/**/
	 		if($resultado){

	 			$r["estado"] = "ok";
	 			$r["mensaje"] = $resultado;

	 		}else{

	 			$r["estado"] = "Error";
	 			$r["mensaje"] = "No hay registros.";
	 		}

	 	break;
		//----------------------------------------------------------------------------------------------------

		//----------------------------------------------------------------------------------------------------
	 	case 'actualizar':

	 		$generico = new GenericoDAO();
	 		$crea_sql = new crea_sql();

	 		$q_actualiza = $crea_sql->crea_update($_GET);	 		

	 		$resultado = $generico->EjecutaActualizar($q_actualiza);
	 		/**/
	 		if($resultado){
	 			
	 			$r["estado"] = "ok";
	 			$r["mensaje"] = $resultado;

	 		}else{

	 			$r["estado"] = "Error";
	 			$r["mensaje"] = "No se actualizó.";
	 		}

	 	break;
		//----------------------------------------------------------------------------------------------------
 	}
 	//--------------------------------------------------------------------------------------------------------

	echo json_encode($r); //imprime el json

 ?>