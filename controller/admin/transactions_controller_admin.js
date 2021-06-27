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
            console.log(response);
            let data = JSON.parse(response); 
            let template = ``;
            let type = "";
            

            


            data.forEach(dato => {
                template += `
                    <tr>
                        <td>${dato.id_user}</td>
                        <td>${dato.user}</td>
                        <td>${dato.DNI}</td>
                        <td>Trans #${dato.id_op}</td>
                        <td>${dato.date_hour}</td>
                        <td><b>${dato.type}</b></td>
                        <td><b>${dato.cripto_amount} </b> - (${dato.cripto_name})  </td>
                        <td>$${dato.pesos_amount}</td>
                        <td>${dato.id_wallet_cripto}</td>
                        <td>
                            <button class="btn btn-success" id="conf_yes" data-id=${dato.id_op}>si</button>
                            <button class="btn btn-danger"  id="conf_no" data-id=${dato.id_op}>no</button>
                        </td>
                    </tr>
                `;
            });

            $('#transactions_tbody').html(template);
               
            
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
                alertify.alert("<p class='text-center'>¡La operación fue exitosa!</p>", function () {}).set({title:"Operaciones Cripto"}); 
                all_trans();
            }else{
                alertify.alert("<p class='text-center'>Ocurrio un error, intentelo mas tarde.</p>", function () {}).set({title:"Operaciones Cripto"}); 
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

