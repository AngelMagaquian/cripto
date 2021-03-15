<script src="..\..\controller\operation\operation_controller.js" type="module" ></script>
<section id="misOperaciones" style="display:none">
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-11">   
                <div class="card">
                    <div class="card-body mt-3 ">
                        <div class="row justify-content-around ">
                            <div class="col-2">
                                <label for=""><b>Desde</b></label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-2">
                                <label for=""><b>Hasta</b></label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-2">
                                <label for=""><b>Operación</b></label>
                                <select name="operation" id="operation" class="form-select">
                                    <option value="1">Compra</option>
                                    <option value="2">Venta</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for=""><b>Divisa</b></label>
                                <select name="" id="" class="form-select">
                                    <option value="">uno</option>
                                    <option value="">dos</option>
                                    <option value="">tres</option>
                                </select>
                            </div>
                            <div class="col-2 align-self-center">
                                <a class="btn-get-started-filtro btn-filtro">Aplicar filtro</a>
                            </div>
                        </div>

                        <div class="row mt-4">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Tipo de operación</th>
                                    <th>Tipo de divisa</th>
                                    <th>Monto AR$</th>
                                    <th>Monto en Criptomoneda</th>
                                    <th>Banco</th>
                                    <th>CBU</th>
                                    <th>Wallet</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="operation_tbody">
                                
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
</section>

 