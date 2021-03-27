import {get_data} from "../app/get_data.js";
$(function(){
    console.log('Wallet user Controller');

    $( document ).ready(function() {
        
        get_data('../../model/user/balance_wallet_user.php').then(response => {
            
            let data = JSON.parse(response); 
            var template=``;
            
            if(data.OS_balance == '0'){
                template =`<span>Balance: $${data.balance}</span>`;
            }else{
                template =`<span>Balance: $${data.balance} + Saldo Pendiente: ($${data.OS_balance})</span>`;
            }
            
            
            $('#wallet_user').html(template);
        })
        .catch(error => {
            
        });  
        
    });

});

