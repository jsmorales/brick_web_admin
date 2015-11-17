<?php 

	include('../DAO/PropiedadesDAO.php');

	class propiedadesController extends propiedades {

		//-------------------------------------
		//variables
		public $propiedades;
		//-------------------------------------

		//---------------------------------------------------------------------------------
	    public function getTablaPropiedades(){

	    	//get de los propiedades
	    	$this->propiedades = $this->getPropiedades();

	    	//valida si hay propiedades
	    	if($this->propiedades){

	    		for($a=0;$a<sizeof($this->propiedades);$a++){

                 $id = $this->propiedades[$a]["pkID"];                 
                 $nombre = $this->propiedades[$a]["nombre"];
                                             

                 echo '
                             <tr>
                                 <td>'.$id.'</td>                                 
                                 <td>'.$nombre.'</td>                                 
		                         <td>
		                             <button id="btn_editar" name="edita_propiedad" type="button" class="btn btn-primary" data-toggle="modal" data-target="#frm_modal_propiedad" data-id-propiedad = "'.$id.'" ><span class="glyphicon glyphicon-pencil"></span>&nbspEditar</button>
		                             
		                             <button id="btn_eliminar" name="elimina_propiedad" type="button" class="btn btn-danger" data-id-propiedad = "'.$id.'" ><span class="glyphicon glyphicon-remove"></span>&nbspEliminar</button>
		                         </td>
		                     </tr>';
                };


	    	}else{

             echo "<tr>
		               <td></td>
		               <td></td>
		               <td></td>		               		                                            
		           </tr>
		           <h3>En este momento no hay propiedades creadas.</h3>";
            };
	    }
	}

 ?>