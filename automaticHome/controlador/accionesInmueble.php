<?php 
include '../modelo/consultas.php';

$accion = isset($_POST['accion']) ? $_POST['accion'] : null;
if (isset($_GET['accion'])) {
	$accion = isset($_GET['accion']) ? $_GET['accion'] : null;
}

if ($accion == "agregar") {
	echo "Entra a agregar.";
	$usuario_id = isset($_POST['usuario_id']) ? $_POST['usuario_id'] : null;
	$calle_numero = isset($_POST['calle_numero']) ? $_POST['calle_numero'] : null;
	$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
	$colonia = isset($_POST['colonia']) ? $_POST['colonia'] : null;
	$estado = isset($_POST['estado']) ? $_POST['estado'] : null;
	$codigo_postal = isset($_POST['codigo_postal']) ? $_POST['codigo_postal'] : null;
	$fecha_alta = isset($_POST['fecha_alta']) ? $_POST['fecha_alta'] : null;

	//$datos = validarPost($usuario_id, $calle_numero, $descripcion, $colonia, $estado, $codigo_postal, $fecha_alta);
	agregarInmueble($usuario_id, $calle_numero, $descripcion, $colonia, $estado, $codigo_postal, $fecha_alta);
}else if ($accion == "eliminar") {
	echo "<script type='text/javascript'> console.log('Sí entra a eliminar.'); </script>";
	eliminarInmueble();
}else if ($accion == "actualizar") {
	echo "Entra a actualizar.";
	$inmueble_id = isset($_POST['inmueble_idE']) ? $_POST['inmueble_idE'] : null;
	$calle_numero = isset($_POST['calle_numeroE']) ? $_POST['calle_numeroE'] : null;
	$descripcion = isset($_POST['descripcionE']) ? $_POST['descripcionE'] : null;
	$colonia = isset($_POST['coloniaE']) ? $_POST['coloniaE'] : null;
	$estado = isset($_POST['estadoE']) ? $_POST['estadoE'] : null;
	$codigo_postal = isset($_POST['codigo_postalE']) ? $_POST['codigo_postalE'] : null;
	//$datos = validarPost("vacio",$calle_numero, $descripcion, $colonia, $estado, $codigo_postal,"vacio");
	actualizarInmueble($inmueble_id, $calle_numero, $descripcion, $colonia, $estado, $codigo_postal);
}
else{
	// echo "No hay acción";
}


function agregarInmueble($usuario_id, $calle_numero, $descripcion, $colonia, $estado, $codigo_postal, $fecha_alta){
	// $usuario_id = $dato[1];
	// $calle_numero = $dato[2];
	// $descripcion = $dato[3];
	// $colonia = $dato[4];
	// $estado = $dato[5];
	// $codigo_postal = $dato[6];
	// $fecha_alta = $dato[7];
	// $bool = $dato[8];
	$bool = true;

	if ($bool == true) {
		$result = setInmueble($usuario_id, $calle_numero, $descripcion, $colonia, $estado, $codigo_postal, $fecha_alta);
		// echo $result;
		if ($result == 1) {
			echo '<script type="text/javascript"> alert("Se ha guardado el inmueble con éxito"); window.location.href="../vistas/inmuebles.php"; </script>';
			// echo "<script type='text/javascript'> alert('Sí se agregó.'); </script>";
		}else{
			echo '<script type="text/javascript"> alert("Hubo un error al guardar, intenta de nuevo"); window.location.href="../vistas/inmuebles.php"; </script>';
			// echo "<script type='text/javascript'> alert('No se agregó.'); </script>";
		}
	}else{
		echo "<script type='text/javascript'> alert('Hay datos incorrectos, verificar.'); </script>";
	}
}

function actualizarInmueble($inmueble_id, $calle_numero, $descripcion, $colonia, $estado, $codigo_postal){
	// $calle_numero = $dato[2];
	// $descripcion = $dato[3];
	// $colonia = $dato[4];
	// $estado = $dato[5];
	// $codigo_postal = $dato[6];
	// $bool = $dato[8];
	$bool = true;
	if ($bool == true) {
		$result = updateInmueble($inmueble_id, $calle_numero, $descripcion, $colonia, $estado, $codigo_postal);
		// echo $result;
		if ($result == 1) {
			echo '<script type="text/javascript"> alert("Se ha actualizado el inmueble con éxito"); window.location.href="../vistas/inmuebles.php"; </script>';
			// echo "<script type='text/javascript'> alert('Sí se actualizó el inmueble.'); </script>";
		}else{
			echo '<script type="text/javascript"> alert("Hubo un error al actualizar, intenta de nuevo"); window.location.href="../vistas/inmuebles.php"; </script>';
			// echo "<script type='text/javascript'> alert('No se actualizó el inmueble.'); </script>";
		}
	}else{
		echo "<script type='text/javascript'> alert('Hay datos incorrectos, verificar.'); </script>";
	}
}

//Función para eliminar un inmueble conforme a su id.
function eliminarInmueble(){
	$inmueble_id = isset($_GET['inmueble_id']) ? $_GET['inmueble_id'] : null;
	echo "inmueble id:".$inmueble_id;
	if(!empty($inmueble_id) && $inmueble_id != null){
		$result = deleteInmueble($inmueble_id);
		if ($result == 1) {
			echo '<script type="text/javascript"> alert("Se ha eliminado con éxito"); window.location.href="../vistas/inmuebles.php"; </script>';
		}else{
			echo '<script type="text/javascript"> alert("Hubo un error al eliminar, intenta de nuevo"); window.location.href="../vistas/inmuebles.php"; </script>';
		}
	}
}

function getUsuarios(){
	return getDatosUsuarios();
}
function getInmuebles(){
	return getDatosInmuebles();
}


//Valida que los datos que lleguen por POST no sean vacíos o nulos.
function validarPost($usuario_id, $calle_numero, $descripcion, $colonia, $estado, $codigo_postal, $fecha_alta){
	
	trim($usuario_id);
	trim($calle_numero);
	trim($descripcion);
	trim($colonia);
	trim($estado);
	trim($codigo_postal);
	trim($fecha_alta);

	echo "usuario id:".$usuario_id."<br>calle y numero:".$calle_numero."<br>descripción:".$descripcion."<br>colonia:".$colonia."<br>estado:".$estado."<br>código postal:".$codigo_postal."<br>fecha:".$fecha_alta;

	$datos = [ 
		1 => $usuario_id, 
		2 => $calle_numero, 
		3 => $descripcion, 
		4 => $colonia,
		5 => $estado,
		6 => $codigo_postal,
		7 => $fecha_alta];
	$error = 0;
	$chido = 0;
	foreach ($datos as $key => $valor) {
		if ( empty($valor) || $valor == null) {
			$error += 1;
			 $error = $error . "<br>Error: " . $valor . "<br>";
			 echo $error;
		}else{
			$chido += 1;
			$chido = $chido . "<br>Chido: " . $valor . "<br>";
			echo $chido;
		}
	}

	if ($error > 0) {
		// echo "<script> alert('Hay uno o más campos vacíos.'); 
		// 	 window.location.href('../vistas/usuarios.php');</script>";
		echo "<script> alert('Hay uno o más campos vacíos.')";
	}else{
		array_push($datos, true);
		return $datos;
	}
}

?>