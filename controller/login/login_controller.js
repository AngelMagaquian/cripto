$(function(){
    console.log('AJAX Login');
    
    //cambiar al input del dni
    $('#user_input').submit(function(e){
        e.preventDefault();
        console.log('user_submit');
            const postData = {
                id : $('#dni').val(),
                pass : $('#pass').val()
            };
            console.log(postData);
           
            $.post('../../model/user/login.ph', postData, function(response){
                console.log(response);
                if(response == 0){
                    //Meli si te va cambiar el cartelito, cambiaselo ahi en el windows, clava el codigo
                    window.alert('Usuario o contraseña incorrecto');
                    $('#user').val('');// con este codigo y el de abajo, vuelve a estar en null todo
                    $('#pass').val('');
                }else{
                    console.log('usuario encontrado');
                    //redirec(response);
                }
            });

    });

    /*function redirec(response){
        let user_data = JSON.parse(response);
        console.log('funcion redirec');
        console.log('el permiso es= '+user_data.permiso);

        switch(user_data.permiso){
            case '1' :
                console.log('ingreso el gerente o desarrollo');
                //url de redireccion
                break;
            
            case '2': 
                console.log('entro un encargado');
                if(user_data.area == '2'){
                    //url de eproduccion
                    console.log('entro produccion')
                } else{
                    //url de eoperaciones
                    console.log('entro finanzas')
                }
                break;

            case '3': 
                console.log('entro un operario');
                //url de operaciones
                break;
            
        }
    }*/

   
   

});