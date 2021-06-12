import {get_data} from "../../app/get_data.js";
import {post_data} from "../../app/post_data.js";
$(function(){
    console.log('Modal user account ON');
    var changes = false;
    var id = 0;
    $( document ).ready(function() {
       
    });

    $(document).on('click', '#modal_account_show_button', (e) => {
        e.preventDefault();
        id =$(e.currentTarget).data('id');
        console.log(id);
        user_info(id);
    });

    function user_info(id){
        
        post_data('../../model/datos_bancarios/get_account_user_admin.php', id).then(response => {
            // En este punto recibimos la respuesta.
        /*     alert(id); */
            let data = JSON.parse(response); 
            let template =``;
            console.log('respuesta: '+response);
            $('#span_id_user2').html(id);
            //modalFichaUs

            var table_account = $('#modalFichaUs').DataTable();
           

            table_account
            .clear()
            .draw();
            
     
            data.forEach(dato => {
                let status = '';
                let conf =``;
                if(dato.check_account == 0){
                    status = 'NO CONFIRMADA';
                    
                    conf =`<button class="btn btn-success" id="conf_yes" data-id=${dato.CBU}>si</button>
                            <button class="btn btn-danger" id="conf_no" data-id=${dato.CBU}>no</button>`;
                }else if(dato.check_account == 1){
                    status = 'CONFIRMADA';
                    conf = ` `;
                }else{
                    status = 'CANCELADA';
                    conf = ` `;
                }
                table_account.row.add([
                    dato.id_bank,
                    dato.bank,
                    dato.alias,
                    dato.CBU,
                    dato.account_number,
                    status,
                    conf
                ]).draw();
                /* template +=`
                    <tr>
                        <td>${dato.id_bank}</td>
                        <td>${dato.bank}</td>
                        <td>${dato.alias}</td>
                        <td>${dato.CBU}</td>
                        <td>${dato.account_number}</td>
                        <td>${status}</td>
                        <td>${conf}</td>
                    </tr>
                `; */
            })
            //$('#user_account_tbody').html(template);

        })
    }

    $(document).on('click', '#conf_yes', (e) => {
        e.preventDefault();
        let CBU =$(e.currentTarget).data('id');
        confirmation(1, CBU);
    });
    $(document).on('click', '#conf_no', (e) => {
        let CBU =$(e.currentTarget).data('id');
        confirmation(2, CBU);
    });

    $('#close').click(function(e){
        e.preventDefault();
        if(changes == false){

        }else{
            location.reload();
        }
    })

    function confirmation(post_conf, post_CBU){
        const postData ={
            CBU: post_CBU,
            conf: post_conf
        }
        $.post('../../model/datos_bancarios/confirm_account.php', postData).then(response => {
            // En este punto recibimos la respuesta.
            console.log(response);
            if(response == 1){
                alert('Confirmación exitosa');
                changes = true;
                user_info(id);
            }else{
                alert('Ocurrio un error, intentelo mas tarde.');
                changes = false;
                user_info(id);
            }

        })
        .catch(error => {
            // En este punto recibimos el error. then() no se ha invocado
            console.log(error);
            default_table();

        });
    }


});

