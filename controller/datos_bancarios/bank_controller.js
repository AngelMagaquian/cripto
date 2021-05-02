import {get_data} from "../app/get_data.js";
$(function(){
    console.log('Bank Controller');

    $( document ).ready(function() {
       
            let template =``;
            //funciones para traer los datos del usuario
            get_data('../../model/datos_bancarios/get_account.php').then(response => {
                // En este punto recibimos la respuesta.
                
                let data = JSON.parse(response); 
                
                let state = "";

                data.forEach(dato =>{
                
                 

                    switch (dato.check_account){
                        case '0':
                            state = 'ESTADO: NO CONFIRMADA';
                        break;

                        case '1':
                            state = 'ESTADO: CONFIRMADA';
                        break;

                        case '2':
                            state = 'ESTADO: RECHAZADA';
                        break;
                        
                    }

                    //meli trabaja aca abajo, tenes que cambiar el color del estado y ponerlo uno al lado del otro, porfa no lo rompas, me costo mucho, tkm <3 o sino ntkm </3
                    template +=`
                    <div class="col-md-6 col-12 mb-3" >
                        <div class="card">
                            <div class="card-header">
                                <span>${dato.bank}</span>
                                <br>
                                <label class="estado">${state}</label>
                            </div>
                            <div class="card-body row justify-content-around">
                                <div class="col-md-5 col-12 mt-2">
                                    <label><b>CBU</b></label>
                                    <input type="text" class="form-control form-login"  value="${dato.CBU}" disabled=»disabled»>
                                </div>
                                <div class="col-md-5 col-12 mt-2">
                                    <label><b>TIPO DE CUENTA</b></label>
                                    <input type="text" class="form-control form-login"  value="${dato.type_account_name}" disabled=»disabled»>
                                </div>
                                <div class="col-md-5 col-12 mt-2">
                                    <label><b>TIPO DE MONEDA</b></label>
                                    <input type="text" class="form-control form-login"  value="${dato.currency}" disabled=»disabled»>
                                </div>
                                <div class="col-md-5 col-12 mt-2">
                                    <label><b>NÚMERO DE CUENTA</b></label>
                                    <input type="text" class="form-control form-login"  value="${dato.account_number}" disabled=»disabled»>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    `;
                })

                $('#card_conteiner').html(template);
                
            })
            .catch(error => {
                    console.log(error);
            });
        
    });

});

