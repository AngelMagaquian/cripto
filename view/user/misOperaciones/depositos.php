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
  <link rel="shortcut icon" href="../../asset/img/64x64.png" />
  <title>CriptoPremier</title>

  <!-- Bootstrap core CSS -->
  <link href="../../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- datatable -->
  <link href="../../asset/css/datatable/bootstrap.css" rel="stylesheet">
  <link href="../../asset/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="../../asset/css/perfil.css" rel="stylesheet">

  
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
        <a href="#" class="list-group-item list-group-item-action" id="navPerfil" onclick="navPerfil()" value="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
            Perfil
        </a>
        <div class="submenu submenu-personal" style="">
          <ul>
            <li >
              <a href="../perfil/datosPersonales.php" id="datosPersonales">Datos personales</a>
            </li>
            <li>
            <a href="../perfil/datosBancarios.php" id="datosBancarios">Datos bancarios</a>
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
              <a href="../operaciones/venta.php" id="ventaOpera">Venta</a>
            </li>
            <li>
                <a href="../operaciones/depositos.php" id="compraOpera">Depositos</a>
            </li>
          </ul>
        </div>

        <a href="#" class="list-group-item list-group-item-action" id="navMisOp" onclick="clickMisOp()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
            </svg>
            Mis operaciones
        </a>
        <div class="submenu submenu-misOp">
          <ul>
            <li>
              <b><a href="#" id="" >Depositos</a></b>
            </li>
            <li>
              <a href="transacciones.php" id="">Transacciones</a>
            </li>
          </ul>
        </div>

        <a href="../wallet/wallet.php" class="list-group-item list-group-item-action" onclick="clickWallet()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
              <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
            </svg>
            Wallet
        </a>
        <a href="../../home/ayuda.php" class="list-group-item list-group-item-action">
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

      <!--VISTA-->
      
      <section id="deposito">
<!--CAMBIARLE DISPLAY:BLOCK-->
    
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-11">   
                <div class="row">
                    <h5>Transacciones</h5>
                </div>
                <div class="card">
                    <div class="card-body mt-3 ">
                        <div class="row mt-4">
                        <table id="operacionesTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id deposito</th>
                                    <th>CBU</th>
                                    <th>Banco</th>
                                    <th>Fecha</th>
                                    <th>Pesos</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody id="deposit_tbody">
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
</section>
      <!--FIN VISTA-->
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../../asset/jquery/jquery.min.js"></script>
  <script src="../../asset/js/bootstrap/popper.min.js"></script>
  <script src="../../asset/js/bootstrap/bootstrap.min.js"></script>

  <!-- DataTable -->
  <script src="../../asset/datatable/jquery.dataTables.min.js"></script>
   <script src="../../asset/datatable/dataTables.bootstrap4.min.js"></script>

  <!--Controllers-->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script> <!--no eliminar-->
  <script src="..\..\..\controller\operation\deposit_controller.js" type="module" ></script> <!--no eliminar-->

  

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $( document ).ready(function() {
      $("#navMisOp").addClass("activo")
      $(".submenu-misOp").css("display", "block")

      $('#operacionesTable').DataTable({ 
        responsive: true,
        paging: false,
        searching: true,
        language: {
            lengthMenu: "Agrupar de MENU ",
            search: " ",
            searchPlaceholder: " Buscar",
            info: "",
            infoEmpty: " ",
            infoFiltered: " ",
            infoPostFix: "",
            loadingRecords: " ",
            zeroRecords: "No se encontraron datos con tu busqueda",
            emptyTable: "No hay datos disponibles en la tabla.",
            paginate: {
                first: "Primero",
                previous: "Ant",
                next: "Sig",
                last: "Ultimo"
            },
            aria: {
                sortAscending: ": active para ordenar la columna en orden ascendente",
                sortDescending: ": active para ordenar la columna en orden descendente"
            },
            pageLength: 7,
            bLengthChange: false,
            ordering: false,
            select: true,
            colReorder: true
        },
        scrollY: 200,
        scrollX: true
      });
    });

    function navPerfil(){
      $("#navPerfil").addClass("activo")

      $(".submenu-misOp").css("display", "none")
      $(".submenu-operaciones").css("display", "none")
      $(".submenu-personal").css("display", "block")

      if($("#navOperaciones").hasClass("activo")){
        $("#navOperaciones").removeClass("activo");
      }
      if($("#navMisOp").hasClass("activo")){
        $("#navMisOp").removeClass("activo");
      }
    }

    function navOperaciones(){
      $("#navOperaciones").addClass("activo")

      $(".submenu-misOp").css("display", "none")
      $(".submenu-operaciones").css("display", "block")
      $(".submenu-personal").css("display", "none")
      
      if($("#navPerfil").hasClass("activo")){
        $("#navPerfil").removeClass("activo");
      }
      if($("#navMisOp").hasClass("activo")){
        $("#navMisOp").removeClass("activo");
      }
    }

    function clickMisOp(){
      $("#navMisOp").addClass("activo")

      $(".submenu-misOp").css("display", "block")
      $(".submenu-operaciones").css("display", "none")
      $(".submenu-personal").css("display", "none")

      if($("#navOperaciones").hasClass("activo")){
        $("#navOperaciones").removeClass("activo");
      }
      
      if($("#navPerfil").hasClass("activo")){
        $("#navPerfil").removeClass("activo");
      }
    }

  </script>

</body>

</html>

<?php 
}else{
  echo "no estas registrado";
}
?>


