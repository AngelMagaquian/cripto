import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('venta Controller');


    $( document ).ready(function() {
       
        
        //si es venta se tiene que mostrar el valor de un 1c (btc,dai,eth,etc) convertido a pesos
        //si es compra se tiene que mostrar el valor de 1c/1peso
        //$('#ars_value').val('1');
        $('#cripto_value').val('1');
        var cripto = $('#cripto_select').val();
        get_cripto_pesos_value(cripto);

    });

    $('#cripto_select').change(function(){
        var cripto = $('#cripto_select').val();
        get_cripto_pesos_value(cripto);
    });

    $('#cripto_value').keyup(function(){
        var cripto = $('#cripto_select').val();
        get_cripto_pesos_value(cripto);
    });

    $('#ars_value').keyup(function(){
        var cripto = $('#cripto_select').val();
        get_pesos_cripto_value(cripto);
    });

    function get_cripto_pesos_value(cripto){
        
        post_data('../../model/calculadora/calculadora2.php', cripto).then(response => {
            // En este punto recibimos la respuesta.
            console.log('cripto: '+response);
            let data = JSON.parse(response); 
    

            switch(cripto){
                case 'bitcoin':
                    cripto_pesos(data.bitcoin.ars);

                    break;
                case 'ethereum':
                    cripto_pesos(data.ethereum.ars);
                    break;

                case 'tether':
                    cripto_pesos(data.tether.ars);
                    break;

                case 'dai':
                    cripto_pesos(data.dai.ars);
                    break;

                case 'chainlink':
                    cripto_pesos(data.chainlink.ars);
                    break;

                case 'ripple':
                    cripto_pesos(data.ripple.ars);
                    break;
            }
            
        })
        .catch(error => {
          console.log(error);
        });
    }


    function get_pesos_cripto_value(cripto){
        var cripto_value = $('#cripto_value').val();
        post_data('../../model/calculadora/calculadora2.php', cripto).then(response => {
            // En este punto recibimos la respuesta.
            console.log('cripto: '+response);
            let data = JSON.parse(response); 
    

            switch(cripto){
                case 'bitcoin':
                    pesos_cripto(data.bitcoin.ars);

                    break;
                case 'ethereum':
                    pesos_cripto(data.ethereum.ars);
                    break;

                case 'tether':
                    pesos_cripto(data.tether.ars);
                    break;

                case 'dai':
                    pesos_cripto(data.dai.ars);
                    break;

                case 'chainlink':
                    pesos_cripto(data.chainlink.ars);
                    break;

                case 'ripple':
                    pesos_cripto(data.ripple.ars);
                    break;
            }
            
        })
        .catch(error => {
          console.log(error);
        });
    }

    //a esto le falta ser multiplicado por la comision y transformarlo al valor del dolar cripto a pesos

    function pesos_cripto(cripto_amount){
        var pesos_amount = $('#ars_value').val();
        var result = pesos_amount/cripto_amount; //cantidad de pesos que quiere invertir el usuario divido en el valor de la cripto, el resultado es la cantidad que puedo comprar
        $('#cripto_value').val((result).toFixed(10)); 
    }

    function cripto_pesos(cripto_value){
        var cant_cripto = $('#cripto_value').val();
        var result = cant_cripto * cripto_value; //cantidad que pone el usuario de cripto que quiere multiplicado por el valor de la api
        $('#ars_value').val((result).toFixed(2)); 
    }


});