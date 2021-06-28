import {get_data} from "../app/get_data.js";

$(function(){
    console.log('User Controller');
    $( document ).ready(function() {
       
        get_data('../../model/user/user_data.php').then(response => {
            // En este punto recibimos la respuesta.
             
                let data = JSON.parse(response); 
                console.log(response);
                $('#name_user').val(data.name_user);
                $('#user_last_name').val(data.last_name);
    
                $('#user_middle_name').val(data.middle_name);
                $('#user_second_last_name').val(data.second_last_name);
    
                $('#user_dni').val(data.DNI);
                $('#user_cuil').val(data.CUIL);
    
                $('#user_birth_day').val(data.birth_day);
                $('#user_email').val(data.email);

                $('#phone').val(data.phone);


                if(data.check_email == 1){
                    $("#check_email").prop("checked", true);
                }

                if(data.pep == 1){
                    $("#pep").prop("checked", true);
                }

                if(data.check_user == 1){
                    $("#check_user").prop("checked", true);
                }
               /*  $('#user_email').val();
                $('#user_email').val(data.email);
                $('#user_email').val(data.email); */

            
                
            
            
        })
        .catch(error => {
            console.log(error);
        });       


          
   
    });



});

