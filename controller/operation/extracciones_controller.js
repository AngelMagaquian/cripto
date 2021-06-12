import {get_data} from "../app/get_data.js";
$(function(){
    console.log('Extracciones Controller');


    $( document ).ready(function() {
       
        //funciones para traer los datos del usuario
        new_extraccion_default();
    });


  

    $('#new_extraccion').submit(function(e){
        e.preventDefault();
        console.log('extraccion');
        
        var monto =parseFloat($('#importe').val()) ;
        var saldo =parseFloat($('#saldo_actual').val()) ;
        var control = (saldo-monto);
        if(control < 0){
            alert('El monto sobrepasa al saldo actual, ingrese otro monto a extraer');
        }else{
            if($('#bank_account').val() == 0){
                alert('Por favor ingrese una cuenta bancaria');
            }else{
                const postData ={
                    monto: monto,
                    CBU: $('#bank_account').val()
                }

                $.post('../../model/transaction/new_extraccion.php', postData).then(response => {
                    if(response == 1){
                        alert('Solicitud de extracción enviada, puede consultar los datos en Mis operaciones->Mis extracciones');
                        new_extraccion_default();
                    }else{
                        alert('Error al cargar los datos: '+response);
                        new_extraccion_default();
                    }
                }) 
            }
        }
        
    })




    function new_extraccion_default(){
        select_bank_account();
        get_saldo();
        $('#importe').val('');
    }



    $('#importe').keyup(function(){
        
        if($('#importe').val() == ''){
             var monto = 0;
        }else{
            var monto =parseFloat($('#importe').val()) ;
            importe_card();
        }
        var saldo =parseFloat($('#saldo_actual').val()) ;
        $('#saldo_proyectado').val('$'+(saldo-monto));
        saldoP_card();

    });

   
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

    $('#bank_account').change(function(){
       $('#banco_resumen').val($('#bank_account').val())
    })

    function importe_card(){
       $('#monto_resumen').val($('#importe').val())
    }
    function saldoP_card(){
        $('#saldo_resumen').val($('#saldo_proyectado').val())
     }


    
});