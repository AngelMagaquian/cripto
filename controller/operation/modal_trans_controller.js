import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('modal trans Controller');
    var saldo_controller = false;
    var wallet_controller = false;
    var compra_controller =false;
    $('#modal_show_button').click(function(e){
        e.preventDefault();
        console.log('Modal');
        //limpiar sector de información en caso de que le falte algo al usuario
        let template =`<span id="span_info"></span>`;
        $('#span_info').html(template);

        //traigo el saldo del usuario
        wallet_user();
         
        //limpiar select
        $('#select_wallet_cripto').html('');
        let cripto = $('#cripto_select').val();
        wallet_cripto(cripto);

    /* 
        $('input[name=operation]').change(function() {
        
            if (this.value == '1') {
                compra_controller = true;
            }
            else if (this.value == '2') {
                compra_controller = false;
            }
        }); */



        

    });
        
        
 

    $('#finalizar').submit(function(e){
        e.preventDefault();
        console.log('Finalizar');
        if(saldo_controller == true && wallet_controller == true){
            trans_controller();
        }else{
            if(saldo_controller == false && wallet_controller == false){
                let template =`
                <span id="span_info">
                Usted no tiene suficientes fondos para realizar la transacción y tampoco una wallet para esta criptomoneda.
                </span>
                `;
                $('#span_info').html(template);
            }else{
                if(saldo_controller == false){
                    let template =`
                    <span id="span_info">
                    Usted no tiene suficientes fondos para realizar la transacción.
                    </span>
                    `;
                    $('#span_info').html(template);
                }else{
                    if(wallet_controller == false){
                        let template =`
                        <span id="span_info">
                        Usted no tiene una wallet para esta criptomoneda.
                        </span>
                        `;
                        $('#span_info').html(template);
                    }
                }
            }
        }
        
    })
    function trans_controller(){
        /*Chequear=
            -Identidad del usuario en 1
            -Email en 1
        */
       
        get_data('../../model/transaction/trans_controller.php').then(response =>{
            if(response == 1){
                var opcion = confirm('Cumple los requisitos para operar, ¿Desea confirmar la operación?');
                if (opcion == true) {
                    const postData={
                        id_wallet: $('#select_wallet_cripto').val(),
                        cant_pesos: parseInt($('#ars_value').val()),
                        cant_cripto: parseInt($('#cripto_value').val()),
                        cripto : $('#cripto_select').val()
                    }
                    if($('#option1').is(':checked')){
                        $.post('../../model/transaction/new_compra.php', postData).then(response => {
                           
                             if(response == 1){
                                alertify.alert("<p class='text-center'>Compra realizada con éxito, aguarde confirmación del administrador</p>", function () {}).set({title:"Compra"}); 
                                 CierraPopup();
                             }else{
                                 alertify.alert("<p class='text-center'>Ocurrio un error, intentelo mas tarde.</p>", function () {}).set({title:"Compra"});
                                 CierraPopup();
                             }
                        }) 
                    }
                
                    if($('#option2').is(':checked')){
                        $.post('../../model/transaction/new_venta.php', postData).then(response => {
                           
                             if(response == 1){
                                alertify.alert("<p class='text-center'>Venta realizada con éxito, aguarde confirmación del administrador</p>", function () {}).set({title:"Venta"}); 
                                 CierraPopup();
                             }else{
                                alertify.alert("<p class='text-center'>Ocurrio un error, intentelo mas tarde.</p>", function () {}).set({title:"Venta"});
                                 CierraPopup();
                             }
                        }) 
                    } 
                    
                   console.log(postData);
                } else {
                    CierraPopup();
                }
                
            }else{
                let template =`
                    <span id="span_info">
                    Falta la confirmación de su identidad para poder operar.
                    </span>
                    `;
                    $('#span_info').html(template);
            }
        })
        .catch(error =>{    
                console.log(error);
        })
        
    }

    function controll_balnce(current_sald){
        
        let saldo = parseInt(current_sald);
        let pesos= parseInt($('#ars_value').val());
        let resultado =saldo- pesos;
      
        if(resultado < 0){
                saldo_controller = false;
        }else{
            saldo_controller = true;
        }
    }
    

    function wallet_user(){
        get_data('../../model/user/balance_wallet_user.php').then(response =>{
            let data = JSON.parse(response);
            console.log(data);
            controll_balnce(data.balance);
            $('#wallet_user_input').val(data.balance);
        })
        .catch(error =>{    
            console.log(error);
        })
    }

    function wallet_cripto(cripto){
        post_data('../../model/wallet_cripto/get_wallet_cripto.php',cripto).then(response =>{
            console.log(response);
            if(response !=0){
                let data = JSON.parse(response);
                console.log(data);
                let template =``;

                data.forEach(dato => {
                 
                        template +=`
                        <option value="${dato.id_wallet_cripto}">${dato.wallet_name} - ${dato.id_wallet_cripto}</option>
                        `;
                    
                   
                });
                $('#select_wallet_cripto').html(template);
                wallet_controller = true;
            }else{
                wallet_controller = false;
            }
            
            
        })
        .catch(error =>{    
            console.log(error);
        })
    }    

    function CierraPopup() {
        $("#exampleModal").modal('hide');//ocultamos el modal
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      }
});

