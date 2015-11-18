<?php 

	include('../DAO/UmedidaDAO.php');

	class u_medidaController extends u_medida {

		//-------------------------------------
		//variables
		public $u_medida;
		//-------------------------------------

		//---------------------------------------------------------------------------------
	    public function getTablaUmedida(){

	    	//get de los u_medida
	    	$this->u_medida = $this->getUmedida();

	    	//valida si hay u_medida
	    	if($this->u_medida){

	    		for($a=0;$a<sizeof($this->u_medida);$a++){

                 $id = $this->u_medida[$a]["pkID"];                 
                 $nombre = $this->u_medida[$a]["nombre"];
                 $abreviatura = $this->u_medida[$a]["abreviatura"];                          

                 echo '
                             <tr>
                                 <td>'.$id.'</td>                                 
                                 <td>'.$nombre.'</td>
                                 <td>'.$abreviatura.'</td>                                 
		                         <td>
		                             <button id="btn_editar" name="edita_u_medida" type="button" class="btn btn-primary" data-toggle="modal" data-target="#frm_modal_u_medida" data-id-Umedida = "'.$id.'" ><span class="glyphicon glyphicon-pencil"></span>&nbspEditar</button>
		                             
		                             <button id="btn_eliminar" name="elimina_u_medida" type="button" class="btn btn-danger" data-id-Umedida = "'.$id.'" ><span class="glyphicon glyphicon-remove"></span>&nbspEliminar</button>
		                         </td>
		                     </tr>';
                };


	    	}else{

             echo "<tr>
		               <td></td>
		               <td></td>
		               <td></td>
		               <td></td>		               		                                            
		           </tr>
		           <h3>En este momento no hay Unidades de medida creadas.</h3>";
            };
	    }
	}

 ?>