import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('User check Controller');

    $( document ).ready(function() {
        default_form();
    });

    $('#search_user_uc').submit(function(e){
        e.preventDefault();
        var dni = $('#dni_search_uc').val();
        console.log(dni);

        post_data('../../model/user/DNI_search.php', dni).then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 
                console.log(data);
                $('#name_uc').val(data.name_user);
                $('#middle_name_uc').val(data.middle_name);

                $('#last_name_uc').val(data.last_name);

                $('#second_last_name_uc').val(data.second_last_name);
                $('#DNI_uc').val(data.DNI);
                $('#CUIL_uc').val(data.CUIL);
                $('#email_uc').val(data.email);
            
        })
        
    });
    

    $('#confirm_user_uc').submit(function(e){
        e.preventDefault();
        
        var dni = $('#DNI_uc').val();
          
        
        post_data('../../../model/user/update_check_user_admin.php', dni).then(response => {
            
                        
            if(response == 1){
                alert('Usuario Confirmado con exito');
            }else{
                console.log(response);
            }
            
        })
        .catch(error =>{
            console.log('Error de insert: '+error);
            window.alert('Ocurrio un error al registrarse, intentelo mas tarde');
        });

        
        
    });

    function default_form(){
        $('#name_uc').val('');
        $('#middle_name_uc').val('');
        $('#last_name_uc').val('');
        $('#second_last_name_uc').val('');
        $('#DNI_uc').val('');
        $('#CUIL_uc').val('');
        $('#email_uc').val('');
    }
});

