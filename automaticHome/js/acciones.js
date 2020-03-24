function rellenaFormUsuario(data){
	// for (var i = 0; i < data.length; i++) {
	//   console.log(data[i]);
	// }
	$('#nombreE').val(data[0]);
	$('#apellidoPaternoE').val(data[1]);
	$('#apellidoMaternoE').val(data[2]);
	$('#usernameE').val(data[3]);
	$('#passwordE').val(data[4]);
}

function rellenaFormInmueble(data){
	// for (var i = 0; i < data.length; i++) {
	//   console.log(data[i]);
	// }
	$('#inmueble_idE').val(data[0]);
	$('#usuario_idE').val(data[1]);
	$('#calle_numeroE').val(data[2]);
	$('#coloniaE').val(data[3]);
	$('#estadoE').val(data[4]);
	$('#codigo_postalE').val(data[5]);
	$('#descripcionE').val(data[6]);
}

function rellenaFormDispositivo(data){
	$('#dispositivo_idE').val(data[0]);
	$('#usuario_idE').val(data[1]);
	$('#inmueble_idE').val(data[2]);
	$('#clave_dispositivoE').val(data[3]);
	$('#descripcionE').val(data[4]);
}

$('#modalEliminar').on('show.bs.modal', function(e){
	$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

	$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});

function limpiarModalAgregar(seccion){
	if (seccion == "inmueble") {
		$("#usuario_id").val("Elije un propietario para el inmueble");
		$("#calle_numero").val("");
		$("#colonia").val("");
		$("#estado").val("");
		$("#codigo_postal").val("");
		$("#descripcion").val("");
	}else if (seccion == "usuario") {
		$("#nombre").val("");
		$("#apellidoPaterno").val("");
		$("#apellidoMaterno").val("");
		$("#username").val("");
		$("#password").val("");
	}else if (seccion == "dispositivo") {
		$("#usuario_id").val("Elige un usuario");
		$("#inmueble_id").val("Elije un inmueble para el dispositivo");
		$("#clave_dispositivo").val("");
		$("#descripcion").val("");
	}else{
		console.log("No se pudo limpiar: "+seccion);
	}
}

