import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";

$(function (){
    console.log('value controller');

    $( document ).ready(function() {
        //dejar todo el form en blanco
        //setInterval(function(){$("#datosUserTable").draw(); }, 1000);
        get_values();
        
    });

    $('#change_dolar').submit(function(e){
        e.preventDefault();
        let option = confirm('¿Desea cambiar el valor del dolar?');

        if(option === true){
            new_values($('#new_Dolar').val(),1);
        }else{
            
        }       
    })

    $('#change_venta').submit(function(e){
        e.preventDefault();
        let option = confirm('¿Desea cambiar el valor de la comisión de venta?');

        if(option === true){
          
            new_values($('#new_Venta').val(),3);
        }else{
            
        }       
    })

    $('#change_compra').submit(function(e){
        e.preventDefault();
        let option = confirm('¿Desea cambiar los valores la comisión de compra?');

        if(option === true){
            new_values($('#new_Compra').val(),2);
        }else{
            
        }       
    })

    function get_values(){
        get_data('../../model/calculadora/get_values.php').then(response => {
            let data = JSON.parse(response);
            data.forEach(dato => {
                switch(dato.ID_value){
                    case '1':
                        $('#Actual_Dolar').val('$'+dato.value);
                        break;
                    case '2':
                        $('#Actual_Compra').val(dato.value+'%');
                        break;

                    case '3':
                        $('#Actual_Venta').val(dato.value+'%');
                        break;
                }
            });
        }).catch(error =>{
            console.log(error);
        })
    }

    function new_values(value, id){
        const postData ={
            data : value,
            id_value : id
        }
        $.post('../../model/admin_value/admin_value.php', postData).then(response => {
            alert('Actualización exitosa');
            get_values();
        
        })
        .catch(error => {
            // En este punto recibimos el error. then() no se ha invocado
            console.log(error);

        }); 


    }
})