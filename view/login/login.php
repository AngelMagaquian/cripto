<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../asset/img/64x64.png" />
  <title>CriptoPremier | Iniciar sesión </title> 

    <!-- Bootstrap core CSS -->
    <link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">

	<link href="../asset/css/style_login.css" rel="stylesheet">
  <!--fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!--alertify-->
  <link rel="stylesheet" type="text/css" href="../../libraries/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../../libraries/alertifyjs/css/themes/default.css">

</head>
<body>
  <section id="login">
      <div class="container">
          <div class="row justify-content-center  align-items-center" style="height: 100vh;">
          <div class="col-lg-4 col-md-6 col-sm-8 col-11  mt-4 mb-4">
            <div class="card ">
              <div class="card-body mt-4 mb-4">
                <div class="text-top">
                  <h5 class="card-title text-center mb-3">¡HOLA!</h5>
                  <p class="card-text text-center">Si te registraste, ingresá tus datos</p>
                </div>

                <div class="row justify-content-center mt-5">
                  <form class="col-10 align-self-center" style="" id="user_input">
                    <div class="form-group">
                      <label for="exampleInputEmail1"><b>Usuario</b></label>
                      <input type="text" class="form-control form-login" id="user" placeholder="ingresá tu usuario" required> <!--posiblemente cambiemos el placeholder para que sea mas descriptivo de mail para ingresar-->
                    </div>
                    <div class="form-group mt-4">
                      <label for="exampleInputPassword1"><b>Contraseña</b></label>
                      <input type="password" class="form-control form-login" id="pass" placeholder="Ingresá tu contraseña" autocomplete="false" required>
                    </div>
                    <div>
                      <a class="change-pass">¿Olvidaste tu contraseña?</a> <!--Falta crear el formulario para restablecer contraseña deberia colocar su mail y dsp ir al mismo para ingresar a otro link y restablecer-->
                    </div>
                    <div class="text-center mt-4">
                      <button type="submit" class="btn-login btn-get-started" >Iniciar sesión</button>
                    </div>
                  
                
                    <div class="text-center mt-5">
                      <p class="text-registro">¿Todavía no tenés cuenta?</p>
                      <a type="submit" class="btn-registrarse btn-get-started" href="registro.php">Registrarse</a>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>

          </div>
          
          <!-- Modal ficha de usuario -->
          <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header" style="border-bottom: none">
                <h5></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;background: transparent;">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <p>Ups!</p>
                <span>tu usuario y/o contraseña no son correctas</span>
                </div>
                    
              </div>                           
            </div>
          </div>

      </div>
  </section>

</body>

  <script src="../asset/jquery/jquery.min.js"></script>
  <script src="../asset/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="..\..\controller\login\login_controller.js" type="module" ></script>

  <!--alertify-->
<script src="../../libraries/alertifyjs/alertify.js"></script>
</html>