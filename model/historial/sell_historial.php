<?php
    session_start();

    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        $user = $_POST['user'];

        $consulta = "SELECT s.ID_sell as 'ID_shop', s.ID_user as 'ID_user', s.ID_account as 'ID_account', s.sell_amount as 'sell_amount', s.amount_pesos as 'amount_pesos', 
        s.date_hour as 'date_hour', s.check_sell as 'check_sell', c.cripto_name as 'cripto_name'
        FROM sell s
        INNER JOIN cripto c ON s.ID_cripto = c.ID_cripto
        WHERE ID_user = $user
        ";
        $ejecucion = mysqli_query($conexion, $consulta);
        $json = array();

        while($resultado= mysqli_fetch_array($ejecucion)){
            $json = array('ID_shop' => $resultado['ID_shop'], 'ID_user' => $resultado['ID_user'], 'ID_cripto' => $resultado['ID_cripto'],
            'ID_account' => $resultado['ID_account'], 'shop_amount' => $resultado['sell_amount'], 'amount_pesos' => $resultado['amount_pesos'],
            'date_hour' => $resultado['date_hour'], 'check_sell' => $resultado['check_sell'], 'cripto_name' => $resultado['cripto_name']);
        }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        mysqli_close($conexion);
    }
?>