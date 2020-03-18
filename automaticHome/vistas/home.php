<?php
session_start();

$varSession = $_SESSION['admon'];
error_reporting(0);
if ($varSession == null || $varSession == '') {
  header("Location: ../index.php");
  die();
}

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilosIndex.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Inicio</title>
  </head>
  <body>
    <style>body{background-image: url("../img/automatichome.png"); background-position: 50% -30%; background-repeat: no-repeat;}</style>
    <div class="jumbotron jumbotron-fluid bg-light-blue">
      <div class="row">
        <div class="col-md-10">
          <div class="container">
            <h1> <span>Automatic Home</span> </h1>
            <p class="lead"></p>
          </div>
        </div>
        <div class="col-md-2 col-sm-2">
          <img class="" src="../img/automatichome.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <span class="navbar-brand">Bienvenido <?php echo $varSession; ?></span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="usuarios.php">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dispositivos.php">Dispositivos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inmuebles.php">Inmuebles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../controlador/sesiones.php?accion=cerrarSesion">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </nav>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="../js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
