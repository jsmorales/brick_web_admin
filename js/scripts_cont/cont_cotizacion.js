$(function(){
	console.log('hola desde cotizacion js');
	//--------------------------------------------------------------------------------
	//variables globales
	var id_ladrillo, id_cemento = 0;	
	var precio_lad = 0;
	var precio_cem = 0;
	var densidad_cemento = 1500;
	var iva = 1.16;
	//++++++++++++++++++
	var alt_par,anch_par,alt_lad,anc_lad,mez = 0;
	var anch_par_lad, alt_par_lad, largo_lad, total_lad, precio_lad_total = 0;
	//+++++++++++++++++
	var mort_anch, mort_alto, mort_total = 0;
	var precio_cem_total, peso_cemento, total_unidad_cemento, total_cemento = 0;
	//++++++++++++++++++
	var total_cotiza = 0;
	//++++++++++++++++++
	var objt_f_calculaP = {};
	//--------------------------------------------------------------------------------


	//--------------------------------------------------------------------------------
	//Funciones

	function cargaPropiedadesCemento(id_cemento,precio){
		
        /**/
	    $.ajax({
	        url: '../controller/ajaxController.php',
	        data: "id_material="+id_cemento+"&tipo=ver_propiedades",
	    })
	    .done(function(data) {
	    	/*
	        $.each(data.mensaje[0], function( key, value ) {
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });*/
	    	console.log(data.mensaje);
	    	/*<div class="form-group">
                      <label for="ancho" class="col-sm-2 control-label">Ancho</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="ancho" name="ancho" placeholder="Ancho Ladrillo" readonly="">
                      </div>
                    </div>*/

            

            $("#loadPropiedadesCem").html("");

            $("#loadPropiedadesCem").append(
            	 	 	'<div class="form-group">'+
	                      '<label for="precioCem" class="col-md-4 control-label">Precio $</label>'+
	                      '<div class="col-md-4">'+
	                          '<input type="text" class="form-control" id="precioCem" name="precioCem" value="'+precio+'" readonly="">'+
	                      '</div>'+	               
	                    '</div>'
            	 	 );

         
            var objetoProp = {
            	nombre: "",
            	valorProp: "",
            	abreviatura: ""
            };

            console.log(objetoProp);

            $.each(data.mensaje, function(index, val) {
            	 /* iterate through array or object */
            	 console.log('index: '+index+' val: '+val);

            	 $.each(val, function(llave, valor) {
            	 	 /* iterate through array or object */
            	 	 console.log('llave: '+llave+' valor: '+valor);

            	 	 if(llave == "nombre"){
            	 	 	objetoProp.nombre = valor
            	 	 }else if(llave == "valor"){
            	 	 	objetoProp.valorProp = valor
            	 	 }else if(llave == "abreviatura"){
            	 	 	objetoProp.abreviatura = valor
            	 	 }else if(llave == "precio"){
            	 	 	objetoProp.precio = valor
            	 	 };            	 	 
            	 });

            	$("#loadPropiedadesCem").append(
            	 	 	'<div class="form-group">'+
	                      '<label for="'+objetoProp.nombre+'" class="col-md-4 control-label">'+objetoProp.nombre+'</label>'+
	                      '<div class="col-md-4">'+
	                          '<input type="text" class="form-control" id="'+objetoProp.nombre+'" name="'+objetoProp.nombre+'" value="'+objetoProp.valorProp+'" readonly="">'+
	                      '</div>'+
	                      '<label class="col-md-4 text-left">'+objetoProp.abreviatura+'</label>'+
	                    '</div>'
            	 	 );
            });

            console.log(objetoProp);
            /*
				
            */
	    })
	    .fail(function() {
	        console.log("error");
	    })
	    .always(function() {
	        console.log("complete");
	    });
	}

	function cargaPropiedadesLadrillo(id_ladrillo,precio){

	    console.log("Carga prop ladrillo "+id_ladrillo);

	    /**/
	    $.ajax({
	        url: '../controller/ajaxController.php',
	        data: "id_material="+id_ladrillo+"&tipo=ver_propiedades",
	    })
	    .done(function(data) {
	    	/*
	        $.each(data.mensaje[0], function( key, value ) {
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });*/
	    	console.log(data.mensaje);
	    	/*<div class="form-group">
                      <label for="ancho" class="col-sm-2 control-label">Ancho</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="ancho" name="ancho" placeholder="Ancho Ladrillo" readonly="">
                      </div>
                    </div>*/

            console.log($("#selectLadrillo"));

            $("#loadPropiedades").html("");

            $("#loadPropiedades").append(
            	 	 	'<div class="form-group">'+
	                      '<label for="precio" class="col-md-4 control-label">Precio $</label>'+
	                      '<div class="col-md-4">'+
	                          '<input type="text" class="form-control" id="precio" name="precio" value="'+precio+'" readonly="">'+
	                      '</div>'+	               
	                    '</div>'
            	 	 );

         
            var objetoProp = {
            	nombre: "",
            	valorProp: "",
            	abreviatura: ""
            };

            console.log(objetoProp);

            $.each(data.mensaje, function(index, val) {
            	 /* iterate through array or object */
            	 console.log('index: '+index+' val: '+val);

            	 $.each(val, function(llave, valor) {
            	 	 /* iterate through array or object */
            	 	 console.log('llave: '+llave+' valor: '+valor);

            	 	 if(llave == "nombre"){
            	 	 	objetoProp.nombre = valor
            	 	 }else if(llave == "valor"){
            	 	 	objetoProp.valorProp = valor
            	 	 }else if(llave == "abreviatura"){
            	 	 	objetoProp.abreviatura = valor
            	 	 }else if(llave == "precio"){
            	 	 	objetoProp.precio = valor
            	 	 };            	 	 
            	 });

            	$("#loadPropiedades").append(
            	 	 	'<div class="form-group">'+
	                      '<label for="'+objetoProp.nombre+'" class="col-md-4 control-label">'+objetoProp.nombre+'</label>'+
	                      '<div class="col-md-4">'+
	                          '<input type="text" class="form-control" id="'+objetoProp.nombre+'" name="'+objetoProp.nombre+'" value="'+objetoProp.valorProp+'" readonly="">'+
	                      '</div>'+
	                      '<label class="col-md-4 text-left">'+objetoProp.abreviatura+'</label>'+
	                    '</div>'
            	 	 );
            });

            console.log(objetoProp);
            /*
				
            */
	    })
	    .fail(function() {
	        console.log("error");
	    })
	    .always(function() {
	        console.log("complete");
	    });

	  };
	  //cierra carga_cliente

	function calculaPared(){

		objt_f_calculaP = $("#form_calc_cotiza").valida();
	    console.log(objt_f_calculaP);	    

	    if ( (objt_f_calculaP.estado == true) & ( ($("#ancho").val() != undefined) & ($("#alto").val() != undefined) & ($("#peso").val() != undefined) ) ){
	    	//-----------------------------------------------------------------------
	    	//calculo
	    	alt_par = $("#altoP").val();
	    	anch_par = $("#anchoP").val();

	    	alt_lad = $("#alto").val();
	    	anch_lad = $("#ancho").val();
	    	largo_lad = $("#largo").val();

	    	peso_cemento = $("#peso").val();

	    	mez = $("#grosorMezcla").val();

	    	//pasa cm a M
	    	anch_lad = anch_lad / 100;
	    	alt_lad = alt_lad / 100;
	    	largo_lad = largo_lad / 100;
	    	mez = mez / 100;

	    	//funcion para redondear Math.round
	    	//funcion para cantidad de decimales numerotoFixed(numero de decimales)

	    	console.log('ancho ladrillo M '+anch_lad.toFixed(2));
	    	console.log('largo ladrillo M '+alt_lad.toFixed(2));
	    	console.log('mezcla M '+mez.toFixed(3));

	    	console.log('ancho pared M '+anch_par);
	    	console.log('largo pared M '+alt_par);

	    	anch_par_lad = anch_par /(anch_lad+mez);
	    	alt_par_lad = alt_par /(alt_lad+mez);

	    	console.log('ladrillos de ancho: '+anch_par_lad.toFixed(1));
	    	console.log('ladrillos de alto: '+alt_par_lad.toFixed(1));

	    	total_lad = anch_par_lad.toFixed(1) * alt_par_lad.toFixed(1);

	    	precio_lad_total = total_lad.toFixed() * precio_lad;

	    	console.log('Total de ladrillos: '+total_lad.toFixed());

	    	$("#resultadosCalculo").removeAttr('hidden');

	    	$("#total_lad").val(total_lad.toFixed());
	    	$("#precio_lad_total").val(precio_lad_total);
	    	
	    	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	    	//mortero
	    	mort_anch = (anch_lad+mez) * largo_lad * mez;
	    	console.log('ancho mortero: '+mort_anch);

	    	mort_alto = alt_lad * largo_lad * mez;
	    	console.log('alto mortero: '+mort_alto);

	    	mort_total = mort_anch + mort_alto;

	    	console.log('total mortero: '+mort_total.toFixed(6));
	    	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	    	//https://es.answers.yahoo.com/question/index?qid=20111116103255AApvh55

	    	total_cemento = ( mort_total.toFixed(6) * total_lad.toFixed() ) ;

	    	console.log('total cemento m3: '+total_cemento);

	    	//https://mx.answers.yahoo.com/question/index?qid=20070910063416AANTSwB
	    	/*1 m3 1500kg/m3 
	   0.019716 m3   ? kg */

	   		//https://mx.answers.yahoo.com/question/index?qid=20090723211821AAwdKJz
	   		total_cemento = total_cemento * densidad_cemento;

	   		console.log('total cemento kg: '+total_cemento.toFixed());

	   		$("#parcial_cem").val(total_cemento.toFixed());
	   		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	   		total_unidad_cemento =  total_cemento.toFixed() / peso_cemento;
	   		/* 1u 40kg  
	   		   ?u 30kg*/

	   		console.log('Total de unidad cemento: '+total_unidad_cemento.toFixed());
	   		$("#total_cem").val(total_unidad_cemento.toFixed());

	   		precio_cem_total = total_unidad_cemento.toFixed() * precio_cem;

	   		console.log('Total de precio unidades cemento: '+ precio_cem_total);
	   		$("#precio_cem_total").val(precio_cem_total);

	   		total_cotiza = precio_cem_total + precio_lad_total;
	   		$("#valor_total").val(total_cotiza);
	    	//-----------------------------------------------------------------------
	    }else{
	    	alert("Por favor complete los campos para poder hacer el cálculo, asegúrese de seleccionar un ladrillo y un cemento que contenga las propiedades válidas.");
	    };
	}

	function calendarEs(){
		$("#ui-datepicker-div").css('zIndex', '10000');
		$(".ui-priority-secondary").html("Ahora");
		$(".ui-priority-primary").html("OK");
		$(".ui_tpicker_time_label").html("Tiempo");
		$(".ui_tpicker_hour_label").html("Hora");
		$(".ui_tpicker_minute_label").html("Minuto");
		$(".ui_tpicker_second_label").html("Segundo");
	}

	//--------------------------------------------------------------------------------
	//ejecución	

	//calendario para la fecha de la cotización
	$( "#fecha" ).datetimepicker({
		dateFormat: "yy-mm-dd",
		timeFormat: "HH:mm:ss"		
	});	

	$("#fecha").click(function(){
		calendarEs();		
	});

	$("#ui-datepicker-div").click(function(event) {
		calendarEs();
	});
	//-----------------------------------------

	$("#selectCemento").change(function(event) {
		id_cemento = $(this).val();
		precio_cem = $("#selectCemento option:selected")[0].dataset.precio;
		cargaPropiedadesCemento(id_cemento,precio_cem);
	});

	$("#selectLadrillo").change(function(event) {
		/* Act on the event */
		id_ladrillo = $(this).val();
		//selecciona metadato precio definido para el option seleccionado
		precio_lad = $("#selectLadrillo option:selected")[0].dataset.precio;

		cargaPropiedadesLadrillo(id_ladrillo,precio_lad);
	});

	$("#btnCalcula").click(function(event) {
		/* Act on the event */
		calculaPared();
	});	
});