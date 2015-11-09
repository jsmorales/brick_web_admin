<?php 

	include_once 'GenericoDAO.php';

	class clientes extends GenericoDAO{

		/*-----------------------------------------*/
		//variables
		public $q_general;
		public $q_propiedades;

		public $q_inserta;		
		/*-----------------------------*/
		public function __construct(){
			//contruye la clase GenericoDAO
			parent::__construct();
		}
		/*-----------------------------------------*/

		/*-----------------------------------------*/
		//funciones
		public function getClientes(){

			$this->q_general = "select * from cliente";			
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}
		/*-----------------------------------------*/

	};


 ?>