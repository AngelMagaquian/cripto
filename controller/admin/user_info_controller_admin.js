import {get_data} from "../app/get_data.js";
import {post_data} from "../app/post_data.js";
$(function(){
    console.log('User info Controller');

    $( document ).ready(function() {
        //dejar todo el form en blanco
        //setInterval(function(){$("#datosUserTable").draw(); }, 1000);
        user_table();
    });

 
    
    

    


    function user_table(){
        get_data('../../../model/user/all_user_data.php').then(response => {
            // En este punto recibimos la respuesta.
            let data = JSON.parse(response); 
            let template=``;
            data.forEach(dato =>{
                
                if(dato.middle_name == ""){
                    var name = dato.name_user;
                }else {
                    var name = dato.name_user + ' ' + dato.middle_name;
                }

                if(dato.second_last_name == ""){
                    var last_name = dato.last_name;
                }else {
                    var last_name = dato.last_name + ' ' + dato.second_last_name;
                }

              
                
                        template +=`
                        <tr>
                            <td>${dato.ID_user}</td>
                            <td>${dato.DNI}</td>
                            <td>${dato.CUIL}</td>
                            <td>${name}</td>
                            <td>${last_name}</td>
                            <td>${dato.email}</td>
                            <td>$${dato.balance}</td>
                            <td>$${dato.OS_balance}</td>
                        <tr>
                    `;

                    
                    
                    
                
            })

            $('#user_data_tbody').html(template);
                
        })
        .catch(error => {
            // En este punto recibimos el error. then() no se ha invocado
            console.log(error);
            
        });
    }

    
    $('#conf_yes').click(function(e){
        e.preventDefault();
        console.log('HOLA PUTO');
    });
    

    
});

