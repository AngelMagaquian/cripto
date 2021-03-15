import {get_data} from "../app/get_data.js";
$(function(){
    console.log('Operation Controller');
    let data;
    $( document ).ready(function() {
       
        //funciones para traer los datos del usuario
        get_data('../../model/operation/operation_data.php').then(response => {
            // En este punto recibimos la respuesta.
      
            data = JSON.parse(response); 
            
            table(data);
            divisas();
        })
        .catch(error => {
            console.log('error: '+error);
        });
    });


    $('#filtros').click(function(e){
        e.preventDefault();
        console.log("Filters");
        const postData= {
            date_from : $('#desde').val(),
            date_to : $('#hasta').val(),
            operation : $('#operation').val(),
            cripto : $('#divisa').val()
        };

        console.log(postData);
        $.post('../../model/operation/filter.php', postData, function(response){
            //mostrar con la funcion table la tabla temporal
            console.log(response);
            data = JSON.parse(response); 
            
            table(data); 
        });
    
        

    });












    function divisas(){
        get_data('../../model/operation/divisas.php').then(response => {
            // En este punto recibimos la respuesta.
            data = JSON.parse(response); 
            console.log(data);
            let template=``;
            data.forEach(dato =>{
                   template += `
                   <option value='${dato.ID_cripto}'>${dato.name} (${dato.description})</option>
                   `;
            })
            template += `
                   <option value='100'>TODAS</option>
                   `;
            $('#divisa').html(template);

            
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }

    function table(data){
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
    }

   

});