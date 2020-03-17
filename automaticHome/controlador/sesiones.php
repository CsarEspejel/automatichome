<?php
require "../modelo/consultas.php";
$accion = isset($_POST['accion']) ? $_POST['accion'] : null;
if ($accion == null) {
	$accion = isset($_GET['accion']) ? $_GET['accion'] : null;
}

if ($accion == "iniciarSesion") {
	iniciarSesion();
}else if($accion == "cerrarSesion"){
	cerrarSesion();
}

function iniciarSesion(){
	session_start();
	//Recive los datos de usuario por POST.
	$usuario = isset($_POST['username']) ? $_POST['username'] : null;
	$password = isset($_POST['pass']) ? $_POST['pass'] : null;
	//Convertimos los datos en minúsculas.
	$usuario = strtolower($usuario);
	$password = strtolower($password);
	//Creamos variable de sesión.
	$_SESSION['admon'] = $usuario;
	//Quitamos espacios en blanco al inicio y fin del dato.
	trim($usuario);
	trim($password);
	//Encriptamos los datos.
	// $usuarioEncrypted = sha1($usuario);
	// $passwordEncrypted = sha1($password);

	//$respuesta = validarUsuario($usuario, $password);

	if ( $usuario == '' || $password == '' ) {
	  echo "<script type='text/javascript'> console.log('Error, intentar de nuevo.'); </script>";
	}else {
	  $salida = validarUsuario($usuario, $password);
	  echo "$salida";
	  if ($salida == true) {
	    header('Location: ../vistas/home.php');
	  }else{
	    header('Location: ../index.php');
	    session_destroy();
	  }
	}
}

function cerrarSesion(){
	session_start();
	$varSession = $_SESSION['admon'];

	if ($varSession == null || $varSession == '') {
	  // header("Location: ../index.php");
	  echo "<script type='text/javascript'>window.location.href='../index.php' </script>";
	  die();
	}else{
		session_destroy();
		// header('Location: ../index.php');
		echo "<script type='text/javascript'>
		 alert('Se ha cerrado tu sesión!'); 
		 window.location.href='../index.php'; </script>";
	}
}

?>
