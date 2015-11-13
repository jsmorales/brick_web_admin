<?php 

	//header('http-equiv="Content-Type" content="text/html; charset=utf-8"');//header para json

	include('../DAO/GenericoDAO.php');

	include('crea_sql.php');

	include('../DAO/CotizacionDAO.php');

	require('../controller/fpdf/fpdf.php');

	$accion= isset($_GET['tipo'])?$_GET['tipo']:"x";

 	$r = array();

 	switch ($accion) {

 		case 'genera_cotizacion':

 		$pdf = new FPDF();
 		$cotizaInst = new cotizacion();
 		$data_gen = $cotizaInst->getCotizacionId($_GET['pkID']);
 		//------------------------------------------------------
 		//variables generales
 		$id_cotiza = $data_gen[0]["pkID"];
 		$fecha = $data_gen[0]["fecha"];
 		//variables cliente
 		$num_cc = $data_gen[0]["num_cc"];
 		$nom_cliente = $data_gen[0]["nom_cliente"];
 		$ap_cliente = $data_gen[0]["ap_cliente"];
 		//variables de usuario
 		$alias_user = $data_gen[0]["alias"];
 		//variables cotizacion
 		$total_cotiza = $data_gen[0]["valor_total"];
 		//------------------------------------------------------
 		//trae registros generales
 		
 		

 		$registros = $cotizaInst->getRegistrosCotizaPDF($_GET['pkID']);

 		$header = array("Nombre","Cantidad/Un","$/Costo","Clase");
 		$data = array_values($registros);
 		

 		//------------------------------------------------------ 		

 		
		$pdf->AddPage();
		//------------------------------------------------------
		// Logo
	    //$pdf->Image('logo_pb.png',10,8,33);
	    // Arial bold 15
	    $pdf->SetFont('Arial','B',15);
	    // Movernos a la derecha
	    $pdf->Cell(55);
	    // Título
	    $pdf->Cell(90,10,'Deposito y Ferreteria La Super 7',1,0,'C');
	    // Salto de línea
	    $pdf->Ln(20);
		//------------------------------------------------------
		$pdf->SetFont('Times','',14);
		$pdf->Cell(150,10,'Fecha creacion:'.$fecha);
		$pdf->Cell(20,10,'Usuario:'.$alias_user);
		$pdf->Ln();		
		$pdf->Cell(40,10,'Numero de cedula: '.$num_cc);
		$pdf->Ln();
		$pdf->Cell(40,10,'Nombre: '.$nom_cliente." ".$ap_cliente);
		$pdf->Ln();
		$pdf->Cell(40,10,'Materiales');
		$pdf->Ln();	
		
		// Cabecera
		    foreach($header as $col)
		        $pdf->Cell(49,7,$col,1);
		    	$pdf->Ln();
		    // Datos
		    foreach($data as $row)
		    {
		        foreach($row as $col)
		            $pdf->Cell(49,6,$col,1);
		        	$pdf->Ln();
		    }

		$pdf->Ln();
		$pdf->Cell(40,10,'Total : $'.$total_cotiza);

		//$name = "cotizacion_n".$id_cotiza.".pdf";
		$pdf->Output();

 	};
 	//--------------------------------------------------------------------------------------------------------

	//echo json_encode($r); //imprime el json
	

 ?>