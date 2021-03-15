import {get_data} from "../app/get_data.js";
$(function(){
    console.log('Operation Controller');
    let data;
    $( document ).ready(function() {
       
        //funciones para traer los datos del usuario
        get_data('../../model/operation/operation_data.php').then(response => {
            // En este punto recibimos la respuesta.
            
            data = JSON.parse(response); 
            console.log(data);
            let template =``;
            let state= '';

            data.forEach(dato =>{
                if(dato.state == 1){
                    state = 'COMPLETADA';
               }else{
                    state = 'PENDIENTE';
               }
                   template += `
                   <tr>
                       <td>${dato.type}</td>
                       <td>${dato.cripto_name} </td>
                       <td>$${dato.pesos_amount} </td>
                       <td>${dato.cripto_amount} </td>
                       <td>${dato.bank_name} </td>
                       <td>${dato.CBU} </td>
                       <td>${dato.wallet_name} </td>
                       <td>${dato.date_hour} </td>
                       <td>${state} </td>
                       
                   </tr>
                   `;
            })
            
           
            console.log('template: ');
            $('#operation_tbody').html(template);
            
            
            
        })
        .catch(error => {
          // En este punto recibimos el error. then() no se ha invocado
          //window.alert('Error al cargar los datos, intente mas tarde');
        });


        function table(){
            console.log('entro a la function table: '+data);
            data.forEach(dato =>{
                template += `
                <tr>
                    <td>${dato.type}</td>
                    <td>$${dato.pesos_amount} </td>
                    <td>${dato.cripto_name} </td>
                    <td>${dato.date_hour} </td>
                    <td>${dato.state} </td>
                    <td>${dato.cripto_amount} </td>
                </tr>
                `;
            })
            $('#operation_tbody').html(template);
        }


    
});

   

});