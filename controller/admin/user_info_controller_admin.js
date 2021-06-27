import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
import {number_format} from "../app/number_format.js";
$(function(){
    console.log('User info Controller');

    $( document ).ready(function() {
        //dejar todo el form en blanco
        //setInterval(function(){$("#datosUserTable").draw(); }, 1000);
        user_table();
    });


    function user_table(){
        get_data('../../model/user/all_user_data.php').then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 
            /* let template=``; */
            var table_user = $('#datosUserTable').DataTable();

            table_user
            .clear()
            .draw();

            data.forEach(dato =>{
                
                if(dato.middle_name == ""){
                    var name = dato.name_user;
                }else {
                    var name = dato.name_user + ' ' + dato.middle_name;
                }

                if(dato.second_last_name == ""){
                    var last_name = dato.last_name;
                }else {
                    var last_name = dato.last_name + ' ' + dato.second_last_name;
                }

                let status = '';
                if(dato.status == 0){
                     status = 'NO CONFIRMADO';
                }else{
                     status = 'CONFIRMADO';
                }

                table_user.row.add([
                    dato.ID_user,
                    name+' '+last_name,
                    status,
                    '$'+number_format(dato.balance,2),
                    `
                        <a href="" class="btn btn-info  mr-2 mt-sm-0 mt-3" type="button" data-toggle="modal" data-target="#modalFichaUsuario" id="modal_ficha_user_show_button" data-id=${dato.ID_user}>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </a>
                    `,
                    `<td>
                        <a href="" class="btn btn-danger mr-2 mt-sm-0 mt-3" type="button" data-toggle="modal" data-target="#modaDatosBancarios" id="modal_account_show_button" data-id=${dato.ID_user}>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                            </svg>
                        </a>
                    </td>`,
                    `<td>
                        <a href="" class="btn btn-warning mr-2 mt-sm-0 mt-3" type="button" data-toggle="modal" data-target="#modalCripto" id="modal_trans_show_button" data-id=${dato.ID_user}>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                            </svg>
                        </a>
                    </td>`,
                    `<td>
                        <a href="" class="btn btn-secondary mr-2 mt-sm-0 mt-3" type="button" data-toggle="modal" data-target="#modalDeposito" id="modal_op_show_button" data-id=${dato.ID_user}>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </a>
                    </td>`

                ]).draw();
            })
                
        })
        .catch(error => {
            // En este punto recibimos el error. then() no se ha invocado
            console.log(error);
            
        });
    }

    
    /* $('#conf_yes').click(function(e){
        e.preventDefault();
       
    });
     */

    
});

