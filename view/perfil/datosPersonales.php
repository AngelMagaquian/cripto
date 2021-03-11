
    <section id="perfil" style="display:none">
    
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
          <div class="col-10">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos personales</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Otros</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row m-0 justify-content-around">
              <div class="form-group col-5">
                <label for="exampleInputEmail1" ><b>Nombre*</b></label>
                <input type="text" class="form-control form-login" id="name_user"  disabled=»disabled» >
              </div>
              <div class="form-group col-5">
                <label for="exampleInputEmail1"><b>Segundo nombre</b></label>
                <input type="text" class="form-control form-login" id="middle_name"  disabled=»disabled»>
              </div>

              <div class="form-group col-5 mt-4">
                <label for="exampleInputEmail1"><b>Apellido*</b></label>
                <input type="text" class="form-control form-login" id="last_name"  disabled=»disabled»>
              </div>
              <div class="form-group col-5 mt-4">
                <label for="exampleInputEmail1"><b>Segundo apellido</b></label>
                <input type="text" class="form-control form-login" id="second_last_name"  disabled=»disabled»>
              </div>

              <div class="form-group col-5 mt-4">
                <label for="exampleInputEmail1"><b>DNI*</b></label>
                <input type="text" class="form-control form-login" id="dni" placeholder="ingresá tu DNI" disabled=»disabled»>
              </div>
              <div class="form-group col-5 mt-4">
                <label for="exampleInputEmail1"><b>CUIL*</b></label>
                <input type="text" class="form-control form-login" id="cuil" placeholder="ingresá tu CUIL" disabled=»disabled»>
              </div>
                        
              <div class="form-group col-5 mt-4">
                <label for="exampleInputEmail1"><b>Fecha de nacimiento*</b></label>
                <input type="date" class="form-control form-login" id="birth_day" placeholder="ingresá tu fecha de nacimiento" disabled=»disabled»>
              </div>
              <div class="form-group col-5 mt-4">
                <label for="exampleInputEmail1"><b>Email*</b></label>
                <input type="email" class="form-control form-login" id="email" placeholder="ingresá tu email" disabled=»disabled»>
              </div>

              <form id="update_pass">
                <div class="form-group col-5 mt-4 ">
                  <label for="exampleInputPassword1"><b>Cambiar contraseña</b></label> <br>
                  <label for="exampleInputPassword1"><b>Nueva contraseña*</b></label>
                  <input type="password" class="form-control form-login" id="first_pass" placeholder="Ingresá una contraseña" required autocomplete="off">
                  
                </div>
                <div class="form-group col-5 mt-4 ">
                <br>
                  <label for="exampleInputPassword1"><b>Repetir contraseña*</b></label>
                  <input type="password" class="form-control form-login" id="pass" placeholder="Ingresá tu contraseña nuevamente" required autocomplete="off">
                  <label for="exampleInputPassword1" id="comfirm_pass"><b></b></label>
                </div>
                <input type="submit" value="Cambiar contraseña" id="input_update_pass">
              </form>

              <div class="col-11 botonera">
              <button type="button" class="btn btn-success">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                  </svg>
                </button>

                <button type="button" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
                </button>
              
                

              </div>
            </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
          </div>

          </div>
        
        
        </div>
    </div>

</section>

 