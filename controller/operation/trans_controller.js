import {get_data} from "../app/get_data.js";
$(function(){
    console.log('Deposit Controller');
    let data;

    $( document ).ready(function() {
       
        //funciones para traer los datos del usuario
        get_data('../../model/operation/deposit_data.php').then(response => {
            // En este punto recibimos la respuesta.
    
            data = JSON.parse(response); 
            
            table(data);
        })
        .catch(error => {
            console.log('error: '+error);
        });
    });

});