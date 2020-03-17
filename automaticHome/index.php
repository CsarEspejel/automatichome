<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilosLogin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Iniciar Sesión</title>
  </head>
  <body>

    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-form-title" style="background-image: url('img/iot.jpg');">
            <span class="login100-form-title-1">Iniciar Sesión</span>
          </div>
          <form class="login100-form validate-form" method="post" action="controlador/sesiones.php">
            <input type="text" name="accion" hidden="true" value="iniciarSesion">
  					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
  						<span class="label-input100 ">Usuario</span>
  						<input class="input100 " type="text" name="username" autocomplete="off" required placeholder="Ingresar usuario">
  						<span class="focus-input100"></span>
  					</div>

  					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
  						<span class="label-input100">Contraseña</span>
  						<input class="input100" type="password" name="pass"required placeholder="Ingresar contraseña">
  						<span class="focus-input100"></span>
  					</div>

  					<div class="flex-sb-m w-full p-b-30">
  						<div class="contact100-form-checkbox">
  							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
  							<label class="label-checkbox100" for="ckb1">
  								Recordarme
  							</label>
  						</div>

  						<div>
  							<a href="#" class="txt1">
  								Olvidaste tu contraseña?
  							</a>
  						</div>
  					</div>

  					<div class="container-login100-form-btn">
  						<button class="login100-form-btn">
  							Entrar
  						</button>
              <button class="login100-form-btn btn-primary">
  							 Registrarse
  						</button>
  					</div>
  				</form>
        </div>
      </div>
    </div>

    <script src="js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
