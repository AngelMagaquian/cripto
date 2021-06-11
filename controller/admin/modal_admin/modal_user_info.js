import {get_data} from "../../app/get_data.js";
import {post_data} from "../../app/post_data.js";
$(function(){
    console.log('Modal user info ON');
    var changes = false;
    $( document ).ready(function() {
        
    });

    $(document).on('click', '#modal_ficha_user_show_button', (e) => {
        e.preventDefault();
        let id =$(e.currentTarget).data('id');
        console.log(id);
        user_info(id);
    });

    function user_info(id){
        post_data('../../model/user/id_user_search.php', id).then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 
            
            $('#span_id_user').html(data.ID_user);
            $('#name_uc').val(data.name_user);
            $('#DNI_uc').val(data.DNI);
            $('#CUIL_uc').val(data.CUIL);
            $('#email_uc').val(data.email);
            $('#bd').val(data.birth_day);

            /* if(data.pep == 0){
                $("#chk_email").prop("checked", true); //si no lo es se pone check
            }else{
                $("#chk_email").prop("checked", false);
            } */

            if(data.check_email == 0){
                $("#chk_email").prop("checked", false);
            }else{
                $("#chk_email").prop("checked", true);
            }

            if(data.check_user == 0){
                $("#chk_conf").prop("checked", false);
            }else{
                $("#chk_conf").prop("checked", true);
                $("#submit_user").prop('disabled', true);
            }
        })
    }

    $('#confirm_user').submit(function(e){
        e.preventDefault();
        confirm_user( $('#span_id_user').html());
    })

    $('#close').click(function(e){
        e.preventDefault();
        if(changes == false){

        }else{
            location.reload();
        }
    })

    function confirm_user(id){
        post_data('../../model/user/update_check_user_admin.php', id).then(response => {
            if(response == 1){
                alert('Usuario Confirmado con exito');
                user_info(id);
                changes = true;
            }else{
                console.log(response);
            }
            
        })
        .catch(error =>{
            console.log('Error de insert: '+error);
            window.alert('Ocurrio un error al registrarse, intentelo mas tarde');
        }); 
    }


});

