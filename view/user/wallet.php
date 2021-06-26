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


    <?php
    include 'sidebar.php';
    ?>
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
                                        <select class="form-control form-select" id="divisa_wallet" style="width:100%"></select>
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

                            <form id="solicitud_wallet" class=" col-12 mt-md-0 mt-sm-4 mt-4"> <!-- falta nombre-->
                                <div class="row">
                                    <div class="col-12 mt-2" style="text-align: end;">
                                    <a href="" class="btn-get-started  btn-siguiente mr-2 mt-sm-0 mt-3" type="button" data-toggle="modal" data-target="#exampleModal" id="modal_show_button">Solicitar Wallet</a>
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
                          <!-- Modal

                           -->
                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header" style="color: #385BA2; background-color: rgba(0, 0, 0, 0.03);">
                                  <h5 class="modal-title" id="exampleModalLabel">Solicitar nueva wallet</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;background: transparent;">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">

                                    <div class="col-6 form-group mb-4">
                                      <label for="">Seleccione una criptomoneda</label>
                                      <select id="select_cripto">
                                      </select>
                                    </div>
                                    <div class="col-12 form-group text-right">
                                      <form id="finalizar">
                                        <input type="submit" value="Finalizar" class="btn btn-sm btn-get-started-agg btn-nuevo">
                                      </form>
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

  <?php
  include 'script.php';
  ?>
  <!--Controllers-->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script><!--no eliminar-->
  <script src="..\..\controller\wallet_cripto\wallet_cripto_controller.js" type="module" ></script> <!--no eliminar-->
  
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
  

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $('#walletTable').DataTable({ 
        responsive: true,
        paging: true,
        searching: true,
        language: {
            lengthMenu: "",
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
        scrollY: 300,
        scrollX: true
      });

  $(document).ready(function() {
      $("#navWallet").addClass("activo")
      $(".submenu-wallet").css("display", "block")
      $("#walletCripto").css("font-weight", "bold")

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



 




