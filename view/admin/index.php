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
  <link href="../asset/css/admin.css" rel="stylesheet">

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
        <a href="#" class="list-group-item list-group-item-action" id="navUsuario" onclick="navUsuario()" value="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
            Usuario
        </a>
        <div class="submenu submenu-personal" style="">
          <ul>
            <li>
              <a href="#" id="cuentasBancarias" onclick="clickCuentasBancarias()">Cuentas bancarias</a>
            </li>
            <li>
              <a href="#" id="datosUser" onclick="clickDatosUser()">Datos de usuario</a>
            </li>
            <li>
              <a href="#" id="identidadUser" onclick="clickIdentidadUser()">Identidad de usuario</a>
            </li>
            <li>
              <a href="#" id="walletUser" onclick="clickWalletUser()">Wallet de usuario</a>
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
              <a href="#" id="transPendientes" onclick="clickTransPendientes()">Transacciones pendientes</a>
            </li>
            <!--<li>
              <a href="#" id="" onclick="">Agregar criptomoneda</a>
            </li>-->
            <li>
              <a href="#" id="aggBanco" onclick="clickaggBanco()">Agregar banco</a>
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

      <div class="herramienta">
        <?php
          include '../admin/cuentasBancarias.php';
          include '../admin/datosUser.php';
          include '../admin/identidadUser.php';
        ?>
        <?php
          include '../admin/walletUser.php';
          include '../admin/transPendientes.php';
          include '../admin/aggBanco.php';
        ?>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../asset/jquery/jquery.min.js"></script>
  <script src="../asset/js/bootstrap/bootstrap.js"></script>
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


    function navUsuario(){
      console.log("estoy")
      $(".submenu-personal").addClass( "submenuBlock" );
      $("#navUsuario").addClass("activo")

      if($("#navOperaciones").hasClass("activo")){
        $("#navOperaciones").removeClass("activo");
        $(".submenu-operaciones").removeClass( "submenuBlock" );
      }

      $("#cuentasBancarias").css("font-weight", "normal")
      $("#datosBancarios").css("font-weight", "normal")
      $("#transPendientes").css("font-weight", "normal")
    }

    function navOperaciones(){
      console.log("estoy")
      $(".submenu-operaciones").addClass( "submenuBlock" );
      $("#navOperaciones").addClass("activo")

      if($("#navUsuario").hasClass("activo")){
        $("#navUsuario").removeClass("activo");
        $(".submenu-personal").removeClass( "submenuBlock" );
      }


      $("#cuentasBancarias").css("font-weight", "bold")
      $("#datosUser").css("font-weight", "normal")
      $("#identidadUser").css("font-weight", "normal")
      $("#walletUser").css("font-weight", "normal")
      $("#transPendientes").css("font-weight", "normal")
      $("#aggBanco").css("font-weight", "normal")
    }
       

    $(document).ready(function() {
      $('#cuentasTable').DataTable({ 
        responsive: true,
        paging: false,
        searching: false,
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
        scrollY: 100,
        scrollX: true
      });

      $('#datosUserTable').DataTable({ 
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

      $('#transtasaccionTable').DataTable({ 
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
    } );

//cliks en menu
//usuario
    function clickCuentasBancarias(){
      $("#cuentas").css("display","block");
      $("#usuarios").css("display","none");
      $("#identidad").css("display","none");
      $("#userW").css("display","none");
      $("#transferencia").css("display","none");
      $("#banco").css("display","none");

      $("#cuentasBancarias").css("font-weight", "bold")
      $("#datosUser").css("font-weight", "normal")
      $("#identidadUser").css("font-weight", "normal")
      $("#walletUser").css("font-weight", "normal")
      $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
      //

    }

    function clickDatosUser(){
      $("#usuarios").css("display","block");
      $("#cuentas").css("display","none");
      $("#identidad").css("display","none");
      $("#userW").css("display","none");
      $("#transferencia").css("display","none");
      $("#banco").css("display","none");
      

      $("#cuentasBancarias").css("font-weight", "normal")
      $("#datosUser").css("font-weight", "bold")
      $("#identidadUser").css("font-weight", "normal")
      $("#walletUser").css("font-weight", "normal")
      $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
      //
      
    }


    function clickIdentidadUser(){
      $("#identidad").css("display","block")
      $("#cuentas").css("display","none");
      $("#usuarios").css("display","none");

      $("#userW").css("display","none");
      $("#transferencia").css("display","none");
      $("#banco").css("display","none");

      $("#cuentasBancarias").css("font-weight", "normal")
      $("#datosUser").css("font-weight", "normal")
      $("#identidadUser").css("font-weight", "bold")
      $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
      //
    }

    function clickWalletUser(){
      $("#cuentas").css("display","none")
      $("#usuarios").css("display","none")
      $("#identidad").css("display","none")
      $("#userW").css("display","block")
      $("#transferencia").css("display","none")
      $("#banco").css("display","none")

      $("#cuentasBancarias").css("font-weight", "normal")
      $("#datosUser").css("font-weight", "normal")
      $("#identidadUser").css("font-weight", "normal")
      $("#walletUser").css("font-weight", "bold")
      $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
      //

      
    }

//operaciones
    function clickTransPendientes(){
      $("#cuentas").css("display","none")
      $("#usuarios").css("display","none")
      $("#identidad").css("display","none")
      $("#userW").css("display","none")
      $("#transferencia").css("display","block")
      $("#banco").css("display","none")

      $("#cuentasBancarias").css("font-weight", "normal")
      $("#datosUser").css("font-weight", "normal")
      $("#transPendientes").css("font-weight", "bold")
      $("#aggBanco").css("font-weight", "normal")
      $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
      //
    }


    function clickaggBanco(){
      $("#cuentas").css("display","none")
      $("#usuarios").css("display","none")
      $("#identidad").css("display","none")
      $("#userW").css("display","none")
      $("#transferencia").css("display","none")
      $("#banco").css("display","block")

      $("#cuentasBancarias").css("font-weight", "normal")
      $("#datosUser").css("font-weight", "normal")
      $("#identidadUser").css("font-weight", "normal")
      $("#aggBanco").css("font-weight", "bold")
      $("#transPendientes").css("font-weight", "normal")

      //
    }




  </script>

</body>

</html>
