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
                                    <form id="user_search_wc">
                                        <div class="row justify-content-around">
                                            <div class="buscador col-11 mt-2 mb-2">
                                                <!--<button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                    </svg>
                                                </button>-->
                                            
                                                    <input type="submit"  value="Buscar"/>
                                                    <input type="text" id="dni_search_wc" placeholder="Buscar usuario por DNI" /> 
                                            
                                                
                                            </div>
                                        </div>

                                        <div class="row justify-content-around">
                                            <div class="col-md-5 col-12 mt-2">
                                                <label><b>Nombre</b></label>
                                                <input type="text" class="form-control form-login" id="name_wc" disabled=»disabled»>
                                            </div>
                                            <div class="col-md-5 col-12 mt-2">
                                                <label><b>Segundo nombre</b></label>
                                                <input type="text" class="form-control form-login" id="middle_name_wc" disabled=»disabled»>
                                            </div>
                                            <div class="col-md-5 col-12 mt-2">
                                                <label><b>Apellido</b></label>
                                                <input type="text" class="form-control form-login" id="last_name_wc" disabled=»disabled»>
                                            </div>
                                            <div class="col-md-5 col-12 mt-2">
                                                <label><b>Segundo apellido</b></label>
                                                <input type="text" class="form-control form-login" id="second_last_name_wc" disabled=»disabled»>
                                            </div>
                                            <div class="col-md-5 col-12 mt-2">
                                                <label><b>DNI</b></label>
                                                <input type="text" class="form-control form-login" id="DNI_wc" disabled=»disabled»>
                                            </div>
                                            <div class="col-md-5 col-12 mt-2">
                                                <label><b>CUIL</b></label>
                                                <input type="text" class="form-control form-login" id="CUIL_wc" disabled=»disabled»>
                                            </div>
                                            <div class=" col-11 mt-2">
                                                <label><b>Email</b></label>
                                                <input type="text" class="form-control form-login" id="email_wc" disabled=»disabled»>
                                            </div>
                                        </div>
                                    </form>       
                                </div>
                            </div>
                            <div class="card mt-4 mb-2">
                                <div class="card-body">

                                    <form id="add_wallet" action="">
                                        <div class="row justify-content-around">
                                            <div class="col-5">
                                                <label for="">Id wallet</label>
                                                
                                                        </br>
                                                        <input type="text" id="wallet_id" class="form-control form-login" placeholder="Escribir el código de la wallet" autocomplete="off" required/>
                                                        </br>
                                                        <label>Descripción de wallet</label>
                                                        <input type="text" id="description_cripto_wallet" class="form-control form-login" placeholder="Escribir la descripción de la wallet" required/>
                                                    
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

  <!--Controllers-->
  <script src="..\..\..\controller\admin\user_info_controller_admin.js" type="module" ></script>
  <script src="..\..\..\controller\admin\new_wallet_controller_admin.js" type="module" ></script>

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
    

  </script>

</body>

</html>
<?php
  }
}
echo "No posee permisos para este sitio";
  ?>







