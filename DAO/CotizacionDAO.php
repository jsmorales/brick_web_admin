<?php 

	include_once 'GenericoDAO.php';

	class cotizacion extends GenericoDAO{

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
		public function getCotizacion(){

			$this->q_general = "select cotizacion . * , cliente.num_cc, cliente.nombres AS nom_cliente, cliente.apellidos AS ap_cliente, usuarios.nombres AS nom_usuario, usuarios.apellidos AS ap_usuario, usuarios.alias
								FROM  `cotizacion` 
								INNER JOIN cliente ON cliente.pkID = cotizacion.fkID_cliente
								INNER JOIN usuarios ON usuarios.pkID = cotizacion.fkID_usuario";			
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}


		/*-----------------------------------------*/
	};

 ?>