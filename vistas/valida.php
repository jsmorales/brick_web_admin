<?php 
	
	//-----------------
	//error_reporting(0);
	//-----------------

	class valida {

		//---------------------------------------------------------
	    //variables de sesion
	    public $id;
	    public $nombre;
	    public $tipo;
	    //-----------------------------------------
	  
	    //-----------------------------------------
	    //funciones
	    public function asigna_vals(){

	    	//print_r($_COOKIE);

	    	if(sizeof($_COOKIE) <= 2){ 

	    		$this->id = "";
		        $this->nombre = "";
		        $this->tipo = "";

	    	}else{
		        $this->id = $_COOKIE["log_brick_id"];
		        $this->nombre = $_COOKIE["log_brick_nombre"];
		        $this->tipo = $_COOKIE["log_brick_tipo"];
	        }

	    }

	    public function valida_vals(){

	    	$this->asigna_vals();

	        if($this->id == "" || $this->nombre == "" || $this->tipo == ""){
	            //echo '<script language="JavaScript"> alert("Usuario no identificado, por favor identifíquese."); window.location = "index.php"; </script>';
	            return false;
	        }else{
	            
	            //$this->mostrar_pagina($_GET["pagina"]);
	            return true;
	        }
	    }

	    //-------------------------------------------------------------------
	    //funcion para validar el perfil de usuario
	    public function valida_perfil(){

	    	return $this->tipo;
	    }

	    public function valida_entrada_perfil($perfiles_in,$perfil_actual){

	    	//Devuelve TRUE si needle se encuentra en el array, FALSE de lo contrario.

	    	if(in_array($perfil_actual, $perfiles_in)){
	    		return "true";
	    	}else{
	    		return "false";
	    	}	    	 
	    }
	    //-------------------------------------------------------------------

	    public function mensaje_error(){

	    	if($this->valida_vals() == true){
	    		echo '<script language="JavaScript"> alert("Usuario no identificado, por favor identifíquese."); history.back(1); //window.location = "login.php"; </script>';
	    	}else{
	    		echo '<script language="JavaScript"> alert("Usuario no identificado, por favor identifíquese."); window.location = "login.php"; </script>';
	    	}    	

	    }

	    //-----------------------------------------
	}

 ?>