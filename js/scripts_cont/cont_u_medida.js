$(function(){
	console.log('hola desde u medida de material.');

	//---------------------------------------------------------
	//variable para el objeto del formulario
	var objt_f_u_medida = {};
	//variable de accion del boton del formulario
	var action = "";
	  //variable para el id del registro
	var id_u_medida = "";
	//---------------------------------------------------------

	function valida_action(action){

  		if(action==="crear"){
    		crea_u_medida();
    		//subida_foto();
  		}else if(action==="editar"){
    		edita_u_medida();
  		};
	};

	function crea_u_medida(){

	      //--------------------------------------
	      //crea el objeto formulario serializado
	      objt_f_u_medida = $("#form_u_medida").valida();
	      //email = $("#email").val(); && (validarEmail(email))
	      console.log(objt_f_u_medida);
	      //console.log(objt_f_adminPublicidad.srlz);
	      //--------------------------------------
	      /**/
	      if( objt_f_u_medida.estado == true ){

	        $.ajax({
	          url: "../controller/ajaxController12.php",
	          data: objt_f_u_medida.srlz+"&tipo=inserta&nom_tabla=u_medida",
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

	  function carga_u_medida(id_u_medida){

	    console.log("Carga el u_medida "+id_u_medida);

	    $.ajax({
	        url: '../controller/ajaxController12.php',
	        data: "pkID="+id_u_medida+"&tipo=consultar&nom_tabla=u_medida",
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
	  //cierra carga_u_medida

	 function edita_u_medida(){

	    //--------------------------------------
	    //crea el objeto formulario serializado
	    objt_f_u_medida = $("#form_u_medida").valida();
	    //email = $("#email").val(); ) && (validarEmail(email)) 
	    //--------------------------------------

	    if( objt_f_u_medida.estado == true ){

	        console.log(objt_f_u_medida.srlz);

	        $.ajax({
	            url: '../controller/ajaxController12.php',
	            data: objt_f_u_medida.srlz+"&tipo=actualizar&nom_tabla=u_medida",
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
	        alert("Faltan "+Object.keys(objt_f_u_medida.objt).length+" campos por llenar.");
	    }
	    //------------------------------------------------------

    };
    //cierra funcion edita_u_medida

    function elimina_u_medida(id_u_medida){

	    console.log('Eliminar el u_medida: '+id_u_medida);

	    var confirma = confirm("En realidad quiere eliminar este u_medida?");

	    console.log(confirma);
	    /**/
	    if(confirma == true){
	      //si confirma es true ejecuta ajax
	      $.ajax({
	            url: '../controller/ajaxController12.php',
	            data: "pkID="+id_u_medida+"&tipo=eliminar&nom_tabla=u_medida",
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
    //cierra funcion eliminar u_medida

	//---------------------------------------------------------
	//ejecución
	//-------------------------------------------------------------------------------
	/*
	Botón que carga el formulario para insertar
	*/
	$("#btn_nuevou_medida").click(function(){

	  	$("#lbl_form_u_medida").html("Nuevo Registro u_medida");
	  	$("#lbl_btn_actionu_medida").html("Guardar<span class='glyphicon glyphicon-chevron-right'></span>");
	  	$("#btn_actionu_medida").attr("data-action","crear");

	  	$("#form_u_medida")[0].reset();	      	   
	});

	/*
    Botón que carga el formulario para editar
    */  
    $("[name*='edita_u_medida']").click(function(event) {

        $("#lbl_form_u_medida").html("Editar Registro u_medida");
        $("#lbl_btn_actionu_medida").html("Guardar Cambios<span class='glyphicon glyphicon-chevron-right'></span>");
        $("#btn_actionu_medida").attr("data-action","editar");

        $("#form_u_medida")[0].reset();
	      
        id_u_medida = $(this).attr('data-id-Umedida');
	      
        carga_u_medida(id_u_medida);
        //carga_u_medidaes(id_u_medida);
    });

    /*
	Botón de accion de formulario
	*/
	$("#btn_actionu_medida").click(function(){

      /**/
	  	action = $(this).attr("data-action");

	  	valida_action(action);

	  	console.log("accion a ejecutar: "+action);     

	});

	$("[name*='elimina_u_medida']").click(function(event) {
	    /* Act on the event */
	    id_u_medida = $(this).attr('data-id-Umedida');

	    elimina_u_medida(id_u_medida);

	  });	  

  	//---------------------------------------------------------
});