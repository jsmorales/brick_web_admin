<?php 

	include('../DAO/CotizacionDAO.php'); 

	class CotizacionController extends cotizacion {

		//-------------------------------------
		//variables
		public $cotizacion;
		//-------------------------------------

		//---------------------------------------------------------------------------------
	    public function getTablaCotizacion(){

	    	//get de los cotizacion
	    	$this->cotizacion = $this->getCotizacion();

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

                 echo '
                             <tr>
                                 <td>'.$id.'</td>
                                 <td>'.$fecha.'</td>
                                 <td>'.$valor_total.'</td>
                                 <td>'.$cliente.'</td>                                                    
                                 <td>'.$usuario.'</td>                                 
		                         <td>
		                             <button id="btn_editar" name="edita_cliente" type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal_cotizacion" data-id-cliente = "'.$id.'" ><span class="glyphicon glyphicon-pencil"></span>&nbspEditar</button>
		                             <br><br>
		                             <button id="btn_eliminar" name="elimina_cliente" type="button" class="btn btn-danger" data-id-cliente = "'.$id.'" ><span class="glyphicon glyphicon-remove"></span>&nbspEliminar</button>
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
		           </tr>
		           <h3>En este momento no hay cotizacion creados.</h3>";
            };

	    }
	    //---------------------------------------------------------------------------------
	}

 ?>