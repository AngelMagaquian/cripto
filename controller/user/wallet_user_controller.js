import {get_data} from "../app/get_data.js";
import {number_format} from "../app/number_format.js"
$(function(){
    console.log('Wallet user Controller');

    $( document ).ready(function() {
        
        get_data('../../model/user/balance_wallet_user.php').then(response => {
            console.log(response);
            let data = JSON.parse(response); 
            var template=``;
            
            if(data.OS_balance == '0'){
                template =`<span>${number_format(data.balance,2)}</span>`;
            }else{
                template =`<span>${number_format(data.balance,2)} + Saldo Pendiente: ($${number_format(data.OS_balance,2)})</span>`;
            }
            
            
            $('#wallet_user_balance').html(template);
        })
        .catch(error => {
            console.log(error);
        });  
        
    });

});

