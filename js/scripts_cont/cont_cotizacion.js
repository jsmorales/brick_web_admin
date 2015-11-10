$(function(){
	console.log('hola desde cotizacion js');
	//--------------------------------------------------------------------------------
	//variables globales
	var id_ladrillo = 0;
	var precio_lad = 0;
	//++++++++++++++++++
	var alt_par,anch_par,alt_lad,anc_lad,mez = 0;
	var anch_par_lad, alt_par_lad, total_lad, precio_lad_total = 0;
	//++++++++++++++++++
	var objt_f_calculaP = {};
	//--------------------------------------------------------------------------------


	//--------------------------------------------------------------------------------
	//Funciones
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

	    if ( (objt_f_calculaP.estado == true) & ( ($("#ancho").val() != undefined) || ($("#alto").val() != undefined) ) ){
	    	//-----------------------------------------------------------------------
	    	//calculo
	    	alt_par = $("#altoP").val();
	    	anch_par = $("#anchoP").val();

	    	alt_lad = $("#alto").val();
	    	anch_lad = $("#ancho").val();
	    	mez = $("#grosorMezcla").val();

	    	//pasa cm a M
	    	anch_lad = anch_lad / 100;
	    	alt_lad = alt_lad / 100;
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
	    	$("#precio_lad_total").val(precio_lad_total)
	    	//-----------------------------------------------------------------------
	    }else{
	    	alert("Por favor complete los campos para poder hacer el cálculo, asegúrese de seleccionar un ladrillo que contenga las propiedades válidas.");
	    };
	}

	//--------------------------------------------------------------------------------
	//ejecución

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