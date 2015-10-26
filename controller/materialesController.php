<?php
	
	include('../DAO/MaterialesDAO.php'); 

	class MaterialesController {

		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public $materialesDAO;

		//--------------------------
		private $materiales;
		//--------------------------

		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		
		public function getMateriales() {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->getMateriales();
	    }

	    public function getMaterialId($q_material) {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->getMaterialId($q_material);
	    }

	    public function getMaterialPropiedades($id_material) {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->getMaterialPropiedades($id_material);
	    }

	    public function insertaMateriales($q_insertaMaterial) {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->insertaMateriales($q_insertaMaterial);
	    }

	    public function getPropiedades() {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->getPropiedades();
	    }

	    public function getUniMedida() {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->getUmedida();
	    }
	    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	    //---------------------------------------------------------------------------------
	    public function getTablaMateriales(){

	    	//get de los materiales
	    	$this->materiales = $this->getMateriales();

	    	//valida si hay materiales
	    	if($this->materiales){

	    		for($a=0;$a<sizeof($this->materiales);$a++){

                 $id = $this->materiales[$a]["pkID"];
                 $nombre = $this->materiales[$a]["nombre"];
                 $precio = $this->materiales[$a]["precio"];
                 $marca = $this->materiales[$a]["marca"];
                 $imagen = $this->materiales[$a]["imagen"];

                 if ($imagen == NULL) {
                  	$imagen = "no_item.jpg";
                 }

                 $propiedades = $this->getMaterialPropiedades($id);

                 //print_r($propiedades);

                 echo '
                             <tr>
                                 <td>'.$id.'</td>
                                 <td>'.$nombre.'</td>
                                 <td>'.$precio.'</td>                                                    
                                 <td>'.$marca.'</td>
                                 <td><div class="img_alido_edit"><img src="subidas/'.$imagen.'" height="150"></div></td>
                                 <td><ul class="list-group">';
                                 /**/
                                    if(sizeof($propiedades[0])>0){
                                      for ($i=0; $i < sizeof($propiedades); $i++) {
                                        //print_r($entrega[$i]); 
                                        echo '                                                                  
                                          <li class="list-group-item"> <strong>'.$propiedades[$i]["nombre"].':</strong> '.$propiedades[$i]["valor"].' '.$propiedades[$i]["abreviatura"].'</li>                                                                  
                                          ';
                                      };
                                    }else{
                                        echo'<div class="alert alert-warning" role="alert">
                                        		<p class="text-center"> No se han asignado propiedades a este material. </p>
                                    		</div>';
                                    };
                                 echo '</ul></td>
		                                 <td>
		                                     <button id="btn_editar" name="edita_material" type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal_materiales" data-id-material = "'.$id.'" ><span class="glyphicon glyphicon-pencil"></span>&nbspEditar</button>
		                                     <br><br>
		                                     <button id="btn_eliminar" name="elimina_material" type="button" class="btn btn-danger" data-id-material = "'.$id.'" ><span class="glyphicon glyphicon-remove"></span>&nbspEliminar</button>
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
		           <h3>En este momento no hay Materiales creados.</h3>";
            };

	    }
	    //---------------------------------------------------------------------------------
	}

 ?>