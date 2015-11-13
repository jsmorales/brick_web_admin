<?php 

	include('../DAO/contactoDAO.php');

	class contactoController extends contactoDAO{

		//---------------------------------------------

		function mapa(){

			$contenido = $this->getContenidos();

			echo $contenido[3]["contenido"];
		}

		function datos_contacto(){

			$datos = $this->getDatos();

			//echo $contenido[3]["contenido"];
			//print_r($datos);

				echo'<p>Teléfono:
                        <strong>'.$datos[0]["telefono"].'</strong>
                    </p>
                    <p>Correo:
                        <strong><a href="mailto:'.$datos[0]["correo"].'">'.$datos[0]["correo"].'</a></strong>
                    </p>
                    <p>Dirección:
                        <strong>'.$datos[0]["direccion"].'
                            <br>'.$datos[0]["ubicacion"].'</strong>
                    </p>';
		}
		//---------------------------------------------
	}

 ?>