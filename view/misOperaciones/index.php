<script src="..\..\controller\operation\operation_controller.js" type="module" ></script>
<section id="misOperaciones" style="display:none">
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-11">   
                <div class="card">
                    <div class="card-body mt-3 ">
                    
                        <div class="row justify-content-around ">
                            <form id="date_form" >
                                <div class="col-2">
                                    <label for=""><b>Desde</b></label>
                                    <input id="desde" type="date" class="form-control" value='<?php echo date("Y-m-d");?>'>
                                </div>
                                <div class="col-2">
                                    <label for=""><b>Hasta</b></label>
                                    <input id="hasta" type="date" class="form-control" value='<?php echo date("Y-m-d");?>'>
                                </div>
                                <input type="submit" value="Filtro de fecha"/>
                            </form>
                            <form id="operation_form">
                                <div class="col-2">
                                    <label for=""><b>Operación</b></label>
                                        <br>
                                        <input type="checkbox" id="op1" name="op1" value="compra">
                                        <label for="op1"> Compra</label><br>
                                      
                                        <input type="checkbox" id="op2" name="op2" value="venta">
                                        <label for="op2"> Venta</label><br>
                                        
                                    <input type="submit" value="Filtro de operación"/>
                                </div>
                            </form>
                            <form id="cripto_form">
                                <div class="col-2">
                                    <label for=""><b>Divisa</b></label>
                                    <select name="" id="divisa" class="form-select">
                                    
                                    </select>
                                    <input type="submit" value="Filtro de divisa"/>
                                </div>
                                <div class="col-2 align-self-center">
                                    <a class="btn-get-started-filtro btn-filtro">Aplicar filtro</a>
                                </div>
                            </form>
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

 