$(function(){
    console.log('AJAX Insert User');
    
    //variables globales
    let check_pass = false;

    $('#pass').keyup(function() {
        const pass= $('#pass').val();
        const first_pass= $('#first_pass').val();

        if(first_pass === pass){
            console.log('Las contraseñas coinciden');
            let template = `<label><b>Las contraseñas coinciden</b></label>`;
            $('#comfirm_pass').html(template);
            check_pass = true;
            console.log(check_pass);
        } else{
            console.log('Las contraseñas NO coinciden');
            let template = `<label><b>Las contraseñas NO coinciden</b></label>`;
            $('#comfirm_pass').html(template);
            check_pass = false;
        }
    })


    //cambiar al input del dni
    $('#input_user').submit(function(e){
        e.preventDefault();
        console.log('user_submit');
            const postData = {
                dni : $('#dni').val(),
                pass : $('#pass').val(),
                name_user : $('#name_user').val(),
                middle_name : $('#middle_name').val(),
                last_name : $('#last_name').val(),
                second_last_name : $('#second_last_name').val(),
                birth_day : $('#birth_day').val(),
                cuil : $('#cuil').val(),
                email : $('#email').val()
            };
            console.log(postData);
            //primer filtro si, es menor no puede registrarse
           if(birth_day_control(postData.birth_day) == true){
                
                if(postData.middle_name ===''){
                    postData.middle_name = null;
                }

                if(postData.second_last_name === ''){
                    postData.second_last_name = null;
                }
            
                const pass= $('#pass').val();
                const first_pass= $('#first_pass').val();
                if(pass === first_pass){
                    $.post('../../model/user/insert_new.php', postData, function(response){
                    
                        if(response == 0){
                            window.alert('Ocurrio un error al registrarse, intentelo mas tarde');
                         }else{
                             window.alert('Registro exitoso');
                             
                             $(location).attr('href','./login.php');
                         }
                    });
                }
                
           }else{
           var b1= 1;
            window.alert('Debe ser mayor de 18 años para poder registrarse y operar');
           }
            
            

    });
});

function birth_day_control(date){
    console.log('Control de edad');
    return true;
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