<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){


                $user = $_SESSION['id_user'];

                include("../system/conexion.php");

                $deposit ="SELECT d.id_issue AS issue, d.id_deposit AS id_deposit, d.CBU AS CBU, d.id_wallet_user AS id_wallet, 
                d.pesos AS pesos, d.description AS 'desc', b.name AS bank, a.id_bank AS id_bank, w.ID_user AS id_user, 
                de.date_hour AS date
                FROM cancel_deposit d
                INNER JOIN wallet_user w ON w.ID_wallet_user = d.ID_wallet_user 
                INNER JOIN account a ON a.CBU = d.CBU
                INNER JOIN bank b ON b.id_bank = a.id_bank
                INNER JOIN deposit  de ON de.id_deposit = d.id_deposit
                WHERE w.ID_user = $user
                ORDER BY de.date_hour desc
                ";

                $ejecucion=mysqli_query($conexion, $deposit);

                $json = array();
                while($response= mysqli_fetch_array($ejecucion)){
                    $json[] = array('issue' => $response['issue'],'id_deposit' => $response['id_deposit'],'CBU' => $response['CBU'], 
                    'id_wallet' => $response['id_wallet'],'pesos' => $response['pesos'],'desc' => $response['desc'],'bank' => $response['bank'],
                    'id_user' => $response['id_user'],'date' => $response['date']);
                }
                $jsonstring= json_encode($json);
                echo $jsonstring;
                mysqli_close($conexion);
        
    }
    
    
?>