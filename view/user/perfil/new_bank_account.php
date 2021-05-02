
<section id="bancos" >
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
          <div class="col-lg-10 col-12">
            <div class="row">
                <div class="col-md-6 col-12" >
                    <form id="new_account_user">
                    <div class="" >
                        <label>Seleccionar Banco</label>
                        <Select id="select_bank"> 
                            <!--Option de bancos-->
                        </Select>
                    </div>

                    <div class="" >
                        <label>Seleccionar Tipo de cuenta</label>
                        <Select id="select_type_account"> 
                            <!--Option de cuentas-->
                        </Select>
                    </div>

                    <div class="">
                        <label>CBU</label>
                        <input type="text" placeholder="Ingrese su CBU" class="" id="new_cbu" autocomplete="off" pattern="[0-9]+" required />
                    </div>

                    <div class="">
                        <label>Alias</label>
                        <input type="text" placeholder="Ingrese su alias" class="" id="alias" autocomplete="off"  required />
                    </div>

                    <div class="">
                        <label>Número de cuenta</label>
                        <input type="text" placeholder="Ingrese su número de cuenta" class="" id="new_num_acc" autocomplete="off" pattern="[0-9]+" required />
                    </div>
                        <input type="submit" value="Agregar" class=""/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script><!--no eliminar-->
<script src="..\..\controller\user\new_account_controller.js" type="module" ></script> <!--no eliminar-->



