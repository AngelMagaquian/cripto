import {post_data} from "../app/post_data.js";
import {get_data} from "../app/get_data.js";
import {number_format} from "../app/number_format.js";
$(function(){
    console.log('Trans Controller');


    $( document ).ready(function() {
        $('#siguiente').attr('disabled', true);
       /* 
        //funciones para traer los datos del usuario
        get_data('../../model/operation/deposit_data.php').then(response => {
            // En este punto recibimos la respuesta.
    
            data = JSON.parse(response); 
            
            table(data);
        })
        .catch(error => {
            console.log('error: '+error);
        }); */

        
        let type_trans = $('#type_trans').val();
        let cripto = $('#id_cripto').val();
        let monto_cripto = $('#monto_cripto').val();
        let valor_cripto_sc = $('#valor_cripto_sc').val();
        let valor_cripto_cc = $('#valor_cripto_cc').val();
        let comision = $('#comision').val();
        let monto_pesos = $('#monto_pesos').val();
        let dolar = $('#dolar').val();
    
        get_wallet(cripto);
        get_saldo();
       
    
    });


    $('#confirmar').submit(function(e){
        e.preventDefault();
        /*Antes de los controlles, se pregunta si esta seguro*/
        var option = confirm('¿Desea confirmar la operación?');
        if(option==true){
            /*Ver si es una compra o una venta para verificar saldo*/
            if($('#type_trans').val() == 'compra'){
                var saldo_control =saldo_controller(parseFloat($('#wallet_user_input').val()),parseFloat($('#monto_pesos').val()));
                if(saldo_control==true){
                    /*Ahora controlar que tenga una wallet*/
                    var wallet_control=wallet_controller();
                    if(wallet_control == true){
                        get_data('../../model/transaction/trans_controller.php').then(response =>{
                            let data = JSON.parse(response);
                            if(data.email == 1 && data.user){
                                const postData={
                                    id_wallet: $('#select_wallet_cripto').val(),
                                    cant_pesos: parseInt($('#monto_pesos').val()),
                                    cant_cripto: parseInt($('#monto_cripto').val()),
                                    cripto : $('#id_cripto').val(),
                                    dolar_value : $('#dolar').val() ,
                                    cripto_price_cc : $('#valor_cripto_cc').val()  ,
                                    cripto_price_sc :$('#valor_cripto_sc').val()  ,
                                    commission : $('#comision').val() 
                                }
                                $.post('../../model/transaction/new_compra.php', postData).then(response => {
                                    console.log(response);
                                    if(response == 1){
                                        alert('Solicitud de compra realizada con éxito, aguarde confirmación del administrador');
                                    }else{
                                        alert('Ocurrio un error, intentelo mas tarde');
                                    }
                                }) 
                            }else{
                                alert('Falta verificar sus datos de identidad antes de poder operar');
                            }
                            
                        })
                    }else{
                        alert('Por favor seleccione una wallet para poder operar, en caso de no tener una, solicitela al administrador');
                    }
                }else{
                    alert('No poseé fondos suficientes para efectuar la operación, puede añadir mas fondos haciendo un deposito');
                }
            }else{
                /*todo en caso de que sea una venta */
                var wallet_control = wallet_controller();
                if(wallet_control == true){
                    get_data('../../model/transaction/trans_controller.php').then(response =>{
                        let data = JSON.parse(response);
                        if(data.email == 1 && data.user){
                            const postData={
                                id_wallet: $('#select_wallet_cripto').val(),
                                cant_pesos: parseInt($('#monto_pesos').val()),
                                cant_cripto: parseInt($('#monto_cripto').val()),
                                cripto : $('#id_cripto').val(),
                                dolar_value : $('#dolar').val() ,
                                cripto_price_cc : $('#valor_cripto_cc').val()  ,
                                cripto_price_sc :$('#valor_cripto_sc').val()  ,
                                commission : $('#comision').val() 
                            }
                            $.post('../../model/transaction/new_venta.php', postData).then(response => {
                                console.log(response);
                                if(response == 1){
                                    alert('Solicitud de venta realizada con éxito, aguarde confirmación del administrador');
                                }else{
                                    alert('Ocurrio un error, intentelo mas tarde');
                                }
                            }) 
                        }else{
                            alert('Falta verificar sus datos de identidad antes de poder operar');
                        }
                        
                    })
                }else{
                    alert('Por favor seleccione una wallet para poder operar, en caso de no tener una, solicitela al administrador');
                }

            }
        }else{
            alert('Operación cancelada');
        }
    })


    function saldo_controller(saldo, compra){
        if(saldo< compra){
            return false;
        }else{
            return true;
        }
    }

    function wallet_controller(){
        console.log($('#select_wallet_cripto').val());
        if($('#select_wallet_cripto').val() == 'dafault_select'){
            return false;
        }else{
            return true;
        }
    }

    

    










    function get_saldo(){
        get_data('../../model/user/balance_wallet_user.php').then(response =>{
            console.log(response);
            let data = JSON.parse(response);
            console.log(data);
            $('#wallet_user_input').val(number_format(data.balance,2));
        })
        .catch(error =>{    
            console.log(error);
        })
    }

    function get_wallet(cripto){
        post_data('../../model/wallet_cripto/get_wallet_cripto.php',cripto).then(response =>{
            console.log(response);
            if(response !=0){
                let data = JSON.parse(response);
             
                let template =``;
                template +=`
                <option value="dafault_select">Seleccione una wallet</option>
                `;

                data.forEach(dato => {
                 
                    template +=`
                        <option value="${dato.id_wallet_cripto}">${dato.wallet_name} - ${dato.id_wallet_cripto}</option>
                    `;
                });
                $('#select_wallet_cripto').html(template);
               
            }else{
                
            }
        })
        .catch(error =>{    
            console.log(error);
        })
    }

    $('#select_wallet_cripto').change(function(){
        $('#wallet_od').html($('#select_wallet_cripto option:selected').html());
    })


    $('#declaracion').change(function(){
        if( $('#declaracion').is(':checked') ) {
            $('#siguiente').attr('disabled', false);
        }else{
            $('#siguiente').attr('disabled', true);
        }
    })

   

});