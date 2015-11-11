$(function(){
	console.log('hola desde cont cotiza bd');

	//---------------------------------------------------------
	//variable para el objeto del formulario
	var objt_f_cotiza_general = {};
	var objt_res_lad = {};
	var objt_res_cem = {};
	var arr_res_lad = [];
	var arr_res_cem = [];
	//variable de accion del boton del formulario
	var action = "";
	//variable para el id del registro
	//var id_cliente = "";
	//---------------------------------------------------------
	function valida_action(action){

  		if(action==="crear"){
  			crea_cotiza_general();
    		//crea_cliente();
    		//subida_foto();
  		}else if(action==="editar"){
    		//edita_cliente();
  		};
	};

	function crea_cotiza_general(){

	      //--------------------------------------
	      //crea el objeto formulario serializado
	      objt_f_cotiza_general = $("#frm_cotiza_gen").valida();
	      console.log(objt_f_cotiza_general);
	      //console.log(objt_f_adminPublicidad.srlz);
	      //--------------------------------------
	      /**/
	      if(objt_f_cotiza_general.estado == true){

	        $.ajax({
	          url: "../controller/ajaxController12.php",
	          data: objt_f_cotiza_general.srlz+"&tipo=inserta&nom_tabla=cotizacion",
	        })
	        .done(function(data) {	          
	          //---------------------
	          console.log(data);

	          crea_objt_cotiza(data[0].last_id);

	          var srlz_objt_lad = srlz_arr(arr_res_lad);
	          var srlz_objt_cem = srlz_arr(arr_res_cem);

	          console.log(srlz_objt_lad);
	          console.log(srlz_objt_cem);
	          /*
	          setTimeout(function(){
	          	inserta_reg_cotiza(srlz_objt_lad);
	          }, 1000)

	          setTimeout(function(){
	          	inserta_reg_cotiza(srlz_objt_cem);
	          }, 2000)*/

	          inserta_reg_cotiza(srlz_objt_lad);
	          inserta_reg_cotiza(srlz_objt_cem);      
	          
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

	function crea_objt_cotiza(id_reg_general){		

		arr_res_lad = [
			['fkID_cotizacion=',id_reg_general],
			['fkID_material=',$("#selectLadrillo").val()],
			['cantidad_material=',$("#total_lad").val()],
			['costo_material=',$("#precio_lad_total").val()]
		];

		arr_res_cem = [
			['fkID_cotizacion=',id_reg_general],
			['fkID_material=',$("#selectCemento").val()],
			['cantidad_material=',$("#total_cem").val()],
			['costo_material=',$("#precio_cem_total").val()]
		];
	}

	function srlz_arr(arr){

				/*
				arr = [
					['fkID_cotizacion=',1],
					['fkID_material=',2],
					['cantidad_material=',23],
					['costo_material=',12000]
				];*/

			  var objt_join = arr.join("&");

			  var srlz_objt = objt_join.replace(/,/g,"");

			  //console.log(srlz_objt);

			  return srlz_objt;			  
	}

	function inserta_reg_cotiza(query_cotiza){

			$.ajax({
	          url: "../controller/ajaxController12.php",
	          data: query_cotiza+"&tipo=inserta&nom_tabla=cotizacion_material",
	        })
	        .done(function(data) {	          
	          //---------------------
	          console.log(data);

	          /*crea_objt_cotiza(data[0].last_id);

	          var srlz_objt_lad = srlz_arr(arr_res_lad);
	          var srlz_objt_cem = srlz_arr(arr_res_cem);

	          console.log(srlz_objt_lad);
	          console.log(srlz_objt_cem);*/

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

	}

	//----------------------------------------------------------------------------

	//----------------------------------------------------------------------------
	//ejecución

	$("#btn_nuevoCotiza").click(function(event) {
		/* Act on the event */
		$("#btn_action_cotizacion").attr("data-action","crear");		
	});

	$("#btn_action_cotizacion").click(function(event) {
		/* Act on the event */		
		action = $(this).attr("data-action");

		valida_action(action);

		console.log("accion a ejecutar: "+action);
	});
});