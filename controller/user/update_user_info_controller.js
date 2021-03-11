$(function(){
    console.log('AJAX Update User');
    var check_pass = false;
    //primero traer los datos del usuario para mostrar
   

    $('#update_pass').submit(function(e){
        e.preventDefault();
        console.log("update pass");
        var confirmation = confirm('¿Desea cambiar su contraseña?');
        if(confirmation == true){
            var pass= $('#pass').val();
            var pass2 =$('#first_pass').val();
            if(pass === pass2){
                $.ajax({
                    url: '../../model/user/update_pass.php',
                    type: 'POST',
                    data: {pass},
                    success: function(response) {
                    if(response == 1){
                        window.alert('Contraseña cambiada con éxito');
                    }
                    }
                });
            } else{
                window.alert('Las contraseñas no coinciden');
            }
            
        } else{
            $('#pass').val('');
            $('#first_pass').val('');
        }
        
        
    });

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

   
    
});


