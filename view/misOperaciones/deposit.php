<section id="" style="display:BLOCK">
<!--CAMBIARLE DISPLAY:BLOCK-->
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-11">   
                <div class="row">
                    <h5>Transacciones</h5>
                </div>
                <div class="card">
                    <div class="card-body mt-3 ">
                        <div class="row mt-4">
                        <table id="operacionesTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id deposito</th>
                                    <th>CBU</th>
                                    <th>Banco</th>
                                    <th>Fecha</th>
                                    <th>Pesos</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody id="deposit_tbody">
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
</section>
<script src="..\..\controller\operation\deposit_controller.js" type="module" ></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
