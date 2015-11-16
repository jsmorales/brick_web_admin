<?php 

	include_once 'GenericoDAO.php';

	class registro extends GenericoDAO{

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
		public function getTipoUsuario(){

			$this->q_general = "select * from tipo_usuario";			
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}
		/*-----------------------------------------*/

	};


 ?>