import {get_data} from "../../app/get_data.js";
import {post_data} from "../../app/post_data.js";
import {number_format} from "../../app/number_format.js"
$(function(){
    console.log('Modal user trans ON');
    var changes = false;
    var id = 0;
    $( document ).ready(function() {
    });

    $(document).on('click', '#modal_trans_show_button', (e) => {
        e.preventDefault();
        id =$(e.currentTarget).data('id');
        console.log(id);
        user_info(id);
    });

    function user_info(id){
        
        post_data('../../model/operation/get_trans_user_admin.php', id).then(response => {
            // En este punto recibimos la respuesta.
        /*     alert(id); */
            let data= JSON.parse(response); 
             $('#span_id_user3').html(id); 
            let total_compra =0;
            let total_venta = 0;
            let template_compra = ``;
            let template_venta =``;
            
            var table_compra = $('#modalDepositoCompra').DataTable();
            var table_venta = $('#modalDepositoVenta').DataTable();
            table_compra
            .clear()
            .draw();

            table_venta
            .clear()
            .draw();
            console.log(data);
     
            data.forEach(dato => {
                if(dato.state == 1){
                    if(dato.type== 'COMPRA'){
                        table_compra.row.add(  [      
                            dato.id_operation,
                            dato.wallet_name,
                            dato.date_hour,
                            '$ => '+dato.cripto_name,
                            number_format(dato.cripto_amount,3),
                            '$'+number_format(dato.cripto_price_cc,2),
                            '$'+number_format(dato.cripto_price_sc,2),
                            '$'+number_format(dato.dolar_value,2),
                            dato.commission +'%',
                            '$'+number_format(dato.pesos_amount,2)
                        ]
                        ).draw();
                        total_compra += parseFloat(dato.pesos_amount);
                    }else{
                        table_venta.row.add(  [      
                            dato.id_operation,
                            dato.wallet_name,
                            dato.date_hour,
                            dato.cripto_name +' => $',
                            number_format(dato.cripto_amount,3),
                            '$'+number_format(dato.cripto_price_cc,2),
                            '$'+number_format(dato.cripto_price_sc,2),
                            '$'+number_format(dato.dolar_value,2),
                            dato.commission +'%',
                            '$'+number_format(dato.pesos_amount,2)
                        ]
                        ).draw();
                        total_venta += parseFloat(dato.pesos_amount,2);
                    }
                }
                
                
            }) 

            template_compra =`
                <tr>
                    <td><b>TOTAL COMPRAS</b></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td><b>$${number_format(total_compra,2)}</b></td>
                </tr>
            `;

            template_venta =`
            <tr>
                <td><b>TOTAL VENTAS</b></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td><b>$${number_format(total_venta,2)}</b></td>
            </tr>
        `;

        $('#tftotal_compra').html(template_compra);
        $('#tftotal_ventas').html(template_venta);
            

        })
    }


    $('#close').click(function(e){
        e.preventDefault();
        if(changes == false){

        }else{
            location.reload();
        }
    })

});

