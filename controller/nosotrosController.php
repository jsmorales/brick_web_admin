<?php 
	
	include('../DAO/nosotrosDAO.php');

	/**
	* 
	*/
	class nosotrosController extends nosotrosDAO
	{
		
		function acercaDe(){

			$contenido = $this->getContenidos();

			echo '<h1 class="text-center">'.$contenido[0]["nombre"].'</h1>
                    <hr>                    
                    <hr class="visible-xs">
                    <p>'.$contenido[0]["contenido"].'</p> <br>';
		}

		function mision(){

			$contenido = $this->getContenidos();

			echo '<h1 class="text-center">'.$contenido[1]["nombre"].'</h1>
                    <hr>                    
                    <hr class="visible-xs">
                    <p>'.$contenido[1]["contenido"].'</p> <br> <br>';
		}

		function vision(){

			$contenido = $this->getContenidos();

			echo '<hr> <h1 class="text-center">'.$contenido[2]["nombre"].'</h1>
                    <hr>                    
                    <hr class="visible-xs">
                    <p>'.$contenido[2]["contenido"].'</p>';
		}
	}
 ?>