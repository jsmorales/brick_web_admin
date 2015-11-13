<?php 

	include('../DAO/CotizacionDAO.php'); 

	class CotizacionController extends cotizacion {

		//-------------------------------------
		//variables
		public $cotizacion;
		//-------------------------------------

		//---------------------------------------------------------------------------------
	    public function getTablaCotizacion($tipo_usuario,$id_usuario){

	    	if($tipo_usuario == "Administrador"){
	    		//get de los cotizacion  
	    		$this->cotizacion = $this->getCotizacion();
	    	}else{
	    		$this->cotizacion = $this->getCotizacionUser($id_usuario);
	    	}	    	

	    	//valida si hay cotizacion
	    	if($this->cotizacion){

	    		for($a=0;$a<sizeof($this->cotizacion);$a++){

                 $id = $this->cotizacion[$a]["pkID"];
                 $fecha = $this->cotizacion[$a]["fecha"];
                 $cliente = $this->cotizacion[$a]["nom_cliente"]." ".$this->cotizacion[$a]["ap_cliente"];
                 $usuario = $this->cotizacion[$a]["nom_usuario"]." ".$this->cotizacion[$a]["ap_usuario"]."-<strong>".$this->cotizacion[$a]["alias"]."</strong>";

                 $valor_total = $this->cotizacion[$a]["valor_total"];

                 $fkID_cliente = $this->cotizacion[$a]["fkID_cliente"];
                 $fkID_usuario = $this->cotizacion[$a]["fkID_usuario"];


                 $materiales = $this->getRegistrosCotiza($id);

                 echo '
                             <tr>
                                 <td>'.$id.'</td>
                                 <td>'.$cliente.'</td>                                                    
                                 <td>'.$usuario.'</td>
                                 <td>'.$fecha.'</td>
                                 <td>';
                               echo "<table>
	                               		<thead>
	                                          <tr>
	                                              <th>nombre</th>
	                                              <th>cantidad</th>
	                                              <th>total</th>
	                                              <th>clase</th>                                              
	                                          </tr>
	                                      </thead> 
	                                 		";
	                                 for($b=0;$b<sizeof($materiales);$b++){

	                                 	$nom_material = $materiales[$b]["nom_material"];
	                                 	$cantidad_material = $materiales[$b]["cantidad_material"];
	                                 	$costo_material = $materiales[$b]["costo_material"];
	                                 	$clase_material = $materiales[$b]["clase_material"];
	                                 
	                                 	echo "<tr>
	                                 		  <td>".$nom_material."</td>
	                                 		  <td>".$cantidad_material."</td>
	                                 		  <td>".$costo_material."</td>
	                                 		  <td>".$clase_material."</td>
	                                 		  </tr>";                                

	                                 };
                               echo "</table>";

                echo'            </td>
                                 <td><strong>'.$valor_total.'</strong></td>                                                                  
		                         <td>
		                             <a id="btn_genera" name="" type="button" class="btn btn-primary" data-toggle="modal" href="../controller/ajaxGeneraPDF.php?tipo=genera_cotizacion&pkID='.$id.'" target="_blank" ><span class="glyphicon glyphicon-pencil"></span>&nbspGenera PDF</a>		                             
		                         </td>
		                     </tr>';
                };


	    	}else{

             echo "<tr>
		               <td></td>
		               <td></td>
		               <td></td>
		               <td></td>
		               <td></td>
		               <td></td>
		               <td></td>		               		                                           
		           </tr>
		           <h3>En este momento no hay cotizaciones creadas.</h3>";
            };

	    }
	    //---------------------------------------------------------------------------------
	}

 ?>