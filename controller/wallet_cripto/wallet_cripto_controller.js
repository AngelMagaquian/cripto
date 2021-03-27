import {get_data} from "../app/get_data.js";

$(function(){
    console.log('Wallet_Cripto Controller');
    $( document ).ready(function() {
       
        get_data('../../model/wallet_cripto/wallet_cripto_data.php').then(response => {
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
    });

 

    $('#buscar').submit(function(e){
        e.preventDefault();
        
        
        
        
    });

    
});

