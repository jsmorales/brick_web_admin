$(function(){
	console.log('hola registro');
	//-------------------------------------------------------------
	//variables
	//variable para el objeto del formulario
	var objt_f_registro = {};
	var objt_f_cliente = {};
	//variable de accion del boton del formulario
	var action = "";

	//-------------------------------------------------------------
	//funciones

	function valida_action(action){

  		if(action==="crear"){
    		crea_registro();
    		//subida_foto();
  		}else if(action==="editar"){
    		//edita_registro();
  		};
	};
	//-------------------------------------------------------------
	
	function validarEmail( email ) {
	    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if ( !expr.test(email) ){
	    	alert("Error: La dirección de correo " + email + " es incorrecta.");
	    }else{
	    	return true;
	    }	    
	}

	function crea_registro(){

	      //--------------------------------------
	      //crea el objeto formulario serializado
	      objt_f_registro = $("#form_registro").valida();
	      email = $("#email").val();
	      console.log(objt_f_registro);
	      //console.log(objt_f_adminPublicidad.srlz);
	      //--------------------------------------
	      
	      if( (objt_f_registro.estado == true) && (validarEmail(email)) ){
	      	/**/
	        $.ajax({
	          url: "../controller/ajaxController12.php",
	          data: objt_f_registro.srlz+"&tipo=inserta_registro&nom_tabla=usuarios",
	        })
	        .done(function(data) {	          
	          //---------------------
	          console.log(data);
	          crea_cliente();
	          //alert(data[0].mensaje);
	          //location.reload();          
	        })
	        .fail(function(data) {
	          console.log(data);
	          //alert(data[0].mensaje);          
	        })
	        .always(function() {
	          console.log("complete");
	        });

	      }else{
	        alert("El formulario no está totalmente diligenciado, revíselo e inténtelo de nuevo.");
	      };

	    };
	  //cierra crea

	function crea_cliente(){

	      //--------------------------------------
	      //crea el objeto formulario serializado
	      objt_f_cliente = $("#form_cliente").valida();
	      email = $("#email").val();
	      console.log(objt_f_cliente);
	      //console.log(objt_f_adminPublicidad.srlz);
	      //--------------------------------------
	      
	      if( (objt_f_cliente.estado == true) && (validarEmail(email)) ){
	      	/**/
	        $.ajax({
	          url: "../controller/ajaxController12.php",
	          data: objt_f_cliente.srlz+"&tipo=inserta&nom_tabla=cliente",
	        })
	        .done(function(data) {	          
	          //---------------------
	          console.log(data);
	          alert(data[0].mensaje);	          
	          //document.location.href("login.php");
	          window.location="login.php";          
	        })
	        .fail(function(data) {
	          console.log(data);
	          //alert(data[0].mensaje);          
	        })
	        .always(function() {
	          console.log("complete");
	        });

	      }else{
	        alert("El formulario no está totalmente diligenciado, revíselo e inténtelo de nuevo.");
	      };

	    };
	  //cierra crea

	//-------------------------------------------------------------
	//ejecución

	$("#num_cc").change(function(event) {
		/* Act on the event */
		$("#numero_cc").val($(this).val());
	});

	$("#nom_cliente").change(function(event) {
		/* Act on the event */
		$("#nombres").val($(this).val());
	});

	$("#ape_cliente").change(function(event) {
		/* Act on the event */
		$("#apellidos").val($(this).val());
	});

	/*
	Botón de accion de formulario
	*/
	$("#btn_actionRegistro").click(function(){

	     /**/
		  action = $(this).attr("data-action");

		  valida_action(action);

		  console.log("accion a ejecutar: "+action);     

	});	 

	//-------------------------------------------------------------
});