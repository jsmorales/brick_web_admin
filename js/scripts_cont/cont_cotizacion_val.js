$(function(){
	console.log('hola desde cont val cotiza');

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

});