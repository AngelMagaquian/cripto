<script src="..\..\controller\wallet_cripto\wallet_cripto_controller.js" type="module" ></script>
<section id="wallet" style="display:none">

<div class="container-fluid">
    <div class="row justify-content-center mt-4">

        <div class="col-11">   
            <div class="row">
                <h5>Mis wallet</h5>
            </div>
            <div class="card">
                <div class="card-body mt-3">
                <div class="row justify-content-between">

                    <form id="add_wallet" class="col-12"> <!--cambiar nombre dsp-->
                        
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <input id= "id_cripto_wallet" type="text" placeholder="Ingresar código de wallet" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="col-md-3 col-12">
                                <input id="description_cripto_wallet" type="text" placeholder="Ingresar alias de wallet" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="col-md-3 col-12">
                                <select id="divisa_wallet" style="width:100%"></select>
                            </div>
                                
                            
                            <div class="col-2">
                                <input type="submit" value="Agregar" class="btn-get-started-filtro btn-filtro">
                            </div>
                                
                        </div>
                    </form>
                     
                </div>

                <div class="row mt-4">
                    <table id="walletTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id wallet</th>
                                <th>Criptomoneda</th>      
                                <th>Alias</th>          
                            </tr>
                        </thead>
                        <tbody id="wallet_tbody">
                            
                        </tbody>
                    </table>

                    <form id="" class=" col-12 mt-md-0 mt-sm-4 mt-4"> <!-- falta nombre-->
                        <div class="row">
                            <div class="col-12" style="text-align: end;">
                                <input type="submit" value="Nueva wallet" class="btn-get-started-wallet btn-wallet">
                            </div>
                        </div>
                    </form>  
                    </div>
                    
                             
                    
                </div>
            </div>

        </div>

    </div>
</div>

</section>

