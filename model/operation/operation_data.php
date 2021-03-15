<?php
    session_start();

    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        $user = $_SESSION['id_user'];

        $consulta = "SELECT o.ID_op AS id_operation, o.ID_user AS id_user, o.ID_account AS id_account, o.ID_cripto AS id_cripto, o.ID_wallet_cripto AS id_wallet_cripto, o.ID_bank AS id_bank,o.type AS type, o.cripto_amount AS cripto_amount, o.pesos_amount AS pesos_amount, o.date_hour AS date_hour, o.state AS state, 
        w.wallet_name AS wallet_name, a.CBU AS CBU, c.cripto_name AS cripto_name, b.name AS bank_name
        FROM operation o
        INNER JOIN wallet_cripto w ON w.id_wallet_cripto = o.ID_wallet_cripto
        INNER JOIN account a ON a.ID_account = o.ID_account
        INNER JOIN cripto c ON c.ID_cripto = o.ID_cripto
        INNER JOIN bank b ON o.id_bank = b.id_bank
        WHERE o.ID_user = $user
        ";
        $ejecucion = mysqli_query($conexion, $consulta);
        $json = array();

        while($resultado= mysqli_fetch_array($ejecucion)){
            $json[] = array('id_operation' => $resultado['id_operation'], 'ID_user' => $resultado['id_user'], 'id_account' => $resultado['id_account'],
            'id_cripto' => $resultado['id_cripto'], 'id_wallet_cripto' => $resultado['id_wallet_cripto'], 'type' => $resultado['type'],
            'cripto_amount' => $resultado['cripto_amount'], 'pesos_amount' => $resultado['pesos_amount'], 'date_hour' => $resultado['date_hour'], 'state' => $resultado['state'],
            'wallet_name' => $resultado['wallet_name'], 'CBU' => $resultado['CBU'], 'cripto_name' => $resultado['cripto_name'], 'id_bank' => $resultado['id_bank'], 'bank_name' => $resultado['bank_name']);
        }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        mysqli_close($conexion);
    }
?>