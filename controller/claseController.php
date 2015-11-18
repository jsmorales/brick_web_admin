<?php 

	include('../DAO/ClaseDAO.php');

	class claseController extends clase {

		//-------------------------------------
		//variables
		public $clase;
		//-------------------------------------

		//---------------------------------------------------------------------------------
	    public function getTablaClase(){

	    	//get de los clase
	    	$this->clase = $this->getClase();

	    	//valida si hay clase
	    	if($this->clase){

	    		for($a=0;$a<sizeof($this->clase);$a++){

                 $id = $this->clase[$a]["pkID"];                 
                 $nombre = $this->clase[$a]["nombre"];
                                             

                 echo '
                             <tr>
                                 <td>'.$id.'</td>                                 
                                 <td>'.$nombre.'</td>                                 
		                         <td>
		                             <button id="btn_editar" name="edita_clase" type="button" class="btn btn-primary" data-toggle="modal" data-target="#frm_modal_clase" data-id-clase = "'.$id.'" ><span class="glyphicon glyphicon-pencil"></span>&nbspEditar</button>
		                             
		                             <button id="btn_eliminar" name="elimina_clase" type="button" class="btn btn-danger" data-id-clase = "'.$id.'" ><span class="glyphicon glyphicon-remove"></span>&nbspEliminar</button>
		                         </td>
		                     </tr>';
                };


	    	}else{

             echo "<tr>
		               <td></td>
		               <td></td>
		               <td></td>		               		                                            
		           </tr>
		           <h3>En este momento no hay clases de material creadas.</h3>";
            };
	    }
	}

 ?>