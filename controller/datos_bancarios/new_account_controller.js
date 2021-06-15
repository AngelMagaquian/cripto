import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('New account Controller');

    $('#new_account_user').click(function(e){
        default_form();
    })

    

    $('#new_account').submit(function(e){
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
       
        get_data('../../model/transaction/trans_controller.php').then(response =>{
            let data  =JSON.parse(response);
            if(data.email == 1 && data.user == 1){
                var opcion = confirm('¿Desea confirmar la cuenta bancaria?');
                if (opcion == true) {
                    $.ajax({
                        url: '../../model/datos_bancarios/insert_new_account.php',
                        type: 'POST',
                        data: postData,
                        success: function(response) {
                            console.log(response);
                          if(response == 1){
                            alert('Éxito al cargar la cuenta de banco. Por favor espere que sea verificada por el administrador.');
                            CierraPopup();
                          }else{
                              alert('Error al cargar la cuenta, verifique los datos ingresados');
                          }
                        },
                        error: function(error) {
                            
                          // "Marcamos" la Promise con error.
                          reject(error);
                        }
                    });
                }else{
                    CierraPopup();
                }
                
            }else{
                let template =`
                    <span id="span_info">
                    Falta la confirmación de su identidad para poder operar.
                    </span>
                    `;
                    $('#span_info').html(template);
            }

            
        })
        .catch(error => {
            console.log(error);
        });

        
    }) 

    function default_form(){
        console.log('default values');
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
        get_data('../../model/bank/get_type_account.php').then(response =>{
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

    function CierraPopup() {
        $("#exampleModal").modal('hide');//ocultamos el modal
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      }

});

