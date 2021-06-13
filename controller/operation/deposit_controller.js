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

        let state= '';
       
        var table_deposit = $('#operacionesTable').DataTable();
        table_deposit
        .clear()
        .draw();
        

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

           /*Data table por aca */
           table_deposit.row.add([
                dato.id_deposit,
                dato.CBU,
                dato.bank_name,
                dato.date,
                '$'+dato.pesos,
                state
           ]).draw();
         
        })
    }

   

});