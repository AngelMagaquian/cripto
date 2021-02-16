$(function(){
    console.log('AJAX Insert User');
    
    //cambiar al input del dni
    $('#user_input').submit(function(e){
        e.preventDefault();
        console.log('user_submit');
            const postData = {
                dni : $('#dni').val(),
                pass : $('#pass').val(),
                name_user : $('#name_user').val(),
                middle_name : $('#middle_name').val(),
                last_name : $('#last_name').val(),
                second_last_name : $('#second_last_name').val(),
                birth_day : $('#birth_day').val()
            };
            console.log(postData);
            //primer filtro si, es menor no puede registrarse
           if(birth_day_control(postData.birth_day) == true){

                if(postData.middle_name ===''){
                    middle_name = null;
                }

                if(postData.second_last_name === ''){
                    second_last_name = null;
                }
            
                $.post('../../model/user/insert_new.ph', postData, function(response){
                    console.log(response);
                    if(response == 0){
                       windows.alert('Ocurrio un error al registrarse, intentelo mas tarde');
                    }else{
                        console.log('Registro exitoso');
                        //redirec(response);
                    }
                });
           }else{
                window.alert('Debe ser mayor de 18 años para poder registrarse y operar');
           }
            
            

    });
});

function birth_day_control(date){
    console.log('Control de edad');
}

/*
 $dni = $_POST['dni'];
    $cuil = $_POST['cuil'];
    $pass = $_POST['pass'];
    $name_user = $_POST['name_user'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $second_last_name = $_POST['second_last_name'];
    $birth_day = $_POST['birth_day'];
    $check_user = 0;
    $type = 0;
*/