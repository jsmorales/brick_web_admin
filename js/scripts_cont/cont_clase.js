$(function(){
	console.log('hola desde clase de material.');

	//---------------------------------------------------------
	//variable para el objeto del formulario
	var objt_f_clase = {};
	//variable de accion del boton del formulario
	var action = "";
	  //variable para el id del registro
	var id_clase = "";
	//---------------------------------------------------------

	function valida_action(action){

  		if(action==="crear"){
    		crea_clase();
    		//subida_foto();
  		}else if(action==="editar"){
    		edita_clase();
  		};
	};

	function crea_clase(){

	      //--------------------------------------
	      //crea el objeto formulario serializado
	      objt_f_clase = $("#form_clase").valida();
	      //email = $("#email").val(); && (validarEmail(email))
	      console.log(objt_f_clase);
	      //console.log(objt_f_adminPublicidad.srlz);
	      //--------------------------------------
	      /**/
	      if( objt_f_clase.estado == true ){

	        $.ajax({
	          url: "../controller/ajaxController12.php",
	          data: objt_f_clase.srlz+"&tipo=inserta&nom_tabla=clase",
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

	  function carga_clase(id_clase){

	    console.log("Carga el clase "+id_clase);

	    $.ajax({
	        url: '../controller/ajaxController12.php',
	        data: "pkID="+id_clase+"&tipo=consultar&nom_tabla=clase",
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
	  //cierra carga_clase

	 function edita_clase(){

	    //--------------------------------------
	    //crea el objeto formulario serializado
	    objt_f_clase = $("#form_clase").valida();
	    //email = $("#email").val(); ) && (validarEmail(email)) 
	    //--------------------------------------

	    if( objt_f_clase.estado == true ){

	        console.log(objt_f_clase.srlz);

	        $.ajax({
	            url: '../controller/ajaxController12.php',
	            data: objt_f_clase.srlz+"&tipo=actualizar&nom_tabla=clase",
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
	        alert("Faltan "+Object.keys(objt_f_clase.objt).length+" campos por llenar.");
	    }
	    //------------------------------------------------------

    };
    //cierra funcion edita_clase

    function elimina_clase(id_clase){

	    console.log('Eliminar el clase: '+id_clase);

	    var confirma = confirm("En realidad quiere eliminar este clase?");

	    console.log(confirma);
	    /**/
	    if(confirma == true){
	      //si confirma es true ejecuta ajax
	      $.ajax({
	            url: '../controller/ajaxController12.php',
	            data: "pkID="+id_clase+"&tipo=eliminar&nom_tabla=clase",
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
    //cierra funcion eliminar clase

	//---------------------------------------------------------
	//ejecución
	//-------------------------------------------------------------------------------
	/*
	Botón que carga el formulario para insertar
	*/
	$("#btn_nuevoclase").click(function(){

	  	$("#lbl_form_clase").html("Nuevo Registro clase");
	  	$("#lbl_btn_actionclase").html("Guardar<span class='glyphicon glyphicon-chevron-right'></span>");
	  	$("#btn_actionclase").attr("data-action","crear");

	  	$("#form_clase")[0].reset();	      	   
	});

	/*
    Botón que carga el formulario para editar
    */  
    $("[name*='edita_clase']").click(function(event) {

        $("#lbl_form_clase").html("Editar Registro clase");
        $("#lbl_btn_actionclase").html("Guardar Cambios<span class='glyphicon glyphicon-chevron-right'></span>");
        $("#btn_actionclase").attr("data-action","editar");

        $("#form_clase")[0].reset();
	      
        id_clase = $(this).attr('data-id-clase');
	      
        carga_clase(id_clase);
        //carga_clase(id_clase);
    });

    /*
	Botón de accion de formulario
	*/
	$("#btn_actionclase").click(function(){

      /**/
	  	action = $(this).attr("data-action");

	  	valida_action(action);

	  	console.log("accion a ejecutar: "+action);     

	});

	$("[name*='elimina_clase']").click(function(event) {
	    /* Act on the event */
	    id_clase = $(this).attr('data-id-clase');

	    elimina_clase(id_clase);

	  });	  

  	//---------------------------------------------------------
});