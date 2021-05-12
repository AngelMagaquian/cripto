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
     
    <section id="banco">
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
          <div class="col-lg-10 col-12">
            <div class="row">
                <h5>Agregar banco</h5>
                <div class="col-12">
                    <form id="add_new_bank">
                        <div class="card">
                            <div class="card-body row justify-content-around">
                                <div class="col-md-5 col-12 mt-2">
                                
                                  <button class="btn-get-started-agg  btn-agg mr-2" type="button" data-toggle="modal" data-target="#exampleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                                    </svg>
                                  </button>

                                      
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header" style="color: #385BA2; background-color: rgba(0, 0, 0, 0.03);">
                                          <h5 class="modal-title" id="exampleModalLabel">Importante</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>El número de nómina de cada banco podés consultarlo haciendo click <a target="_blank" style="font-weight:bold" href="http://www.bcra.gob.ar/SistemasFinancierosYdePagos/Sistema_financiero_nomina_de_entidades.asp?bco=AAA00&tipo=1">AQUÍ</a></p>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                    <label><b>Número de nomina</b></label>
                                    <input type="text" class="form-control form-login"  placeholder="Agregue el número de nomina" id="id_bank" autocomplete="off" required>
                                    </br>
                                    <label><b>Nombre</b></label>
                                    <input type="text" id="bank_name" class="form-control form-login"  placeholder="Agregue el nombre del banco" autocomplete="off" required/>
                                </div>
                                <div class="col-11 mt-2" style="text-align: end;">
                                    <input type="submit" value="Agregar" class="btn-get-started-confirmar btn"/>
                                </div>
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

        
    </div>
      <!--FIN DE VISTA-->

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <?php
  include 'script.php';
  ?>

  <!--Controllers-->
  <script src="..\..\controller\admin\new_bank_admin_controller.js" type="module" ></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $( document ).ready(function() {
      $("#navOperaciones").addClass("activo")
      $(".submenu-operaciones").css("display", "block")
      $("#aggBanco").css("font-weight", "bold")
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

    

  </script>

</body>

</html>
<?php
  }
}
echo "No posee permisos para este sitio";
  ?>







