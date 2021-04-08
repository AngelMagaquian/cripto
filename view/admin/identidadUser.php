<script src="..\..\controller\admin\user_check_controller_admin.js" type="module" ></script>
<section id="identidad" style="display:none">
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
          <div class="col-lg-10 col-12">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-between">
                        <h5>identidad de usuario</h5>
                    </div>
                    <div class="card mb-2">
                        <div class="card-body">
                            <form id="search_user_uc">
                                <div class="row justify-content-around">
                                    <div class="buscador col-11 mt-2 mb-2">
                                        
                                        <!--<button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                            </svg>
                                        </button>-->
                                        <input type="submit" value="Buscar" />
                                        <input type="text" id="dni_search_uc" placeholder="Buscar usuario por DNI"/> 
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Nombre</b></label>
                                        <input type="text" class="form-control form-login" id="name_uc" disabled=»disabled» />
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Segundo nombre</b></label>
                                        
                                        <input type="text" class="form-control form-login" id="middle_name_uc" disabled=»disabled» />
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Apellido</b></label>
                                        
                                        <input type="text" class="form-control form-login" id="last_name_uc" disabled=»disabled» />
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Segundo apellido</b></label>
                                        <input type="text" class="form-control form-login" id="second_last_name_uc" disabled=»disabled» />
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>DNI</b></label>
                                        <input type="text" class="form-control form-login" id="DNI_uc" disabled=»disabled» />
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>CUIL</b></label>
                                        <input type="text" class="form-control form-login" id="CUIL_uc" disabled=»disabled» />
                                    </div>
                                    <div class=" col-11 mt-2">
                                        <label><b>Email</b></label>
                                        <input type="text" class="form-control form-login" id="email_uc" disabled=»disabled» />
                                    </div>
                                </div>

                            </form>

                            <div class="row justify-content-around">
                                <div class=" col-11 mt-2 fotoPerfil">
                                    <label><b>Foto de perfil</b></label>
                                    <br>
                                    <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                </div>
                            </div> 

                            <div class="row justify-content-around">
                                <div class="col-11 mt-2">
                                    <form id="confirm_user">
                                        <input type="submit" value="Confirmar" class="btn-get-started-confirmar btn"/>
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

</section>
