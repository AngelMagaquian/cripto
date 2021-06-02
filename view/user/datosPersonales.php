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
      <section id="perfil">
        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
              <div class="col-md-10 col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos personales</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Contraseña</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#foto" type="button" role="tab" aria-controls="foto" aria-selected="false">Foto</button>
                  </li>
                </ul>

                
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row m-0 justify-content-around mb-4">
                      <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1" ><b>Nombre*</b></label>
                        <input type="text" class="form-control form-login" id="name_user"  disabled=»disabled» >
                      </div>
                      <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>Segundo nombre</b></label>
                        <input type="text" class="form-control form-login" id="user_middle_name"  disabled=»disabled»>
                      </div>

                      <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>Apellido*</b></label>
                        <input type="text" class="form-control form-login" id="user_last_name"  disabled=»disabled»>
                      </div>
                      <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>Segundo apellido</b></label>
                        <input type="text" class="form-control form-login" id="user_second_last_name"  disabled=»disabled»>
                      </div>

                      <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>DNI*</b></label>
                        <input type="text" class="form-control form-login" id="user_dni" placeholder="ingresá tu DNI" disabled=»disabled»>
                      </div>
                      <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>CUIL*</b></label>
                        <input type="text" class="form-control form-login" id="user_cuil" placeholder="ingresá tu CUIL" disabled=»disabled»>
                      </div>
                                
                      <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>Fecha de nacimiento*</b></label>
                        <input type="date" class="form-control form-login" id="user_birth_day" placeholder="ingresá tu fecha de nacimiento" disabled=»disabled»>
                      </div>
                      <div class="form-group col-md-5 col-12 mt-4">
                        <label for="exampleInputEmail1"><b>Email*</b></label>
                        <input type="email" class="form-control form-login" id="user_email" placeholder="ingresá tu email" disabled=»disabled»>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row m-0 justify-content-around">
                      <form id="update_pass">
                          <div class="m-0 row justify-content-around">
                            <div class="form-group col-md-5 col-12 mt-4 ">
                              <label for="exampleInputPassword1"><b>Nueva contraseña*</b></label>
                              <input type="password" class="form-control form-login" id="first_pass" placeholder="Ingresá una contraseña" required autocomplete="off">
                              
                            </div>
                            <div class="form-group col-md-5 col-12 mt-4 ">
                              <label for="exampleInputPassword1"><b>Repetir contraseña*</b></label>
                              <input type="text" class="form-control form-login" id="pass" placeholder="Ingresá tu contraseña nuevamente" required autocomplete="off">
                              <label for="exampleInputPassword1" id="comfirm_pass"><b></b></label>
                            </div>

                            <div class="col-11 botonera">
                              <input type="submit" value="Cambiar" id="input_update_pass" class="btn-get-started-pass btn-pass float-right">
                            </div>
                            
                          </div>
                      </form>
                    </div>
                  </div>

                  <div class="tab-pane fade show active" id="foto" role="tabpanel" aria-labelledby="foto-tab">
                    <div class="row m-0 justify-content-around">
                            <div class="col-11 botonera" >
                              <form action="foto/registrar.php" method="post" id="from_photo" enctype="multipart/form-data">
                                  <label style="font-size: 14px; color: #274070;"><b>Foto de usuario</b></label>
                                  <br>
                                  <div style="width:100px; height:100px; background-color: red;">
                                  </div>
                                  <input type="file" name="photo_face"/>
                                  <input type="text" id="table" name="table" value="photo_face" hidden/>
                                  <br>
                                  <input type="submit" value="Cargar"  class="btn-get-started-pass btn-pass float-right">
                                  <br>
                                  <figure>

                                  </figure>
                              </form>
                            </div>
                        
                    </div>      

                    <div class="row m-0 justify-content-around">
                            <div class="col-11 botonera" >
                              <form action="foto/registrar.php" method="post" id="from_photo_dni" enctype="multipart/form-data">
                                  <label style="font-size: 14px; color: #274070;"><b>Foto de dni</b></label>
                                  <br>
                                  <div style="width:100px; height:100px; background-color: red;">
                                  </div>
                                  <input type="file" name="photo_dni"/>
                                  <input type="text" id="table" name="table" value="photo_dni" hidden/>
                                  <br>
                                  <input type="submit" value="Cargar"  class="btn-get-started-pass btn-pass float-right">
                                  <br>
                                  <figure>

                                  </figure>
                              </form>
                            </div>
                        
                    </div>      

                    <div class="row m-0 justify-content-around">
                            <div class="col-11 botonera" >
                              <form action="foto/registrar.php" method="post" id="from_photo_dorso" enctype="multipart/form-data">
                                  <label style="font-size: 14px; color: #274070;"><b>Foto de dorso dni</b></label>
                                  <br>
                                  <div style="width:100px; height:100px; background-color: red;">
                                  </div>
                                  <input type="file" name="photo_dorso"/>
                                  <input type="text" id="table" name="table" value="photo_dorso" hidden/>
                                  <br>
                                  <input type="submit" value="Cargar"  class="btn-get-started-pass btn-pass float-right">
                                  <br>
                                  <figure>

                                  </figure>
                              </form>
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
  <script src="..\..\controller\user\controller_user.js" type="module" ></script> <!--no eliminar-->
  <script src="..\..\controller\user\update_user_info_controller.js" type="module" ></script> <!--no eliminar-->

  
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $( document ).ready(function() {
      $("#navPerfil").addClass("activo")
      $(".submenu-personal").css("display", "block")
      $("#datosPersonales").css("font-weight", "bold")
      $("#navUsuario").addClass("no-activo") 
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



 