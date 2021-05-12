<?php 
  session_start();
  if(isset($_SESSION['id_user'])){
    if($_SESSION['id_user'] == 1 and $_SESSION['type'] == 2){
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <?php
  include 'head.php';
  ?>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php
    include 'sidebar.php';
    ?>
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
     
      <section id="transferencia">

        <div class="container-fluid">
            <div class="row justify-content-center mt-4">

                <div class="col-11">   
                    <div class="row justify-content-between">
                        <h5>Cambiar valores</h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-12 mb-3">
                                  <span style="font-weight: bold;text-transform: uppercase;color: darkblue;">Valores actuales</span>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                  <label for="exampleInputPassword1"><b>Dolar cripto actual</b></label>
                                  <input type="text" class="form-control form-login" id="Dolar" disable readonly>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                  <label for="exampleInputPassword1"><b>Comisión venta actual</b></label>
                                  <input type="text" class="form-control form-login" id="Dolar" disable readonly>
                                </div>
                                <div class="form-group col-md-4 col-12 ">
                                  <label for="exampleInputPassword1"><b>Comisión compra actual</b></label>
                                  <input type="text" class="form-control form-login" id="Dolar" disable readonly>
                                </div>
                                
                            </div>           
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-12 mb-3">
                                  <span style="font-weight: bold;text-transform: uppercase;color: darkblue;">Nuevos valores</span>
                                </div>
                                <form class="row" action="" id="new_values">
                                  <div class="form-group col-md-4 col-12">
                                    <label for="exampleInputPassword1"><b>Dolar cripto</b></label>
                                    <input type="text" class="form-control form-login" id="Dolar" disable readonly>
                                  </div>
                                  <div class="form-group col-md-4 col-12">
                                    <label for="exampleInputPassword1"><b>Comisión venta</b></label>
                                    <input type="text" class="form-control form-login" id="Dolar" disable readonly>
                                  </div>
                                  <div class="form-group col-md-4 col-12 ">
                                    <label for="exampleInputPassword1"><b>Comisión compra</b></label>
                                    <input type="text" class="form-control form-login" id="Dolar" disable readonly>
                                  </div>
                                  <div class="col-12">
                                    <input type="submit" value="Confirmar" class="btn-get-started-confirmar btn"/>
                                  </div>
                                </form>
                                
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

  <?php
  include 'script.php';
  ?>
  <!-- DataTable-->
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
  <!--Controllers-->
  <script src="..\..\..\controller\admin\transactions_controller_admin.js" type="module" ></script>

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
      $("#navOperaciones").addClass("activo")
      $(".submenu-operaciones").css("display", "block")
      $("#changeValores").css("font-weight", "bold")
      $("#navUsuario").addClass("no-activo") 
    });


    function navUsuario(){
      $("#navUsuario").removeClass("no-activo")
      $("#navUsuario").addClass("activo")
      $(".submenu-operaciones").css("display", "none")
      $(".submenu-personal").css("display", "block")

      if($("#navOperaciones").hasClass("activo")){
        $("#navOperaciones").removeClass("activo");
        $("#navOperaciones").addClass("no-activo")
      }
    }

    function navOperaciones(){
      $("#navOperaciones").removeClass("no-activo")
      $("#navOperaciones").addClass("activo")
      
      $(".submenu-operaciones").css("display", "block")
      $(".submenu-personal").css("display", "none")

      if($("#navUsuario").hasClass("activo")){
        $("#navUsuario").removeClass("activo");
        $("#navUsuario").addClass("no-activo")
      }

    }

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

    

  </script>

</body>

</html>
<?php
  }
}
echo "No posee permisos para este sitio";
  ?>








