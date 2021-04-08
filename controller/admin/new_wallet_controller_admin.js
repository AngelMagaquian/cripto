import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('New Wallet Controller');

    $( document ).ready(function() {
        //dejar todo el form en blanco
        //setInterval(function(){$("#datosUserTable").draw(); }, 1000);
        default_form();
    });

    $('#search_user').submit(function(e){
        e.preventDefault();
        var dni = $('#dni_search').val();
        console.log(dni);

        post_data('../../model/user/DNI_search.php', '40573637').then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 
                console.log(data);
                $('#name').val(data.name_user);
                $('#middle_name').val(data.middle_name);

                $('#last_name').val(data.last_name);

                $('#second_last_name').val(data.second_last_name);
                $('#DNI').val(data.DNI);
                $('#CUIL').val(data.CUIL);
                $('#email').val(data.email);
            
        })
        
    });
    

    $('#confirm_user').submit(function(e){
        e.preventDefault();
        
        const postData ={
            //dni : $('#dni').val()
            dni : 41121345
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
        $('#name').val('');
        $('#middle_name').val('');
        $('#last_name').val('');
        $('#second_last_name').val('');
        $('#DNI').val('');
        $('#CUIL').val('');
        $('#email').val('');
    }

});

