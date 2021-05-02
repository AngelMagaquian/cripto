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
      
      <section id="misOperaciones">
        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
                <div class="col-11">   
                    <div class="row">
                        <h5>Transacciones</h5>
                    </div>
                    <div class="card">
                        <div class="card-body mt-3 ">
                        
                            <div class="row">
                                <form id="date_form" class="col-lg-4 col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-12">
                                            <label for=""><b>Desde</b></label>
                                            <input id="desde" type="date" class="form-control" value='<?php echo date("Y-m-d");?>'>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-12">
                                            <label for=""><b>Hasta</b></label>
                                            <input id="hasta" type="date" class="form-control" value='<?php echo date("Y-m-d");?>'>
                                        </div>
                                        <div class="col-4 mt-3">
                                            <input type="submit" value="Filtro de fecha" class="btn-get-started-filtro btn-filtro"/>
                                        </div>
                                        
                                    </div>
                                </form>
                                <form id="cripto_form" class="col-lg-3 col-md-6 col-sm-6 col-12 mt-md-0 mt-sm-4 mt-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for=""><b>Divisa</b></label>
                                            <select name="" id="divisa" class="form-select form-control">
                                            
                                            </select>
                                            
                                        </div>
                                        <div class="col-4 align-self-center mt-3">
                                            <input type="submit" value="Filtro de divisa" class="btn-get-started-filtro btn-filtro"/>
                                        </div>
                                    </div>
                                </form>

                                <form id="operation_form" class="col-lg-4 col-md-6 col-sm-6 col-12 mt-lg-0 mt-md-4  mt-sm-4 mt-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for=""><b>Operación</b></label>
                                            <br>
                                            <div>
                                                
                                            </div>
                                            <input type="checkbox" id="op1" name="op1" value="compra">
                                            <label for="op1" style="margin-right:18px"> Compra</label>
                                            
                                            <input type="checkbox" id="op2" name="op2" value="venta" class="ml-10">
                                            <label for="op2"> Venta</label>    
                                        </div>
                                        <div class="col-4 mt-3">  
                                            <input type="submit" value="Filtro de operación" class="btn-get-started-filtro btn-filtro"/>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        
                            

                            <div class="row mt-4">
                            <table id="transTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Tipo de operación</th>
                                        <th>Tipo de Criptomoneda</th>
                                        <th>Monto AR$</th>
                                        <th>Monto en Criptomoneda</th>
                                        <th>Wallet</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>

                                    </tr>
                                </thead>
                                <tbody id="operation_tbody">
                                    
                                </tbody>
                            </table>
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
  <script src="..\..\..\controller\operation\operation_controller.js" type="module" ></script> <!--no eliminar-->

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
      $("#navMisOp").addClass("activo")
      $(".submenu-misOp").css("display", "block")
      $("#transacciones").css("font-weight", "bold")

    });

    function navPerfil(){
      $("#navPerfil").removeClass("no-activo")
      $("#navPerfil").addClass("activo")
      $(".submenu-misOp").css("display", "none")
      $(".submenu-operaciones").css("display", "none")
      $(".submenu-personal").css("display", "block")

      if($("#navOperaciones").hasClass("activo")){
        $("#navOperaciones").removeClass("activo");
        $("#navOperaciones").addClass("no-activo");
      }
      if($("#navMisOp").hasClass("activo")){
        $("#navMisOp").removeClass("activo");
        $("#navMisOp").addClass("no-activo");
      }
    }

    function navOperaciones(){
      $("#navOperaciones").removeClass("no-activo")
      $("#navOperaciones").addClass("activo")
      $(".submenu-misOp").css("display", "none")
      $(".submenu-operaciones").css("display", "block")
      $(".submenu-personal").css("display", "none")
      
      if($("#navPerfil").hasClass("activo")){
        $("#navPerfil").removeClass("activo");
        $("#navPerfil").addClass("no-activo");
      }
      if($("#navMisOp").hasClass("activo")){
        $("#navMisOp").removeClass("activo");
        $("#navMisOp").addClass("no-activo");
      }
    }

    function navMisOp(){
      $("#navMisOp").removeClass("no-activo")
      $("#navMisOp").addClass("activo")
      $(".submenu-misOp").css("display", "block")
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
    }

  </script>

</body>

</html>

<?php 
}else{
  echo "no estas registrado";
}
?>




