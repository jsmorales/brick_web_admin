<?php 

	include("../Conexion/Conexion.php");

	class autocompleta {

		public $q_general;
		protected $Conector;
	    private $r;
	   
	     
	    public function __construct() {
	        $this->Conector = new Conexion();
	        //$this->r = array();
	    }

		public function getCliente($valor){

			$Conector = new Conexion();
			$db=$Conector->connect();

			$this->q_general = "select * FROM cliente where num_cc like '%$valor%'";						
			
			$resultador = $db->query($this->q_general);

			//echo $resultador->num_rows;

			if($resultador->num_rows == 0){

				$a_cliente[] = array("value"=>"",
									"label"=>"No hay clientes.",
									"pkID"=>""
																
					);
				
			}else{			

				while($filar=$resultador->fetch_assoc()){
	        
		        $a_cliente[] = array("value"=>$filar['num_cc'],
									"label"=>html_entity_decode($filar['num_cc']."-".$filar['nom_cliente']."-".$filar['ape_cliente']),
									"pkID"=>$filar['pkID']
																
					);
		    	}
			}
			

	    	return $a_cliente;
		}
	}

	$data = new autocompleta();
	$arr1 = $data->getCliente($_GET["term"]);

	echo json_encode($arr1);

 ?>