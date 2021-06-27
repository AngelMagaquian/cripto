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
        get_photo(id);
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

            if(data.pep == 0){
                $("#chk_pep").prop("checked", false); //si no lo es se pone check
            }else{
                $("#chk_pep").prop("checked", true);
            } 

            if(data.check_email == 0){
                $("#chk_email").prop("checked", false);
                ;
                $("#submit_user").prop('disabled', false);
            }else{
                $("#chk_email").prop("checked", true);
                $("#submit_user").prop('disabled', true);
            }

            if(data.check_user == 0){
                $("#chk_conf").prop("checked", false);
                $("#submit_user").prop('disabled', false);
            }else{
                $("#chk_conf").prop("checked", true);
                $("#submit_user").prop('disabled', true);
            }
        })
    }

    function get_photo(id){

       /*  $('#photo_face').attr('src', '../user/foto/img/defaul.jpg');
        $('#photo_face').attr('src', '../user/foto/img/defaul.jpg');
        $('#photo_face').attr('src', '../user/foto/img/defaul.jpg'); */

        post_data('../../model/user/get_user_photo.php', id).then(response => {
            let data = JSON.parse(response); 
            console.log(data);
            if(data.photo_face == null){
                $('#photo_face').attr('src', '../user/foto/img/defaul.jpg');
            }else{
                $('#photo_face').attr('src', '../user/foto/'+data.photo_face);
            }

            if(data.photo_dni == null){
                $('#photo_dni').attr('src', '../user/foto/img/defaul.jpg');
            }else{
                $('#photo_dni').attr('src', '../user/foto/'+data.photo_dni);
            }

            if(data.photo_dorso == null){
                $('#photo_dorso').attr('src', '../user/foto/img/defaul.jpg');
            }else{
                $('#photo_dorso').attr('src', '../user/foto/'+data.photo_dorso);
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

