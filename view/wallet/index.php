<script src="..\..\controller\wallet_cripto\wallet_cripto_controller.js" type="module" ></script>
<section id="wallet" style="display:none">

<div class="container-fluid">
    <div class="row justify-content-center mt-4">

        <div class="col-11">   

            <div class="card">
                <div class="card-body mt-3">
                <div class="row justify-content-between">
                    <h5>Mis wallet</h5>
                    <form id="add_wallet" class="col-lg-4 col-md-6 col-sm-12"> <!--cambiar nombre dsp-->
                        
                        <div class="row">
                            
                            <label>Agregar nueva wallet</label>
                            <div class="col-md-6 col-sm-6 col-8">
                                <input id= "id_cripto_wallet" type="text" placeholder="Ingresar código de wallet" class="form-control" autocomplete="off" required>
                                <br>
                                <input id="description_cripto_wallet" type="text" placeholder="Ingresar alias de wallet" class="form-control" autocomplete="off" required>
                                <br>
                                <select id="divisa_wallet"></select>
                            </div>
                            <div class="col-2">
                                <input type="submit" value="Agregar" class="btn-get-started-filtro btn-filtro">
                            </div>
                                
                        </div>
                    </form>
                    <form id="" class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-sm-4 mt-4"> <!-- falta nombre-->
                        <div class="row">
                            <div class="col-12" style="text-align: end;">
                                <input type="submit" value="Nueva wallet" class="btn-get-started-wallet btn-wallet">
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
                    </div>
                    
                             
                    
                </div>
            </div>

        </div>

    </div>
</div>

</section>

