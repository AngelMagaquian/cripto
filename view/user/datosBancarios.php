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
      
      <div id="bancos" class=" mb-3">
          <div class="container-fluid">
              <div class="row justify-content-center mt-4">
                <div class="col-lg-10 col-12">
                  <div class="row" id="card_conteiner">
                  </div>
                  <div class="row mt-5">
                      <div class="col-12 botonera">
                        <form id="new_account_user">
                          <button class="btn-get-started-agg  btn-agg mr-2" type="button" data-toggle="modal" data-target="#exampleModal">Agregar nuevo</button>
                        </form>
                         
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header" style="color: #385BA2; background-color: rgba(0, 0, 0, 0.03);">
                                  <h5 class="modal-title" id="exampleModalLabel">Nueva cuenta bancaria</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-6 form-group">
                                      <label for="">Seleccione un banco</label>
                                      <select name="" id="select_bank" class="form-control form-select">
                                      </select>
                                        
                                    </div>
                                    <div class="col-6 form-group">
                                      <label for="">Tipo de cuenta</label>
                                      <select name="" id="select_type_account" class="form-control form-select">
                                      </select>
                                    </div>

                                    <div class="col-12 form-group">
                                      <label for="">Ingrese su CBU</label>
                                      <input type="text" name="" id="new_cbu" class="form-control">
                                    </div>
                                    <div class="col-12 form-group">
                                      <label for="">Ingrese número de cuenta</label>
                                      <input type="text" name="" id="new_num_acc" class="form-control">
                                    </div>
                                    <div class="col-12 form-group">
                                      <label for="">Ingrese su alias</label>
                                      <input type="text" name="" id="alias" class="form-control">
                                    </div>
                                  
                                    <div class="col-12 form-group mb-4">
                                      <label for="">Información</label>
                                      <div class="card-footer text-muted">
                                        <span id="span_info">Ingrese correctamente los datos. Cuando los administradores confirmen su cuenta, usted podrá operar con esta cuenta bancaria.</span>
                                      </div>
                                    </div>
                                    <div class="col-12 form-group text-right">
                                      <form id="new_account">
                                        <input type="submit" value="Agregar" class="btn btn-sm btn-get-started-agg  btn-agg">
                                      </form>
                                      
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
          </div>
      </div>
      <!--FIN VISTA-->
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <?php
  include 'script.php';
  ?>
  <!--Controllers-->
  <script src="..\..\controller\datos_bancarios\bank_controller.js" type="module" ></script> <!--no eliminar-->
  <script src="..\..\controller\datos_bancarios\new_account_controller.js" type="module" ></script> <!--no eliminar-->
  
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $( document ).ready(function() {
      $("#navPerfil").addClass("activo")
      $(".submenu-personal").css("display", "block")
      $("#datosBancarios").css("font-weight", "bold")
      $("#navUsuario").addClass("no-activo") 
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





