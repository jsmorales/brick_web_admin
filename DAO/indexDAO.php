<?php 

	include_once 'GenericoDAO.php';

	/**
	* 
	*/
	class indexDAO extends GenericoDAO
	{
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

	}

	/*
	$var = new indexDAO();

	print_r($var->getDatos());

	*/


 ?>