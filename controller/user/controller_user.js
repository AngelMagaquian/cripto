import {get_data} from "../app/get_data.js";

$(function(){
    console.log('ControlerUser');
    $( document ).ready(function() {
       
        get_data('../../model/user/user_data.php').then(response => {
            // En este punto recibimos la respuesta.
           
                let data = JSON.parse(response); 
    
                $('#name_user').val(data.name_user);
                $('#last_name').val(data.last_name);
    
                $('#middle_name').val(data.middle_name);
                $('#second_last_name').val(data.second_last_name);
    
                $('#dni').val(data.DNI);
                $('#cuil').val(data.CUIL);
    
                $('#birth_day').val(data.birth_day);
                $('#email').val(data.email);
                
            
            
        })
        .catch(error => {
          // En este punto recibimos el error. then() no se ha invocado
         //window.alert('Error al cargar los datos, intente mas tarde');
        });            
    });

    $('#from_photo').submit(function(e){
        e.preventDefault();
        console.log("update pass");
        var confirmation = confirm('¿Desea subir esta fotografia?');
        if(confirmation == true){
            
            
        } else{
            
        }
        
        
    });

    $(document).on("change", "#from_photo", function(){
        console.log(this.files)
        var file = this.files;
        var element;

        var supportedImages = ['image/jpeg', 'image/png', 'image/gif'];
    });

});

