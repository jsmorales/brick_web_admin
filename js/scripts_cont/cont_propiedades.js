$(function(){
	console.log('hola desde propiedades de material.');

	//---------------------------------------------------------
	//variable para el objeto del formulario
	var objt_f_propiedad = {};
	//variable de accion del boton del formulario
	var action = "";
	  //variable para el id del registro
	var id_propiedad = "";
	//---------------------------------------------------------

	function valida_action(action){

  		if(action==="crear"){
    		crea_propiedad();
    		//subida_foto();
  		}else if(action==="editar"){
    		edita_propiedad();
  		};
	};

	function crea_propiedad(){

	      //--------------------------------------
	      //crea el objeto formulario serializado
	      objt_f_propiedad = $("#form_propiedad").valida();
	      //email = $("#email").val(); && (validarEmail(email))
	      console.log(objt_f_propiedad);
	      //console.log(objt_f_adminPublicidad.srlz);
	      //--------------------------------------
	      /**/
	      if( objt_f_propiedad.estado == true ){

	        $.ajax({
	          url: "../controller/ajaxController12.php",
	          data: objt_f_propiedad.srlz+"&tipo=inserta&nom_tabla=propiedad",
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

	  function carga_propiedad(id_propiedad){

	    console.log("Carga el propiedad "+id_propiedad);

	    $.ajax({
	        url: '../controller/ajaxController12.php',
	        data: "pkID="+id_propiedad+"&tipo=consultar&nom_tabla=propiedad",
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
	  //cierra carga_propiedad

	 function edita_propiedad(){

	    //--------------------------------------
	    //crea el objeto formulario serializado
	    objt_f_propiedad = $("#form_propiedad").valida();
	    //email = $("#email").val(); ) && (validarEmail(email)) 
	    //--------------------------------------

	    if( objt_f_propiedad.estado == true ){

	        console.log(objt_f_propiedad.srlz);

	        $.ajax({
	            url: '../controller/ajaxController12.php',
	            data: objt_f_propiedad.srlz+"&tipo=actualizar&nom_tabla=propiedad",
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
	        alert("Faltan "+Object.keys(objt_f_propiedad.objt).length+" campos por llenar.");
	    }
	    //------------------------------------------------------

    };
    //cierra funcion edita_propiedad

    function elimina_propiedad(id_propiedad){

	    console.log('Eliminar el propiedad: '+id_propiedad);

	    var confirma = confirm("En realidad quiere eliminar este propiedad?");

	    console.log(confirma);
	    /**/
	    if(confirma == true){
	      //si confirma es true ejecuta ajax
	      $.ajax({
	            url: '../controller/ajaxController12.php',
	            data: "pkID="+id_propiedad+"&tipo=eliminar&nom_tabla=propiedad",
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
    //cierra funcion eliminar propiedad

	//---------------------------------------------------------
	//ejecución
	//-------------------------------------------------------------------------------
	/*
	Botón que carga el formulario para insertar
	*/
	$("#btn_nuevoPropiedad").click(function(){

	  	$("#lbl_form_propiedad").html("Nuevo Registro propiedad");
	  	$("#lbl_btn_actionPropiedad").html("Guardar<span class='glyphicon glyphicon-chevron-right'></span>");
	  	$("#btn_actionPropiedad").attr("data-action","crear");

	  	$("#form_propiedad")[0].reset();	      	   
	});

	/*
    Botón que carga el formulario para editar
    */  
    $("[name*='edita_propiedad']").click(function(event) {

        $("#lbl_form_propiedad").html("Editar Registro propiedad");
        $("#lbl_btn_actionPropiedad").html("Guardar Cambios<span class='glyphicon glyphicon-chevron-right'></span>");
        $("#btn_actionPropiedad").attr("data-action","editar");

        $("#form_propiedad")[0].reset();
	      
        id_propiedad = $(this).attr('data-id-propiedad');
	      
        carga_propiedad(id_propiedad);
        //carga_propiedades(id_propiedad);
    });

    /*
	Botón de accion de formulario
	*/
	$("#btn_actionPropiedad").click(function(){

      /**/
	  	action = $(this).attr("data-action");

	  	valida_action(action);

	  	console.log("accion a ejecutar: "+action);     

	});

	$("[name*='elimina_propiedad']").click(function(event) {
	    /* Act on the event */
	    id_propiedad = $(this).attr('data-id-propiedad');

	    elimina_propiedad(id_propiedad);

	  });	  

  	//---------------------------------------------------------
});