import {get_data} from "../app/get_data.js";


$(function(){
    console.log('Wallet_Cripto Controller');
    $( document ).ready(function() {
        wallet_cripto_table();
        divisas();
    });

    function wallet_cripto_table(){
        get_data('../../../model/wallet_cripto/wallet_cripto_data.php').then(response => {
            // En este punto recibimos la respuesta.
                
            let data = JSON.parse(response); 
            
                let template =``;
                data.forEach(dato =>{
                       template += `
                       <tr>
                           <td>${dato.id_wallet_cripto}</td>
                           <td>${dato.cripto_name} </td>   
                           <td>${dato.wallet_name} </td>   
                       </tr>
                       `;
                })
                $('#wallet_tbody').html(template);
                
            
        })
        .catch(error => {
          // En este punto recibimos el error. then() no se ha invocado
         //window.alert('Error al cargar los datos, intente mas tarde');
         console.log(error)
        }); 
    }

    function divisas(){
        get_data('../../../model/operation/divisas.php').then(response => {
            // En este punto recibimos la respuesta.
            
            let data = JSON.parse(response); 
            
            let template=``;
            data.forEach(dato =>{
                   template += `
                   <option value='${dato.ID_cripto}'>${dato.name} (${dato.description})</option>
                   `;
            })
            
            $('#divisa_wallet').html(template);

            
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }

 

    $('#add_wallet').submit(function(e){
        e.preventDefault();
        
        var confirmation = confirm('¿Desea agregar esta wallet? Recuerde revisar los datos');
        if(confirmation == true){
                let postData ={
                    id_cripto_wallet: $('#id_cripto_wallet').val(),
                    description_cripto_alias: $('#description_cripto_wallet').val(),
                    id_cripto: $('#divisa_wallet').val()
                }
                console.log(postData);
                
                $.ajax({
                    url: '../../../model/wallet_cripto/new_wallet_cripto.php',
                    type: 'POST',
                    data: postData,
                    success: function(response) {
                      //const json = JSON.parse(response);
                      if(response == 1){
                        $('#id_cripto_wallet').val('');
                        $('#description_cripto_wallet').val('');
                        wallet_cripto_table();
                        
                      }else{
                        console.log('Ocurrio un error, intente mas tarde');
                      }
                       
                    },
                    error: function(error) {
                        
                      // "Marcamos" la Promise con error.
                      console.log(error);
                    }
                  });
            
        } else{
            $('#id_cripto_wallet').val('');
            $('#description_cripto_wallet').val('');
        }
    });

    
});

