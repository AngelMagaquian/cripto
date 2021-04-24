import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('New account Controller');

    $( document ).ready(function() {
        default_form();
            
    });

    

    $('#new_account_user').submit(function(e){
        e.preventDefault();
        console.log("Insert new bank account");
        const postData= {
            id_bank : $('#select_bank').val(),
            id_type_account : $('#select_type_account').val(),
            CBU : $('#new_cbu').val(),
            num_acc : $('#new_num_acc').val(),
            alias : $('#alias').val()
        };

        console.log(postData);
       

        $.ajax({
            url: '../../../model/datos_bancarios/insert_new_account.php',
            type: 'POST',
            data: postData,
            success: function(response) {
                console.log(response);
              if(response == 1){
                alert('Éxito al cargar la cuenta de banco. Por favor espere que sea verificada por el administrador.');
              }else{
                  alert('Error al cargar la cuenta, verifique los datos ingresados');
              }
            },
            error: function(error) {
                
              // "Marcamos" la Promise con error.
              reject(error);
            }
          });
    })

    function default_form(){
        $('#new_cbu').val('');
        $('#new_num_acc').val('');
        $('#alias').val('');
        banks();
        type_account();
    }

    function banks(){
        get_data('../../model/bank/get_banks.php').then(response =>{
            let data = JSON.parse(response); 
            let template =``;
            data.forEach(dato => {
                template += `
                    <option value="${dato.id_bank}">${dato.name}</option>
                `;
            });

            $('#select_bank').html(template);
        })
        .catch(error => {
            console.log(error);
        });
    }

    function type_account(){
        get_data('../../../model/bank/get_type_account.php').then(response =>{
            let data = JSON.parse(response); 
            let template =``;
            data.forEach(dato => {
                template += `
                    <option value="${dato.id_type_account}">${dato.name} EN ${dato.currency}</option>
                `;
            });

            $('#select_type_account').html(template);
        })
        .catch(error => {
            console.log(error);
        });
    }

});

