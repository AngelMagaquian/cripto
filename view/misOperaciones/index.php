<script src="..\..\controller\operation\operation_controller.js" type="module" ></script>
<section id="misOperaciones" style="display:none">
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-11">   
                <div class="row">
                    <h5>Mis Operaciones</h5>
                </div>
                <div class="card">
                    <div class="card-body mt-3 ">
                    
                        <div class="row">
                            <form id="date_form" class="col-lg-4 col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <label for=""><b>Desde</b></label>
                                        <input id="desde" type="date" class="form-control" value='<?php echo date("Y-m-d");?>'>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <label for=""><b>Hasta</b></label>
                                        <input id="hasta" type="date" class="form-control" value='<?php echo date("Y-m-d");?>'>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <input type="submit" value="Filtro de fecha" class="btn-get-started-filtro btn-filtro"/>
                                    </div>
                                    
                                </div>
                            </form>
                            <form id="cripto_form" class="col-lg-3 col-md-6 col-sm-6 col-12 mt-md-0 mt-sm-4 mt-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label for=""><b>Divisa</b></label>
                                        <select name="" id="divisa" class="form-select">
                                        
                                        </select>
                                        
                                    </div>
                                    <div class="col-4 align-self-center mt-3">
                                        <input type="submit" value="Filtro de divisa" class="btn-get-started-filtro btn-filtro"/>
                                    </div>
                                </div>
                            </form>

                            <form id="operation_form " class="col-lg-4 col-md-6 col-sm-6 col-12 mt-lg-0 mt-md-4  mt-sm-4 mt-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label for=""><b>Operación</b></label>
                                        <br>
                                        <div>
                                            
                                        </div>
                                        <input type="checkbox" id="op1" name="op1" value="compra">
                                        <label for="op1" style="margin-right:18px"> Compra</label>
                                        
                                        <input type="checkbox" id="op2" name="op2" value="venta" class="ml-10">
                                        <label for="op2"> Venta</label>    
                                    </div>
                                    <div class="col-4 mt-3">  
                                        <input type="submit" value="Filtro de operación" class="btn-get-started-filtro btn-filtro"/>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    
                        

                        <div class="row mt-4">
                        <table id="operacionesTable" class="table table-striped table-bordered" style="width:100%">
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

 