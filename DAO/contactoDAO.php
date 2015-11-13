<?php 

	include_once 'GenericoDAO.php';

	class contactoDAO extends GenericoDAO{

		public $generico;
		public $q_general;

		function __construct()
		{
			# code...
			//contruye la clase GenericoDAO
			//parent::__construct();
			$this->generico = new GenericoDAO();
		}

		/*-----------------------------*/
		//funciones
		public function getDatos(){

			$this->q_general = "select * from datos_generales";				
			
			return $this->generico->EjecutarConsulta($this->q_general);
		}

		/*-----------------------------*/
		
		public function getContenidos(){

			$this->q_general = "select * from contenidos";		
			
			return $this->generico->EjecutarConsulta($this->q_general);
		}
		/*-----------------------------*/

	}

 ?>