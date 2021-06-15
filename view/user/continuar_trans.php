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
      
      <section id="venta">
        <div id="cripto">
          <div class="container">
            

          </div>
      <?php include('cripto_table.php');?>
        </div>
        <div class="container mt-3 mb-2">
            <div class="row justify-content-around">
                <div class="col-lg-7 col-md-11 col-sm-11 col-11 card focus mt-lg-0 mt-md-4 mt-sm-4 mt-4"  >
                  <div class="card-body pt-2" style="font-size: 15px;">
                    <h5 class="card-title" style="color:#44596A" style="font-weight:bold;">Operacion: <?php echo $_POST['type_trans'];?></h5>
                      <p>Seleccione la wallet del destino/origen de criptomoneda:</p>

                      <select id="select_wallet_cripto" class="form-control form-select">
                        <option value="default_select"> Seleccione una wallet</option>
                      </select>
                      <p style="color:#707070; font-size: 12px">Si no poseé una wallet para esta criptomoneda, puede solicitarla haciendo <a href="wallet.php">Click aquí</a>.</p>
                      <p class="mb-0">Saldo actual: $ <input type="text" id="wallet_user_input" readonly/></p>

                  </div>
                    <div class="card-footer" style="font-size: 13px;">
                        <h5 style="font-size:15px"><b>Resumen:</b></h5>
                        <div class="row">
                          <div class="col-6">
                            <p class="mb-1"><b>Fecha y hora:</b> <?php echo date("d/m/Y h:i:s a");?></p>
                          </div>
                          <div class="col-6">
                            <p class="mb-1"><b>Moneda:</b> <?php echo $_POST['id_cripto'];?>
                          </div>
                          <div class="col-6">
                            <p class="mb-1"><b>Operacion:</b> <?php echo $_POST['type_trans']." ".$_POST['id_cripto'];?></div>
                          <div class="col-6">
                            <p class="mb-1"><b>Cantidad:</b> <?php echo $_POST['monto_cripto']." ".$_POST['id_cripto'];?></p>
                          </div>
                          <div class="col-6">
                            <p class="mb-1"><b>Pesos:</b> $ <?php echo $_POST['monto_pesos'];?></p>
                          </div>
                          <div class="col-6">
                            <p class="mb-1"><b>Wallet de orgien/destino:</b> <label id="wallet_od"></label></p>
                          </div>
                          <div class="col-6">
                            <p class="mb-2"><b>Cotización:</b> AR$/<?php echo $_POST['id_cripto']." $ ".$_POST['valor_cripto_cc'];?></p>
                          </div>
                          <div class="col-12">
                            <p>Monto final: $ <?php echo $_POST['monto_pesos'];?> </p>
                          </div>

                          <div class="form-check col-12 ml-3">
                            <input type="checkbox" class="form-check-input" id="declaracion">
                            <label class="form-check-label" for="declaracion">Al continuar declaro bajo juramento que mis fondos no provienen de planes y programas sociales Argentina</label>
                          </div>
                              
                        </div>
                    </div>
                  <div>
                  <div class="col-12 text-center">
                    <form id="confirmar">
                      <input type="submit" value="Finalizar" id="siguiente" class="btn-get-started  btn-siguiente mr-2 mt-sm-0 mt-3" style=""> 
                    </form>
                  </div>

                </div>
            </div>
        </div>
        <!-- Input auxileares-->
        <input type="text" id="type_trans" name="type_trans" value="<?php echo $_POST['type_trans'] ;?>" hidden>
        <input type="text" id="id_cripto" name="id_cripto" value="<?php echo $_POST['id_cripto'] ;?>" hidden>
        <input type="text" id="monto_cripto" name="monto_cripto" value="<?php echo $_POST['monto_cripto'] ;?>" hidden>
        <input type="text" id="valor_cripto_sc" name="valor_cripto_sc" value="<?php echo $_POST['valor_cripto_sc'] ;?>" hidden>
        <input type="text" id="valor_cripto_cc" name="valor_cripto_cc" value="<?php echo $_POST['valor_cripto_cc'] ;?>" hidden>
        <input type="text" id="comision" value="<?php echo $_POST['comision'] ;?>" hidden>
        <input type="text" id="dolar" value="<?php echo $_POST['dolar'] ;?>" hidden>
        <input type="text" id="monto_pesos" name="monto_pesos" value="<?php echo $_POST['monto_pesos'] ;?>"  hidden>
      
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
  <!-- <script src="..\..\controller\operation\calculadora_controller.js" type="module" ></script> -->
  <script src="..\..\controller\operation\trans_controller.js" type="module" ></script>

 
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

