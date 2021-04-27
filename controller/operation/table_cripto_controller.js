import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('table cripto Controller');

    var commission_compra = 0.0;
    var commission_venta= 0.0;
    var dolar_cripto = 0.0;

    $( document ).ready(function() {
       
        get_admin_values();
        
        
        //get_cripto_pesos_value(cripto);



        var criptos = ['bitcoin', 'ethereum', 'tether','dai','chainlink','ripple']; 

        criptos.forEach(cripto => {
            post_data('../../../model/calculadora/calculadora2.php', cripto).then(response => {
                // En este punto recibimos la respuesta.
                let data = JSON.parse(response); 
 

                var result = data.value;
                result = result * dolar_cripto;
                let result_compra = ((result * commission_compra)/100) + result;
                let result_vender = ((result * commission_venta)/100) + result;

                switch(cripto){
                    case 'bitcoin':
                        $('#btc_compra').html('$'+(result_compra).toFixed(2)); 
                        $('#btc_venta').html('$'+(result_vender).toFixed(2)); 
                    break;

                    case 'ethereum':
                        $('#eth_compra').html('$'+(result_compra).toFixed(2)); 
                        $('#eth_venta').html('$'+(result_vender).toFixed(2)); 
                    break;

                    case 'tether':
                        $('#usdt_compra').html('$'+(result_compra).toFixed(2)); 
                        $('#usdt_venta').html('$'+(result_vender).toFixed(2)); 
                    break;

                    case 'dai':
                        $('#dai_compra').html('$'+(result_compra).toFixed(2)); 
                        $('#dai_venta').html('$'+(result_vender).toFixed(2)); 
                    break;

                    case 'chainlink':
                        $('#link_compra').html('$'+(result_compra).toFixed(2)); 
                        $('#link_venta').html('$'+(result_vender).toFixed(2)); 
                    break;

                    case 'ripple':
                        $('#xrp_compra').html('$'+(result_compra).toFixed(2)); 
                        $('#xrp_venta').html('$'+(result_vender).toFixed(2)); 
                    break;
                }
                
                
    
            })
            .catch(error => {
              console.log(error);
            });
        });

    });

    
    function get_admin_values(){
        get_data('../../../model/calculadora/get_values.php').then(response => {
            // En este punto recibimos la respuesta.
            
            let data = JSON.parse(response); 
            data.forEach(dato => {
                console.log(typeof(dato.ID_value));
                switch (dato.ID_value){
                    case '1':
                        dolar_cripto = dato.value;
                    break;

                    case '2':
                        commission_venta = dato.value;
                    break;

                    case '3':
                        commission_venta = (dato.value);
                    break;
                }
            });
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }

    /*function precise(x) {
        return Number.parseFloat(x).toPrecision(4);
    }*/


});