<section id="new_bank_section">
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
          <div class="col-lg-10 col-12">
            <div class="row">
                <div class="col-md-6 col-12 mt-md-0 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <span id="new_bank">Agregar nueva cuenta bancaria</span>
                            
                        </div>
                        <div class="card-body row justify-content-around">
                            <div class="col-md-5 col-12 mt-">
                                <label><b>Seleccione un banco</b></label>
                                <select class="form-control form-login" id="new_bank_select"></select>
                            </div>
                            <div class="col-md-5 col-12 mt-2">
                                <label><b>CUIL</b></label>
                                <input type="text" class="form-control form-login" id="new_bank_CUIL" autocomplete="off" requiered>
                            </div>

                            <div class="col-md-5 col-12 mt-2">
                                <label><b>Tipo de cuenta</b></label>
                                <select class="form-control form-login" id="new_type_account"> </select>
                            </div>
                            <div class="col-md-5 col-12 mt-2">
                                <label><b>Tipo de moneda</b></label>
                                <select class="form-control form-login" id="new_type_currency">
                                    <option value="1">PESOS</option>
                                    <option value="2">DOLARES</option>
                                </select>
                            </div>

                            <div class="col-md-5 col-12 mt-2">
                                <label><b>CBU</b></label>
                                <input type="text" class="form-control form-login" id="new_CBU" autocomplete="off" requiered>
                            </div>
                            <div class="col-md-5 col-12 mt-2">
                                <label><b>Nro de cuenta</b></label>
                                <input type="text" class="form-control form-login" id="new_account_number" autocomplete="off" requiered>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 botonera">
                    <form id="insert_new_bank">
                        <input type="submit" value = "Agregar" class="btn-get-started-agg  btn-agg mr-2"/>
                    </form>
                    
                </div>
              
            </div>
              
            </div>
            </div>
            
          </div>

          </div>
        </div>
    </div>
</section>
