import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('Transactions Controller');

    $( document ).ready(function() {
        all_trans();
    });

    function all_trans(){
        get_data('../../model/transaction/pending_trans.php').then(response => {
            // En este punto recibimos la respuesta.
           
            let data = JSON.parse(response);
   
           
            let table = $('#transtasaccionTable').DataTable();
            table.clear().draw();

            
            

            data.forEach(dato => {
                table.row.add([
                    dato.id_user,
                    dato.user,
                    dato.DNI,
                    dato.id_op,
                    dato.date_hour,
                    dato.type,
                    dato.cripto_name,
                    dato.cripto_amount,
                    '$'+dato.pesos_amount,
                    dato.id_wallet_cripto,
                    `
                    <button class="btn btn-success" id="conf_yes" data-id=${dato.id_op}>si</button>
                    <button class="btn btn-danger"  id="conf_no" data-id=${dato.id_op}>no</button>
                    `

                ]).draw()
            });

          
               
            
        }).catch(error => {
            console.log('error: '+error);
        });
    }
    $(document).on('click', '#conf_yes', (e) => {
        e.preventDefault();
        let id_trans=$(e.currentTarget).data('id');
     
        confirmation(id_trans,1);
    });
    $(document).on('click', '#conf_no', (e) => {
        e.preventDefault();
        let id_trans=$(e.currentTarget).data('id');
        confirmation(id_trans,2);
    });


    function confirmation(post_id_trnas, post_conf){
        
        const postData={
            id_trans: post_id_trnas,
            conf: post_conf
        }
        $.post('../../model/transaction/confirm_operation.php', postData).then(response => {
            // En este punto recibimos la respuesta.
            console.log(response);
            if(response == 1){
                alert('Confirmación exitosa');
                all_trans();
            }else{
                alert('Ocurrio un error, intentelo mas tarde.');
                all_trans();
            }

        })
        .catch(error => {
            // En este punto recibimos el error. then() no se ha invocado
            console.log(error);
            default_table();

        });
    }
    
});

