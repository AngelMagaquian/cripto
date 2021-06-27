import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('New Wallet Controller');
    let data; 
    $( document ).ready(function() {
        //dejar todo el form en blanco
        //setInterval(function(){$("#datosUserTable").draw(); }, 1000);
        default_form();
        
        
    });

    $('#user_search_wc').submit(function(e){
        e.preventDefault();
        var dni = $('#dni_search_wc').val();
        

        post_data('../../model/user/DNI_search.php', dni).then(response => {
            // En este punto recibimos la respuesta.
            data = JSON.parse(response); 
                console.log(data);
                $('#name_wc').val(data.name_user);
                $('#middle_name_wc').val(data.middle_name);

                $('#last_name_wc').val(data.last_name);

                $('#second_last_name_wc').val(data.second_last_name);
                $('#DNI_wc').val(data.DNI);
                $('#CUIL_wc').val(data.CUIL);
                $('#email_wc').val(data.email);

                auto_complete_desc();
            
        })

        console.log(data);

        
        
    });
    



    function divisas(){
        get_data('../../model/operation/divisas.php').then(response => {
            // En este punto recibimos la respuesta.
            let divisa = JSON.parse(response); 
            
            let template=``;
            divisa.forEach(divisas =>{
                
                
                   template += `
                   <option value='${divisas.ID_cripto}'>${divisas.name} (${divisas.description})</option>
                   `;
            })
            $('#divisa').html(template);

            
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }
 
    $('#divisa').on('change', function (){
        //var name = $('#name_wc').val();
        
        auto_complete_desc();
    });
      
   /*  function auto_complete_desc(){
        
        var user_name= $('#name_wc').val();
        var line = $('#divisa option:selected').text();
        var cad = 'Wallet '+ line + ' ' + user_name;
        
        $('#description_cripto_wallet').val(cad);
    } */


    function default_form(){
        $('#name_wc').val('');
        $('#middle_name_wc').val('');
        $('#last_name_wc').val('');
        $('#second_last_name_wc').val('');
        $('#DNI_wc').val('');
        $('#CUIL_wc').val('');
        $('#email_wc').val('');
        divisas();
        table();
    }

    function table(){
        get_data('../../model/wallet_cripto/pending_wallet.php').then(response => {
            // En este punto recibimos la respuesta.
            let dato = JSON.parse(response); 
            console.log(response);
            let template=``;
            dato.forEach(data =>{
                   template += `
                        <tr>
                            <td>#${data.ID_pending}</td>
                            <td>${data.user_name}</td>
                            <td>${data.ID_user}</td>
                            <td>${data.cripto_name}</td>
                        </tr>
                   `;
            })
            $('#twallet').html(template);

            
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }




    $('#add_wallet').submit(function(e){
        e.preventDefault();


        var confirmation_wallet = confirm('¿Desea agregar esta wallet? Recuerde revisar los datos');
        if(confirmation_wallet == true){
                let postData ={
                    id_user : $('#id_user').val(),
                    id_cripto_wallet: $('#wallet_id').val(),
                    description_cripto_alias: $('#description_cripto_wallet').val(),
                    id_cripto: $('#divisa').val(),
                    id_pending: $('#id_pending').val()
                }
                console.log(postData);
                
                $.ajax({
                    url: '../../model/wallet_cripto/new_wallet_cripto.php',
                    type: 'POST',
                    data: postData,
                    success: function(response) {
                      //const json = JSON.parse(response);
                      console.log(response);
                      if(response == 1){
                        alertify.alert("<p class='text-center'>¡Wallet agregada con éxito!</p>", function () {}).set({title:"Agregar Wallet"});
                        //default_form();
                        window.location.reload();
                        
                      }else{
                        alertify.alert("<p class='text-center'>Ocurrio un error, el código de wallet ya existe</p>", function () {}).set({title:"Agregar Wallet"});
                      }
                       
                    },
                    error: function(error) {
                        
                      // "Marcamos" la Promise con error.
                      console.log(error);
                    }
                });
            
        } else{
            $('#wallet_id').val('');
            $('#description_cripto_wallet').val('');
        }
    });




});

