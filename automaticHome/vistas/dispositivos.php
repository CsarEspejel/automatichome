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
  require '../controlador/accionesDispositivo.php';
  $resultado = leerDatos();
  $usuarios = getUsuarios();
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
    <title>Dispositivos</title>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid bg-light">
      <div class="row">
        <div class="col-md-10">
          <div class="container">
            <h1> <span>Automatic Home - Dispositivos</span> </h1>
            <p class="lead">Administra tus dispositivos.</p>
          </div>
        </div>
        <div class="col-md-2 col-sm-2">
          <img class="" src="../img/automatichome.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
        </div>
      </div>
    </div>
  
  <!-- Empieza Navbar -->
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
            <a class="nav-link" href="usuarios.php">Usuarios<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Dispositivos</a>
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

    <!-- Modal para agregar nuevo dispositivo -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="modalAgregarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAgregarLabel">Agregar nuevo dispositivo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form name="formulario" id="formu" action="../controlador/accionesDispositivo.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" hidden="true" name="accion" readonly id="agregar" value="agregar">
              </div>
              <!-- <div class="form-group">
                <label for="admin">Sesión Actual:</label>
                <input type="text" class="form-control" name="admin" readonly id="admin" value="<?php //echo $varSession; ?>">
              </div> -->
              <div class="form-group">
                <label for="usuario_id">Propietario:</label>
                <select class="custom-select" name="usuario_id" id="usuario_id" >
                  <option selected>Elije un usuario</option>
                  <?php 
                    while ($datoU = $usuarios->fetch()) {
                      echo "<option value='".$datoU['usuario_id']."'>".$datoU['username']."</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="form-group" id="inmu">
                <!-- <label for="inmueble_id">Inmueble:</label>
                <select class="custom-select" name="inmueble_id" id="inmueble_id">
                  <option selected>Elije un inmueble para el dispositivo</option>
                  <?php 
                    // while ($datos = $inmuebles->fetch()) {
                    //   echo "<option value='".$datos['inmueble_id']."'>".$datos['calle_numero']."</option>";
                    // }
                  ?>
                </select> -->
              </div>
              <div class="form-group">
                <label for="clave_dispositivo">Clave del dispositivo:</label>
                <input type="text" class="form-control" name="clave_dispositivo" id="clave_dispositivo" required="true" placeholder="Ingresa la clave del dispositivo" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" required="true" placeholder="Ingresa una breve descripción del dispositivo" autocomplete="off">
              </div>
              <div class="modal-footer">
                <button type="button" id="btnCerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina modal para agregar dispositivo -->


    <!-- Modal para editar dispositivo -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditarLabel">Editar dispositivo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form name="formulario" id="formuE" action="../controlador/accionesDispositivo.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" hidden="true" name="accion" readonly id="actualizar" value="actualizar">
              </div>
              <!-- <div class="form-group">
                <label for="admin">Sesión Actual:</label>
                <input type="text" class="form-control" name="admin" readonly id="admin" value="<?php //echo $varSession; ?>">
              </div> -->
              <div class="form-group">
                <input type="text" class="form-control" name="dispositivo_idE" id="dispositivo_idE" readonly>
                <label for="usuario_idE">Propietario:</label>
                <input type="text" class="form-control" name="usuario_idE" id="usuario_idE" readonly>
              </div>
              <div class="form-group">
                <label for="inmueble_idE">Inmueble:</label>
                <input type="text" class="form-control" name="inmueble_idE" id="inmueble_idE" readonly>
              </div>
              <div class="form-group">
                <label for="clave_dispositivoE">Clave del dispositivo:</label>
                <input type="text" class="form-control" name="clave_dispositivoE" id="clave_dispositivoE" required="true" placeholder="Ingresa la clave del dispositivo" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="descripcionE">Descripción:</label>
                <input type="text" class="form-control" name="descripcionE" id="descripcionE" required="true" placeholder="Ingresa una breve descripción del dispositivo" autocomplete="off">
              </div>
              <div class="modal-footer">
                <button type="button" id="btnCerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-success">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina modal para editar dispositivo -->

    <!-- Modal para eliminar un dispositivo -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEliminar" aria-labelledby="modalEliminarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEliminarLabel">Eliminar inmueble</h5>
          </div>
          <div class="modal-body">
            <h6>¿Desea eliminar el registro?</h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger btn-ok">Eliminar</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina modal para eliminar un dispositivo -->

    <div class="container-fluid">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Propietario</th>
            <th scope="col">Inmueble</th>
            <th scope="col">Clave del dispositivo</th>
            <th scope="col">Descripción del dispositivo</th>
            <!-- <th scope="col">Acciones </th> -->
            <th scope="col"> <button class='btn btn-success' onclick='limpiarModalAgregar("dispositivo");' data-toggle="modal" data-target="#modalAgregar">Agregar Nuevo</button></th>
          </tr>
        </thead>
        <tbody>
          <?php

            while($datos = $resultado->fetch()) {
              echo "<tr>";
                  // $usuario_id = $datos['usuario_id'];
                  echo "<td>".$datos['username']."</td>";
                  echo "<td>".$datos['calle_numero']."</td>";
                  echo "<td>".$datos['clave_dispositivo']."</td>";
                  echo "<td>".$datos['descripcion']."</td>";

                  $datosEditar = [$datos['dispositivo_id'], $datos['username'], $datos['calle_numero'], $datos['clave_dispositivo'], $datos['descripcion'] ];
                  // echo $datosEditar."<br>";
                  $datosEditar = json_encode($datosEditar);
                  echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#modalEditar' onclick='rellenaFormDispositivo($datosEditar);'>Editar</button>";
                  echo "<a href='#' class='btn btn-danger' data-href='../controlador/accionesDispositivo.php?accion=eliminar&dispositivo_id=".$datos['dispositivo_id']."' data-toggle='modal' data-target='#modalEliminar'>Eliminar</a>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
    </div>

  

  <!-- Sección de scripts -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="../js/jquery-3.2.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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

    <script>

      $('#usuario_id').change(function(){
        var valor = $('#usuario_id').val();
        $.ajax({
          type : 'POST',
          url : '../controlador/accionesDispositivo.php',
          data : {'valor' : valor},
          success : function(r){
            $('#inmu').html(r);
            console.log("resultado: "+r);
          },
          error : function(xhr, status){
            console.log("Hubo un error");
          }
        });
      });
    </script>

    <script type="text/javascript" src="../js/acciones.js"></script>
    <script src="../js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
