import {get_data} from "../../app/get_data.js";
import {post_data} from "../../app/post_data.js";
$(function(){
    console.log('Modal user op ON');
    var changes = false;
    var id = 0;
    $( document ).ready(function() {

    });

    $(document).on('click', '#modal_op_show_button', (e) => {
        console.log('entro');
        e.preventDefault();
        id =$(e.currentTarget).data('id');
        console.log(id);
        user_info(id);
    });

    $('#modal_op_show_button').click(function (e){
        e.preventDefault();
        console.log('click');
    })

    function user_info(id){
        
        /* post_data('../../model/datos_bancarios/get_deposit_admin.php', id).then(response => {
            let data = JSON.parse(response); 
          
            console.log('respuesta: '+response);
            $('#span_id_user2').html(id);
             
            var table_deposito = $('#modalDeposito').DataTable();
            var table_extraccion = $('#modalExtraccion').DataTable();
            table_deposito
            .clear()
            .draw();

            table_extraccion
            .clear()
            .draw();
            
            let total_deposito = 0;
            data.forEach(dato => {
                if(dato.state == 1){
                    
                    table_deposito.row.add(  [      
                        dato.id,
                        dato.bank,
                        dato.CBU,
                        dato.date,
                        dato.pesos
                    ]
                    ).draw();
                    total_deposito += parseFloat(dato.pesos);
                }
            }) 
        }) */


        post_data('../../model/datos_bancarios/get_extraccion_admin.php', id).then(response => {
            // En este punto recibimos la respuesta.
        /*     alert(id); */
            let data = JSON.parse(response); 
          
            console.log('respuesta: '+response);
            $('#span_id_user2').html(id);
             
            var table_extraccion = $('#modalExtraccion').DataTable();
           

            table_extraccion
            .clear()
            .draw();
            
            let total_ex= 0;
            data.forEach(dato => {
                if(dato.state == 1){
                    
                    table_extraccion.row.add(  [      
                        dato.id,
                        dato.bank,
                        dato.CBU,
                        dato.date,
                        dato.pesos
                    ]
                    ).draw();
                    total_ex += parseFloat(dato.pesos);
                }
            }) 
        })
    }

   
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

