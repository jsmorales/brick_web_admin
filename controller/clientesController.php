<?php 

	include('../DAO/ClientesDAO.php'); 

	class ClientesController extends clientes {

		//-------------------------------------
		//variables
		public $clientes;
		//-------------------------------------

		//---------------------------------------------------------------------------------
	    public function getTablaClientes(){

	    	//get de los clientes
	    	$this->clientes = $this->getClientes();

	    	//valida si hay clientes
	    	if($this->clientes){

	    		for($a=0;$a<sizeof($this->clientes);$a++){

                 $id = $this->clientes[$a]["pkID"];
                 $nombre = $this->clientes[$a]["nombres"];
                 $apellidos = $this->clientes[$a]["apellidos"];
                 $telefono = $this->clientes[$a]["telefono"];
                 $direccion = $this->clientes[$a]["direccion"];
                 $email = $this->clientes[$a]["email"];                             

                 echo '
                             <tr>
                                 <td>'.$id.'</td>
                                 <td>'.$nombre.'</td>
                                 <td>'.$apellidos.'</td>                                                    
                                 <td>'.$telefono.'</td>
                                 <td>'.$direccion.'</td>
                                 <td>'.$email.'</td>
		                         <td>
		                             <button id="btn_editar" name="edita_cliente" type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal_clientes" data-id-material = "'.$id.'" ><span class="glyphicon glyphicon-pencil"></span>&nbspEditar</button>
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
		               <td></td>		                                            
		           </tr>
		           <h3>En este momento no hay clientes creados.</h3>";
            };

	    }
	    //---------------------------------------------------------------------------------

	}

 ?>