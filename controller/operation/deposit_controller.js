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


    function table(data){
        let template =``;
        let state= '';


        data.forEach(dato =>{
            

           switch(dato.state){
               case '0':
                state = 'PENDIENTE';
               break;

               case '1':
                state = 'COMPLETADA';
               break;

               case '2':
                state = 'CANCELADA';
               break;
           }

          
               template += `
               <tr>
                   <td>#${dato.id_deposit}</td>
                   <td>${dato.CBU} </td>
                   <td>${dato.bank_name} </td>
                   <td>${dato.date} </td>
                   <td>$${dato.pesos} </td>
                   <td>${state} </td>
               </tr>
               `;
        })
       
        
        $('#deposit_tbody').html(template);
    }

   

});