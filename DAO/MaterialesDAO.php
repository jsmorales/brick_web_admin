<?php 

	include_once 'GenericoDAO.php';

	class materiales extends GenericoDAO{

		/*-----------------------------*/
		//variables
		public $q_general;
		public $q_propiedades;

		public $q_inserta;		
		/*-----------------------------*/
		public function __construct(){
			//contruye la clase GenericoDAO
			parent::__construct();
		}

		/*-----------------------------*/
		//funciones
		public function getMateriales(){

			$this->q_general = "select * from material";				
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}

		public function getMateriales1(){

			$this->q_general = "select material.*, clase.nombre as nom_clase FROM `material` INNER JOIN clase ON clase.pkID=material.fkID_clase";				
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}

		public function getMaterialesReporte(){

			$this->q_general = "select material.pkID,material.nombre,material.precio,material.marca, clase.nombre as nom_clase FROM `material` INNER JOIN clase ON clase.pkID=material.fkID_clase";				
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}

		public function getMaterialId($q_material){						
			
			return GenericoDAO::EjecutarConsulta($q_material);
		}

		public function getMaterialPropiedades($id_material){

			$this->q_propiedades = "select material_propiedad.pkID, propiedad.nombre, material_propiedad.valor, u_medida.abreviatura

									FROM `material_propiedad`

									inner join propiedad on propiedad.pkID = material_propiedad.fkID_propiedad

									inner join u_medida on u_medida.pkID = material_propiedad.fkID_uMedida

									where material_propiedad.fkID_material =".$id_material;			
			
			return GenericoDAO::EjecutarConsulta($this->q_propiedades);
		}

		public function getMaterialPropiedadesR($id_material){

			$this->q_propiedades = "select propiedad.nombre, material_propiedad.valor, u_medida.abreviatura

									FROM `material_propiedad`

									inner join propiedad on propiedad.pkID = material_propiedad.fkID_propiedad

									inner join u_medida on u_medida.pkID = material_propiedad.fkID_uMedida

									where material_propiedad.fkID_material =".$id_material;			
			
			return GenericoDAO::EjecutarConsulta($this->q_propiedades);
		}

		public function insertaMateriales($q_insertaMaterial){						
			$this->q_inserta = $q_insertaMaterial;
			//$generico = new GenericoDAO();
			return GenericoDAO::EjecutaInsertar($this->q_inserta);
		}
		/*-----------------------------*/

		public function getPropiedades(){

			$this->q_general = "select * from propiedad";				
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}

		public function getUmedida(){

			$this->q_general = "select * from u_medida";				
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}

		public function getClase(){

			$this->q_general = "select * from clase";				
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}

		//---------------------------------------------------------
		public function getLadrillos(){

			$this->q_general = "select material.*, clase.nombre as nom_clase FROM `material` INNER JOIN clase ON clase.pkID=material.fkID_clase where clase.pkID = 1";				
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}

		public function getCemento(){

			$this->q_general = "select material.*, clase.nombre as nom_clase FROM `material` INNER JOIN clase ON clase.pkID=material.fkID_clase where clase.pkID = 2";				
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}			
	}

 ?>