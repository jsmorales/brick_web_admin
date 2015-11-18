<?php 

	include_once 'GenericoDAO.php';

	class u_medida extends GenericoDAO{

		/*-----------------------------------------*/
		//variables
		public $q_general;
		public $q_u_medida;

		public $q_inserta;		
		/*-----------------------------*/
		public function __construct(){
			//contruye la clase GenericoDAO
			parent::__construct();
		}
		/*-----------------------------------------*/

		/*-----------------------------------------*/
		//funciones
		public function getUmedida(){

			$this->q_general = "select * from u_medida";			
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}
	}

 ?>