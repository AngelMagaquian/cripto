import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('venta Controller');

    var commission = 0.0;
    var dolar_cripto = 0.0;

    $( document ).ready(function() {
       
        get_admin_values();
        //si es venta se tiene que mostrar el valor de un 1c (btc,dai,eth,etc) convertido a pesos
        //si es compra se tiene que mostrar el valor de 1c/1peso
        //$('#ars_value').val('1');
        $('#cripto_value').val('1');
        var cripto = $('#cripto_select').val();
        get_cripto_pesos_value(cripto);

       /*  $("input[name='operation']").click(function () {    
            alert("La edad seleccionada es: " + $('input:radio[name=operation]:checked').val());
            alert("La edad seleccionada es: " + $(this).val());
        });




        if( $("#formulario input[name='operation']:radio").is(':checked')) {  
            alert("Bien!!!, la edad seleccionada es: " + $('input:radio[name=operation]:checked').val());
            
            } else{  
                alert("Selecciona la edad por favor!!!");  
                }  */

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
        
        post_data('../../../model/calculadora/calculadora2.php', cripto).then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 
            cripto_pesos(data.value);
            let valor = data.value;
            
            $('#cripto_seleccionada').html(cripto+' = '+ valor.toFixed(2)+'usd');
            

        })
        .catch(error => {
          console.log(error);
        });
    }


    function get_pesos_cripto_value(cripto){
        
        post_data('../../../model/calculadora/calculadora2.php', cripto).then(response => {
            // En este punto recibimos la respuesta.
            console.log('cripto: '+response);
            let data = JSON.parse(response); 
            pesos_cripto(data.value);
            
        })
        .catch(error => {
          console.log(error);
        });
    }

    //a esto le falta ser multiplicado por la comision y transformarlo al valor del dolar cripto a pesos

    /* $("input[name='operation']:checked").click(function(){
        console.log('oli');
    }) */


    function pesos_cripto(cripto_amount){
        var pesos_amount = $('#ars_value').val();
        var result = pesos_amount/(cripto_amount * dolar_cripto); //cantidad de pesos que quiere invertir el usuario divido en el valor de la cripto, el resultado es la cantidad que puedo comprar 
        $('#cripto_value').val(result); 
    }

    function cripto_pesos(cripto_value){
        var cant_cripto = $('#cripto_value').val();
        var result = cant_cripto * cripto_value; //cantidad que pone el usuario de cripto que quiere multiplicado por el valor de la api
        result = result * dolar_cripto;
        result = ((result * commission)/100) + result;
        let commission_value = (result * commission)/100;

        $('#ars_value').val((result).toFixed(2)); 
        $('#commision').html('Comision = '+ commission+'%'+' ' + '($'+commission_value.toFixed(2)+')');
        //$('#ars_value').val(result); 
    }

    
    function get_admin_values(){
        get_data('../../../model/calculadora/get_values.php').then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 
            console.log(data);
            data.forEach(dato => {
                if(dato.ID_value == 1){
                    dolar_cripto = dato.value;
                }else{
                    commission = dato.value
                }
            });
            $('#commision').html('Comision = '+ commission+'%');
            $('#dolar_cripto').html('Dolar Cripto = $'+ dolar_cripto);

            
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }

    /*function precise(x) {
        return Number.parseFloat(x).toPrecision(4);
    }*/


});