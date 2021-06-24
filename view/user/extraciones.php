<?php 
  session_start();
  if(isset($_SESSION["id_user"])){
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
      
      <section id="depositos">
        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
                <div class="col-11">   
                    <div class="row">
                        <h5>Extracciones</h5>
                    </div>
                          
                      
                    <div class="card mb-5">
                        <div class="card-body mt-3 mb-3 ">

                            <div class=" mt-4">
                              <form id="new_extraccion" class="row justify-content-around">
                                <div class="col-md-5 col-12 mt-3">
                                    <label><b>SELECCIONE LA CUENTA DE BANCO PARA TRANSFERIR</b></label>
                                    <select name="" id="bank_account" class="form-control form-select form-login"></select>
                                </div>
                                <div class="col-md-5 col-12 mt-3">
                                  <label><b>SALDO ACTUAL</b></label>
                                <input type="text" class="form-control form-login"   id="saldo_actual" placeholder="" disable readonly>
                                </div>
                                <div class="col-md-5 col-12 mt-3">
                                  <label><b>INGRESE EL MONTO A EXTRAER</b></label>
                                  <input type="number" class="form-control form-login"   id="importe">
                                </div>
                                <div class="col-md-5 col-12 mt-3">
                                  <label><b>PROYECTADO</b></label>
                                  <input type="text" class="form-control form-login form-number"   id="saldo_proyectado" placeholder="" disable readonly>
                                </div>
                                <div class="col-11 botonera mt-3" style="text-align: end;">
                                  <input type="submit" value="Confirmar" class="btn-get-started-agg btn-agg">
                                </div>
                              </form>
                              
                              <div class="row justify-content-around">
                              <div class="col-md-8 col-12 mt-5" >
                                <div class="card">
                                  <div class="card-header">
                                    <span>Cuenta a depositar</span>
                                  </div>
                                  <div class="card-body row justify-content-around">
                                    <div class="col-md-5 col-12 mt-2">
                                      <label><b>Banco seleccionado</b></label>
                                      <input type="text" class="form-control form-login" id="banco_resumen" value="" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                      <label><b>Monto a extraer</b></label>
                                      <input type="text" class="form-control form-login" id="monto_resumen" value="" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                      <label><b>Saldo proyectado</b></label>
                                      <input type="text" class="form-control form-login" id="saldo_resumen" value="" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
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

 
      <!--FIN VISTA-->
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <?php
  include 'head.php';
  ?>
  <!--Controllers-->
  <script src="..\..\controller\operation\extracciones_controller.js" type="module" ></script> <!--no eliminar-->

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script> <!--no eliminar-->
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
  


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $('#transTable').DataTable({ 
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
    

    $( document ).ready(function() {
      $("#navOperaciones").addClass("activo")
      $(".submenu-operaciones").css("display", "block")
      $("#extraciones").css("font-weight", "bold")
    });

    function navPerfil(){
      $("#navPerfil").removeClass("no-activo")
      $("#navPerfil").addClass("activo")
      $(".submenu-misOp").css("display", "none")
      $(".submenu-operaciones").css("display", "none")
      $(".submenu-personal").css("display", "block")
      $(".submenu-wallet").css("display", "none")

      if($("#navOperaciones").hasClass("activo")){
        $("#navOperaciones").removeClass("activo");
        $("#navOperaciones").addClass("no-activo");
      }
      if($("#navMisOp").hasClass("activo")){
        $("#navMisOp").removeClass("activo");
        $("#navMisOp").addClass("no-activo");
      }
      if($("#navWallet").hasClass("activo")){
        $("#navWallet").removeClass("activo");
        $("#navWallet").addClass("no-activo");
      }
    }

    function navOperaciones(){
      $("#navOperaciones").removeClass("no-activo")
      $("#navOperaciones").addClass("activo")
      $(".submenu-misOp").css("display", "none")
      $(".submenu-operaciones").css("display", "block")
      $(".submenu-personal").css("display", "none")
      $(".submenu-wallet").css("display", "none")
      
      if($("#navPerfil").hasClass("activo")){
        $("#navPerfil").removeClass("activo");
        $("#navPerfil").addClass("no-activo");
      }
      if($("#navMisOp").hasClass("activo")){
        $("#navMisOp").removeClass("activo");
        $("#navMisOp").addClass("no-activo");
      }
      if($("#navWallet").hasClass("activo")){
        $("#navWallet").removeClass("activo");
        $("#navWallet").addClass("no-activo");
      }
    }

    function navMisOp(){
      $("#navMisOp").removeClass("no-activo")
      $("#navMisOp").addClass("activo")
      $(".submenu-misOp").css("display", "block")
      $(".submenu-operaciones").css("display", "none")
      $(".submenu-personal").css("display", "none")
      $(".submenu-wallet").css("display", "none")

      if($("#navOperaciones").hasClass("activo")){
        $("#navOperaciones").removeClass("activo");
        $("#navOperaciones").addClass("no-activo");
      }
      if($("#navPerfil").hasClass("activo")){
        $("#navPerfil").removeClass("activo");
        $("#navPerfil").addClass("no-activo");
      }
      if($("#navWallet").hasClass("activo")){
        $("#navWallet").removeClass("activo");
        $("#navWallet").addClass("no-activo");
      }
    }

    function navWallet(){
      $("#navMisOp").removeClass("no-activo")
      $("#navMisOp").addClass("no-activo")
      $("#navWallet").addClass("activo")
      $(".submenu-wallet").css("display", "block")
      $(".submenu-misOp").css("display", "none")
      $(".submenu-operaciones").css("display", "none")
      $(".submenu-personal").css("display", "none")
      

      if($("#navOperaciones").hasClass("activo")){
        $("#navOperaciones").removeClass("activo");
        $("#navOperaciones").addClass("no-activo");
      }
      if($("#navPerfil").hasClass("activo")){
        $("#navPerfil").removeClass("activo");
        $("#navPerfil").addClass("no-activo");
      }
      if($("#navMisOp").hasClass("activo")){
        $("#navMisOp").removeClass("activo");
        $("#navMisOp").addClass("no-activo");
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




