import {post_data} from "../app/post_data.js";


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
        let pep = 0;
        if( $('#pep').prop('checked') ) {
            pep = 1;
        }
            const postData = {
                dni : $('#dni').val(),
                pass : $('#pass').val(),
                name_user : $('#name_user').val(),
                middle_name : $('#middle_name').val(),
                last_name : $('#last_name').val(),
                second_last_name : $('#second_last_name').val(),
                birth_day : $('#birth_day').val(),
                cuil : $('#cuil').val(),
                email : $('#email').val(),
                phone: $('#phone').val(),
                pep_status: pep
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
                    let control_password = pass_controller(pass);
                    if(control_password === true){
                        $.post('../../model/user/insert_new.php', postData).then(response =>{
                        
                             
                            //$(location).attr('href','./login.php');
                            if(response == 1){
                                insert_wallet()
                            }else{
                                console.log(response);
                            }
                            
                        })
                        .catch(error =>{
                            console.log('Error de insert: '+error);
                            alertify.alert("<p class='text-center'>Ocurrio un error al registrarse, intentelo mas tarde</p>", function () {
                            }).set({title:"Registro"});
                        });
                    }else{
                        
                        alert('error en contraseña');
                    }
                    
                }
                
           }else{
           var b1= 1;
            alertify.alert("<p class='text-center'>Debe ser mayor de 18 años para poder registrarse y operar.</p>", function () {
            }).set({title:"Registro"});
           }
            
            

    });
});

function insert_wallet(){
    const postData = {
        dni : $('#dni').val()
    }
    $.post('../../model/user/insert_wallet_user.php', postData).then(response => {
        if(response == 1){
            //Aca seria el punto
            alertify.alert("<p class='text-center'>¡Tu registro fue exitoso!</p>", function () {
            }).set({title:"Registro"});
            $(location).attr('href','./login.php');
        }
    })
}

function pass_controller(pass){
    let word = 0;
    let number = 0;
    if(pass.length >= 8){
        let pass_arr = Array.from(pass);
        pass_arr.forEach(e =>{
            if(e.charCodeAt(0) > 47 && e.charCodeAt(0) < 58){
                word += 1;
            }
            if(e.charCodeAt(0) > 64 && e.charCodeAt(0) < 91){
                number += 1;
            }
        })

        if(word >= 1 && number >= 1){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function birth_day_control(date){
    console.log('Control de edad');
    let hoy = new Date()
    let fechaNacimiento = new Date(date)
    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear()
    if(edad >= 18){
        return true;
    }else{
        return false;
    }
  
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