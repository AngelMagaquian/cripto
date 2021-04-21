<?php 
  session_start();
  if(isset($_SESSION["id_user"])){

  
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../asset/img/64x64.png" />
  <title>CriptoPremier</title>

  <!-- Bootstrap core CSS -->
  <link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../asset/css/style_login.css" rel="stylesheet">
  <link href="../asset/css/perfil.css" rel="stylesheet">

  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  
  <!--fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">

      <div class="sidebar-heading">
        <img src="../asset/img/logo.png" alt="" class="logo">
      </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action" id="navPerfil" onclick="navPerfil()" value="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
            Perfil
        </a>
        <div class="submenu submenu-personal" style="">
          <ul>
            <li>
              <a href="#" id="datosPersonales" onclick="clickDatosPersonales()">Datos personales </a>
            </li>
            <li>
              <a href="#" id="datosBancarios" onclick="clickDatosBanco()">Datos bancarios</a>
            </li>
          </ul>
        </div>

        
        <a href="#" class="list-group-item list-group-item-action" id="navOperaciones" onclick="navOperaciones()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            Operaciones
        </a>
        <div class="submenu submenu-operaciones">
          <ul>
            <li>
              <a href="#" id="compraOpera" onclick="clickCompra()">Compra</a>
            </li>
            <li>
              <a href="#" id="ventaOpera" onclick="clickVenta()">Venta</a>
            </li>
          </ul>
        </div>

        <a href="#" class="list-group-item list-group-item-action" onclick="clickOperaciones()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
            </svg>
            Mis operaciones
        </a>
        <div class="submenu ">
          <ul>
            <li>
              <a href="#" id="" onclick="">Depositos</a>
            </li>
            <li>
              <a href="#" id="" onclick="">Transacciones</a>
            </li>
          </ul>
        </div>

        <a href="#" class="list-group-item list-group-item-action" onclick="clickWallet()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
              <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
            </svg>
            Wallet
        </a>
        <a href="../../ayuda.php" class="list-group-item list-group-item-action">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
            </svg>
            Ayuda
        </a>

        <button type="submit" class="btn-sesion btn-get-started-sesion btn-sm mt-5" >Cerrar sesión</button>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg border-bottom">
        <button class="btn" id="menu-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
        </button>
        <div style="position: absolute;right: 10px;">
            <span id="wallet_user"></span>
        </div>
        
      </nav>
<!-- /#aca va el contenedor -->
        <div id="perfil" style="">
            <div class="container-fluid">
                <div class="row justify-content-center mt-4">
                <div class="col-md-10 col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos personales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Contraseña</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#foto" type="button" role="tab" aria-controls="foto" aria-selected="false">Foto</button>
                    </li>
                </ul>

                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row m-0 justify-content-around mb-4">
                        <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1" ><b>Nombre*</b></label>
                        <input type="text" class="form-control form-login" id="name_user"  disabled=»disabled» >
                        </div>
                        <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>Segundo nombre</b></label>
                        <input type="text" class="form-control form-login" id="user_middle_name"  disabled=»disabled»>
                        </div>

                        <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>Apellido*</b></label>
                        <input type="text" class="form-control form-login" id="user_last_name"  disabled=»disabled»>
                        </div>
                        <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>Segundo apellido</b></label>
                        <input type="text" class="form-control form-login" id="user_second_last_name"  disabled=»disabled»>
                        </div>

                        <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>DNI*</b></label>
                        <input type="text" class="form-control form-login" id="user_dni" placeholder="ingresá tu DNI" disabled=»disabled»>
                        </div>
                        <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>CUIL*</b></label>
                        <input type="text" class="form-control form-login" id="user_cuil" placeholder="ingresá tu CUIL" disabled=»disabled»>
                        </div>
                                
                        <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>Fecha de nacimiento*</b></label>
                        <input type="date" class="form-control form-login" id="user_birth_day" placeholder="ingresá tu fecha de nacimiento" disabled=»disabled»>
                        </div>
                        <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>Email*</b></label>
                        <input type="email" class="form-control form-login" id="user_email" placeholder="ingresá tu email" disabled=»disabled»>
                        </div>
                    </div>
                    </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row m-0 justify-content-around">
                    <form id="update_pass">
                        <div class="m-0 row justify-content-around">
                            <div class="form-group col-md-5 col-12 mt-4 ">
                            <label for="exampleInputPassword1"><b>Nueva contraseña*</b></label>
                            <input type="password" class="form-control form-login" id="first_pass" placeholder="Ingresá una contraseña" required autocomplete="off">
                            
                            </div>
                            <div class="form-group col-md-5 col-12 mt-4 ">
                            <label for="exampleInputPassword1"><b>Repetir contraseña*</b></label>
                            <input type="password" class="form-control form-login" id="pass" placeholder="Ingresá tu contraseña nuevamente" required autocomplete="off">
                            <label for="exampleInputPassword1" id="comfirm_pass"><b></b></label>
                            </div>

                            <div class="col-11 botonera">
                            <input type="submit" value="Cambiar" id="input_update_pass" class="btn-get-started-pass btn-pass float-right">
                            </div>
                            
                        </div>
                    </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="foto" role="tabpanel" aria-labelledby="foto-tab">
                    <div class="row m-0 justify-content-around">
                            <div class="col-11 botonera" >
                            <form id="from_photo" enctype="multipart/form-data">
                                <label style="font-size: 14px; color: #274070;"><b>Foto de usuario</b></label>
                                <br>
                                <input type="file" name="myfile"/>
                                <br>
                                <input type="submit" value="Cargar"  class="btn-get-started-pass btn-pass float-right">
                                <br>
                                <figure>

                                </figure>
                            </form>
                            </div>
                        
                    </div>      
                </div>


                </div>
                
                
                </div>
            </div>
        </div>

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../asset/jquery/jquery.min.js"></script>
  <script src="../asset/js/bootstrap/bootstrap.js"></script>
  <script src="../asset/js/bootstrap/bootstrap.min.js"></script>
  <script src="../asset/js/bootstrap/bootstrap.bundle.min.js"></script>
  <!--Controllers-->
  <script src="..\..\controller\user\controller_user.js" type="module" ></script>
  <script src="..\..\controller\user\update_user_info_controller.js" type="module" ></script>
  <script src="..\..\controller\datos_bancarios\bank_controller.js" type="module" ></script>
  <script src="..\..\controller\user\wallet_user_controller.js" type="module" ></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>


    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });


    function navPerfil(){
      console.log("estoy")
      $(".submenu-personal").addClass( "submenuBlock" );
      $("#navPerfil").addClass("activo")

      if($("#navOperaciones").hasClass("activo")){
        $("#navOperaciones").removeClass("activo");
        $(".submenu-operaciones").removeClass( "submenuBlock" );
      }

      $("#datosPersonales").css("font-weight", "normal")
      $("#datosBancarios").css("font-weight", "normal")
      $("#compraOpera").css("font-weight", "normal")
      $("#ventaOpera").css("font-weight", "normal")
    }



    function clickDatosPersonales(){
      $("#perfil").css("display","block")
      $("#bancos").css("display","none")
      $("#compra").css("display","none")
      $("#venta").css("display","none")
      $("#misOperaciones").css("display","none")
      $("#wallet").css("display","none")

      $("#datosPersonales").css("font-weight", "bold")
      $("#datosBancarios").css("font-weight", "normal")
      $("#compraOpera").css("font-weight", "normal")
      $("#ventaOpera").css("font-weight", "normal")
    }





  </script>

</body>

</html>

<?php 
}else{
  echo "no estas registrado";
}

?>