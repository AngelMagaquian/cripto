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
      
      <div id="depositos" class=" mb-3" >
        <div class="container-fluid">
            <div class="row justify-content-center mt-4">  
                    <div class="col-11 mb-3" >
                        <div class="row">
                            <h5>DEPOSITOS</h5>
                        </div>
                            <div class="card">       
                                <div class="card-body row justify-content-around">
                                        <div class="col-md-5 col-12 mt-3">
                                            <label><b>SELECCIONAR CUENTA</b></label>
                                            <select class="form-control form-select form-login"  id="bank_account">
                                              
                                            </select>
                                        </div>
                                        <div class="col-md-5 col-12 mt-3">
                                            <label><b>SALDO ACTUAL</b></label>
                                            <input type="text" class="form-control form-login"  id="saldo_actual" placeholder="" disabled=»disabled» readonly > 
                                        </div>
                                        <div class="col-md-5 col-12 mt-3">
                                            <label><b>IMPORTE</b></label>
                                            <input type="text" class="form-control form-login"   id="importe" placeholder="" autocomplete="off" required>
                                        </div>
                                        <div class="col-md-5 col-12 mt-3">
                                            <label><b>PROYECTADO</b></label>
                                            <input type="text" class="form-control form-login"  id="saldo_proyectado" placeholder="" disabled=»disabled» readonly >
                                        </div>

                                        <div class="col-11 botonera mt-4">
                                            <form id="new_deposit">
                                              <input type="submit" value="Nuevo deposito" class="btn-get-started-agg  btn-agg mr-2 float-right">
                                            </form>
                                        </div>

                                        <div class="col-md-8 col-12 mt-5" >
                                          <div class="card">
                                              <div class="card-header">
                                                  <span>Cuenta a depositar</span>
                                              </div>
                                              <div class="card-body row justify-content-around">
                                                <div class="col-md-5 col-12 mt-2">
                                                    <label><b>Razón social</b></label>
                                                    <input type="text" class="form-control form-login"  value="BTC Trade SRL" disabled=»disabled»>
                                                </div>
                                                <div class="col-md-5 col-12 mt-2">
                                                    <label><b>CUIT</b></label>
                                                    <input type="text" class="form-control form-login"  value="30715669478" disabled=»disabled»>
                                                </div>
                                                <div class="col-md-5 col-12 mt-2">
                                                    <label><b>CBU</b></label>
                                                    <input type="text" class="form-control form-login"  value="3220001805006401160034" disabled=»disabled»>
                                                </div>
                                                <div class="col-md-5 col-12 mt-2">
                                                    <label><b>CBU (segunda opción)</b></label>
                                                    <input type="text" class="form-control form-login"  value="3220001805006401160034" disabled=»disabled»>
                                                </div>
                                                <div class="col-md-5 col-12 mt-2">
                                                  <label><b>Alias</b></label>
                                                  <input type="text" class="form-control form-login"  value="BUENBIT.ARS" disabled=»disabled»>
                                                </div>
                                                <div class="col-md-5 col-12 mt-2">
                                                  <label><b>Banco</b></label>
                                                  <input type="text" class="form-control form-login"  value="Banco Industrial S.A. Sucuarsal 1" disabled=»disabled»>
                                                </div>
                                                <div class="col-md-5 col-12 mt-2">
                                                  <label><b>Cuenta</b></label>
                                                  <input type="text" class="form-control form-login"  value="Cuenta Corriente 1-640116/3" disabled=»disabled»>
                                                </div>
                                                <div class="col-md-5 col-12 mt-2">

                                                </div>
                                              </div>
                                              
                                          </div>
                                        </div>
                                        <!-- <div class="col-md-6  col-12 mt-5">
                                          <div class="card" style="">
                                            <div class="card-header">
                                              Depositos
                                            </div>
                                            <div class="card-body row">
                                              <div class="col-md-4 col-sm-12">
                                                <p class="list-group-item"><b>1.</b> Envie la solicitud completando los datos, establezca cual es la cuenta que usará y el importe. (Si usted no añadio una cuenta de banco puede hacerlo en perfil-> datos bancarios-> nueva cuenta)</p>
                                              </div>
                                              <div class="col-md-4 col-sm-12">
                                                <p class="list-group-item"><b>2.</b> Realize la transferencia atraves de su HomeBanking, debe ser igual al importe, sino será rechazada</p>
                                              </div>
                                              <div class="col-md-4 col-sm-12">
                                                <p class="list-group-item"><b>3.</b> El saldo ingresado quedará en pendiente hasta que los administradores confirmen los fondos ingresados</p>
                                              </div>
                                            </div>
                                          
                                          </div>
                                        </div> -->
                               
                                
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
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="..\..\controller\operation\new_deposit_controller.js" type="module" ></script>

  
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $( document ).ready(function() {
      $("#navOperaciones").addClass("activo")
      $(".submenu-operaciones").css("display", "block")
      $("#compraOpera").css("font-weight", "bold")
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










