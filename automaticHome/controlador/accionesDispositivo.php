<?php 
require '../modelo/consultas.php';

$accion = isset($_POST['accion']) ? $_POST['accion'] : null;

if ($accion == "agregar") {
	$inmueble_id = isset($_POST['inmueble_id']) ? $_POST['inmueble_id'] : null;
	$clave_dispositivo = isset($_POST['clave_dispositivo']) ? $_POST['clave_dispositivo'] : null;
	$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
	agregarDispositivo($inmueble_id, $clave_dispositivo, $descripcion);
}else if ($accion == null) {
	// $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
	// $inmueble = getInmuebleUsuario($usuario);
	// $cadena = "<select class='custom-select' id='inmueble_id' name='inmueble_id'>"
	// while ($datos = $inmueble->fetch()) {
	// 	$cadena = $cadena.'<option value='.$datos[0].'>'.$datos[2].'</option>';
	// }
	// echo $cadena."</select>";
}

function agregarDispositivo($inmueble_id, $clave_dispositivo, $descripcion){
	echo "<br>inmueble_id: ".$inmueble_id."<br>clave del dispositivo: ".$clave_dispositivo."<br>descripcion: ".$descripcion;
	$bool = true;
	if ($bool == true) {
		$result = setDispositivo($inmueble_id, $clave_dispositivo, $descripcion);
		echo "<br>$result";
		if ($result == 1) {
			echo '<script type="text/javascript"> alert("Se ha guardado el dispositivo con éxito"); window.location.href="../vistas/dispositivos.php"; </script>';
			// echo "<script type='text/javascript'> alert('Sí se agregó.'); </script>";
		}else{
			echo '<script type="text/javascript"> alert("Hubo un error al guardar, intenta de nuevo"); window.location.href="../vistas/dispositivos.php"; </script>';
			// echo "<script type='text/javascript'> alert('No se agregó.'); </script>";
		}
	}else{
		echo "<script type='text/javascript'> alert('Hay datos incorrectos, verificar.'); </script>";
	}
}

function actualizarDispositivo(){

}

function leerDatos(){
	return getDatosDispositivos();
}
function getInmuebles(){
	return getDatosInmuebles();
}
function getUsuarios(){
	return getDatosUsuarios();
}

?>