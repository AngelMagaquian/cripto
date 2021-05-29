import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('Deposit Controller');
    var id_trans = 0;

    $( document ).ready(function() {
        all_deposit();
    });

    function all_deposit(){
        get_data('../../model/transaction/pending_deposit.php').then(response => {
            // En este punto recibimos la respuesta.
            
            let data = JSON.parse(response); 
            let template = ``;
            
            data.forEach(dato => {
                template += `
                    <tr>
                        <td>${dato.id_user}</td>
                        <td>${dato.user_name}</td>
                        <td>${dato.CUIL}</td>
                        <td>${dato.alias}</td>
                        <td>${dato.bank_name}</td>
                        <td>Deposito #${dato.id_deposit}</td>
                        <td>(${dato.CBU})</td>
                        <td>${dato.date}</td>
                        <td><b>$${dato.monto}</b></td>
                        <td>
                            <button class="btn btn-success" id="conf_yes" data-id=${dato.id_deposit}>si</button>
                            <a href="" class="btn btn-danger mr-2 mt-sm-0 mt-3" type="button" data-toggle="modal" data-target="#exampleModal" id="conf_no" data-id=${dato.id_deposit}>no</a>
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
        let id_deposit=$(e.currentTarget).data('id');
     
        confirmation(id_deposit,1);
    });
    $(document).on('click', '#conf_no', (e) => {
        e.preventDefault();
        let id_deposit=$(e.currentTarget).data('id');
        confirmation(id_deposit,2);
    });


    function confirmation(post_id_deposits, post_conf){
        
        const postData={
            id_deposit: post_id_deposits,
            conf: post_conf
        }
        id_trans = post_id_deposits;
        $.post('../../model/transaction/confirm_deposit.php', postData).then(response => {
            // En este punto recibimos la respuesta.
            
            if(response == 1){
                alert('Confirmación exitosa');
                all_deposit();
            }else{
                alert('Ocurrio un error, intentelo mas tarde.');
                all_deposit();
            }

        })
        .catch(error => {
            // En este punto recibimos el error. then() no se ha invocado
            console.log(error);
            all_deposit();

        }); 
    }

    console.log('Cancel Deposit Controller');
    $('#finalizar').submit(function(e){
        e.preventDefault();
        
        const postData ={
            description: $('#text_issue').val(),
            id_trans: id_trans
        }
        console.log(postData);
        $.post('../../model/transaction/cancel_deposit.php', postData).then(response => {
            // En este punto recibimos la respuesta.
            console.log(response);
            if(response == 1){
                alert('Problema enviado');
                $('#text_issue').val('');
                all_deposit();
                
            }else{
                alert('Ocurrio un error, intentelo mas tarde.');
                $('#text_issue').val('');
                all_deposit();
            }

        })
        .catch(error => {
            // En este punto recibimos el error. then() no se ha invocado
            console.log(error);
        

        });
    })


  
});

