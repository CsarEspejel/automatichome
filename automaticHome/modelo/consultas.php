<?php
require "conexionDB.php";
//Aquí se hacen las consultas a la base de datos.
 $con = $con;
 // $usuario = "55ccb43059a9f05a07ae37d8fee72627a7e0e103";
 // $password = "90885ea02308d91c21f9055d1d841856bfcd1430";
 // validarUsuario($usuario, $password);
function validarUsuario($usuario, $password){
  global $con;
  $usuario = $usuario;
  $password = $password;
  $consulta = "SELECT username FROM usuario WHERE username='$usuario' AND password='$password' LIMIT 1";
  $resultado = $con->query($consulta);

  $total = $resultado->fetchColumn();
  echo "total: $total";
  if ($total == $usuario) {
    return true;
  }else{
    return 0;
  }
}
/************************************ SECCION PARA CONSULTAS DE USUARIO ************************************/
//Obtener el id de un usuario conforme a su username.
function getIdUsuario($usuario){
  global $con;
  $consulta = "SELECT usuario_id FROM usuario WHERE username='$usuario' ";
  $resultado = $con->query($consulta);
  $idUsuario = $resultado->fetchColumn();
  return $idUsuario;
}
//Agregar un nuevo usuario.
function setUsuario($username, $password, $nombre, $apellidoPat, $apellidoMat, $fecha){
  global $con;
  // $idAdmin = getIdAdmin(sha1($admin));
  $consulta = "INSERT INTO usuario (usuario_id, username, password, nombre, apellido_p, apellido_m, fecha_alta) VALUES (NULL, :username, :password, :nombre, :apellidoPat, :apellidoMat, :fecha)";
  $consulta = $con->prepare($consulta);
  
  //$consulta->bindParam(':usuario_id', NULL, PDO::PARAM_NULL);
  $consulta->bindParam(':username', $username, PDO::PARAM_STR);
  $consulta->bindParam(':password', $password, PDO::PARAM_STR);
  $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
  $consulta->bindParam(':apellidoPat', $apellidoPat, PDO::PARAM_STR);
  $consulta->bindParam(':apellidoMat', $apellidoMat, PDO::PARAM_STR);
  $consulta->bindParam(':fecha', $fecha, PDO::PARAM_STR);

  return $consulta->execute();

}
//Obtener la información de un usuario conforme su ID.
function getUsuario($usuario){
  global $con;
  $idUsuario = getIdUsuario(($usuario));
  $consulta = "SELECT usuario.*  FROM usuario WHERE ";
  $resultado = $con->query($consulta);
  return $resultado;
}
//Eliminar un usuario conforme a su nombre de usuario.
function deleteUsuario($usuario){
  global $con;
  //$idAdmin = getIdAdmin(sha1($admin));
  $consulta = "DELETE FROM usuario WHERE username = :usuario";
  $consulta = $con->prepare($consulta);
  $consulta->bindParam(':usuario', $usuario, PDO::PARAM_STR);
  return $consulta->execute();
}
//Actualizar información de un usuario condorme a su ID.
function updateUsuario($username, $password, $nombre, $apellidoPat, $apellidoMat){
  global $con;
  $idUsuario = getIdUsuario($username);
  $consulta = "UPDATE usuario SET
               username=:username, password=:password, nombre=:nombre, apellido_p=:apellido_p, apellido_m=:apellido_m
               WHERE usuario_id=:usuario_id";
  $consulta = $con->prepare($consulta);

  $consulta->bindParam(':username', $username, PDO::PARAM_STR);
  $consulta->bindParam(':password', $password, PDO::PARAM_STR);
  $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
  $consulta->bindParam(':apellido_p', $apellidoPat, PDO::PARAM_STR);
  $consulta->bindParam(':apellido_m', $apellidoMat, PDO::PARAM_STR);
  $consulta->bindParam(':usuario_id', $idUsuario, PDO::PARAM_STR);

  return $consulta->execute();
}
//Obtener todos los registros en la tabla usuarios.
function getDatosUsuarios(){
  global $con;
  $consulta = "SELECT usuario.*  FROM usuario";
  $resultado = $con->query($consulta);
  return $resultado;
}
/************************************ FIN DE SECCION PARA CONSULTAS DE USUARIO ************************************/

/************************************ SECCION PARA CONSULTAS DE INMUEBLES ************************************/
//Agregar un nuevo inmueble.
function setInmueble($usuario_id, $calle, $descripcion, $colonia, $estado, $codigo_postal, $fecha){
  global $con;
  $consulta = "INSERT INTO inmueble (inmueble_id, usuario_id, calle_numero, descripcion, colonia, estado, codigo_postal, fecha_alta) VALUES (NULL, :usuario_id, :calle_numero, :descripcion, :colonia, :estado, :codigo_postal, :fecha_alta);";
  $consulta = $con->prepare($consulta);
  $consulta->bindParam(':usuario_id', $usuario_id, PDO::PARAM_STR);
  $consulta->bindParam(':calle_numero', $calle, PDO::PARAM_STR);
  $consulta->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
  $consulta->bindParam(':colonia', $colonia, PDO::PARAM_STR);
  $consulta->bindParam(':estado', $estado, PDO::PARAM_STR);
  $consulta->bindParam(':codigo_postal', $codigo_postal, PDO::PARAM_STR);
  $consulta->bindParam(':fecha_alta', $fecha, PDO::PARAM_STR);

  return $consulta->execute();
}
//Eliminar un inmueble conforme a su id.
function deleteInmueble($inmueble_id){
  global $con;
  $consulta = "DELETE FROM inmueble WHERE inmueble_id = :inmueble_id";
  $consulta = $con->prepare($consulta);
  $consulta->bindParam(':inmueble_id', $inmueble_id, PDO::PARAM_INT);
  return $consulta->execute();
}

//Actualizar un inmueble
function updateInmueble($inmueble_id, $calle, $descripcion, $colonia, $estado, $codigo_postal){
  global $con;
  $consulta = "UPDATE inmueble SET 
              calle_numero=:calle_numero, descripcion=:descripcion, colonia=:colonia, estado=:estado, codigo_postal=:codigo_postal
              WHERE inmueble_id=:inmueble_id";
  $consulta = $con->prepare($consulta);
  $consulta->bindParam(":calle_numero", $calle, PDO::PARAM_STR);
  $consulta->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
  $consulta->bindParam(":colonia", $colonia, PDO::PARAM_STR);
  $consulta->bindParam(":estado", $estado, PDO::PARAM_STR);
  $consulta->bindParam(":codigo_postal", $codigo_postal, PDO::PARAM_STR);
  $consulta->bindParam(":inmueble_id", $inmueble_id, PDO::PARAM_INT);
  return $consulta->execute();
}

function getDatosInmuebles(){
  global $con;
  $consulta = "SELECT i.*, u.* FROM inmueble i, usuario u WHERE i.usuario_id = u.usuario_id";
  $resultado = $con->query($consulta);
  return $resultado;
}
/************************************ FIN DE SECCION PARA CONSULTAS DE INMUEBLES ************************************/

/************************************ SECCION PARA CONSULTAS DE DISPOSITIVOS ************************************/

function getDatosDispositivos(){
  global $con;
  $consulta = "SELECT d.*, i.inmueble_id, i.usuario_id, i.calle_numero, u.usuario_id, u.username FROM dispositivo d, inmueble i, usuario u WHERE d.inmueble_id = i.inmueble_id AND i.usuario_id = u.usuario_id";
  // $consulta = "SELECT * FROM dispositivo";
  $resultado = $con->query($consulta);
  return $resultado;
}

function setDispositivo($inmueble_id, $clave_dispositivo, $descripcion){
  global $con;
  $consulta = "INSERT INTO dispositivo (dispositivo_id, inmueble_id, clave_dispositivo, descripcion) VALUES (NULL, :inmueble_id, :clave_dispositivo, :descripcion)";
  $consulta = $con->prepare($consulta);
  $consulta->bindParam(":inmueble_id", $inmueble_id, PDO::PARAM_STR);
  $consulta->bindParam(":clave_dispositivo", $clave_dispositivo, PDO::PARAM_STR);
  $consulta->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
  return $consulta->execute();
}

//Función que regresa los datos de los inmuebles dependiendo del usuario seleccionado.
// function getInmuebleUsuario($usuario){
//   $consulta = "SELECT * FROM inmueble WHERE usuario_id=$usuario";
//   $resultado = $con->query($consulta);
//   return $resultado;
// }
?>
