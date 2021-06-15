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

    function user_info(id){

        $('#span_id_user4').html(id);
        
        post_data('../../model/operation/get_deposit_admin.php', id).then(response => {
            let data = JSON.parse(response); 

            var table_deposito = $('#modalDep').DataTable();
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
            let template_td =`
            <tr>
                <td>TOTALES</td>
                <td></td>
                <td></td>
                <td></td>
                <td>$${total_deposito}</td>
            <tr>
            `;
            $('#tftotal_deposito').html(template_td);
        }).catch(error =>{
            console.log(error)
        })


        post_data('../../model/operation/get_extraccion_admin.php', id).then(response => {

            let data = JSON.parse(response); 
          
            console.log('extracciones: '+response);
             
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

            let template_te =`
            <tr>
                <td>TOTALES</td>
                <td></td>
                <td></td>
                <td></td>
                <td>$${total_ex}</td>
            <tr>
            `;
            $('#tftotal_extra').html(template_te);
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

