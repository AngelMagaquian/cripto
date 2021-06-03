<?php
    session_start();
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        /* 
        1-Obtengo el id de la cripto en base a $cripto
        } */

        $user = $_SESSION['id_user'];
        $id_wallet=  $_POST['id_wallet'];
        $cant_pesos = $_POST['cant_pesos'];
        $cant_cripto = $_POST['cant_cripto'];
        $cripto = $_POST['cripto'];

        $dolar_value = $_POST['dolar_value'];
        $cripto_price_cc = $_POST['cripto_price_cc'];
        $cripto_price_sc =$_POST['cripto_price_sc'];
        $commission = $_POST['commission'];
        


        $consulta = "SELECT * FROM cripto WHERE cripto_name = '$cripto'";
        $ejecucion=mysqli_query($conexion,$consulta);
        $response =mysqli_fetch_array($ejecucion);

        $id_cripto=$response['ID_cripto'];
        $date = date('Y-m-d h:s:m');
       
        $new_op = $conexion -> query("INSERT INTO operation (ID_user, ID_cripto, ID_wallet_cripto, TYPE, cripto_amount, pesos_amount, date_hour,state, dolar_value, cripto_price_cc, cripto_price_sc, commission)
        VALUE ($user, $id_cripto, $id_wallet, 'COMPRA', $cant_cripto, $cant_pesos,'$date' , 0, $dolar_value, $cripto_price_cc,$cripto_price_sc,$commission)")
         or die("Error ". mysqli_error($conexion));

         if($new_op){
            
                $update = $conexion -> query("UPDATE wallet_user SET balance = (balance - $cant_pesos ) WHERE ID_user = $user")
                or die("Error ". mysqli_error($conexion));
                echo 1;
        }else{
            echo 'Error: '. mysqli_error($conexion);
        }
    }
?>