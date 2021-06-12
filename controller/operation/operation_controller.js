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
        })
        .catch(error => {
            console.log('error: '+error);
        });
    });


    /* function divisas(){
        get_data('../../model/operation/divisas.php').then(response => {
            // En este punto recibimos la respuesta.
            data = JSON.parse(response); 
            
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
    } */

    function table(data){
        let template =``;
        let state= '';
        let tableTrans = $('#transTable').DataTable();

        tableTrans
        .clear()
        .draw();

        data.forEach(dato =>{
       
           switch (dato.state){
                case '0':
                    state = 'PENDIENTE';
                break;

                case '1':
                    state = 'CONFIRMADA';
                break;

                case '2':
                    state = 'RECHAZADA';
                break;
           }

           tableTrans.row.add(
            [
                dato.type,
                dato.cripto_name,
                dato.pesos_amount,
                dato.cripto_amount,
                dato.wallet_name,
                dato.date_hour,
                state
            ]
           ).draw();
        })
        
    }

   

});