<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        if($_SESSION['type'] == 2){
                include("../system/conexion.php");

                $transaction ="SELECT d.id_deposit AS id_deposit, d.id_bank AS id_bank, b.name AS bank_name, a.alias AS alias,
                d.CBU AS CBU, d.id_user AS id_user,CONCAT(u.name_user ,'	', u.middle_name,' ',u.last_name,' ', u.second_last_name) AS 'user_name', u.CUIL AS CUIL,
                d.date_hour AS 'date', d.pesos AS monto, d.state AS state
                FROM deposit d
                INNER JOIN user u ON u.ID_user = d.id_user
                INNER JOIN bank b ON d.id_bank = b.id_bank
                LEFT JOIN account a ON a.CBU = d.CBU
                WHERE d.state = 0
                ORDER BY d.date_hour ASC
                ";
                $ejecucion=mysqli_query($conexion, $transaction);

                $json = array();
                while($resultado= mysqli_fetch_array($ejecucion)){
                   

                    $json[] = array('id_deposit' => $resultado['id_deposit'], 'id_bank' => $resultado['id_bank'], 'bank_name' => $resultado['bank_name'], 'alias' => $resultado['alias'],
                    'CBU' => $resultado['CBU'], 'id_user' => $resultado['id_user'], 'user_name' => $resultado['user_name'],'CUIL' => $resultado['CUIL'], 'date' => $resultado['date'], 'monto' => $resultado['monto'], 'state' => $resultado['state'] );
                }
                $jsonstring= json_encode($json);
                echo $jsonstring;
                mysqli_close($conexion);
        }
    }
    
    
?>