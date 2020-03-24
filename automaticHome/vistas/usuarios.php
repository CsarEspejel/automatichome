<?php
session_start();

$varSession = $_SESSION['admon'];
error_reporting(0);
if ($varSession == null || $varSession == '') {
  header("Location: ../index.php");
  die();
}

?>

<?php
  require '../controlador/accionesUsuario.php';
  $resultado = getUsuarios(); 
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
    <title>Usuarios</title>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid bg-light">
      <div class="row">
        <div class="col-md-10">
          <div class="container">
            <h1> <span>Automatic Home - Usuarios</span> </h1>
            <p class="lead">Administra tus usuarios.</p>
          </div>
        </div>
        <div class="col-md-2 col-sm-2">
          <img class="" src="../img/automatichome.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <span class="navbar-brand"><?php echo $varSession; ?></span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Usuarios<span class="sr-only">(current)</span></a>
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
    <!-- Termina navbar -->

    <!-- Modal para agregar nuevo acceso -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="modalAgregarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAgregarLabel">Agregar nuevo usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="formu" action="../controlador/accionesUsuario.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" hidden="true" name="accion" readonly id="agregar" value="agregar">
              </div>
              <!-- <div class="form-group">
                <label for="admin">Sesión Actual:</label>
                <input type="text" class="form-control" name="admin" readonly id="admin" value="<?php //echo $varSession; ?>">
              </div> -->
              <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required="true" placeholder="Ingresa el nombre" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="apellidoPaterno">Apellido Paterno:</label>
                <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" required="true" placeholder="Ingresa el apellido paterno" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="apellidoMaterno">Apellido Materno:</label>
                <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" required="true" placeholder="Inserta el apellido materno" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="username">Nombre de usuario:</label>
                <input type="text" class="form-control" name="username" id="username" required="true" placeholder="Ingresa el nombre de usuario" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password" required="true" placeholder="Ingresa una contraseña" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="fecha">Fecha:</label>
                <!-- <input type="date" class="form-control" name="date" id="date"> -->
                <?php
                  date_default_timezone_set("America/Mexico_City");
                  $fcha = date("Y-m-d");?>
                <input type="text" class="form-control" readonly="true" name="fecha" id="fecha" value="<?php echo $fcha;?>" >
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-success">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina modal para agregar dispositivo -->


    <!-- Modal para editar usuario -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAgregarLabel">Editar usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="formuE" action="../controlador/accionesUsuario.php" method="post">

              <div class="form-group">
                <input type="text" class="form-control" hidden="true" name="accion" readonly id="actualizar" value="actualizar">
              </div>
              <!-- <div class="form-group">
                <label for="admin">Sesión Actual:</label>
                <input type="text" class="form-control" name="adminE" readonly id="adminE" value="<?php //echo $varSession; ?>">
              </div> -->
              <div class="form-group">
                <label for="nombreE">Nombre:</label>
                <input type="text" class="form-control" name="nombreE" id="nombreE" required="true" placeholder="Ingresa el nombre" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="apellidoPaternoE">Apellido Paterno:</label>
                <input type="text" class="form-control" name="apellidoPaternoE" id="apellidoPaternoE" required="true" placeholder="Ingresa el apellido paterno" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="apellidoMaternoE">Apellido Materno:</label>
                <input type="text" class="form-control" name="apellidoMaternoE" id="apellidoMaternoE" required="true" placeholder="Inserta el apellido materno" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="usernameE">Nombre de usuario:</label>
                <input type="text" class="form-control" name="usernameE" id="usernameE" required="true" placeholder="Ingresa el nombre de usuario" readonly="true" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="passwordE">Contraseña:</label>
                <input type="password" class="form-control" name="passwordE" id="passwordE" required="true" placeholder="Ingresa una contraseña" autocomplete="off">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-success">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina modal para editar usuario -->

    <!-- Inicia modal para confirmación de eliminar -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEliminar" aria-labelledby="modalEliminarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Eliminar usuario</h5>
          </div>
          <div class="modal-body">
            <h6>¿Desea eliminar el usuario?</h6>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Eliminar</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina modal para confirmación de eliminar -->

    <div class="container-fluid">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <!-- <th scope="col">Acciones </th> -->
            <th scope="col"> <button class='btn btn-success' onclick='limpiarModalAgregar("usuario");' data-toggle="modal" data-target="#modalAgregar">Agregar Nuevo</button></th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($datos = $resultado->fetch()) {
              echo "<tr>";
                  $usuario_id = $datos['usuario_id'];
                  //echo "<td>".$datos['usuario_id']."</td>";
                  // echo "<td>".$contador."</td>";
                  echo "<td>".$datos['nombre']."</td>";
                  echo "<td>".$datos['apellido_p']."</td>";
                  echo "<td>".$datos['apellido_m']."</td>";
                  $datosEditar = [$datos['nombre'], $datos['apellido_p'], $datos['apellido_m'], $datos['username'], $datos['password'] ];
                  // echo $datosEditar."<br>";
                  $datosEditar = json_encode($datosEditar);
                  echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#modalEditar' onclick='rellenaFormUsuario($datosEditar);'>Editar</button>";
                  // echo "<button class='btn btn-danger' onclick=\"Location.href='../controlador/eliminarAccesos.php?usuario=".$datos['Nombre_Usuario_Acceso']." \">Eliminar</button></td>";
                  // echo "<a class='btn btn-danger' href='../controlador/accionesUsuario.php?accion=eliminar&usuario=".$datos['username']."'>Eliminar</a>";
                  echo "<button href='#' data-href='../controlador/accionesUsuario.php?accion=eliminar&usuario=".$datos['username']." ' class='btn btn-danger' data-toggle='modal' data-target='#modalEliminar'>Eliminar</button>";
                  // echo "<a class='btn btn-success' href='../controlador/agregarBitacora.php?identificador=".$varSession."&ubicacion=".$datos['Ubicacion_Dispositivo']."'>Abrir</a></td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    
    <!-- Script para validar campos de formulario -->
    <script>
      window.onload = function () {
        const formu = document.getElementById("formu");
        formu.addEventListener('submit', validarFormulario);
        const formuE = document.getElementById("formuE");
        formuE.addEventListener('submit', validarFormularioE);
      }

      function validarFormulario(evObject) {
        evObject.preventDefault();
        var todoCorrecto = true;
        var formulario = document.getElementById("formu");
        for (var i=0; i<formulario.length; i++) {
          // alert("dato: " + formulario[i].name);
          if(formulario[i].type == 'text') {
            if (formulario[i].value == null || formulario[i].value.length == 0 || /^\d*$/.test(formulario[i].value) || /^\s*$/.test(formulario[i].value)){
            // alert (formulario[i].name+ ' no puede estar vacío o contener sólo espacios en blanco');
            todoCorrecto=false;
            }
          }
        }
        if (todoCorrecto == true) {formulario.submit();}
        else {alert("No debe de haber datos en blanco o con solo números, verifícalos.");}
      }
      function validarFormularioE(evObject) {
        evObject.preventDefault();
        var todoCorrecto = true;
        var formulario = document.getElementById("formuE");
        for (var i=0; i<formulario.length; i++) {
          // alert("dato: " + formulario[i].name);
          if(formulario[i].type == 'text') {
            if (formulario[i].value == null || formulario[i].value.length == 0 || /^\d*$/.test(formulario[i].value) || /^\s*$/.test(formulario[i].value)){
            // alert (formulario[i].name+ ' no puede estar vacío o contener sólo espacios en blanco');
            todoCorrecto=false;
            }
          }
        }
        if (todoCorrecto == true) {formulario.submit();}
        else {alert("No debe de haber datos en blanco o con solo números, verifícalos. Editar");}
      }
    </script>
    <!-- Termina script para validar campos de formulario -->

    <script type="text/javascript" src="../js/acciones.js"></script>
    <script src="../js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
