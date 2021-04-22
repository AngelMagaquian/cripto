<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){


                $user = $_SESSION['id_user'];

                include("../system/conexion.php");

                $deposit ="SELECT d.id_deposit AS id_deposit, d.id_bank AS id_bank, b.name AS bank_name, d.CBU AS CBU, d.id_user AS id_user, d.id_wallet_user AS id_wallet, 
                d.date_hour AS 'date', d.pesos AS pesos, d.state AS state
                FROM deposit d
                INNER JOIN bank b ON d.id_bank = b.id_bank       
                WHERE d.id_user = $user        
                ORDER BY d.date_hour ASC
                ";
                $ejecucion=mysqli_query($conexion, $deposit);
                $var = 1;
                $json = array();
                while($resultado= mysqli_fetch_array($ejecucion)){
                    $json[] = array('id_deposit' =>$resultado['id_deposit'], 'id_bank' => $resultado['id_bank'], 'bank_name' => $resultado['bank_name'], 'CBU' => $resultado['CBU'],
                    'id_user' => $resultado['id_user'],'id_wallet'=> $resultado['id_wallet'], 'date' => $resultado['date'], 'pesos' => $resultado['pesos'], 'state' => $resultado['state'] );
                }
                $jsonstring= json_encode($json);
                echo $jsonstring;
                mysqli_close($conexion);
        
    }
    
    
?>