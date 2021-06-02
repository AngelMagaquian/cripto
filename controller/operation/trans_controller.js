import {get_data} from "../app/get_data.js";
$(function(){
    console.log('Trans Controller');
  

    $( document ).ready(function() {
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

        console.log($('#type_trans').val());
        console.log($('#id_cripto').val());
        console.log($('#monto_cripto').val());
        console.log($('#valor_cripto_sc').val());
        console.log($('#valor_cripto_cc').val());
        console.log($('#comision').val());
        console.log($('#monto_pesos').val());
    });

});