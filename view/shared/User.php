<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../asset/css/style_login.css" rel="stylesheet">
  <link href="../asset/css/perfil.css" rel="stylesheet">

  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">

      <div class="sidebar-heading">LOGO</div>
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
        <a href="../ayuda/index.php" class="list-group-item list-group-item-action">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
            </svg>
            Ayuda
        </a>

        <button type="submit" class="btn-sesion btn-get-started-sesion" >Iniciar sesión</button>
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
        <span>DINERO DISPONIBLE: $1500</span>
        </div>
        
      </nav>

      <div class="herramienta">
        <?php
        include '../misOperaciones/index.php';
          include '../operaciones/compra.php';
          include '../operaciones/venta.php';
          include '../perfil/datosPersonales.php';
          include '../perfil/datosBancarios.php';
          
          

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
  <script src="..\..\controller\user\controller_user.js" type="module" ></script>
  <script src="..\..\controller\user\update_user_info_controller.js" type="module" ></script>
  <script src="..\..\controller\datos_bancarios\bank_controller.js" type="module" ></script>
  

  

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

    function navOperaciones(){
      console.log("estoy")
      $(".submenu-operaciones").addClass( "submenuBlock" );
      $("#navOperaciones").addClass("activo")

      if($("#navPerfil").hasClass("activo")){
        $("#navPerfil").removeClass("activo");
        $(".submenu-personal").removeClass( "submenuBlock" );
      }

      $("#datosPersonales").css("font-weight", "normal")
      $("#datosBancarios").css("font-weight", "normal")
      $("#compraOpera").css("font-weight", "normal")
      $("#ventaOpera").css("font-weight", "normal")
    }
       

    $(document).ready(function() {
      $('#example').DataTable({ 
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


    function clickDatosPersonales(){
      $("#perfil").css("display","block")
      $("#bancos").css("display","none")
      $("#compra").css("display","none")
      $("#venta").css("display","none")
      $("#misOperaciones").css("display","none")

      $("#datosPersonales").css("font-weight", "bold")
      $("#datosBancarios").css("font-weight", "normal")
      $("#compraOpera").css("font-weight", "normal")
      $("#ventaOpera").css("font-weight", "normal")
    }

    function clickDatosBanco(){
      $("#bancos").css("display","block")
      $("#perfil").css("display","none")
      $("#compra").css("display","none")
      $("#venta").css("display","none")
      $("#misOperaciones").css("display","none")
      
      $("#datosPersonales").css("font-weight", "normal")
      $("#datosBancarios").css("font-weight", "bold")
      $("#compraOpera").css("font-weight", "normal")
      $("#ventaOpera").css("font-weight", "normal")
      
    }

    function clickCompra(){
      $("#compra").css("display","block")
      $("#bancos").css("display","none")
      $("#perfil").css("display","none")
      $("#venta").css("display","none")
      $("#misOperaciones").css("display","none")

      $("#datosPersonales").css("font-weight", "normal")
      $("#datosBancarios").css("font-weight", "normal")
      $("#compraOpera").css("font-weight", "bold")
      $("#ventaOpera").css("font-weight", "normal")
    }

    function clickVenta(){
      $("#venta").css("display","block")
      $("#bancos").css("display","none")
      $("#perfil").css("display","none")
      $("#compra").css("display","none")
      $("#misOperaciones").css("display","none")

      $("#datosPersonales").css("font-weight", "normal")
      $("#datosBancarios").css("font-weight", "normal")
      $("#compraOpera").css("font-weight", "normal")
      $("#ventaOpera").css("font-weight", "bold")
    }

    function clickOperaciones(){
      $("#misOperaciones").css("display","block")
      $("#venta").css("display","none")
      $("#bancos").css("display","none")
      $("#perfil").css("display","none")
      $("#compra").css("display","none")
      $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();

        $("#navPerfil").removeClass("activo");
        $(".submenu-personal").removeClass( "submenuBlock" );
      
    
        $("#navOperaciones").removeClass("activo");
        $(".submenu-operaciones").removeClass( "submenuBlock" );
      
    }

  </script>

</body>

</html>
