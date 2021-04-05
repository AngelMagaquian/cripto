import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('DNI Controller');

    $( document ).ready(function() {
        //dejar todo el form en blanco
        default_form();

        
        
    });


    function default_form(){
        $('#first_name').val('');
        $('#middle_name').val('');
        $('#last_name').val('');
        $('#second_last_name').val('');
        $('#dni').val('');
        $('#cuil').val('');
        $('#email').val('');
    }

    $('#account_form').submit(function(e){
        e.preventDefault();
        console.log('Account info');
        var dni = $('#dni_search').val();

            post_data('../../model/user/DNI_search.php', dni).then(response => {
                // En este punto recibimos la respuesta.
                // y se debe cargar todos los input con la info y la tabla
                let data = JSON.parse(response); 
            
                console.log(data);
                
                    $('#first_name').val(data.name_user);
                    $('#middle_name').val(data.middle_name);
                    $('#last_name').val(data.last_name);
                    $('#second_last_name').val(data.second_last_name);
                    $('#dni').val(data.DNI);
                    $('#cuil').val(data.CUIL);
                    $('#email').val(data.email);
               

       
                account_table(data.ID_user);
            })
            .catch(error => {
                // En este punto recibimos el error. then() no se ha invocado
                console.log('Error: '+error);
                
            });
    });


    function account_table(id_user){
        post_data('../../model/datos_bancarios/get_account.php', id_user).then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 
            let template=``;

            data.forEach(dato =>{
                if(dato.check_account == '0'){
                        template +=`
                        <tr>
                            <td>${dato.bank}</td>
                            <td>${dato.CBU}</td>
                            <td>
                            <button class="btn btn-success" id="conf_yes">si</button>
                            <button class="btn btn-danger" id="conf_no">no</button>
                            </td>
                        <tr>
                    `;
                    
                    $('#account_tbody').html(template);
                }
            })
                
        })
        .catch(error => {
            // En este punto recibimos el error. then() no se ha invocado
            console.log(error);
            
        });
    }

    
    $('#conf_yes').click(function(e){
        e.preventDefault();
        console.log('HOLA PUTO');
    });
    

    
});

