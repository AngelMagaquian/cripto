import {get_data} from "../app/get_data.js";
$(function(){
    console.log('Bank Controller');

    $( document ).ready(function() {
       
            //funciones para traer los datos del usuario
            get_data('../../model/datos_bancarios/get_account.php').then(response => {
                // En este punto recibimos la respuesta.
               
                let data = JSON.parse(response); 
                if(data.check_account == 1){
                    $('#estado').html('ESTADO: CONFIRMADA');
                } else{
                    $('#estado').html('ESTADO: NO CONFIRMADA');
                }
                
               // $('#name').val(''); //agregar
    
                //$('#CUIL').val(data.CUIL); //AGREGAR
                
                $('#bank').html('BANCO: '+data.bank);
                $('#type_account').val(data.type_account_name);
    
                $('#type_currency').val(data.currency);
                $('#CBU').val(data.CBU);
                $('#account_number').val(data.account_number);
                
                
            })
            .catch(error => {
              // En este punto recibimos el error. then() no se ha invocado
              //window.alert('Error al cargar los datos, intente mas tarde');
            });



            get_data('../../model/user/user_data.php').then(response => {
                // En este punto recibimos la respuesta.
                    let data = JSON.parse(response); 
                    var name = data.last_name + ' '+ data.second_last_name + ' '+ data.name_user + ' ' +data.middle_name;
                    $('#name').val(name);
                    $('#CUIL').val(data.name_user);
                
            })
            .catch(error => {
              // En este punto recibimos el error. then() no se ha invocado
              //window.alert('Error al cargar los datos, intente mas tarde');
            });
 
        
    });

});

