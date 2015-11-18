
<?php
include_once '../DAO/UsuariosDAO.php';

include_once '../DAO/ClientesDAO.php';

/**
 * La clase UsuariosController maneja toda la parte de procesamiento de datos de usuarios
 *
 */
class UsuariosController {

    //ATRIBUTOS DE LA CLASE

    public $UsuariosDAO;
    
    //CONSTRUCTOR DE LA CLASE

    public function __construct() {
        $this->UsuariosDAO = new UsuariosDAO();
    }

    //MÉTODOS DE LA CLASE

    /**
     * Función para guardar o actualizar un usuario, simplemente se encarga de guardar o actualizar
     * en la base de datos los parámetros que lleguen del usuario
     * @param Array $arrayDatos
     * @return boolean
     */
    public function guardarUsuario($arrayDatos) {
       
    }
	
	/**
     * Función para obtener usuarios
     * @param Array $arrayDatos
     * @return boolean
     */
    public function getUsuarios() {
        return $this->UsuariosDAO->getUsuarios();
    }

    public function getTipoUsuarios() {
        
        $tipo = $this->UsuariosDAO->getTipoUsuarios();
        
        for($a=0;$a<sizeof($tipo);$a++){
        	echo "<option value='".$tipo[$a]["pkID"]."'>".$tipo[$a]["nombre"]."</option>";
        }
    }

    //---------------------------------------------------------------------------------
    public function getTablaUsuarios(){

    	//get de los usuarioes
    	$usuarios = $this->UsuariosDAO->getUsuarios();

    	//valida si hay usuarioes
    	if($usuarios){

    		for($a=0;$a<sizeof($usuarios);$a++){

             $id = $usuarios[$a]["pkID"];
             $alias = $usuarios[$a]["alias"];                           
             $nombres = $usuarios[$a]["nombres"];
             $apellidos = $usuarios[$a]["apellidos"];
             $numero_cc = $usuarios[$a]["numero_cc"];
             $nom_tipo = $usuarios[$a]["nom_tipo"];
                                             

             echo '
                         <tr>
                             <td>'.$id.'</td>
                             <td>'.$alias.'</td>                                 
                             <td>'.$nombres.'</td>
                             <td>'.$apellidos.'</td>
                             <td>'.$numero_cc.'</td>
                             <td>'.$nom_tipo.'</td>
	                         <td>
	                             <button id="btn_editar" name="edita_usuario" type="button" class="btn btn-primary" data-toggle="modal" data-target="#frm_modal_usuario" data-id-usuario = "'.$id.'" ><span class="glyphicon glyphicon-pencil"></span>&nbspEditar</button>
		                         <br><br>    
	                             <button id="btn_eliminar" name="elimina_usuario" type="button" class="btn btn-danger" data-id-usuario = "'.$id.'" ><span class="glyphicon glyphicon-remove"></span>&nbspEliminar</button>
	                         </td>
	                     </tr>';
            };


    	}else{

         echo "<tr>
	               <td></td>
	               <td></td>
	               <td></td>		               		                                            
	           </tr>
	           <h3>En este momento no hay usuarioes creadas.</h3>";
        };
    }
	
	public static function AutenticarUsuario(){
	
		$Usr_Mail=$_POST['username'];
		$Usr_Clave=$_POST['password'];		
		
		//---------------------------------------------------------------------------------------
		if(($Usr_Mail=="irestrepo") && ($Usr_Clave=="12345")){
			
			//echo "<script language=javascript>top.location='/mapa-p'</script>";
			echo $Usr_Mail."--".$Usr_Clave;
		}else{
		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		
		$matriz=UsuariosDAO::getUsuariosLogin($Usr_Mail,$Usr_Clave);
		//print_r($matriz);
		
		$id=$matriz[0]['pkID'];
		$alias=$matriz[0]['alias'];
		$nombre=$matriz[0]['nombres'];
		$apellidos=$matriz[0]['apellidos'];
		$num_cc=$matriz[0]['numero_cc'];
		$tipo=$matriz[0]['t_usuario'];		

		//echo "El estado del usuario es: ".$estado;

		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		if (($id!="") and ($nombre!="")){

			$clientes = new clientes();

			$res = $clientes->getClientesCc($num_cc);

			$idCli=$res[0]['pkID'];

			setcookie("log_brick_id", $id, time() + 3600, "/");
			setcookie("log_brick_idCli", $idCli, time() + 3600, "/");
			setcookie("log_brick_alias", $alias, time() + 3600, "/");
			setcookie("log_brick_nombre", $nombre." ".$apellidos, time() + 3600, "/");
			setcookie("log_brick_num_cc", $num_cc, time() + 3600, "/");
			setcookie("log_brick_tipo", $tipo, time() + 3600, "/");

			//echo "la cookie queda:".$id."-".$nombre."-".$tipo;

			//echo "nombre desde la cookie:".$_COOKIE["log_usuario_nombre"];

			echo '<script language="JavaScript">
					alert("Bienvenido '.$nombre.' '.$apellidos.'");					
			</script>';

			//print_r($res);

			//validar el tipo y redireccionar
			echo "<script language=javascript> location.href='../vistas/index_admin.php'</script>";
				
		} else {
		
			echo '<script language="JavaScript">
					alert("Usuario o password incorrecto, en otro caso por favor verifique que su usuario este activo.");
					window.location = "javascript:history.back(-1)"
				</script>';
			}
		//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++		
		}
		//---------------------------------------------------------------------------------------
						
	}
    
}

?>
