<section id="cuentas" style="display:none">
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
        <div class="col-lg-10 col-12">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-between">
                        <h5>Confirme la cuenta de banco asociada al usuario</h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                                <div class="row justify-content-around">
                                    <div class="buscador col-11 mt-2 mb-2">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                            </svg>
                                        </button>
                                        <input type="text" value="" placeholder="Buscar usuario por DNI"> 
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Nombre</b></label>
                                        <input type="text" class="form-control form-login"  value="valor de prueba"id="name" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Segundo nombre</b></label>
                                        <input type="text" class="form-control form-login" id="CUIL" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Apellido</b></label>
                                        <input type="text" class="form-control form-login" id="type_account" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Segundo apellido</b></label>
                                        <input type="text" class="form-control form-login" id="type_currency" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>DNI</b></label>
                                        <input type="text" class="form-control form-login" id="CBU" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>CUIL</b></label>
                                        <input type="text" class="form-control form-login" id="account_number" disabled=»disabled»>
                                    </div>
                                    <div class=" col-11 mt-2">
                                        <label><b>Email</b></label>
                                        <input type="text" class="form-control form-login" id="account_number" disabled=»disabled»>
                                    </div>
                                </div>
                            </form>       
                        </div>
                    </div>
                    <div class="card mt-4 mb-2">
                        <div class="card-body">
                            <form action="">
                                <div class="row justify-content-around">
                                    <div class="col-11 mt-2">
                                        <table id="cuentasTable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Banco</th>
                                                    <th>CBU</th>
                                                    <th style="width: 20%"></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>
                                                        <button class="btn btn-success">si</button>
                                                        <button class="btn btn-danger">no</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
