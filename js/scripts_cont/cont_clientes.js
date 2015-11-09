$(function(){

	//console.log('hola desde cliente js');

	//---------------------------------------------------------
	//variable para el objeto del formulario
	var objt_f_cliente = {};
	//variable de accion del boton del formulario
	var action = "";
	  //variable para el id del registro
	var id_cliente = "";
	/*
    var id_propiedad_select = "";
    var id_valor_select = "";
    var id_umedida_select = "";*/
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

	function crea_cliente(){

	      //--------------------------------------
	      //crea el objeto formulario serializado
	      objt_f_cliente = $("#form_cliente").valida();
	      console.log(objt_f_cliente);
	      //console.log(objt_f_adminPublicidad.srlz);
	      //--------------------------------------
	      /**/
	      if(objt_f_cliente.estado == true){

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
	    //--------------------------------------

	    if(objt_f_cliente.estado == true){

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
	        alert("Faltan "+Object.keys(objt_f_evento.objt).length+" campos por llenar.");
	    }
	    //------------------------------------------------------

    };
    //cierra funcion edita_cliente

	//---------------------------------------------------------
	//ejecución
	//-------------------------------------------------------------------------------

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

	    //elimina_cliente(id_cliente);

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