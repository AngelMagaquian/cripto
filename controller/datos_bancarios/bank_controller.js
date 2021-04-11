import {get_data} from "../app/get_data.js";
$(function(){
    console.log('Bank Controller');

    $( document ).ready(function() {
       
            //funciones para traer los datos del usuario
            get_data('../../model/datos_bancarios/get_account.php').then(response => {
                // En este punto recibimos la respuesta.
               
                let data = JSON.parse(response); 
                let template =``;


                data.forEach(dato =>{
                    if(data.check_account == 1){
                        $('#estado').html('ESTADO: CONFIRMADA');
                    } else{
                        $('#estado').html('ESTADO: NO CONFIRMADA');
                    }
                    /*$('#bank').html('BANCO: '+dato.bank);
                    $('#type_account').val(dato.type_account_name);
                    $('#type_currency').val(dato.currency);
                    $('#CBU').val(dato.CBU);
                    $('#account_number').val(dato.account_number);*/


                })



            
                
                
                
                
                
                
            })
            .catch(error => {
              // En este punto recibimos el error. then() no se ha invocado
              //window.alert('Error al cargar los datos, intente mas tarde');
            });



            /*get_data('../../model/user/user_data.php').then(response => {
                // En este punto recibimos la respuesta.
                    let data = JSON.parse(response); 
                    var name = data.last_name + ' '+ data.second_last_name + ' '+ data.name_user + ' ' +data.middle_name;
                    $('#name').val(name);
                    $('#CUIL').val(data.CUIL);
                
            })
            .catch(error => {
              // En este punto recibimos el error. then() no se ha invocado
              //window.alert('Error al cargar los datos, intente mas tarde');
            });*/
 
        
    });

});

