import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('New Bank Controller');
    let data; 
    $( document ).ready(function() {
        //dejar todo el form en blanco
        //setInterval(function(){$("#datosUserTable").draw(); }, 1000);
        default_form();
        
        
    });

    function default_form(){
        $('#bank_name').val('');
        $('#bank_description').val('');
    }




    $('#add_new_bank').submit(function(e){
        e.preventDefault();
        
        var confirmation_wallet = confirm('¿Desea agregar este banco? Recuerde revisar los datos');
        if(confirmation_wallet == true){
                
                let postData ={
                    id_bank : $('#id_bank').val(),
                    name_bank: $('#bank_name').val().toUpperCase()
                }
                console.log(postData);
                
                $.ajax({
                    url: '../../model/bank/new_bank.php',
                    type: 'POST',
                    data: postData,
                    success: function(response) {
                      //const json = JSON.parse(response);
                      console.log(typeof response);
                      
                        if(response){
                            alert('Error al agregar el banco, intente mas tarde');
                        }else{
                            alert('Banco agregado con exito');
                            $('#id_bank').val('');
                            $('#bank_name').val('');
                        }

                    },
                    error: function(error) {
                        
                      // "Marcamos" la Promise con error.
                      console.log(error);
                    }
                });
            
        } else{
            $('#id_bank').val('');
            $('#bank_name').val('');
        }
    });

    /*function string_controll(cadena){
        if(cadena.substr([1, 1]) == " " && cadena.substr([1, 1]) == "     " ){
            console.log('hay espacio');
        }
        
    }*/






});

