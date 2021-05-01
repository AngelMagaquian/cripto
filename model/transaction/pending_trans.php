<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        if($_SESSION['type'] == 2){
                include("../system/conexion.php");

                $transaction ="SELECT o.ID_user AS ID_user, CONCAT(u.name_user ,'	', u.middle_name,' ',u.last_name,' ', u.second_last_name) AS name, 
                u.DNI AS DNI, o.ID_op AS ID_op, o.date_hour AS date_hour, o.type AS type, o.ID_cripto AS ID_cripto,CONCAT(c.cripto_name,'-',c.description) AS cripto_name,
                o.pesos_amount AS pesos_amount, o.ID_wallet_cripto AS ID_wallet_cripto, o.cripto_amount AS cripto_amount, o.state as state
                FROM operation o
                INNER JOIN user u ON u.ID_user = o.ID_user
                INNER JOIN cripto c ON c.ID_cripto = o.ID_cripto
                INNER JOIN wallet_cripto w ON w.id_wallet_cripto = o.ID_wallet_cripto        
                WHERE o.state = 0        
                ORDER BY o.date_hour ASC
                ";
                $ejecucion=mysqli_query($conexion, $transaction);

                $json = array();
                while($resultado= mysqli_fetch_array($ejecucion)){
                   

                    $json[] = array('id_user' => $resultado['ID_user'], 'user' => $resultado['name'], 'DNI' => $resultado['DNI'], 'id_op' => $resultado['ID_op'], 'date_hour' => $resultado['date_hour'],
                              'type' => $resultado['type'], 'id_cripto' => $resultado['ID_cripto'], 'cripto_name' => $resultado['cripto_name'], 'pesos_amount' => $resultado['pesos_amount'],
                            'id_wallet_cripto' => $resultado['ID_wallet_cripto'], 'cripto_amount' => $resultado['cripto_amount'], 'state' => $resultado['state']);

                    //Id user	User	DNI	Id tranferencia	Fecha	Operación	Criptomoneda	Pesos	Wallet	Confirmación
                }
                $jsonstring= json_encode($json);
                echo $jsonstring;
                mysqli_close($conexion);
        }
    }
    
    
?>