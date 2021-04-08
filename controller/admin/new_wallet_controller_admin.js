import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('New Wallet Controller');

    $( document ).ready(function() {
        //dejar todo el form en blanco
        //setInterval(function(){$("#datosUserTable").draw(); }, 1000);
        default_form();
    });

    $('#user_search_wc').submit(function(e){
        e.preventDefault();
        var dni = $('#dni_search_wc').val();
        console.log(dni);

        post_data('../../model/user/DNI_search.php', dni).then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 
                console.log(data);
                $('#name_wc').val(data.name_user);
                $('#middle_name_wc').val(data.middle_name);

                $('#last_name_wc').val(data.last_name);

                $('#second_last_name_wc').val(data.second_last_name);
                $('#DNI_wc').val(data.DNI);
                $('#CUIL_wc').val(data.CUIL);
                $('#email_wc').val(data.email);
            
        })
        
    });
    

    $('#confirm_wallet').submit(function(e){
        e.preventDefault();
        
        const postData ={
            dni : $('#DNI_wc').val()
            
        }
        $.post('../../model/user/update_check_user_admin.php', postData).then(response =>{
                        
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
        $('#name_wc').val('');
        $('#middle_name_wc').val('');
        $('#last_name_wc').val('');
        $('#second_last_name_wc').val('');
        $('#DNI_wc').val('');
        $('#CUIL_wc').val('');
        $('#email_wc').val('');
    }

});

