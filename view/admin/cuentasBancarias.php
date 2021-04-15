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
                            <form id="account_form" action="">
                                <div class="row justify-content-around">
                                    <div class="buscador col-11 mt-2 mb-2">

                                        <input type="submit" value="Buscar"/>

                                        <input id="dni_search" type="text" value="" placeholder="Buscar usuario por DNI"> 
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Nombre</b></label>
                                        <input id="first_name" type="text" class="form-control form-login"  value="valor de prueba"id="name" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Segundo nombre</b></label>
                                        <input id="middle_name" type="text" class="form-control form-login" id="CUIL" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Apellido</b></label>
                                        <input id="last_name"  type="text" class="form-control form-login" id="type_account" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>Segundo apellido</b></label>
                                        <input id="second_last_name" type="text" class="form-control form-login" id="type_currency" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>DNI</b></label>
                                        <input id="dni"  type="text" class="form-control form-login" id="CBU" disabled=»disabled»>
                                    </div>
                                    <div class="col-md-5 col-12 mt-2">
                                        <label><b>CUIL</b></label>
                                        <input id="cuil"  type="text" class="form-control form-login" id="account_number" disabled=»disabled»>
                                    </div>
                                    <div class=" col-11 mt-2">
                                        <label><b>Email</b></label>
                                        <input id="email" type="text" class="form-control form-login" id="account_number" disabled=»disabled»>
                                    </div>
                                </div>
                            </form>       
                        </div>
                    </div>
                    <div class="card mt-4 mb-2">
                        <div class="card-body">
                            <form  action="">
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
                                            <tbody id="account_tbody">
                                                <tr>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>
                                                        <button class="btn btn-success" id="conf_yes">si</button>
                                                        <button class="btn btn-danger" id="conf_no">no</button>
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
