<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>LOGIN</title>
    <!-- Bootstrap core CSS -->
    <link href="./view/asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">

	<link href="./view/asset/css/style_login.css" rel="stylesheet">
</head>
<body>
<section id="login">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-5 mt-5">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">¡HOLA!</h5>
              <p class="card-text">Si te registraste, ingresá tus datos</p>

              <form>
                <div class="input-group mb-3">
                  <label>Email</label>
                  <input type="text" class="form-control">
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                  <input type="password" name="" class="form-control input_pass" value="" placeholder="password">
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                  </div>
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                  <button type="button" name="button" class="btn login_btn">Login</button>
                </div>
              </form>
            </div>
            <div class="card-footer text-muted">
              2 days ago
            </div>
          </div>

        </div>
        
        </div>
    </div>

</section>

</body>

  <script src="./view/asset/jquery/jquery.min.js"></script>
  <script src="./view/asset/js/bootstrap.bundle.min.js"></script>

</html>