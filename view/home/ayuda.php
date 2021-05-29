<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../asset/img/64x64.png"/>
  <title>CriptoPremier | Ayuda</title>

  <!-- Bootstrap core CSS -->
  <link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="../asset/css/style.css" rel="stylesheet">
  <link href="../asset/css/ayuda.css" rel="stylesheet">

  <!--fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <a class="navbar-brand p-0" href="../../index.php"><img src="../asset/img/logo_home.png" alt="" class="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#031D5A" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
          </svg>
        </span>
      </button>
      <div class="collapse navbar-collapse row" id="navbarTogglerDemo02">
      
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="compra.php">Compra</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="venta.php">Venta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Ayuda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nosotros.php">Nosotros</a>
          </li>

        </ul>

      </div>
    </div>
  </nav>
</header>
<!--Hero -->
<section id="hero-help">
    <div class="container">
      <div class="row" style="min-height: 445px">
        

        <div class="col-md-6 pt-lg-0 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1 class="mb-0">Te ayudamos en lo que necesites.</h1>
            <div class="text-animate">
              <ul>
                <li>Registrate</li>
                <li>Comprá</li>
                <li>Vendé</li>
              </ul>     
            </div>

              
          </div>
          <br>
        </div>

        <div class="col-md-6 d-md-block d-none container-img m-auto">
          <img src="../asset/img/img-home.png" alt="" style="width:100%">
        </div>
        
      </div>
    </div>

    <svg class="hero-waves-help" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1-help">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2-help">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3-help">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

</section><!-- End Hero -->

<!--ayuda-->
<section id="ayuda">
<div class="container">
    <div class="row justify-content-center">

        <div class="col-8 card-registro pt-5 pb-5">
            <h5 class="text-card mb-4"><b>¿Cómo registrarse?</b></h5>
            <div class="row justify-content-center">
                <div class="col-11">
                <iframe width="100%" height="450px" src="https://www.youtube.com/embed/G5HDviL2DSg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="col-8 card-comprar pt-5 pb-5">
            <h5 class="text-card mb-4"><b>¿Cómo comprar?</b></h5>
            <div class="row justify-content-center">
                <div class="col-11">
                <iframe width="100%" height="450px" src="https://www.youtube.com/embed/G5HDviL2DSg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="col-8 card-vender pt-5 pb-5">
            <h5 class="text-card mb-4"><b>¿Cómo vender?</b></h5>
            <div class="row justify-content-center">
                <div class="col-11">
                <iframe width="100%" height="450px" src="https://www.youtube.com/embed/G5HDviL2DSg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>


    </div>
</div>
</section>

<!--incluir php-->
<?php
include '../footer/footer.php';
?>

</body>

  <script src="../asset/jquery/jquery.min.js"></script>
  <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>

</html>