import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('modal trans Controller');

    $('#modal_show_button').click(function(e){
        e.preventDefault();
        console.log('Modal');
        $('#select_wallet_cripto').html('');
        wallet_user();
         
        let cripto = $('#cripto_select').val();
        wallet_cripto(cripto);
        controll_balnce();
        
    });
    //falta esto
    function controll_balnce(){
        let current_sald = parseInt($('#wallet_user_input').val());
        let pesos = parseInt($('#ars_value').val());

        console.log($('#wallet_user_input').val());
        console.log(parseInt($('#ars_value').val()));
        if((current_sald - pesos)> 0){
            alert('Usted no puede operar');
        }else{
            alert('Usted puede operar');
        }
    }
    

    function wallet_user(){
        get_data('../../../model/user/balance_wallet_user.php').then(response =>{
            let data = JSON.parse(response);
            console.log(data);
            console.log(data.balance);
            
            $('#wallet_user_input').val(data.balance);
        })
        .catch(error =>{    
            console.log(error);
        })
    }

    function wallet_cripto(cripto){
        post_data('../../../model/wallet_cripto/get_wallet_cripto.php',cripto).then(response =>{
            console.log(response);
            if(response !=0){
                let data = JSON.parse(response);
                console.log(data);
                let template =``;

                data.forEach(dato => {
                    template +=`
                        <option value="${dato.id_wallet_cripto}">${dato.wallet_name} - ${dato.id_wallet_cripto}</option>
                    `;
                });
                $('#select_wallet_cripto').html(template);
            }else{
           
                let template =`
                <span id="span_info">Usted no tiene wallet para esta criptomoneda, seleccione otra o solicite una wallet desde la opción "wallet"</span>
                `;
                $('#span_info').html(template);
            }
            
            
        })
        .catch(error =>{    
            console.log(error);
        })
    }    
});

