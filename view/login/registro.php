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
        <div class="col-lg-8 col-md-6 col-sm-8 col-11  mt-5">
          <div class="card ">
            <div class="card-body mt-4 mb-4">
              <div class="text-top">
                <h5 class="card-title text-center mb-3">¡HOLA!</h5>
                <p class="card-text text-center">Si no estas registrado, ingresá tus datos para empezar a operar</p>
              </div>

              <div class="row justify-content-center mt-5">
                <form class="col-10 align-self-center" style="">
                <p class="change-pass">*campos obligatorio</p>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1"><b>Nombre*</b></label>
                        <input type="text" class="form-control form-login" id="dni" placeholder="ingresá tu nombre">
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1"><b>Segundo nombre</b></label>
                        <input type="text" class="form-control form-login" id="dni" placeholder="ingresá tu segundo nombre">
                    </div>

                    <div class="form-group col-6 mt-4">
                        <label for="exampleInputEmail1"><b>Apellido*</b></label>
                        <input type="text" class="form-control form-login" id="dni" placeholder="ingresá tu apellido">
                    </div>
                    <div class="form-group col-6 mt-4">
                        <label for="exampleInputEmail1"><b>Segundo apellido</b></label>
                        <input type="text" class="form-control form-login" id="dni" placeholder="ingresá tu segundo apellido">
                    </div>

                    <div class="form-group col-6 mt-4">
                        <label for="exampleInputEmail1"><b>DNI*</b></label>
                        <input type="text" class="form-control form-login" id="dni" placeholder="ingresá tu DNI">
                    </div>
                    <div class="form-group col-6 mt-4">
                        <label for="exampleInputEmail1"><b>CUIL*</b></label>
                        <input type="text" class="form-control form-login" id="dni" placeholder="ingresá tu CUIL">
                    </div>
                    
                    <div class="form-group col-6 mt-4">
                        <label for="exampleInputEmail1"><b>Fecha de nacimiento*</b></label>
                        <input type="date" class="form-control form-login" id="dni" placeholder="ingresá tu fecha de nacimiento">
                    </div>
                    <div class="form-group col-6 mt-4">
                        <label for="exampleInputEmail1"><b>Email*</b></label>
                        <input type="email" class="form-control form-login" id="dni" placeholder="ingresá tu email">
                    </div>

                    <div class="form-group col-6 mt-4 ">
                        <label for="exampleInputPassword1"><b>Contraseña*</b></label>
                        <input type="password" class="form-control form-login" id="pass" placeholder="Ingresá una contraseña">
                    </div>
                    <div class="form-group col-6 mt-4 ">
                        <label for="exampleInputPassword1"><b>Repetir contraseña*</b></label>
                        <input type="password" class="form-control form-login" id="pass" placeholder="Ingresá tu contraseña nuevamente">
                    </div>
                </div>
                </form>

                <div class="col-10 mt-5">
                    
                    <div class="text-center">
                        <button type="submit" class="btn-login btn-get-started">Registrarse</button>
                    </div>
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