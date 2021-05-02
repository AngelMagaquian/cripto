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

  <!-- Custom styles for this template -->
  <link href="../../asset/css/style_login.css" rel="stylesheet">
  <link href="../../asset/css/perfil.css" rel="stylesheet">

  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  
  <!--fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">



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
      <section id="wallet">

        <div class="container-fluid">
            <div class="row justify-content-center mt-4">

                <div class="col-11">   
                    <div class="row">
                        <h5>Mis wallet</h5>
                    </div>
                    <div class="card">
                        <div class="card-body mt-3">
                        <div class="row justify-content-between">

                            <form id="add_wallet" class="col-12"> <!--cambiar nombre dsp-->
                                
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <input id= "id_cripto_wallet" type="text" placeholder="Ingresar código de wallet" class="form-control" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <input id="description_cripto_wallet" type="text" placeholder="Ingresar alias de wallet" class="form-control" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <select id="divisa_wallet" style="width:100%"></select>
                                    </div>
                                        
                                    
                                    <div class="col-2">
                                        <input type="submit" value="Agregar" class="btn-get-started-filtro btn-filtro">
                                    </div>
                                        
                                </div>
                            </form>
                            
                        </div>

                        <div class="row mt-4">
                            <table id="walletTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id wallet</th>
                                        <th>Criptomoneda</th>      
                                        <th>Alias</th>          
                                    </tr>
                                </thead>
                                <tbody id="wallet_tbody">
                                    
                                </tbody>
                            </table>

                            <form id="" class=" col-12 mt-md-0 mt-sm-4 mt-4"> <!-- falta nombre-->
                                <div class="row">
                                    <div class="col-12" style="text-align: end;">
                                        <input type="submit" value="Nueva wallet" class="btn-get-started-wallet btn-wallet">
                                    </div>
                                </div>
                            </form>  
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
  <script src="../../asset/js/bootstrap/bootstrap.js"></script>
  <script src="../../asset/js/bootstrap/bootstrap.min.js"></script>
  <script src="../../asset/js/bootstrap/bootstrap.bundle.min.js"></script>
  <!--Controllers-->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script><!--no eliminar-->
<script src="..\..\..\controller\wallet_cripto\wallet_cripto_controller.js" type="module" ></script> <!--no eliminar-->
  
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
  

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $( document ).ready(function() {
      $("#wallet").addClass("activo")

      $('#walletTable').DataTable({ 
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
      if($("#wallet").hasClass("activo")){
        $("#wallet").removeClass("activo");
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
      if($("#wallet").hasClass("activo")){
        $("#wallet").removeClass("activo");
      }
    }

    function clickMisOp(){
      $("#navOp").addClass("activo")

      $(".submenu-misOp").css("display", "block")
      $(".submenu-operaciones").css("display", "none")
      $(".submenu-personal").css("display", "none")

      if($("#navOperaciones").hasClass("activo")){
        $("#navOperaciones").removeClass("activo");
      }
      if($("#navMisOp").hasClass("activo")){
        $("#navMisOp").removeClass("activo");
      }
      if($("#navPerfil").hasClass("activo")){
        $("#navPerfil").removeClass("activo");
      }
      if($("#wallet").hasClass("activo")){
        $("#wallet").removeClass("activo");
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



 




