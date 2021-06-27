import { get_data } from "../app/get_data.js";
import { post_data } from "../app/post_data.js";
$(function() {
    console.log('Confirm Account Controller');

    $(document).ready(function() {
        //dejar todo el form en blanco
        default_form();



    });


    function default_form() {
        account_table();
    }

    


    function account_table() {
        get_data('../../model/datos_bancarios/get_all_account.php').then(response => {
                // En este punto recibimos la respuesta.
                let template = ``;
          
                if(response == 0){
                    template = `
                    <tr>
                        <td>No hay cuentas sin confirmar</td>
                        <td>No hay cuentas sin confirmar</td>
                        <td>No hay cuentas sin confirmar</td>
                        <td>No hay cuentas sin confirmar</td>
                        <td>
                        
                        </td>
                    <tr>
                `;

                    $('#account_tbody').html(template);
                }else{
                    let data = JSON.parse(response);
                    
                    console.log('la repuesta es: ' + response);

                    data.forEach(dato => {
                        if (dato.check_account == '0') {
                            template += `
                            <tr>
                                <td>${dato.name}</td>
                                <td>${dato.CUIL}</td>
                                <td>${dato.bank}</td>
                                <td>${dato.CBU}</td>
                                <td>
                                <button class="btn btn-success" id="conf_yes" data-id=${dato.CBU}>si</button>
                                <button class="btn btn-danger" id="conf_no" data-id=${dato.CBU}>no</button>
                                </td>
                            <tr>
                        `;

                            $('#account_tbody').html(template);
                        }
               
                
                    })
                }

            })
            .catch(error => {
                // En este punto recibimos el error. then() no se ha invocado
                console.log(error);
                default_table();

            });
    }

   

    $(document).on('click', '#conf_yes', (e) => {
        e.preventDefault();
        let CBU =$(e.currentTarget).data('id');
        confirmation(1, CBU);
    });
    $(document).on('click', '#conf_no', (e) => {
        let CBU =$(e.currentTarget).data('id');
        confirmation(2, CBU);
    });

    function confirmation(post_conf, post_CBU){
        const postData ={
            CBU: post_CBU,
            conf: post_conf
        }
        $.post('../../model/datos_bancarios/confirm_account.php', postData).then(response => {
            // En este punto recibimos la respuesta.
            console.log(response);
            if(response == 1){
                alertify.alert("<p class='text-center'>¡La operación fue exitosa!</p>", function () {}).set({title:"Confirmación de cuenta"});               
                default_form();
            }else{
                alertify.alert("<p class='text-center'>Ocurrio un error, intentelo mas tarde.</p>", function () {}).set({title:"Confirmación de cuenta"});
                default_form();
            }

        })
        .catch(error => {
            // En este punto recibimos el error. then() no se ha invocado
            console.log(error);
            default_table();

        });
    }



});