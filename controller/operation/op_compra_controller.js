import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('compra Controller');


    $( document ).ready(function() {
       
        
        //si es venta se tiene que mostrar el valor de un 1c (btc,dai,eth,etc) convertido a pesos
        //si es compra se tiene que mostrar el valor de 1c/1peso
        $('#ars_value').val('1');
        //$('#cripto_value').val('1');
        var cripto = $('#cripto_select').val();
        get_cripto_value(cripto);

    });

    $('#cripto_select').change(function(){
        var cripto = $('#cripto_select').val();
        get_cripto_value(cripto);
    });

    $('#cripto_value').keyup(function(){
        var cripto = $('#cripto_select').val();
        get_cripto_value(cripto);
    });

    function get_cripto_value(cripto){
        var pesos_value = $('#cripto_value').val();
        post_data('../../model/calculadora/calculadora2.php', cripto).then(response => {
            // En este punto recibimos la respuesta.
            console.log('cripto: '+response);
            let data = JSON.parse(response); 
    

            switch(cripto){
                case 'bitcoin':
                    
                    var result = pesos_value /data.bitcoin.ars ;
                    $('#cripto_value').val((result).toFixed(2)); 

                    break;
                case 'ethereum':
                    var result =  pesos_value /data.ethereum.ars;
                    $('#cripto_value').val((result).toFixed(2)); 
                    break;

                case 'tether':
                    var result = pesos_value /data.tether.ars;
                    $('#cripto_value').val((result).toFixed(2)); 
                    break;

                case 'dai':
                    var result = pesos_value /data.dai.ars;
                    $('#cripto_value').val((result).toFixed(2)); 
                    break;

                case 'chainlink':
                    var result = pesos_value /data.chainlink.ars;
                    $('#cripto_value').val((result).toFixed(2)); 
                    break;

                case 'ripple':
                    var result = pesos_value /data.ripple.ars;
                    $('#cripto_value').val((result).toFixed(2)); 
                    break;
            }
            
        })
        .catch(error => {
          console.log(error);
        });
    }




    

   

});