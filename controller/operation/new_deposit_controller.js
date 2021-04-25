import {get_data} from "../app/get_data.js";
$(function(){
    console.log('New Deposit Controller');
    

    $( document ).ready(function() {
        //funciones para traer los datos del usuario
        select_bank_account();
        get_saldo();
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
            const postData ={
                CBU: $('#bank_account').val(),
                importe: parseFloat($('#importe').val())
            }
            $.post('../../../model/operation/new_deposit.php', postData).then(response => {
                if(response == 1){
                    alert('Solicitud de deposito enviada, puede consultar los datos en Mis operaciones->Depositos');
                }else{
                    alert('Error al cargar los datos: '+response);
                }
            })
        }
        
    })
   



    function get_saldo(){
        get_data('../../../model/user/balance_wallet_user.php').then(response => {
            // En este punto recibimos la respuesta.
            console.log(response);
            let data = JSON.parse(response); 
            

            $('#saldo_actual').val(data.balance);
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }

    function select_bank_account(){
        get_data('../../../model/datos_bancarios/get_account.php').then(response => {
            // En este punto recibimos la respuesta.
            console.log(response);
            let data = JSON.parse(response); 
            console.log(data);
            let template =`<option value="0">Mis Cuentas</option>`;

            data.forEach(dato => {
                template+=`
                    <option value="${dato.CBU}">${dato.bank} - ${dato.CBU}</option>
                `;
            }); 

            $('#bank_account').html(template);
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }


    

   

});