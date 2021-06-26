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
                      <div class="col-md-11 col-12">
                        <span style="color: #707070; font-size: 13px">Aquì puedes ver tus datos ingresados en el momento del registro.</span>
                      </div>
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
                      <div class="form-group col-md-5 col-12  mt-4 ">
                        <label for="exampleInputPassword1"><b>Teléfono*</b></label>
                        <input type="number" class="form-control form-login" id="phone" placeholder="Ingresá tu numero de teléfono" required>
                      </div>
                      <div class="form-group form-check col-md-5 col-12 mt-4 ">
                        <div class="mt-4 ml-4">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Declaro aceptar ser persona expuesta publicamente</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row m-0 justify-content-around">
                      <form id="update_pass">
                          <div class="m-0 row justify-content-around">
                            <div class="col-md-11 col-12">
                              <span style="color: #707070; font-size: 13px">Por seguridad vamos a necesitar que ingrese tu contraseña actual antes de ingresar otra</span>
                            </div>
                            <div class="form-group col-md-11 col-12 mt-4 ">
                              <label for="exampleInputPassword1"><b>Ingresá contraseña actual*</b></label>
                              <input type="password" class="form-control form-login" id="current_pass" placeholder="Ingresá contraseña actual" required autocomplete="off">
                              
                            </div>
                            <div class="form-group col-md-11 col-12 mt-4 ">
                              <label for="exampleInputPassword1"><b>Nueva contraseña*</b></label>
                              <input type="password" class="form-control form-login" id="first_pass" placeholder="Ingresá una contraseña" required autocomplete="off">
                              
                            </div>
                            <div class="form-group col-md-11 col-12 mt-4 ">
                              <label for="exampleInputPassword1"><b>Repetir contraseña*</b></label>
                              <input type="password" class="form-control form-login" id="pass" placeholder="Ingresá tu contraseña nuevamente" required autocomplete="off">
                              <label for="exampleInputPassword1" id="comfirm_pass"><b></b></label>
                            </div>

                            <div class="col-11 botonera">
                              <input type="submit" value="Cambiar" id="input_update_pass" class="btn-get-started-pass btn-pass float-right">
                            </div>
                            <div class="col-md-11 col-12"  style="font-size:14px;">
                              <p style="margin-bottom:5px"><b>Tu contraseña debe tener:</b></p>
                              <div style="font-size:13px; margin-bottom: 5px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16" style="color:red;">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                                <span>8 o más caracteres</span>
                              </div >
                              <div style="font-size:13px; margin-bottom: 5px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16" style="color:red;">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                                <span>Al menos una letra mayúscula</span>
                              </div>
                              <div style="font-size:13px; margin-bottom: 5px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16" style="color:red;">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                                <span>Al menos un número</span>
                              </div>
                            </div>
                            
                          </div>
                      </form>
                    </div>
                  </div>

                  <div class="tab-pane fade show active" id="foto" role="tabpanel" aria-labelledby="foto-tab">
                    <div class="row m-0 justify-content-around">
                            <div class="col-md-4 col-12 botonera" >
                              <form  id="from_photo">
                                  <label style="font-size: 14px; color: #274070;"><b>Foto de usuario</b></label>
                                  <br>
                                  <div class="container-img">
                                    <div class="img">
                                    </div>
                                  </div>
                                  
                                  <div style="min-width: 100%; text-align: end; margin-top:20px">
                                  <div class="input-file-container btn btn-sm btn-outline-light">  
                                    <input type="file" name="photo_dorso" class="input-file">
                                    <label tabindex="0" for="my-file" class="input-file-trigger mb-0 btn-sm">Nueva imagen</label>
                                  </div>
                                  <input type="submit" value="Cargar"  class="btn-get-started-pass btn-pass">
                                  </div>
                                  
                              </form>
                            </div>
                        
                            <div class="col-md-4 col-12 botonera" >
                              <form  id="from_photo_dni" >
                                  <label style="font-size: 14px; color: #274070;"><b>Foto de dni</b></label>
                                  <br>
                                  <div class="container-img">
                                    <div class="img">
                                    </div>
                                  </div>
                                  
                                  <div style="min-width: 100%; text-align: end; margin-top:20px">
                                  <div class="input-file-container btn btn-sm btn-outline-light">  
                                    <input type="file" name="photo_dorso" class="input-file">
                                    <label tabindex="0" for="my-file" class="input-file-trigger mb-0 btn-sm">Nueva imagen</label>
                                  </div>
                                  <input type="submit" value="Cargar"  class="btn-get-started-pass btn-pass">
                                  </div>
                              </form>
                            </div>
                            <div class="col-md-4 col-12 botonera" >
                              <form  id="from_photo_dorso" >
                                  <label style="font-size: 14px; color: #274070;"><b>Foto de dorso dni</b></label>
                                  <div class="container-img">
                                    <div class="img">
                                    </div>
                                  </div>
                                  
                                  <div style="min-width: 100%; text-align: end; margin-top:20px">
                                  <div class="input-file-container btn btn-sm btn-outline-light">  
                                    <input type="file" name="photo_dorso" class="input-file">
                                    <label tabindex="0" for="my-file" class="input-file-trigger mb-0 btn-sm">Nueva imagen</label>
                                  </div>
                                  <input type="submit" value="Cargar"  class="btn-get-started-pass btn-pass">
                                  </div>
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



 