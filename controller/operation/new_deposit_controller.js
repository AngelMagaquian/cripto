import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('New Deposit Controller');
    

    $( document ).ready(function() {
        //funciones para traer los datos del usuario
        new_deposit_default();
    });

    $('#importe').keyup(function(){
        
        if($('#importe').val() == ''){
             var monto = 0;
        }else{
            var monto =parseFloat($('#importe').val()) ;
        }
        var saldo =parseFloat($('#saldo_actual').val()) ;
        $('#saldo_proyectado').val('$'+(monto+saldo));
    })

    $('#new_deposit').submit(function(e){
        e.preventDefault();
        if( $('#bank_account').val() == 0){
            alert('Por favor seleccione una cuenta de banco, si aún no agrego ninguna puede hacerlo en Perfil->Datos bancarios->Agregar cuenta');
        }else{
            get_data('../../model/transaction/trans_controller.php').then(response =>{
                if(response==1){
                    let bank_account = $('#bank_account').val();
                    post_data('../../model/transaction/account_controller.php', bank_account ).then(response =>{
                        console.log(response);
                        if(response == 1){
                            var opcion = confirm('¿Desea confirmar la operación?');
                            if (opcion == true) {
                                const postData ={
                                    CBU: $('#bank_account').val(),
                                    importe: parseFloat($('#importe').val())
                                }
                                $.post('../../model/transaction/new_deposit.php', postData).then(response => {
                                    if(response == 1){
                                        alertify.alert("<p class='text-center'>Solicitud de deposito enviada, puede consultar los datos en Mis operaciones->Depositos </p>", function () {}).set({title:"Depositos"});  
                                        new_deposit_default();
                                    }else{
                                        alertify.alert("<p class='text-center'>Error al cargar los datos:"+response+"</p>", function () {}).set({title:"Depositos"});  
                                        new_deposit_default();
                                    }
                                })
                            }else{
                                new_deposit_default();
                            }
                            
                        }else{
                            alertify.alert("<p class='text-center'>Falta la confirmación de su cuenta bancaria para poder operar, seleccione otra o espere a que sea confirmada.</p>", function () {}).set({title:"Depositos"});
                            new_deposit_default();
                        }
    
                    }).catch(error=>{
                        console.log(error);
                    })
                }else{
                    new_deposit_default();
                }
            }).catch(error =>{
                console.log(error);
            })
                
            
        }
        
    })
   



    function get_saldo(){
        get_data('../../model/user/balance_wallet_user.php').then(response => {
            // En este punto recibimos la respuesta.
   
            let data = JSON.parse(response); 
            

            $('#saldo_actual').val(data.balance);
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }

    function select_bank_account(){
        get_data('../../model/datos_bancarios/get_account.php').then(response => {
            // En este punto recibimos la respuesta.

            let data = JSON.parse(response); 
         
            let template =`<option value="0">Mis Cuentas</option>`;
            
                data.forEach(dato => {
                    if(dato.check_account == '1'){
                    template+=`
                        <option value="${dato.CBU}">${dato.bank} - ${dato.CBU}</option>
                    `;
                    }
                }); 
            
            

            $('#bank_account').html(template);
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }

    function new_deposit_default(){
        get_saldo();
        select_bank_account();
        $('#importe').val('');
        $('#saldo_proyectado').val('');
    }



    

   

});