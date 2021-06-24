<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../asset/img/64x64.png" />
  <title>CriptoPremier | Registrarse </title> 
    <!-- Bootstrap core CSS -->
    <link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">

	<link href="../asset/css/style_login.css" rel="stylesheet">
    <!--fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
<section id="login">
    <div class="container">
        <div class="row justify-content-center  align-items-center" style="height: 100vh;">
        <div class="col-lg-8 col-md-6 col-sm-8 col-11  mt-4 mb-4">
          <div class="card ">
            <div class="card-body mt-4 mb-4">
              <div class="text-top">
                <h5 class="card-title text-center mb-3">¡HOLA!</h5>
                <p class="card-text text-center">Si no estas registrado, ingresá tus datos para empezar a operar</p>
              </div>

              <div class="row justify-content-center mt-5">
                
                    <form class="col-10 align-self-center" style="" id="input_user">
                    
                        <p class="change-pass">*campos obligatorio</p>
                        <div class="row">
                        
                            <div class="form-group col-md-6 col-12 mt-md-0 mt-4">
                                <label for="exampleInputEmail1" ><b>Nombre*</b></label>
                                <input type="text" class="form-control form-login" id="name_user" placeholder="ingresá tu nombre" required>
                            </div>
                            <div class="form-group col-md-6 col-12 mt-md-0 mt-4">
                                <label for="exampleInputEmail1"><b>Segundo nombre</b></label>
                                <input type="text" class="form-control form-login" id="middle_name" placeholder="ingresá tu segundo nombre" >
                            </div>

                            <div class="form-group col-md-6 col-12  mt-4">
                                <label for="exampleInputEmail1"><b>Apellido*</b></label>
                                <input type="text" class="form-control form-login" id="last_name" placeholder="ingresá tu apellido" required>
                            </div>
                            <div class="form-group col-md-6 col-12  mt-4">
                                <label for="exampleInputEmail1"><b>Segundo apellido</b></label>
                                <input type="text" class="form-control form-login" id="second_last_name" placeholder="ingresá tu segundo apellido">
                            </div>

                            <div class="form-group col-md-6 col-12  mt-4">
                                <label for="exampleInputEmail1"><b>DNI*</b></label>
                                <input type="text" class="form-control form-login" id="dni" placeholder="ingresá tu DNI" required>
                            </div>
                            <div class="form-group col-md-6 col-12 mt-4">
                                <label for="exampleInputEmail1"><b>CUIL*</b></label>
                                <input type="text" class="form-control form-login" id="cuil" placeholder="ingresá tu CUIL" required>
                            </div>
                            
                            <div class="form-group col-md-6 col-12  mt-4">
                                <label for="exampleInputEmail1"><b>Fecha de nacimiento*</b></label>
                                <input type="date" class="form-control form-login" id="birth_day" placeholder="ingresá tu fecha de nacimiento" required>
                            </div>
                            <div class="form-group col-md-6 col-12  mt-4">
                                <label for="exampleInputEmail1"><b>Email*</b></label>
                                <input type="email" class="form-control form-login" id="email" placeholder="ingresá tu email" required>
                            </div>

                            <div class="form-group col-md-6 col-12  mt-4 ">
                                <label for="exampleInputPassword1"><b>Contraseña*</b></label>
                                <input type="password" class="form-control form-login" id="first_pass" placeholder="Ingresá una contraseña" required>
                            </div>
                            <div class="form-group col-md-6 col-12  mt-4 ">
                                <label for="exampleInputPassword1"><b>Repetir contraseña*</b></label>
                                <input type="password" class="form-control form-login" id="pass" placeholder="Ingresá tu contraseña nuevamente" required>
                                <label for="exampleInputPassword1" id="comfirm_pass"><b></b></label>
                            </div>
                            <div class="form-group col-md-6 col-12  mt-4 ">
                                <label for="exampleInputPassword1"><b>Teléfono*</b></label>
                                <input type="number" class="form-control form-login" id="phone" placeholder="Ingresá tu numero de telefono" required>
                                <label class="form-check-label" for="phone">Por ejemplo, 3511111111 </label>
                            </div>
                            <div class="form-group form-check col-md-6 col-12 mt-4 ">
                                <input type="checkbox" class="form-check-input" id="pep">
                                <label class="form-check-label" for="exampleCheck1">Declaro no ser una <b>Persona Expuesta Políticamente</b></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-4 text-center"> 
                                <button type="submit" class="btn-registrarse btn-get-started">Registrarse</button>
                            </div>
                        </div>
                </from>
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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous" ></script>
  <script src="..\..\controller\user\insert_user.js" type="module" ></script>

</html>