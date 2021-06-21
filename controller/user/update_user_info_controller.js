import {post_data} from "../app/post_data.js";
$(function(){
    console.log('AJAX Update User');
    var check_pass = false;
    //primero traer los datos del usuario para mostrar

    function current_pass(pass){
       
    }
   

    $('#update_pass').submit(function(e){
        e.preventDefault();
        console.log("update pass");
        var confirmation = confirm('¿Desea cambiar su contraseña?');
        if(confirmation == true){
            var current_pass= $('#current_pass').val();
          
            post_data('../../model/user/get_pass.php', current_pass).then(response => {
                // En este punto recibimos la respuesta.
          
               if(response =='1'){
                    var pass= $('#pass').val();
                    var pass2 =$('#first_pass').val();
                    if(pass === pass2){
                        let control_password = pass_controller(pass);
                        console.log(control_password);
                        if(control_password === true){
                            post_data('../../model/user/update_pass.php', pass).then(response => {
                                // En este punto recibimos la respuesta.
                               
                            if(response =='1'){
                                alert('Contraseña cambiada con éxito');
                                $('#current_pass').val('');
                                $('#pass').val('');
                                $('#first_pass').val('');
                            }else{
                                alert('error');
                            }
                                
                                
                            })
                            .catch(error => {
                            // En este punto recibimos el error. then() no se ha invocado
                            console.log('Pass Error: '+error);
                            //window.alert('Error al cargar los datos, intente mas tarde');
                            });
                        }else{
                            alert('Verifique que su contraseña cumpla los minimos requisitos');
                        }
                        
                    } else{
                        window.alert('Las contraseñas no coinciden');
                    }
               }else{
                   alert('Error en su contraseña actual');
               }
                
                
            })
            .catch(error => {
              // En este punto recibimos el error. then() no se ha invocado
              console.log('Pass Error: '+error);
              //window.alert('Error al cargar los datos, intente mas tarde');
            });
           
            
        } else{
            $('#pass').val('');
            $('#first_pass').val('');
        }
        
        
    });

    $('#pass').keyup(function() {
        const pass= $('#pass').val();
        const first_pass= $('#first_pass').val();
        console.log(first_pass);

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

   
    
});


