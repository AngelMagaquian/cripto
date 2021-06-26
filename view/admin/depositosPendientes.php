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
                        <h5>Depositos pendientes</h5>
                    </div>
                    <div class="card">
                        <div class="card-body mt-3">
                            <div class="row mt-4">
                                <table id="transtasaccionTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id user</th>
                                            <th>User</th>
                                            <th>CUIL</th>    
                                            <th>Alias</th>  
                                            <th>Banco</th>
                                            <th>Id deposito</th>   
                                            <th>CBU</th> 
                                            <th>Fecha</th>   
                                            <th>Monto</th> 
                                            <th>Confirmación</th>
                                        </tr>
                                    </thead>
                                    <tbody id="transactions_tbody">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button class="btn btn-success">si</button>
                                                <button class="btn btn-danger">no</button>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    
                        </div>
                    </div>

                </div>

            </div>
        </div>

      </section>

       <!-- Modal

                           -->
                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header" style="color: #385BA2; background-color: rgba(0, 0, 0, 0.03);">
                                  <h5 class="modal-title" id="exampleModalLabel">Descripción de cancelación</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;background: transparent;">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                  
                                    <div class="col-12 form-group mb-4">
                                      <label for="">Escriba el motivo de la cancelación del deposito</label>
                                      <div class="card-footer text-muted">
                                        <textarea id="text_issue"  rows="4" cols="50"></textarea>
                                      </div>
                                    </div>
                                  
                                    
                                    <div class="col-12 form-group text-right">
                                      <form id="finalizar">
                                        <input type="submit" value="Finalizar" class="btn btn-sm btn-get-started-agg  btn-agg">
                                      </form>
                                    </div>
                                  </div>
                                  
                                </div>
                                
                              </div>
                            </div>
                          </div>


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
  <script src="..\..\controller\admin\confirm_deposit_controller_admin.js" type="module" ></script>
  <script src="..\..\controller\admin\modal_cancel_deposit.js" type="module" ></script>

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
      $("#depositosPendientes").css("font-weight", "bold")
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

    

  </script>

</body>

</html>
<?php
  }
}
echo "No posee permisos para este sitio";
  ?>








