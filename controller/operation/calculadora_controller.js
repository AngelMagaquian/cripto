import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('venta Controller');

  /*   "type_trans"                             
    "id_cripto"                             
    "monto_cripto"                           
    "valor_cripto_sc"                        
    "valor_cripto_cc"                           
    "comision"                         
    "dolar"           
    "monto_pesos" */

    var commission_venta = 0.0;
    var commission_compra = 0.0;
    var dolar_cripto = 0.0;
    var controller_compra = true;

    $( document ).ready(function() {
       
        get_admin_values();
        //si es venta se tiene que mostrar el valor de un 1c (btc,dai,eth,etc) convertido a pesos
        //si es compra se tiene que mostrar el valor de 1c/1peso
        //$('#ars_value').val('1');
        
        $('#cripto_value').val('1');
        var cripto = $('#cripto_select').val();
        get_cripto_pesos_value(cripto);

        if($('#option1').is(':checked')){
            controller_compra = true;
            /* $('#type_trans').val('');
            $('#type_trans').val('compra'); */
        }

        if($('#option2').is(':checked')){
            controller_compra = false;
            /* $('#type_trans').val('');
            $('#type_trans').val('venta'); */
        } 

			
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

    //verificar esto
    $('input[name=operation]').change(function() {
        
        if (this.value == '1') {
            console.log('compra');
            controller_compra = true;
            let cripto = $('#cripto_select').val();
            get_cripto_pesos_value(cripto);
            /* $('#type_trans').val('');
            $('#type_trans').val('compra'); */
           /*  $('#comision').val(commission_compra); */
    
        }
        else if (this.value == '2') {
            controller_compra = false;
            console.log('venta');
            let cripto = $('#cripto_select').val();
            get_cripto_pesos_value(cripto);
           /*  $('#type_trans').val('');
            $('#type_trans').val('venta'); */
           /*  $('#comision').val(commission_venta); */
  
        }
    });

   /*  $('input[name=operation]').select(function() {
        
        if (this.value == '1') {
            console.log('compra');
          
        }
        else if (this.value == '2') {
            controller_compra = false;
            console.log('venta');
         
        }
    }); */


    $('#cripto_select').change(function(){
        var cripto = $('#cripto_select').val();
        /* $('#id_cripto').val(''); */
       /*  $('#id_cripto').val($('#cripto_select').val()); */
   
        get_cripto_pesos_value(cripto);
        
    });

    $('#cripto_value').keyup(function(){
        var cripto = $('#cripto_select').val();
        /* $('#monto_cripto').val('');
        $('#monto_cripto').val($('#cripto_value').val()); */
    
        get_cripto_pesos_value(cripto);
    });

    $('#ars_value').keyup(function(){
        var cripto = $('#cripto_select').val();
        /* $('#monto_pesos').val('');
        $('#monto_pesos').val($('#ars_value').val()); */

        get_pesos_cripto_value(cripto);
    });

 

    

    function get_cripto_pesos_value(cripto){
        
        post_data('../../model/calculadora/calculadora2.php', cripto).then(response => {
            // En este punto recibimos la respuesta.
            console.log(response)
            let data = JSON.parse(response); 
            /* $('#id_cripto').val('');
            $('#id_cripto').val(cripto); */
           /*  $('#valor_cripto_sc').val('');
            $('#valor_cripto_sc').val(data.value * dolar_cripto); */
            
            /* $('#id_cripto').val('');
            $('#id_cripto').val(cripto);

            $('#valor_cripto_sc').val('');
            $('#valor_cripto_sc').val(data.value);

            $('#monto_cripto').val('');
            $('#monto_cripto').val($('#cripto_value').val());

            $('#monto_pesos').val('');
            $('#monto_pesos').val($('#ars_value').val());

            console.log('id_cripto: '+$('#id_cripto').val());
            console.log('valor_cripto_sc: '+$('#valor_cripto_sc').val());
            console.log('monto_cripto: '+$('#monto_cripto').val());
            console.log('monto_pesos: '+$('#monto_pesos').val()); */

            

            cripto_pesos(data.value);

        })
        .catch(error => {
          console.log(error);
        });
    }


    function get_pesos_cripto_value(cripto){
        
        post_data('../../model/calculadora/calculadora2.php', cripto).then(response => {
            // En este punto recibimos la respuesta.
            
            let data = JSON.parse(response); 
           /*  $('#id_cripto').val('');
            $('#id_cripto').val(cripto); */

           /*  $('#valor_cripto_sc').val('');
            $('#valor_cripto_sc').val(data.value * dolar_cripto); */

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
        if(controller_compra == true){
            var pesos_amount = $('#ars_value').val();
            var result = pesos_amount/(cripto_amount * dolar_cripto); //cantidad de pesos que quiere invertir el usuario divido en el valor de la cripto, el resultado es la cantidad que puedo comprar 
            result = ((result * commission_compra)/100) + result;
            let cotizacion = cripto_value*dolar_cripto;
            cotizacion = (((cotizacion*commission_compra)/100)+cotizacion);
            $('#cripto_value').val(result.toFixed(3)); 
           /*  $('#monto_cripto').val('');
            $('#monto_cripto').val($('#cripto_value').val()); */
          
            /* $('#monto_pesos').val('');
            $('#monto_pesos').val($('#ars_value').val()); */

           /*  $('#valor_cripto_cc').val('');
            $('#valor_cripto_cc').val(cotizacion); */
        }else{
            var pesos_amount = $('#ars_value').val();
            var result = pesos_amount/(cripto_amount * dolar_cripto); //cantidad de pesos que quiere invertir el usuario divido en el valor de la cripto, el resultado es la cantidad que puedo comprar 
            result = ((result * commission_venta)/100) + result;
            let cotizacion = cripto_value*dolar_cripto;
            cotizacion = (((cotizacion*commission_venta)/100)+cotizacion);
            $('#cripto_value').val(result); 
           /*  $('#monto_cripto').val('');
            $('#monto_cripto').val($('#cripto_value').val()); */
        
            /* $('#monto_pesos').val('');
            $('#monto_pesos').val($('#ars_value').val()); */
           
           /*  $('#valor_cripto_cc').val('');
            $('#valor_cripto_cc').val(cotizacion); */
        }
       
    }

    function cripto_pesos(cripto_value){
   
        if(controller_compra == true){
            var cant_cripto = $('#cripto_value').val();
            var result = cant_cripto * cripto_value; //cantidad que pone el usuario de cripto que quiere multiplicado por el valor de la api
            result = result * dolar_cripto;
            result = ((result * commission_compra)/100) + result;
            let cotizacion = cripto_value*dolar_cripto;
            cotizacion = (((cotizacion*commission_compra)/100)+cotizacion);
            $('#ars_value').val(result.toFixed(2)); 

           /*  $('#monto_cripto').val('');
            $('#monto_cripto').val($('#cripto_value').val()); */
           
           /*  $('#monto_pesos').val('');
            $('#monto_pesos').val($('#ars_value').val()); */
           /* 
            $('#valor_cripto_cc').val('');
            $('#valor_cripto_cc').val(cotizacion); */
        }else{
            var cant_cripto = $('#cripto_value').val();
            var result = cant_cripto * cripto_value; //cantidad que pone el usuario de cripto que quiere multiplicado por el valor de la api
            result = result * dolar_cripto;
            result = ((result * commission_venta)/100) + result;
            let cotizacion = cripto_value*dolar_cripto;
            cotizacion = (((cotizacion*commission_venta)/100)+cotizacion);
            $('#ars_value').val(result.toFixed(2)); 
            /* $('#monto_cripto').val('');
            $('#monto_cripto').val($('#cripto_value').val()); */
         
            /* $('#monto_pesos').val('');
            $('#monto_pesos').val($('#ars_value').val()); */
      
           /*  $('#valor_cripto_cc').val('');
            $('#valor_cripto_cc').val(cotizacion); */
        }
    }

    
    function get_admin_values(){
        
        get_data('../../model/calculadora/get_values.php').then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 

            data.forEach(dato => {
                switch(dato.ID_value){
                    case '1':
                        dolar_cripto = dato.value;
                        
                       /*  $('#dolar').val(dolar_cripto); */
                        
                    break;

                    case '2':
                        commission_compra = dato.value;
                       /*  $('#comision').val(commission_compra); */
                 
                        
                    break;

                    case '3':
                        commission_venta = dato.value;
                        
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