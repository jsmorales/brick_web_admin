$(function(){
	console.log('hola desde cont val cotiza');

	//------------------------------------------------------------------------------
	var tipo_user = $("#tipo_user").val();
	var cedula = $("#cedula_user").val();
	var id_user = $("#id_cliente").val();

	//------------------------------------------------------------------------------

	function val_user(){

		if( tipo_user == "Cliente" ){

			$("#autoCliente").val(cedula);
			$("#autoCliente").attr('readonly', '');
			$("#fkID_cliente").val(id_user);
		}
	}

	function tiempo_sistema(){

		var f = new Date();
		var dia = f.getDate();
		var mes = f.getMonth() +1;
		var anio = f.getFullYear();

		var hora = f.getHours();
		var minuto = f.getMinutes();
		var segundo = f.getSeconds();

		var fecha = anio+"-"+mes+"-"+dia+" "+hora+":"+minuto+":"+segundo;

		console.log(anio+"-"+mes+"-"+dia+" "+hora+":"+minuto+":"+segundo);

		return fecha;
	}
	//------------------------------------------------------------------------------
	$("#altoP").change(function(event) {
		/* Act on the event */

		if( ($(this).val() <= 0) || ($(this).val() > 9999) ){
			alert("El número ingresado no es válido.");
			$(this).val("");
		}
	});

	$("#anchoP").change(function(event) {
		/* Act on the event */

		if( ($(this).val() <= 0) || ($(this).val() > 9999) ){
			alert("El número ingresado no es válido.");
			$(this).val("");
		}
	});

	$("#grosorMezcla").change(function(event) {
		/* Act on the event */

		if( ($(this).val() <= 0) || ($(this).val() > 3) ){
			alert("El número ingresado no es válido.");
			$(this).val(1.5);
		}
	});

	$("#fecha").attr('readonly', '');
	$("#fecha").val(tiempo_sistema());

	//------------------------------------------------------------------------------
	
	val_user();
	//tiempo_sistema();

});