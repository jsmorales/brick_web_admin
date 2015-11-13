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

		public function getCotizacionUser($id_usuario){

			$this->q_general = "select cotizacion . * , cliente.num_cc, cliente.nombres AS nom_cliente, cliente.apellidos AS ap_cliente, usuarios.nombres AS nom_usuario, usuarios.apellidos AS ap_usuario, usuarios.alias
								FROM  `cotizacion` 
								INNER JOIN cliente ON cliente.pkID = cotizacion.fkID_cliente
								INNER JOIN usuarios ON usuarios.pkID = cotizacion.fkID_usuario
								WHERE cotizacion.fkID_usuario =".$id_usuario;			
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}

		public function getCotizacionId($pkID_cotizacion){

			$this->q_general = "select cotizacion . * , cliente.num_cc, cliente.nombres AS nom_cliente, cliente.apellidos AS ap_cliente, usuarios.nombres AS nom_usuario, usuarios.apellidos AS ap_usuario, usuarios.alias
								FROM  `cotizacion` 
								INNER JOIN cliente ON cliente.pkID = cotizacion.fkID_cliente
								INNER JOIN usuarios ON usuarios.pkID = cotizacion.fkID_usuario
								WHERE cotizacion.pkID=".$pkID_cotizacion;			
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}

		public function getRegistrosCotiza($fkID_cotizacion){

			$this->q_general = "select cotizacion_material.fkID_material, cotizacion_material.cantidad_material, cotizacion_material.costo_material, material.nombre as nom_material, material.precio as precio_material, material.fkID_clase, clase.nombre as clase_material
								FROM cotizacion_material
								INNER JOIN material ON material.pkID=cotizacion_material.fkID_material
								INNER JOIN clase ON material.fkID_clase=clase.pkID
								WHERE cotizacion_material.fkID_cotizacion = ".$fkID_cotizacion;
			
			return GenericoDAO::EjecutarConsulta($this->q_general);								
		}

		public function getRegistrosCotizaPDF($fkID_cotizacion){

			$this->q_general = "select material.nombre as nom_material, cotizacion_material.cantidad_material, cotizacion_material.costo_material, clase.nombre as clase_material
								FROM cotizacion_material
								INNER JOIN material ON material.pkID=cotizacion_material.fkID_material
								INNER JOIN clase ON material.fkID_clase=clase.pkID
								WHERE cotizacion_material.fkID_cotizacion = ".$fkID_cotizacion;
			
			return GenericoDAO::EjecutarConsulta($this->q_general);								
		}


		/*-----------------------------------------*/
	};

 ?>