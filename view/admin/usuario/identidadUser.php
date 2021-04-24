<?php 
  session_start();
  if(isset($_SESSION['id_user'])){
    if($_SESSION['id_user'] == 1 and $_SESSION['type'] == 2){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../../asset/img/64x64.png" />
  <title>CriptoPremier</title>

  <!-- Bootstrap core CSS -->
  <link href="../../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../asset/css/style_login.css" rel="stylesheet">
  <link href="../../asset/css/admin.css" rel="stylesheet">

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
        <img src="../../asset/img/logo.png" alt="" class="logo">
      </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action" id="navUsuario" onclick="navUsuario()" value="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
            Usuario
        </a>
        <div class="submenu submenu-personal" style="">
          <ul>
            <li>
              <a href="cuentasBancarias.php" id="cuentasBancarias">Cuentas bancarias</a>
            </li>
            <li>
              <a href="datosUser.php" id="datosUser">Datos de usuario</a>
            </li>
            <li>
            <b><a href="#" id="identidadUser">Identidad de usuario</a></b>
            </li>
            <li>
              <a href="walletUser.php" id="walletUser">Wallet de usuario</a>
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
              <a href="../operaciones/transPendientes.php" id="transPendientes">Transacciones pendientes</a>
            </li>
            <!--<li>
              <a href="#" id="" onclick="">Agregar criptomoneda</a>
            </li>-->
            <li>
              <a href="../operaciones/aggBanco.php" id="aggBanco">Agregar banco</a>
            </li>
          </ul>
        </div>
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

      <!--VISTA-->
     
    <section id="identidad">
        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
            <div class="col-lg-10 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-between">
                            <h5>identidad de usuario</h5>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <form id="search_user_uc">
                                    <div class="row justify-content-around">
                                        <div class="buscador col-11 mt-2 mb-2">
                                            
                                            <!--<button>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                            </button>-->
                                            <input type="submit" value="Buscar" />
                                            <input type="text" id="dni_search_uc" placeholder="Buscar usuario por DNI"/> 
                                        </div>
                                    </div>

                                    <div class="row justify-content-around">
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>Nombre</b></label>
                                            <input type="text" class="form-control form-login" id="name_uc" disabled=»disabled» />
                                        </div>
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>Segundo nombre</b></label>
                                            
                                            <input type="text" class="form-control form-login" id="middle_name_uc" disabled=»disabled» />
                                        </div>
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>Apellido</b></label>
                                            
                                            <input type="text" class="form-control form-login" id="last_name_uc" disabled=»disabled» />
                                        </div>
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>Segundo apellido</b></label>
                                            <input type="text" class="form-control form-login" id="second_last_name_uc" disabled=»disabled» />
                                        </div>
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>DNI</b></label>
                                            <input type="text" class="form-control form-login" id="DNI_uc" disabled=»disabled» />
                                        </div>
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>CUIL</b></label>
                                            <input type="text" class="form-control form-login" id="CUIL_uc" disabled=»disabled» />
                                        </div>
                                        <div class=" col-11 mt-2">
                                            <label><b>Email</b></label>
                                            <input type="text" class="form-control form-login" id="email_uc" disabled=»disabled» />
                                        </div>
                                    </div>

                                </form>

                                <div class="row justify-content-around">
                                    <div class=" col-11 mt-2 fotoPerfil">
                                        <label><b>Foto de perfil</b></label>
                                        <br>
                                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                    </div>
                                </div> 

                                <div class="row justify-content-around">
                                    <div class="col-11 mt-2">
                                        <form id="confirm_user">
                                            <input type="submit" value="Confirmar" class="btn-get-started-confirmar btn"/>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
                
                </div>
                </div>
                
            </div>

            </div>
            </div>

            
        </div>

    </section>
      <!--FIN DE VISTA-->

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../../asset/jquery/jquery.min.js"></script>
  <script src="../../asset/js/bootstrap/bootstrap.js"></script>
  <script src="../../asset/js/bootstrap/bootstrap.bundle.min.js"></script>
  <!--Controllers-->
  <script src="..\..\..\controller\admin\account_controller_admin.js" type="module" ></script>
  <script src="..\..\..\controller\admin\user_info_controller_admin.js" type="module" ></script>
  <script src="..\..\..\controller\admin\new_wallet_controller_admin.js" type="module" ></script>
  <script src="..\..\..\controller\admin\transactions_controller_admin.js" type="module" ></script>
  <script src="..\..\..\controller\admin\new_bank_admin_controller.js" type="module" ></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

  <script src="..\..\controller\admin\user_check_controller_admin.js" type="module" ></script>
  <!-- Menu Toggle Script -->
  <script>
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
    });

    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $( document ).ready(function() {
      $("#navUsuario").addClass("activo")
      $(".submenu-personal").css("display", "block")
    });


    function navUsuario(){
      $("#navUsuario").addClass("activo")

      $(".submenu-operaciones").css("display", "none")
      $(".submenu-personal").css("display", "block")

      if($("#navOperaciones").hasClass("activo")){
        $("#navOperaciones").removeClass("activo");
      }
    }

    function navOperaciones(){
      $("#navOperaciones").addClass("activo")

      $(".submenu-operaciones").css("display", "block")
      $(".submenu-personal").css("display", "none")

      if($("#navUsuario").hasClass("activo")){
        $("#navUsuario").removeClass("activo");
      }

    }
    

  </script>

</body>

</html>
<?php
  }
}
echo "No posee permisos para este sitio";
  ?>









