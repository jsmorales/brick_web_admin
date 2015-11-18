<?php 

	include_once 'GenericoDAO.php';

	class clase extends GenericoDAO{

		/*-----------------------------------------*/
		//variables
		public $q_general;
		public $q_clase;

		public $q_inserta;		
		/*-----------------------------*/
		public function __construct(){
			//contruye la clase GenericoDAO
			parent::__construct();
		}
		/*-----------------------------------------*/

		/*-----------------------------------------*/
		//funciones
		public function getClase(){

			$this->q_general = "select * from clase";			
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}
	}

 ?>