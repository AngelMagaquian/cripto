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
      <section id="cuentas">
        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
            <div class="col-lg-11 col-12">
                <div class="row">
                     <div class="col-12">
                        <div class="row justify-content-between">
                            <h5>Cuentas bancarios</h5>
                        </div>
                       <!-- <div class="card">
                            <div class="card-body">
                                <form id="account_form" action="">
                                    <div class="row justify-content-around">
                                        <div class="buscador col-11 mt-2 mb-2">
                                            <input type="submit" value="Buscar"/>
                                            <input id="dni_search" type="text" value="" placeholder="Buscar usuario por DNI"> 
                                        </div>
                                    </div>

                                    <div class="row justify-content-around">
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>Nombre</b></label>
                                            <input id="first_name" type="text" class="form-control form-login"  value="valor de prueba"id="name" disabled=»disabled»>
                                        </div>
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>Segundo nombre</b></label>
                                            <input id="middle_name" type="text" class="form-control form-login" id="CUIL" disabled=»disabled»>
                                        </div>
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>Apellido</b></label>
                                            <input id="last_name"  type="text" class="form-control form-login" id="type_account" disabled=»disabled»>
                                        </div>
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>Segundo apellido</b></label>
                                            <input id="second_last_name" type="text" class="form-control form-login" id="type_currency" disabled=»disabled»>
                                        </div>
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>DNI</b></label>
                                            <input id="dni"  type="text" class="form-control form-login" id="CBU" disabled=»disabled»>
                                        </div>
                                        <div class="col-md-5 col-12 mt-2">
                                            <label><b>CUIL</b></label>
                                            <input id="cuil"  type="text" class="form-control form-login" id="account_number" disabled=»disabled»>
                                        </div>
                                        <div class=" col-11 mt-2">
                                            <label><b>Email</b></label>
                                            <input id="email" type="text" class="form-control form-login" id="account_number" disabled=»disabled»>
                                        </div>
                                    </div>
                                </form>       
                            </div>
                        </div> -->
                        <div class="card mb-2">
                            <div class="card-body">
                                <form  action="">
                                    <div class="row justify-content-around">
                                        <div class="col-12 mt-2">
                                            <table id="cuentasTable" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Usuario</th>
                                                        <th>CUIL</th>
                                                        <th>Banco</th>
                                                        <th>CBU</th>
                                                        <th style="width: 20%">Confirmación</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="account_tbody">
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>
                                                            <button class="btn btn-success" id="conf_yes">si</button>
                                                            <button class="btn btn-danger" id="conf_no">no</button>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
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
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  <!--Controllers-->
  <script src="..\..\controller\admin\account_controller_admin.js" type="module" ></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $( document ).ready(function() {
      $("#navUsuario").addClass("activo")
      $(".submenu-personal").css("display", "block")
      $("#cuentasBancarias").css("font-weight", "bold")
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

    $('#cuentasTable').DataTable({ 
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
        },
        scrollY: 350,
        scrollX: true,
    });

  </script>

</body>

</html>
<?php
  }
}
echo "No posee permisos para este sitio";
  ?>


