<?php 
require '../modelo/consultas.php';

$accion = isset($_POST['accion']) ? $_POST['accion'] : null;
if (isset($_GET['accion'])) {
	$accion = isset($_GET['accion']) ? $_GET['accion'] : null;
}

echo "$accion";
if (isset($_POST['valor'])) {
	$valor = isset($_POST['valor']) ? $_POST['valor'] : null;
	$result = getInmuebleUsuario($valor);
	echo "<label>Inmueble:</label>";
	echo "<select class='custom-select' name='inmueble_id' id='inmueble_id'>";
	while ($dato = $result->fetch()) {
      echo "<option value='".$dato['inmueble_id']."'>".$dato['calle_numero']."</option>";
    }
    echo "</select>";
}


if ($accion == "agregar") {
	$inmueble_id = isset($_POST['inmueble_id']) ? $_POST['inmueble_id'] : null;
	$clave_dispositivo = isset($_POST['clave_dispositivo']) ? $_POST['clave_dispositivo'] : null;
	$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
	agregarDispositivo($inmueble_id, $clave_dispositivo, $descripcion);
}else if ($accion == "eliminar") {
	$dispositivo_id = isset($_GET['dispositivo_id']) ? $_GET['dispositivo_id'] : null;
	eliminarDispositivo($dispositivo_id);
}else if ($accion == "actualizar") {
	$dispositivo_id = isset($_POST['dispositivo_idE']) ? $_POST['dispositivo_idE'] : null;
	$clave_dispositivo = isset($_POST['clave_dispositivoE']) ? $_POST['clave_dispositivoE'] : null;
	$descripcion = isset($_POST['descripcionE']) ? $_POST['descripcionE'] : null;
	actualizarDispositivo($dispositivo_id, $clave_dispositivo, $descripcion);
}

function eliminarDispositivo($dispositivo_id){
	$bool = true;
	if ($bool == true) {
		$result = deleteDispositivo($dispositivo_id);
		echo "<br>$result";
		if ($result == 1) {
			echo '<script type="text/javascript"> alert("Se ha eliminado el dispositivo con éxito"); window.location.href="../vistas/dispositivos.php"; </script>';
			// echo "<script type='text/javascript'> alert('Sí se agregó.'); </script>";
		}else{
			echo '<script type="text/javascript"> alert("Hubo un error al eliminar, intenta de nuevo"); window.location.href="../vistas/dispositivos.php"; </script>';
			// echo "<script type='text/javascript'> alert('No se agregó.'); </script>";
		}
	}else{
		echo "<script type='text/javascript'> alert('Hay datos incorrectos, verificar.'); </script>";
	}
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

function actualizarDispositivo($dispositivo_id, $clave_dispositivo, $descripcion){
	echo "<br>dispositivo_id: ".$dispositivo_id."<br>clave del dispositivo: ".$clave_dispositivo."<br>descripcion: ".$descripcion;
	$bool = true;
	if ($bool == true) {
		$result = updateDispositivo($dispositivo_id, $clave_dispositivo, $descripcion);
		echo "<br>$result";
		if ($result == 1) {
			// echo '<script type="text/javascript"> alert("Se ha actualizado el dispositivo con éxito"); window.location.href="../vistas/dispositivos.php"; </script>';
			echo "<script type='text/javascript'> alert('Sí se agregó.'); </script>";
		}else{
			// echo '<script type="text/javascript"> alert("Hubo un error al actualizar, intenta de nuevo"); window.location.href="../vistas/dispositivos.php"; </script>';
			echo "<script type='text/javascript'> alert('No se agregó.'); </script>";
		}
	}else{
		echo "<script type='text/javascript'> alert('Hay datos incorrectos, verificar.'); </script>";
	}
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
