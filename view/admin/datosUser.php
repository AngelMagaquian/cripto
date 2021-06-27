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
      <section id="usuarios">
        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
                <div class="col-11">   
                    <div class="row justify-content-between">
                      <h5>Datos de usuarios</h5>
                    </div>
                    <div class="card">
                        <div class="card-body mt-3">
                          <div class="row mt-4">
                              <table id="datosUserTable" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>Id user</th>    
                                          <th>Nombre y apellido</th>    
                                          <th>Estado</th>
                                          <th>Saldo</th>
                                          <th>Ficha de usuario</th>
                                          <th>Datos bancarios</th>
                                          <th>Operaciones con Cripto</th>
                                          <th>Depositos y extracciones</th>
                                      </tr>
                                  </thead>
                                  <tbody id="user_data_tbody">
                                      
                                  </tbody>
                              </table>
                          </div>
                              
                          <!-- Modal ficha de usuario -->
                           <div class="modal fade" id="modalFichaUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header" style="color: #385BA2; background-color: rgba(0, 0, 0, 0.03);">
                                  <h5 class="modal-title" id="exampleModalLabel">Ficha de usuario</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;background: transparent;">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="row ">
                                    <div class="col-12 mt-2">
                                        <label><b>Usuario:</b></label><span class="ml-2" id="span_id_user"></span>
                                      </div>
                                        <div class="col-md-6 col-12 mt-2">
                                            <label><b>Nombre y apellido</b></label>
                                            <input type="text" class="form-control form-login" id="name_uc" disabled=»disabled» />
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label><b>Email</b></label>
                                            <input type="text" class="form-control form-login" id="email_uc" disabled=»disabled» />
                                        </div>
                                        <div class="col-md-6 col-12 mt-2">
                                            <label><b>DNI</b></label>
                                            <input type="text" class="form-control form-login" id="DNI_uc" disabled=»disabled» />
                                        </div>
                                        <div class="col-md-6 col-12 mt-2">
                                            <label><b>CUIL</b></label>
                                            <input type="text" class="form-control form-login" id="CUIL_uc" disabled=»disabled» />
                                        </div>
                                        <div class="col-md-6 col-12 mt-2">
                                            <label><b>Fecha de nacimiento</b></label>
                                            <input type="date" class="form-control form-login" id="bd" disabled=»disabled» />
                                        </div>
                                        <div class="col-md-6 col-12 mt-2">
                                          <div class="form-check" style="margin-top:45px; padding-left: 1.5em;">
                                            <input type="checkbox" class="form-check-input" id="chk_pep" disabled=»disabled»>
                                            <label class="form-check-label" for="chk_pep">Declaración no ser PEP</label>
                                            <br>
                                            <input type="checkbox" class="form-check-input" id="chk_conf" disabled=»disabled»>
                                            <label class="form-check-label" for="chk_conf">Confirmación de usuario</label>
                                            <br>
                                            <input type="checkbox" class="form-check-input" id="chk_email" disabled=»disabled»>
                                            <label class="form-check-label" for="chk_email">Confirmación de email</label>
                                          </div>
                                        </div>
                                        <div class=" col-4 mt-2 fotoPerfil">
                                            <label><b>Foto de perfil</b></label>
                                            <br>
                                            <div style="width:100%; height: 200px;">
                                              <img src="" id="photo_face" alt="" width="100%" height="100%" style="object-fit: cover;">
                                            </div>
                                        </div>
                                        <div class=" col-4 mt-2 fotoPerfil">
                                            <label><b>Foto de DNI</b></label>
                                            <br>
                                            <div style="width:100%; height: 200px;">
                                              <img src="" id="photo_dni" alt="" width="100%" height="100%" style="object-fit: cover;">
                                            </div>
                                        </div>
                                        <div class=" col-4 mt-2 fotoPerfil">
                                            <label><b>Foto dorso DNI</b></label>
                                            <br>
                                            <div style="width:100%; height: 200px;">
                                              <img src="" id="photo_dorso" alt="" width="100%" height="100%" style="object-fit: cover;">
                                            </div>
                                        </div>
                                    </div> 
                                  
                                </div>
                                <div class="modal-footer">
                                  <form id="confirm_user">
                                        <input type="submit" value="Confirmar usuario" class="btn btn-success" id="submit_user"/>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Cerrar</button>
                                    </form>
                                  
                                </div>                            
                              </div>
                            </div>
                          </div>   

                          <!-- Modal cuentas de banco del usuario -->
                          <div class="modal fade" id="modaDatosBancarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header" style="color: #385BA2; background-color: rgba(0, 0, 0, 0.03);">
                                    <h5 class="modal-title" id="exampleModalLabel">Cuentas bancarias de usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;background: transparent;">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row ">
                                      <div class="col-12 mt-2">
                                      <label><b>Usuario:</b></label><span class="ml-2" id="span_id_user2"></span>
                                      </div>
                                      <table id="modalFichaUs" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                          <tr>
                                            <th>Id banco</th>    
                                            <th>Banco</th>    
                                            <th>Alias</th>
                                            <th>CBU</th>
                                            <th>N° cuenta</th>
                                            <th>Estado</th>
                                            <th>Confirmación</th>
                                          </tr>
                                        </thead>
                                        <tbody id="user_account_tbody">
                                              
                                        </tbody>
                                      </table>     
                                    </div> 
                                    
                                  </div>
                                  <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
                                  </div>                            
                                </div>
                              </div>
                            </div>          
                              
                          </div>

                          <!-- Modal ficha de usuario -->
                          <div class="modal fade" id="modalCripto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header" style="color: #385BA2; background-color: rgba(0, 0, 0, 0.03);">
                                    <h5 class="modal-title" id="exampleModalLabel">Historial de compra y ventas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;background: transparent;">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row ">
                                      <div class="col-12 mt-2">
                                        <label><b>Usuario:</b></label><span class="ml-2" id="span_id_user3"></span>
                                      </div>

                                      <div class="col-12 mt-3">
                                        <label><b>Compras</b></label>
                                        <table id="modalDepositoCompra" class="table table-striped table-bordered" style="width:100%">
                                          <thead>
                                            <tr>
                                              <th>Id</th>   
                                              <th>Wallet</th> 
                                              <th>Fecha</th>    
                                              <th>Operación</th>
                                              <th>Importe cripto</th>
                                              <th>Cotización</th>
                                              <th>Cotización s/c</th>
                                              <th>Valor dolar</th>
                                              <th>Comisión</th>
                                              <th>Total final</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                                
                                          </tbody>
                                          <tfoot id="tftotal_compra">
                                  
                                          </tfoot>
                                        </table>   
                                      </div>  

                                      <div class="col-12 mt-3">
                                        <label><b>Venta</b></label>
                                        <table id="modalDepositoVenta" class="table table-striped table-bordered" style="width:100%">
                                          <thead>
                                            <tr>
                                              <th>Id</th> 
                                              <th>Wallet</th>    
                                              <th>Fecha</th>    
                                              <th>Operación</th>
                                              <th>Importe cripto</th>
                                              <th>Cotización</th>
                                              <th>Cotización s/c</th>
                                              <th>Valor dolar</th>
                                              <th>Comisión</th>
                                              <th>Total final</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                                
                                          </tbody>
                                          <tfoot id="tftotal_ventas">
                                  
                                          </tfoot>
                                        </table>   
                                      </div>  
                                    </div> 
                                    
                                  </div>
                                  <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
                                  </div>                            
                                </div>
                              </div>
                            </div>          
                              
                          </div>

                           <!-- Modal ficha de usuario -->
                           <div class="modal fade" id="modalDeposito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header" style="color: #385BA2; background-color: rgba(0, 0, 0, 0.03);">
                                    <h5 class="modal-title" id="exampleModalLabel">Historial de depositos y extracciones</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;background: transparent;">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row ">
                                      <div class="col-12 mt-2">
                                        <label><b>Usuario:</b></label><span class="ml-2" id="span_id_user4"></span>
                                      </div>

                                      <div class="col-12 mt-3">
                                        <label><b>Depositos</b></label>
                                        <table id="modalDep" class="table table-striped table-bordered" style="width:100%">
                                          <thead>
                                            <tr>
                                              <th>Id</th> 
                                              <th>Banco</th>    
                                              <th>CBU</th>    
                                              <th>Fecha</th>
                                              <th>Monto</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                                
                                          </tbody>
                                          <tfoot id="tftotal_deposito">
                                  
                                          </tfoot>
                                        </table>   
                                      </div>  

                                      <div class="col-12 mt-3">
                                        <label><b>Extracciones</b></label>
                                        <table id="modalExtraccion" class="table table-striped table-bordered" style="width:100%">
                                          <thead>
                                            <tr>
                                              <th>Id</th> 
                                              <th>Banco</th>    
                                              <th>CBU</th>    
                                              <th>Fecha</th>
                                              <th>Monto</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                                
                                          </tbody>
                                          <tfoot id="tftotal_extra">
                                  
                                          </tfoot>
                                        </table>   
                                      </div>  
                                    </div> 
                                    
                                  </div>
                                  <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
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

  <?php
  include 'script.php';
  ?>
  <!-- DataTable-->
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
  <!--Controllers-->
  <script src="..\..\controller\admin\user_info_controller_admin.js" type="module" ></script>
  <script src="..\..\controller\admin\modal_admin\modal_user_info.js" type="module" ></script>
  <script src="..\..\controller\admin\modal_admin\modal_user_account.js" type="module" ></script>
  <script src="..\..\controller\admin\modal_admin\modal_user_trans.js" type="module" ></script>
  <script src="..\..\controller\admin\modal_admin\modal_user_op.js" type="module" ></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $(document).ready(function() {
      $("#navUsuario").addClass("activo")
      $(".submenu-personal").css("display", "block")
      $("#datosUser").css("font-weight", "bold")
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
    
     $('#datosUserTable').DataTable({ 
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
        scrollY: 500,
        scrollX: true
      }); 
      

      $('#modalFichaUs').DataTable({ 
        responsive: true,
        paging: true,
        searching: true,
        language: {
            lengthMenu: " ",
            search: " ",
            searchPlaceholder: "Buscar",
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
        scrollY: 400,
        scrollX: true
      });

      $('#modalDepositoCompra').DataTable({ 
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
        scrollY: 200,
        scrollX: true
      });

      $('#modalDepositoVenta').DataTable({ 
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

    $('#modalDep').DataTable({ 
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
        scrollY: 200,
        scrollX: true
      }); 

      $('#modalExtraccion').DataTable({ 
        rresponsive: true,
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






