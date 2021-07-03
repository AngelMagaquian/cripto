import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
import {number_format} from "../app/number_format.js";
$(function(){
    console.log('modal trans Controller');
    var saldo_controller = false;
    var wallet_controller = false;
    var compra_controller =false;

    var commission_venta = 0.0;
    var commission_compra = 0.0;
    var dolar_cripto = 0.0;
    var saldo = 0
    var cotizacion = 0;
    var cripto_sc = 0;

    $(document).ready(function(){
        get_admin_values();
    })

  

    $('#declaracion').change(function(){
        if( $('#declaracion').is(':checked') ) {
            $('#btn_finalizar').attr('disabled', false);
        }else{
            $('#btn_finalizar').attr('disabled', true);
        }
    })
    $('#modal_show_button').click(function(e){
        e.preventDefault();
        console.log('Modal');

        $('#btn_finalizar').attr('disabled', true);
        //limpiar sector de información en caso de que le falte algo al usuario
 
        setTimeout(refrescar, 30000);
        //traigo el saldo del usuario
        wallet_user();
         
        //limpiar select
        $('#select_wallet_cripto').html('');
        let cripto = $('#cripto_select').val();
        wallet_cripto(cripto);


        $('#cripto_resumen').html(cripto);

       
        if($('#option1').val() ==1){
            compra_controller = true;
            $('#operacion_resumen').html('Compra');
        }else{
            compra_controller = false;
            $('#operacion_resumen').html('Venta');
        }

        $('#cant_cripto').html($('#cripto_value').val() +' ' +$('#cripto_select').val());

        $('#cant_pesos').html(number_format($('#ars_value').val(),2));

        get_cotizacion(cripto);

        $('#total_resumen').html(number_format($('#ars_value').val(),2));


    });

    function refrescar(){
        //Actualiza la página
        location.reload();
      }


    function get_cotizacion(cripto){
        post_data('../../model/calculadora/calculadora2.php', cripto).then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 
            //me viene el valor en dolares
           
            let resultado = 0;
            resultado = (dolar_cripto*data.value);
            cripto_sc = resultado;
            if(compra_controller === true){
                resultado = ((resultado * commission_compra)/100) + resultado;
            }else{
                resultado = ((resultado * commission_venta)/100) + resultado;
            }

            $('#cotizacion_resumen').html(number_format(resultado,2))
            cotizacion = resultado;

        })
        .catch(error => {
          console.log(error);
        });
    }

    function get_admin_values(){
        
        get_data('../../model/calculadora/get_values.php').then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 

            data.forEach(dato => {
                switch(dato.ID_value){
                    case '1':
                        dolar_cripto = dato.value;
                        
                       /*  $('#dolar').val(dolar_cripto); */
                        
                    break;

                    case '2':
                        commission_compra = dato.value;
                       /*  $('#comision').val(commission_compra); */
                 
                        
                    break;

                    case '3':
                        commission_venta = dato.value;
                        
                    break;
                }
            });
            
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }
        
        
 

    $('#finalizar').submit(function(e){
        e.preventDefault();
        console.log('Finalizar');
        if(saldo_controller == true && wallet_controller == true){
            trans_controller();
        }else{
            if(wallet_controller == false){
                alert('Usted no tiene una wallet para poder operar.')
            }

            if(saldo_controller == false){
                alert('Usted no tiene suficientes fondos para realizar la transacción y tampoco una wallet para esta criptomoneda.')
            }
        }
        
    }) 
    function trans_controller(){
        
       
        get_data('../../model/transaction/trans_controller.php').then(response =>{
            let data = JSON.parse(response);
            if(data.email == 1 && data.user){
                var opcion = confirm('Cumple los requisitos para operar, ¿Desea confirmar la operación?');
                if (opcion == true) {

                    let comision_final  = 0;
                    if(compra_controller === true){
                        comision_final = commission_compra;
                    }else{
                        comision_final = commission_venta;
                    }
                    const postData={
                        id_wallet: $('#select_wallet_cripto').val(),
                        cant_pesos: parseFloat($('#ars_value').val()),
                        cant_cripto: parseFloat($('#cripto_value').val()),
                        cripto : $('#cripto_select').val(),
                        dolar_value : dolar_cripto,
                        cripto_price_cc : cotizacion,
                        cripto_price_sc : cripto_sc,
                        commission : comision_final



                       /*  id_wallet: $('#select_wallet_cripto').val(),
                        cant_pesos: parseInt($('#monto_pesos').val()),
                        cant_cripto: parseInt($('#monto_cripto').val()),
                        cripto : $('#id_cripto').val(),
                        dolar_value : $('#dolar').val() ,
                        cripto_price_cc : $('#valor_cripto_cc').val()  ,
                        cripto_price_sc :$('#valor_cripto_sc').val()  ,
                        commission : $('#comision').val()  */
                    }
                    if($('#option1').is(':checked')){
                        $.post('../../model/transaction/new_compra.php', postData).then(response => {
                           
                             if(response == 1){
                                 alert('Compra realizada con éxito, aguarde confirmación del administrador');
                                 CierraPopup();
                             }else{
                                 alert('Ocurrio un error, intentelo mas tarde');
                                 CierraPopup();
                             }
                        }) 
                    }
                
                    if($('#option2').is(':checked')){
                        $.post('../../model/transaction/new_venta.php', postData).then(response => {
                           
                             if(response == 1){
                                 alert('Venta realizada con éxito, aguarde confirmación del administrador');
                                 CierraPopup();
                             }else{
                                 alert('Ocurrio un error, intentelo mas tarde');
                                 CierraPopup();
                             }
                        }) 
                    } 
                    
                   console.log(postData);
                } else {
                    alert('Operacion cancelada');
                    refrescar();
                    CierraPopup();
                }
                
            }else{
                alert('Falta la confirmación de su identidad para poder operar');
            }
        })
        .catch(error =>{    
                console.log(error);
        })
        
    }

    function controll_balnce(saldo){
        
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
            
            saldo = data.balance;
            $('#saldo').html(number_format(data.balance,2));
            controll_balnce(saldo);
           
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
                $('#wallet_od').html($('#select_wallet_cripto option:selected').html());
                wallet_controller = true;
            }else{
                wallet_controller = false;
            }
            
            
        })
        .catch(error =>{    
            console.log(error);
        })
    }    


    $('#select_wallet_cripto').change(function(){
        $('#wallet_od').html($('#select_wallet_cripto option:selected').html());
    })

    function CierraPopup() {
        $("#exampleModal").modal('hide');//ocultamos el modal
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      }
});

