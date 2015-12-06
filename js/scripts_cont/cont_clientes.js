$(function(){

	//console.log('hola desde cliente js');

	//---------------------------------------------------------
	//variable para el objeto del formulario
	var objt_f_cliente = {};
	//variable de accion del boton del formulario
	var action = "";
	  //variable para el id del registro
	var id_cliente = "";
	//---------------------------------------------------------

	function valida_action(action){

  		if(action==="crear"){
    		crea_cliente();
    		//subida_foto();
  		}else if(action==="editar"){
    		edita_cliente();
  		};
	};

	//---------------------------------------------------------
	//funciones

	function validarEmail( email ) {
	    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if ( !expr.test(email) ){
	    	alert("Error: La dirección de correo " + email + " es incorrecta.");
	    }else{
	    	return true;
	    }	    
	}

	function crea_cliente(){

	      //--------------------------------------
	      //crea el objeto formulario serializado
	      objt_f_cliente = $("#form_cliente").valida();
	      email = $("#email").val();
	      console.log(objt_f_cliente);
	      //console.log(objt_f_adminPublicidad.srlz);
	      //--------------------------------------
	      /**/
	      if( (objt_f_cliente.estado == true) && (validarEmail(email)) ){

	        $.ajax({
	          url: "../controller/ajaxController12.php",
	          data: objt_f_cliente.srlz+"&tipo=inserta&nom_tabla=cliente",
	        })
	        .done(function(data) {	          
	          //---------------------
	          console.log(data);
	          alert(data[0].mensaje);
	          location.reload();          
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

	  function carga_cliente(id_cliente){

	    console.log("Carga el cliente "+id_cliente);

	    $.ajax({
	        url: '../controller/ajaxController12.php',
	        data: "pkID="+id_cliente+"&tipo=consultar&nom_tabla=cliente",
	    })
	    .done(function(data) {
	    	/**/
	        $.each(data.mensaje[0], function( key, value ) {
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });

	    })
	    .fail(function() {
	        console.log("error");
	    })
	    .always(function() {
	        console.log("complete");
	    });

	  };
	  //cierra carga_cliente

	function edita_cliente(){

	    //--------------------------------------
	    //crea el objeto formulario serializado
	    objt_f_cliente = $("#form_cliente").valida();
	    email = $("#email").val();
	    //--------------------------------------

	    if( (objt_f_cliente.estado == true) && (validarEmail(email)) ){

	        console.log(objt_f_cliente.srlz);

	        $.ajax({
	            url: '../controller/ajaxController12.php',
	            data: objt_f_cliente.srlz+"&tipo=actualizar&nom_tabla=cliente",
	        })
	        .done(function(data) {	           
	            //---------------------
	            console.log(data.mensaje.mensaje);
	            alert(data.mensaje.mensaje);
	            location.reload();
	        })
	        .fail(function() {
	            console.log("error");
	        })
	        .always(function() {
	            console.log("complete");
	        });

	    }else{
	        alert("Faltan "+Object.keys(objt_f_cliente.objt).length+" campos por llenar.");
	    }
	    //------------------------------------------------------

    };
    //cierra funcion edita_cliente

    function elimina_cliente(id_cliente){

	    console.log('Eliminar el cliente: '+id_cliente);

	    var confirma = confirm("En realidad quiere eliminar este cliente?");

	    console.log(confirma);
	    /**/
	    if(confirma == true){
	      //si confirma es true ejecuta ajax
	      $.ajax({
	            url: '../controller/ajaxController12.php',
	            data: "pkID="+id_cliente+"&tipo=eliminar&nom_tabla=cliente",
	        })
	        .done(function(data) {            
	            //---------------------
	            console.log(data);

	            alert(data.mensaje.mensaje);
	            
	            location.reload();
	        })
	        .fail(function() {
	            console.log("error");
	        })
	        .always(function() {
	            console.log("complete");
	        });
	    }else{
	      //no hace nada
	    }
    };
    //cierra funcion eliminar cliente

	//---------------------------------------------------------
	//ejecución
	//-------------------------------------------------------------------------------

	$("#num_cc").keyup(function(event) {
		/* Act on the event */
		if ((event.keyCode < 48) || (event.keyCode > 57)){
			console.log(String.fromCharCode(event.which));
			alert("El número de identificación NO puede llevar valores alfanuméricos.");			
			$(this).val("");
		}
	});

	$("#num_cc").change(function(event) {
		/* valida que no tenga menos de 8 caracteres */

		var valores_idCli = $(this).val().length;
		console.log(valores_idCli);
		if(valores_idCli < 8){
			alert("El número de identificación no puede ser menor a 8 valores.");
			$(this).val("");
			$(this).focus();
		}

	});

	$("#email").change(function(event) {
		/* Act on the event */
		validarEmail($(this).val());
	});
	  //--------------------------------------------
	  	
		/*
		Botón que carga el formulario para insertar
		*/
		$("#btn_nuevoCliente").click(function(){

		  	$("#lbl_form_cliente").html("Nuevo Registro Cliente");
		  	$("#lbl_btn_actionCliente").html("Guardar<span class='glyphicon glyphicon-chevron-right'></span>");
		  	$("#btn_actionCliente").attr("data-action","crear");

		  	$("#form_cliente")[0].reset();	      	   
		});


	  /*
	  Botón que carga el formulario para editar
	  */  
	  $("[name*='edita_cliente']").click(function(event) {

	      $("#lbl_form_cliente").html("Editar Registro Cliente");
	      $("#lbl_btn_actionCliente").html("Guardar Cambios<span class='glyphicon glyphicon-chevron-right'></span>");
	      $("#btn_actionCliente").attr("data-action","editar");

	      $("#form_cliente")[0].reset();
	      
	      id_cliente = $(this).attr('data-id-cliente');
	      
	      carga_cliente(id_cliente);
	      //carga_propiedades(id_cliente);
	  });

	  $("[name*='elimina_cliente']").click(function(event) {
	    /* Act on the event */
	    id_cliente = $(this).attr('data-id-cliente');

	    elimina_cliente(id_cliente);

	  });

		/*
		Botón de accion de formulario
		*/
		$("#btn_actionCliente").click(function(){

	      /**/
		  	action = $(this).attr("data-action");

		  	valida_action(action);

		  	console.log("accion a ejecutar: "+action);     

		});	  

	  //---------------------------------------------------------
});