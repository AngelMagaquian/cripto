
    <section id="perfil" style="display:none">
    
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
          <div class="col-md-10 col-12">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos personales</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Contraseña</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#foto" type="button" role="tab" aria-controls="foto" aria-selected="false">Foto</button>
            </li>
          </ul>

          
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                      <input type="password" class="form-control form-login" id="pass" placeholder="Ingresá tu contraseña nuevamente" required autocomplete="off">
                      <label for="exampleInputPassword1" id="comfirm_pass"><b></b></label>
                    </div>

                    <div class="col-11 botonera">
                      <input type="submit" value="Cambiar" id="input_update_pass" class="btn-get-started-pass btn-pass float-right">
                    </div>
                    
                  </div>
              </form>
            </div>
          </div>

          <div class="tab-pane fade" id="foto" role="tabpanel" aria-labelledby="foto-tab">
            <div class="row m-0 justify-content-around">
                    <div class="col-11 botonera" >
                      <form id="from_photo" enctype="multipart/form-data">
                          <label><b>Foto de usuario</b></label>
                          <br>
                          <input type="file" name="myfile"/>
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

 