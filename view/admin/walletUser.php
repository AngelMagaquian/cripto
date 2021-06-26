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
     
      <section id="userW">
        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-10 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row justify-content-between mb-2">
                                <h5>Crear wallet de usuario</h5>
                                <span>Por favor, verifique todos los datos</span>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                  <div class="row mt-4">
                                      <table id="walletUserTable" class="table table-striped table-bordered" style="width:100%">
                                          <thead>
                                              <tr>
                                                  <th>Solicitud</th>
                                                  <th>ID usurario</th>   
                                                  <th>Usuario</th>   
                                                       
                                                  <th>Criptomoneda</th>
                                              </tr>
                                          </thead>
                                          <tbody id="twallet">
                                              
                                          </tbody>
                                      </table>
                                  </div>     
                                </div>
                            </div>
                            <div class="card mt-4 mb-2">
                                <div class="card-body">

                                    <form id="add_wallet" >
                                        <div class="row justify-content-around">
                                            <div class="col-5">
                                                        <label for="">Solicitud</label>
                                                        <input type="text" id="id_pending" class="form-control form-login" placeholder="Escribir el ID de la solicitud sin '#'" autocomplete="off" required/>
                                                        </br>
                                                        <label for="">Id usuario</label>
                                                        <input type="text" id="id_user" class="form-control form-login" placeholder="Escribir el ID del usuario" autocomplete="off" required/>
                                                        </br>
                                                        <label for="">Id wallet</label>
                                                        </br>
                                                        <input type="text" id="wallet_id" class="form-control form-login" placeholder="Escribir el código de la wallet" autocomplete="off" required/>
                                                        </br>
                                                        <label>Descripción de wallet</label>
                                                        <input type="text" id="description_cripto_wallet" class="form-control form-login" placeholder="Escribir la descripción de la wallet" autocomplete="off" required/>
                                                    
                                            </div>
                                            <div class="col-5">
                                                <label for="">Criptomoneda</label>
                                                <select name="" id="divisa" class="form-control">
                                                    
                                                </select>
                                            </div>
                                            <div class="col-11 mt-2">
                                                    
                                                        <input type="submit" value="Confirmar" class="btn-get-started-confirmar btn"/>
                                    
                                            </div>
                                        </div>
                                        
                                    </form>
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

  <?php
  include 'script.php';
  ?>
  <!-- DataTable-->
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
  <!--Controllers-->
  
  <script src="..\..\controller\admin\new_wallet_controller_admin.js" type="module" ></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $( document ).ready(function() {
      $("#navUsuario").addClass("activo")
      $(".submenu-personal").css("display", "block")
      $("#walletUser").css("font-weight", "bold")
      $("#navOperaciones").addClass("no-activo") 
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
    
    $('#walletUserTable').DataTable({ 
        responsive: true,
        paging: true,
        searching: true,
        language: {
            lengthMenu: " ",
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







