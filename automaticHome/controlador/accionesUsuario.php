<?php
require '../modelo/consultas.php';
header('Content-Type: text/html; charset=UTF-8');

//La acción define que proceso se va a realizar.
$accion = isset($_POST['accion']) ? $_POST['accion'] : null;
if (isset($_GET['accion'])) {
	$accion = isset($_GET['accion']) ? $_GET['accion'] : null;
	$usuario = isset($_GET['usuario']) ? $_GET['usuario'] : null;
}
// echo "<br> accion = " . $accion;

if (!empty($accion) && $accion != null) {
	echo "<br>Sí hay dato<br>";
	//Si la acción es "agregar" se llamará al método para algregar un nuevo usuario.
	if ($accion == "agregar") {
		echo "Entra a agregar.";
		$username = isset($_POST['username']) ? $_POST['username'] : null;
		$password = isset($_POST['password']) ? $_POST['password'] : null;
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$apellidoPat = isset($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno'] : null;
		$apellidoMat = isset($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno'] : null;
		$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;

		$datos = validarPost($username, $password, $nombre, $apellidoPat, $apellidoMat, $fecha);
		agregarUsuario($datos);
	}else 
	//Sí la acción es "actualizar" se llamará al método para actualizar un usuario.
	if($accion == "actualizar"){
		$username = isset($_POST['usernameE']) ? $_POST['usernameE'] : null;
		$password = isset($_POST['passwordE']) ? $_POST['passwordE'] : null;
		$nombre = isset($_POST['nombreE']) ? $_POST['nombreE'] : null;
		$apellidoPat = isset($_POST['apellidoPaternoE']) ? $_POST['apellidoPaternoE'] : null;
		$apellidoMat = isset($_POST['apellidoMaternoE']) ? $_POST['apellidoMaternoE'] : null;

		$datos = validarPost($username, $password, $nombre, $apellidoPat, $apellidoMat, "vacio");
		actualizarUsuario($datos);
	}else if ($accion == "eliminar") {
		eliminarUsuario($usuario);
	}
}else{
	// echo "No hay dato";
}

function eliminarUsuario($usuario){
	if(!empty($usuario) && $usuario != null){
		$result = deleteUsuario($usuario);
		if ($result == 1) {
			echo '<script type="text/javascript"> alert("Se ha eliminado con éxito"); window.location.href="../vistas/usuarios.php"; </script>';
		}else{
			echo '<script type="text/javascript"> alert("Hubo un error al eliminar, intenta de nuevo"); window.location.href="../vistas/usuarios.php"; </script>';
		}
	}
}

//Agregar nuevo usuario
function agregarUsuario($datos){

	$username = $datos[1];
	$password = $datos[2];
	$nombre = $datos[3];
	$apellidoPat = $datos[4];
	$apellidoMat = $datos[5];
	$fecha = $datos[6];
	$bool = $datos[7];

	// echo "usuario: ".$username."<br>pass:".$password."<br>nom:".$nombre."<br>apeP:".$apellidoPat."<br>apeM".$apellidoMat."<br>fecha:".$fecha."<br>booleano:".$bool;

	if ($bool == true) {
		$result = setUsuario($username, $password, $nombre, $apellidoPat, $apellidoMat, $fecha);
		// echo $result;
		if ($result == 1) {
			echo '<script type="text/javascript"> alert("Se ha guardado con éxito"); window.location.href="../vistas/usuarios.php"; </script>';
		}else{
			echo '<script type="text/javascript"> alert("Hubo un error al guardar, intenta de nuevo"); window.location.href="../vistas/usuarios.php"; </script>';
		}
	}else{
		echo "<script type='text/javascript'> alert('Hay datos incorrectos, verificar.'); </script>";
	}
}

//Actualizar Usuario
function actualizarUsuario($datos){

	$username = $datos[1];
	$password = $datos[2];
	$nombre = $datos[3];
	$apellidoPat = $datos[4];
	$apellidoMat = $datos[5];
	$bool = $datos[7];

	if ($bool == true) {
		$result = updateUsuario($username, $password, $nombre, $apellidoPat, $apellidoMat);
		// echo $result;
		if ($result == 1) {
			echo '<script type="text/javascript"> alert("Se ha actualizado con éxito"); window.location.href="../vistas/usuarios.php"; </script>';
		}else{
			echo '<script type="text/javascript"> alert("Hubo un error al actualizar, intenta de nuevo"); window.location.href="../vistas/usuarios.php"; </script>';
		}
	}else{
		echo "<script type='text/javascript'> alert('Hay datos incorrectos, verificar.'); </script>";
	}
}

//Valida que los datos que lleguen por POST no sean vacíos o nulos.
function validarPost($username, $password, $nombre, $apellidoPat, $apellidoMat, $fecha){
	
	$username = strtolower($username);
	trim($username);
	trim($password);
	trim($nombre);
	trim($apellidoPat);
	trim($apellidoMat);
	trim($fecha);

	echo "usuario: ".$username."<br>pass:".$password."<br>nom:".$nombre."<br>apeP:".$apellidoPat."<br>apeM".$apellidoMat."<br>fecha:".$fecha;

	$datos = [ 
		1 => $username, 
		2 => $password, 
		3 => $nombre, 
		4 => $apellidoPat,
		5 => $apellidoMat,
		6 => $fecha];
	$error = 0;
	$chido = 0;
	foreach ($datos as $key => $valor) {
		if ( empty($valor) || $valor == null) {
			$error += 1;
			 //$error = $error . "Error: " . $valor . "<br>";
			 // echo $error;
		}else{
			$chido += 1;
			// $chido = $chido . "Chido: " . $valor . "<br>";
			// echo $chido;
		}
	}

	if ($error > 0) {
		// echo "<script> alert('Hay uno o más campos vacíos.'); 
		// 	 window.location.href('../vistas/usuarios.php');</script>";
	}else{
		array_push($datos, true);
		return $datos;
	}
}

function getUsuarios(){
	return getDatosUsuarios();
}
?>
