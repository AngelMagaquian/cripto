<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>LOGIN</title>
    <!-- Bootstrap core CSS -->
    <link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">

	<link href="../asset/css/style_login.css" rel="stylesheet">
</head>
<body>
<section id="login">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8 col-11  mt-5">
          <div class="card ">
            <div class="card-body mt-4 mb-4">
              <div class="text-top">
                <h5 class="card-title text-center mb-3">¡HOLA!</h5>
                <p class="card-text text-center">Si te registraste, ingresá tus datos</p>
              </div>

              <div class="row justify-content-center mt-5">
                <form class="col-10 align-self-center" style="">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><b>Usuario</b></label>
                    <input type="text" class="form-control form-login" id="dni" placeholder="ingresá tu usuario">
                  </div>
                  <div class="form-group mt-4">
                    <label for="exampleInputPassword1"><b>Contraseña</b></label>
                    <input type="password" class="form-control form-login" id="pass" placeholder="Ingresá tu contraseña">
                  </div>
                  <div>
                    <a class="change-pass">¿Olvidaste tu contraseña?</a>
                  </div>
                  <div class="text-center mt-4">
                     <button type="submit" class="btn-login btn-get-started" id="user_input">Iniciar sesión</button>
                  </div>
                 
                </form>
                <div class="text-center mt-5">
                  <p class="text-registro">¿Todavía no tenés cuenta?</p>
                  <button type="submit" class="btn-registrarse btn-get-started">Registrarse</button>
                </div>
              </div>
              
            </div>
          </div>

        </div>
        
        </div>
    </div>

</section>

</body>

  <script src="../asset/jquery/jquery.min.js"></script>
  <script src="../asset/js/bootstrap/bootstrap.bundle.min.js"></script>

</html>