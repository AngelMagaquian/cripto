import {get_data} from "../app/get_data.js";
$(function(){
    console.log('Confirm extracciones Controller');


    $( document ).ready(function() {
       
        //funciones para traer los datos del usuario
        table();
    });


   
    function table(){
        get_data('../../model/operation/get_extracciones.php').then(response => {
            // En este punto recibimos la respuesta.
    
            let data = JSON.parse(response); 
            let table = $('#transtasaccionTable').DataTable();
            table.clear().draw();
                data.forEach(dato => {
    
                    if(dato.status == 0){
                        table.row.add([
                            dato.id_extraccion,
                            dato.user_name,
                            dato.date,
                            dato.bank_name +' - '+dato.CBU,
                            '$'+dato.amount,
                            `
                            <button class="btn btn-success" id="conf_yes" data-id=${dato.id_extraccion}>si</button>
                            <a href="" class="btn btn-danger mr-2 mt-sm-0 mt-3" type="button" data-toggle="modal" data-target="#exampleModal" id="conf_no" data-id=${dato.id_extraccion}>no</a>
                            `
                        ]).draw()
                    }
                }); 
    
        
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }

    $(document).on('click', '#conf_yes', (e) => {
        e.preventDefault();
        let id_extraccion=$(e.currentTarget).data('id');
     
        confirmation(id_extraccion,1);
    });
    $(document).on('click', '#conf_no', (e) => {
        e.preventDefault();
        let id_extraccion=$(e.currentTarget).data('id');
        confirmation(id_extraccion,2);
    });

    function confirmation(post_id_extraccion, post_conf){
        
        const postData={
            id_extraccion: post_id_extraccion,
            conf: post_conf
        }
       
        $.post('../../model/transaction/confirm_extraccion.php', postData).then(response => {
            // En este punto recibimos la respuesta.
            
            if(response == 1){
                alert('Confirmación exitosa');
                table();
            }else{
                alert('Ocurrio un error, intentelo mas tarde.');
                table();
            }

        })
        .catch(error => {
            // En este punto recibimos el error. then() no se ha invocado
            console.log(error);
            table();

        }); 
    }

    
});