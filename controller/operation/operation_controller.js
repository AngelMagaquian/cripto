import {get_data} from "../app/get_data.js";
$(function(){
    console.log('Operation Controller');
    let data;
    $( document ).ready(function() {
       
        //funciones para traer los datos del usuario
        get_data('../../model/operation/operation_data.php').then(response => {
            // En este punto recibimos la respuesta.
      
            data = JSON.parse(response); 
            
            table(data);
            divisas();
        })
        .catch(error => {
            console.log('error: '+error);
        });
    });


    $('#date_form').submit(function(e){
        e.preventDefault();
        console.log("date_filter");
        const postData= {
            date_from : $('#desde').val(),
            date_to : $('#hasta').val()
        };

       

        $.post('../../model/operation/date_filter.php', postData, function(response){
            if(response == 0){
                window.alert('Error de fechas: Por favor controler las fechas');
            }else{
                //mostrar con la funcion table la tabla temporal
               
                data = JSON.parse(response); 
                
                table(data); 
            }
        });
    });

    $('#operation_form').submit(function(e){
        e.preventDefault();
        console.log("operation_filter");
        
        //variables auxiliares
        var aux_compra = false;
        var aux_venta = false;

        //verificacion de check, se puede hacer una funcion;
        if($('#op1').is(':checked')){
            aux_compra = true;
        }

        if($('#op2').is(':checked')){
            aux_venta = true;
        }

        if($('#op2').is(':checked')){
            aux_venta = true;
        }

        //lleno el postData con el valor de los check;
        const postData={
            compra: aux_compra,
            venta: aux_venta
        }

        console.log(postData);

        $.post('../../model/operation/operation_filter.php', postData, function(response){
            
                //mostrar con la funcion table la tabla temporal
                data = JSON.parse(response); 
                
                table(data);
            
        });
        
    });



    $('#cripto_form').submit(function(e){
        e.preventDefault();
        console.log("cripto_filter");
        
        //variables auxiliares
        const postData ={
            cripto : $('#divisa').val()
        }
        var cripto = $('#divisa').val();

        //verificacion de check, se puede hacer una funcion;
      
        $.post('../../model/operation/cripto_filter.php', postData, function(response){
                
                data = JSON.parse(response); 
                
                table(data);
            
        });
        
    });














    function divisas(){
        get_data('../../model/operation/divisas.php').then(response => {
            // En este punto recibimos la respuesta.
            data = JSON.parse(response); 
            
            let template=``;
            data.forEach(dato =>{
                
                   template += `
                   <option value='${dato.ID_cripto}'>${dato.name} (${dato.description})</option>
                   `;
            })
            template += `
                   <option value='100'>TODAS</option>
                   `;
            $('#divisa').html(template);

            
        })
        .catch(error => {
            console.log('error: '+error);
        });
    }

    function table(data){
        let template =``;
        let state= '';

        data.forEach(dato =>{
            if(dato.state == 1){
                state = 'COMPLETADA';
           }else if(dato.state == 2){
                state = 'PENDIENTE';
           }else{
               state = 'CANCELADA';
           }
               template += `
               <tr>
                   <td>${dato.type}</td>
                   <td>${dato.cripto_name} </td>
                   <td>$${dato.pesos_amount} </td>
                   <td>${dato.cripto_amount} </td>
                   <td>${dato.wallet_name} </td>
                   <td>${dato.date_hour} </td>
                   <td>${state} </td>
                   
               </tr>
               `;
        })
        
       
        
        $('#operation_tbody').html(template);
    }

   

});