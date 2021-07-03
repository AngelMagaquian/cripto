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
  <meta http-equiv="refresh" content="60" />
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
      
      <section id="venta">
        <div id="cripto">
          <div class="container">
            

          </div>
      <?php include('cripto_table.php');?>
        </div>
        <div class="container mt-3 mb-2">
            <div class="row justify-content-around">
                <div class="col-lg-7 col-md-11 col-sm-11 col-11 card focus mt-lg-0 mt-md-4 mt-sm-4 mt-4">
                        <div class="col-6 form-group mb-5">
                                  <from id="radios">
                                      <label class="text-letf mb-2">Seleccione una operación</label>
                                      <br>
                                      <input type="radio" class="btn-check" name="operation" id="option1" autocomplete="off" checked value="1">
                                      <label class="btn btn-primary" for="option1">Compra</label>

                                      <input type="radio" class="btn-check" name="operation" id="option2" autocomplete="off"   value="2">
                                      <label class="btn btn-primary" for="option2">Venta</label>
                                  </from>
                        </div>
                    <div class="row calculadora justify-content-around m-auto">
                        <div class="col-6">
                            <select class="moneda" name="" id="pesos_select">
                                <option value="ars">ARG</option>
                            </select>
                          
                            <label for="ars_value">$</label><input class="number-calculadora" type="number" id="ars_value">
                        </div>
                        
                        <div class="col-6 mb-3">
                            <select class="moneda" name="" id="cripto_select">
                                <option value="bitcoin">BTC</option>
                                <option value="ethereum">ETH</option>
                                <option value="tether">USDT</option>
                                <option value="dai">DAI</option>
                                <option value="chainlink">LINK</option>
                                <option value="ripple">XRP</option>
                            </select>
                            <input class="number-calculadora" type="number" id="cripto_value" step="0.00001">
                            <!-- <label>Ultima actualización de precios</label>
                                  <br>
                                  <label> <?php 
                                  
                                 /*  $fechaActual=new DateTime();

                                  echo $fechaActual->format('Y-m-d H:i:sP'); */
                                  
                                  ?></label> -->
                        </div>
                        <!--<div class="card-footer text-muted">
                          <span id="cripto_seleccionada"></span>
                          <br>
                          <span id="dolar_cripto"></span>
                          <br>
                          <span id="commision"></span>
                        </div>-->
                        <div class="col-12 mt-5">
                            <div class="container-btn text-center">
                              
                              <form >
                                <a href="" class="btn-get-started  btn-cancelar mr-2">Actualizar</a>
                                <!-- <a href="" class="btn-get-started  btn-siguiente mr-2 mt-sm-0 mt-3" type="button" data-toggle="modal" data-target="#exampleModal" id="modal_show_button">Siguiente</a> -->
                                <button type="button" class="btn-get-started  btn-siguiente mr-2 mt-sm-0 mt-3" id="modal_show_button" data-toggle="modal" data-target="#exampleModal"> Siguente</button> 
                               <!--  <input type="text" id="type_trans" name="type_trans" value="" hidden>
                                <input type="text" id="id_cripto" name="id_cripto" value="" hidden>
                                <input type="text" id="monto_cripto" name="monto_cripto" value="" hidden>
                                <input type="text" id="valor_cripto_sc" name="valor_cripto_sc" value="" hidden>
                                <input type="text" id="valor_cripto_cc" name="valor_cripto_cc" value="" hidden>
                                <input type="text" id="comision" value="" name="comision" hidden>
                                <input type="text" id="dolar" value="" name="dolar" hidden>
                                <input type="text" id="monto_pesos" name="monto_pesos" value="" hidden> -->
                              </form>
                              
                            </div>
                          <!-- Modal

                           -->
                           <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header" style="color: #385BA2; background-color: rgba(0, 0, 0, 0.03);">
                                  <h5 class="modal-title" id="exampleModalLabel">Completar operación</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;background: transparent;">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body ">
                                  <label for="select_wallet_cripto"> Seleccione la waller para operar</label>
                                  <select  id="select_wallet_cripto"></select>

                                  <br>
                                  <label>Su saldo es: <b>$ <label id="saldo"></label> <b></label>
                                  <div class="row">
                                  <div class="card-footer" style="font-size: 13px;">
                                      <h5 style="font-size:15px"><b>Resumen:</b></h5>
                                      <div class="row">
                                        <div class="col-6">
                                          <p class="mb-1"><b>Fecha y hora:</b> <?php echo date("d/m/Y h:i:s a");?></p>
                                        </div>
                                        <div class="col-6">
                                          <p class="mb-1"><b>Moneda: <label id="cripto_resumen"></label>
                                        </div>
                                        <div class="col-6">
                                          <p class="mb-1"><b>Operacion: <label id="operacion_resumen"> </label></b> 
                                        </div>
                                        <div class="col-6">
                                          <p class="mb-1"><b>Cantidad:</b> <label id="cant_cripto"></label></p>
                                        </div>
                                        <div class="col-6">
                                          <p class="mb-1"><b>Pesos:</b> $ <label id="cant_pesos"></label></p>
                                        </div>
                                        <div class="col-6">
                                          <p class="mb-1"><b>Wallet de orgien/destino:</b> <label id="wallet_od"></label></p>
                                        </div>
                                        <div class="col-6">
                                          <p class="mb-2"><b>Cotización:</b> AR$/<label id="cotizacion_resumen"></label></p>
                                        </div>
                                        <div class="col-12">
                                          <p>Monto final: $ <label id="total_resumen"></label> </p>
                                        </div>

                                        <div class="form-check col-12 ml-3">
                                          <input type="checkbox" class="form-check-input" id="declaracion">
                                          <label class="form-check-label" for="declaracion">Al continuar declaro bajo juramento que mis fondos no provienen de planes y programas sociales en Argentina. Tambien acepto los terminos y condiciones del proceso de operaciones (compra/venta) con criptomonedas de CriptoPremier.com</label>
                                        </div>
                                        <br>
                                        <div class="form-check col-12 ml-3">
                                          <form id="finalizar">
                                            <input type="submit" id="btn_finalizar" value="Finalizar" class="btn-get-started  btn-siguiente mr-2 mt-sm-0 mt-3"/>
                                          </form>
                                            
                                        </div>
                                            
                                      </div>
                                  </div>
                                <div>
                                    

                                    
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
  include 'script.php';
  ?>
  <!--Controllers-->
  <script src="..\..\controller\operation\calculadora_controller.js" type="module" ></script>
  <script src="..\..\controller\operation\modal_trans_controller.js" type="module" ></script> 

 
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $( document ).ready(function() {
      $("#navOperaciones").addClass("activo")
      $(".submenu-operaciones").css("display", "block")
      $("#ventaOpera").css("font-weight", "bold")
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

