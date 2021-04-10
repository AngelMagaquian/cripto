import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('Transactions Controller');

    $( document ).ready(function() {
        all_trans();
    });

    function all_trans(){
        get_data('../../model/operation/transaction_no_complete.php').then(response => {
            // En este punto recibimos la respuesta.
            console.log(response);
            let data = JSON.parse(response); 
            let template = ``;
            let type = "";
            

            


            data.forEach(dato => {

                switch(dato.type) {
                    case '1':
                      type = "COMPRA";
                      break;
                    case '2':
                      type = "VENTA";
                      break;
                  }

                console.log(typeof dato.type);
                
                template += `
                    <tr>
                        <td>${dato.id_user}</td>
                        <td>${dato.user}</td>
                        <td>${dato.DNI}</td>
                        <td>Trans #${dato.id_op}</td>
                        <td>${dato.date_hour}</td>
                        <td><b>${type}</b></td>
                        <td>(${dato.cripto_name})  <b>${dato.cripto_amount} </b></td>
                        <td>$${dato.pesos_amount}</td>
                        <td>${dato.id_wallet_cripto}</td>
                        <td>
                            <button class="btn btn-success">si</button>
                            <button class="btn btn-danger">no</button>
                        </td>
                    </tr>
                `;
            });

            $('#transactions_tbody').html(template);
               
            
        }).catch(error => {
            console.log('error: '+error);
        });
    }
        
    
});

